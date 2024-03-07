<?php
require_once 'src/connectToDb.php';
require_once 'src/Models/BlogModel.php';

$db = connectToDb();
$blogModel = new BlogModel($db);

session_start();

$blog = $blogModel->getBlogById($_GET['id'])
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - <?php echo $blog->title; ?></title>
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

<section class="container md:w-1/2 mx-auto">
    <article class="p-8 border border-solid rounded-md">
        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl"><?php echo $blog->title; ?></h2>
        </div>
        <p class="text-2xl mb-10"><?php echo $blog->postTime . ' - By ' . $blog->getUsername(); ?></p>
        <p><?php echo $blog->content ?></p>
        <div class="flex justify-center">
            <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="index.php">View all posts</a>
        </div>
    </article>
</section>
</body>
</html>