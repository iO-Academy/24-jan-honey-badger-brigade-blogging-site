<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/UserModel.php';

session_start();

if (isset($_SESSION['userid'])) {
    header('Location: index.php');
}

$db = connectToDb();
$userModel = new UserModel($db);
$errorMessage = '';

if(isset($_POST['submit'])) {
    $inputtedEmail = $_POST['username'];
    $inputtedPassword = $_POST['password'];
    $verifyUser = $userModel->getUserByEmail($inputtedEmail);
    if($verifyUser === false) {
        $errorMessage = 'Invalid username or password';
    } elseif (password_verify($inputtedPassword, $verifyUser->password)){
        $_SESSION['userid'] = $verifyUser->id;
        header('Location: index.php');
    } else {
        $errorMessage = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <?php echo isset($_SESSION['userid']) ?
            '<a href="logout.php">Logout</a>':
            '<a href="login.php">Login</a>'; ?>
    </div>
</nav>
<form method="post" class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200">
    <h2 class="text-3xl mb-4 text-center">Login</h2>
    <div class="mb-5">
        <label class="mb-3 block" for="username">Username:</label>
        <input class="w-full px-3 py-2 text-lg" type="text" id="username" name="username" />
    </div>
    <div class="mb-5">
        <label class="mb-3 block" for="password">Password:</label>
        <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password" />
    </div>
    <div>
        <p> <?php echo $errorMessage; ?></p>
    </div>
    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" name="submit" value="Login" />
</form>
</body>
</html>