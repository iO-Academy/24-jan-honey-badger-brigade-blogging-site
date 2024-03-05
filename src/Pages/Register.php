<?php
require_once  'src/Models/UserModel.php';
require_once 'src/Entities/User.php';
require_once 'src/connectToDb.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //connect to the db
    $pdo = connectToDb();

    // Create an instance of UserModel
    $userModel = new UserModel($pdo); // assuming $pdo is initialized somewhere in your script

    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Call registerUser function
    $result = $userModel->registerUser($username, $email, $password);

    // Display result
    echo "<p>$result</p>";
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
        <!--        <a href="login.php">Login</a>-->
        <!--        <a href="register.php">Register</a>-->
    </div>
</nav>

<form class="container lg:w-1/4 mx-auto flex flex-col p-8 bg-slate-200" method="post">
    <h2 class="text-3xl mb-4 text-center">Register</h2>
    <div class="mb-5">
        <label class="mb-3 block" for="username">Username:</label>
        <input class="w-full px-3 py-2 text-lg" type="text" id="username" />
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="email">Email:</label>
        <input class="w-full px-3 py-2 text-lg" type="email" id="email" />
    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="password">Password:</label>
        <input class="w-full px-3 py-2 text-lg" type="password" id="password" name="password" />
    </div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["password"])) {
            $password = $_POST["password"];
            $hint = passwordHint($password);
            echo "<p class='text-sm text-black-500'>$hint</p>";

        } else {
            echo "error";
        }



    }    function passwordHint($password): string
    {
        if(strlen($password) < 8)
        {
            return "Password must be at least 8 characters long.";
        } else {
            return "Password looks good!";
        }
    }


    ?>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Register" />
</form>

</body>
</html>