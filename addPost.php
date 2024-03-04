<?php
    require_once 'src/Models/BlogModel.php';
    require_once 'src/connectToDb.php';

    session_start();
    $db = connectToDb();

    // Check if user is logged in - else send back to homepage

    if (!isset($_SESSION['userid'])) {
        header('Location: src/login.php');
    } else {
        $authorid = $_SESSION['userid'];
    }

    // define the variables & messages we need to send
    $title = '';
    $content = '';
    $titleError = '';
    $contentError = '';
    $successMessage = '';

    // if form is submitted, start validating content and tidy up data
    function cleanUpInput($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    // check length
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (strlen($_POST['title']) > 30){
            $titleError = "Sorry, titles must be less than 30 characters.";
        }
        elseif (empty($_POST['title'])) {
            $titleError = "Sorry, a title is required";
        }
        else
        {
           $title = cleanUpInput($_POST['title']);
        }

        if (strlen($_POST['content']) > 1000){
            $contentError = "Sorry, posts must be less than 1000 characters.";
        }
        elseif (empty($_POST['content'])) {
            $contentError = "Sorry, some post content is required";
        }
        else
        {
            $content = cleanUpInput($_POST['content']);
        }
    }

    // If content ok, addBlogPost function and show success message, option to visit home page and clear form (ie you can submit another post or checkout your last one on homepage.

//$successMessage = 'Thank you, your post has been submitted. Write another post or view all posts on the <a href="index.php">homepage.</a>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <a href="addPost.php">Create Post</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<form class="container lg:w-3/4 mx-auto flex flex-col p-8 bg-slate-200" method="post"  >
    <h2 class="text-3xl mb-4 text-center">Create new post</h2>

    <div class="flex flex-col sm:flex-row mb-5 gap-5">
        <div class="w-full sm:w-2/3">
            <label class="mb-3 block" for="title">Title:</label>
            <input class="w-full px-3 py-2 text-lg" type="text" id="title" name="title" required/>
            <p><?php echo $titleError; ?></p>
        </div>
        <div class="w-full sm:w-1/3">

        </div>

    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="content">Content:</label>
        <textarea class="w-full" id="content" rows="9" name="content" required></textarea>
        <p><?php echo $contentError; ?></p>
    </div>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" name= 'submit' type="submit" value="Create Post" />
    <p><?php echo $successMessage; ?></p>
</form>

</body>
</html>