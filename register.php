<?php
require_once 'src/Models/UserModel.php';
require_once 'src/Entities/User.php';
require_once 'src/connectToDb.php';
require_once 'src/passwordHint.php';
$db = connectToDb();
session_start();
$userError = '';
$passwordError = '';
$emailError = '';

$userModel = new UserModel($db);

// Check if the form is submitted
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $newEmail = new Email($email);
    } catch(Exception $e) {
        $emailError = $e->getMessage();
    }

    if ($userModel->usernameExists($username)) {
        $userError = 'Sorry this is not a valid username';
    } else { $userError = '';}

    $passwordError = passwordHint($password);

    if (empty($userError) && empty($passwordError) && empty($emailError)) {
        $result = $userModel->registerUser($username, $newEmail, $password);
        $user = $userModel->getUserByEmail($email);
        $_SESSION['userid'] = $user->id;
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <!--        <a href="addPost.php">Create Post</a>-->
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
    </div>
</nav>

<form class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200" method="post">
    <h2 class="text-3xl mb-4 text-center">Register</h2>
    <div class="mb-5">
        <label class="mb-3 block" for="username">Username:</label>
        <input class="w-full px-3 py-2 text-lg" type="text" id="username" name="username" />
        <p class="text-red-500"><?php echo $userError ?></p>
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="email">Email:</label>
        <input class="w-full px-3 py-2 text-lg" type="email" id="email" name="email" />
        <p class="text-red-500"><?php echo $emailError ?></p>

    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="password">Password:</label>
        <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password" />
        <p class="text-red-500"><?php echo $passwordError ?></p>

    </div>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" name="submit" value="Register" />
</form>

</body>
</html>