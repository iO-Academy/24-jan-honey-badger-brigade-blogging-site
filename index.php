<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/BlogModel.php';

session_start();
$db = connectToDb();
$blogModel = new BlogModel($db);
$blogs = $blogModel->getAllPosts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <?php echo isset($_SESSION['userid']) ?
        '<a href="addPost.php">Create Post</a><a href="logout.php">Logout</a>':
        '<a href="login.php">Login</a><a href="register.php">Register</a>'; ?>
    </div>
</nav>

<section class="container lg:w-1/2 mx-auto flex flex-col gap-5">
    <?php
    foreach ($blogs as $blogpost): ?>
        <article class="p-8 border border-solid rounded-md">
            <?php echo $blogpost->controversial ? '<span class="px-3 py-2 bg bg-rose-600 inline-block mb-4 rounded-sm">Controversial</span>':'' ;?>
            <div class="flex justify-between items-center flex-col md:flex-row mb-4">
                <h2 class="text-4xl"><?php echo $blogpost->title; ?></h2>
                <span class="text-xl"><?php echo $blogpost->likes . ' Likes - ' . $blogpost->dislikes . ' Dislikes' ?></span>
            </div>
            <p class="text-2xl mb-2"><?php echo $blogpost->postTime . ' - By ' . $blogpost->username?></p>
            <p class="text-2xl mb-2"><?php echo $blogpost->extract ?></p>
            <div class="flex justify-center">
                <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="singlePost.php?id=<?php echo $blogpost->id?>">View post</a>
            </div>
        </article>
    <?php endforeach;
    if (empty($blogs)):
        echo 'Sorry, no posts found.';
        endif;
    ?>
</section>
</body>
</html>
