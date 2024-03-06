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
    <title>Blog - Example Title</title>
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
<!--        <span class="px-3 py-2 bg bg-rose-600 inline-block mb-4 rounded-sm">Controversial</span>-->
<!--        <span class="px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm">Gaming</span>-->
        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl"><?php echo $blog->title; ?></h2>
<!--            <span class="text-xl">100 likes - 50 dislikes</span>-->
        </div>
        <p class="text-2xl mb-10"><?php echo $blog->postTime . ' - By ' . $blog->id; ?></p>
        <p><?php echo $blog->content ?></p>
<!--        <div class="flex justify-center gap-5">-->
<!--            <a class="px-3 py-2 mt-4 text-lg bg-green-300 hover:bg-green-400 hover:text-white transition inline-block rounded-sm" href="#">Like</a>-->
<!--            <a class="px-3 py-2 mt-4 text-lg bg-red-300 hover:bg-red-400 hover:text-white transition inline-block rounded-sm" href="#">Dislike</a>-->
<!--        </div>-->
        <div class="flex justify-center">
            <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="index.php">View all posts</a>
        </div>
    </article>
</section>

<?php
if(isset($_SESSION['userid']))
{
    if(isset($_POST['content']))
    {
        $content = $_POST['content'];
        $length = strlen($content);
        if($length < 10 || $length > 200)
        {
            echo "<div style='display: flex; justify-content: center; align-items: center; margin-top: 15px; color: red'><p>Error: Comment must be between 10 and 200 characters.</p></div>";
        } else
        {
            echo "<div style='display: flex; justify-content: center; align-items: center; margin-top: 15px; color: green'><p>Comment added successfully!</p></div>";
        }
    }
    ?>
    <section class="container md:w-1/2 mx-auto mt-5">
        <form class="p-8 border border-solid rounded-md bg-slate-200" method="post">
            <div class="mb-5">
                <label class="mb-3 block" for="content">Comment:</label>
                <textarea class="w-full" id="content" name="content" rows="5"></textarea>
            </div>

            <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Post Comment" />
        </form>
    </section>
<?php
}
?>

<section class="container md:w-1/2 mx-auto mt-5 mb-10">
    <div class="p-8 border border-solid rounded-md bg-slate-200">
        <div class="text-2xl mb-3">Steve Smith - 01/01/2024</div>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique lorem sit amet mi scelerisque, eu imperdiet tortor lobortis.</p>
    </div>
</section>

</body>
</html>