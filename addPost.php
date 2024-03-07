<?php
    require_once 'src/Models/BlogModel.php';
    require_once 'src/connectToDb.php';

    session_start();
    $db = connectToDb();


    // Check if user is logged in - else send back to login (this doesn't work right now?)
    if (!isset($_SESSION['userid'])) {
        header('Location: src/login.php');
    } else {
        $authorid = $_SESSION['userid'];
    }

    $title = '';
    $content = '';
    $titleError = '';
    $contentError = '';
    $successMessage = '';
    $model = new BlogModel($db);
    $titleCheck=false;
    $contentCheck=false;

    function cleanUpInput($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = cleanUpInput($_POST['title']);
        $content = cleanUpInput($_POST['content']);
        if (strlen($_POST['title']) > 30) {
            $titleError = "Sorry, titles must be less than 30 characters.";
            $titleCheck = false;
        } elseif (empty($_POST['title'])) {
            $titleError = "Sorry, a title is required";
            $titleCheck = false;
        } else {
            $titleCheck = true;
        }
        if (strlen($_POST['content']) > 1000) {
            $contentError = "Sorry, posts must be less than 1000 characters.";
            $contentCheck = false;
        } elseif (empty($_POST['content'])) {
            $contentError = "Sorry, some post content is required";
            $contentCheck = false;
        } else {
            $contentCheck = true;
        }

        if ($titleCheck && $contentCheck) {
            $model->addBlogPost($authorid, $title, $content);
            $title = '';
            $content = '';
            $successMessage = 'Thank you, your post has been submitted. Write another post or view all posts on the homepage.';
        }
    }

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
            <input class="w-full px-3 py-2 text-lg" type="text" id="title" name="title" value='<?php echo $title;?>' required/>
            <p><?php echo $titleError; ?></p>
        </div>
        <div class="w-full sm:w-1/3">

        </div>

    </div>

    <div class="mb-5">
        <label class="mb-3 block" for="content">Content:</label>
        <textarea class="w-full" id="content" rows="9" name="content" required><?php echo $content;?></textarea>
        <p><?php echo $contentError; ?></p>
    </div>

    <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" name= 'submit' type="submit" value="Create Post" />
    <p><?php echo $successMessage; ?></p>
</form>

</body>
</html>
