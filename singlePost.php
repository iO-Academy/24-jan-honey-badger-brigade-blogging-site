<?php
require_once 'src/connectToDb.php';
require_once 'src/Models/BlogModel.php';
require_once 'src/Models/LikeModel.php';
require_once 'src/Models/CommentModel.php';

session_start();
$db = connectToDb();
$blogModel = new BlogModel($db);

$blog = $blogModel->getBlogById($_GET['id']);
$likes = new LikeModel($db);

if (isset($_GET['click'])){
    if ($_GET['click']==="Like") {
        $value = 1;
    } else
    {
        $value = 0;
    }
    $userClick = $likes->checkUserPostLikes($_SESSION['userid'], $_GET['id']);
    if ($userClick===false)
    {
        $likes->addLike($_SESSION['userid'], $_GET['id'], $value);
    } else
    {
        $likes->updateUserPostLike($userClick, $value);
    }

}

$commentModel = new CommentModel($db);
$commentErrorMessage = '';
$commentSuccessMessage = '';

if (isset($_POST['content'])) {
    $content = strip_tags(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));
    $length = strlen($content);
    if ($length < 10 || $length > 200) {
    $commentErrorMessage = 'Comment must be between 10 and 200 characters.';
    } else {
        $authorid = $_SESSION['userid'];
        $blogid = $_GET['id'];
        $timestamp = date('Y-m-d H:i:s');
        $commentModel->addComment($authorid, $blogid, $content, $timestamp);
        $commentSuccessMessage = 'Comment added successfully!';
    }
}

$comments = $commentModel->getAllComments($_GET['id']);

$blog = $blogModel->getBlogById($_GET['id']);

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
        <?php echo isset($_SESSION['userid']) ?
            '<a href="addPost.php">Create Post</a><a href="logout.php">Logout</a>':
            '<a href="login.php">Login</a><a href="register.php">Register</a>'; ?>
    </div>
</nav>

<section class="container md:w-1/2 mx-auto">
    <article class="p-8 border border-solid rounded-md">
        <?php echo $blog->controversial ? '<span class="px-3 py-2 bg bg-rose-600 inline-block mb-4 rounded-sm">Controversial</span> ':'' ;
        echo strlen($blog->category)>1 ? '<span class="px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm">' . $blog->category . '</span>':'' ;?>
        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl"><?php echo $blog->title; ?></h2>
            <span class="text-xl"><?php echo $blog->likes . ' Likes - ' . $blog->dislikes . ' Dislikes' ?></span>
        </div>
        <p class="text-2xl mb-10"><?php echo $blog->postTime . ' - By ' . $blog->username; ?></p>
        <p><?php echo $blog->content ?></p>
        <div class="flex justify-center gap-5">
            <a class="px-3 py-2 mt-4 text-lg bg-green-300 hover:bg-green-400 hover:text-white transition inline-block rounded-sm" href="<?php echo isset($_SESSION['userid']) ? '?id=' . $_GET['id'] . '&click=Like' : 'login.php'; ?>">Like</a>
            <a class="px-3 py-2 mt-4 text-lg bg-red-300 hover:bg-red-400 hover:text-white transition inline-block rounded-sm" href="<?php echo isset($_SESSION['userid']) ? '?id=' . $_GET['id'] . '&click=Dislike' : 'login.php'; ?>">Dislike</a>
        </div>
        <div class="flex justify-center">
            <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="index.php">View all posts</a>
        </div>
    </article>
</section>

<?php
if(isset($_SESSION['userid']))
{
    ?>
    <section class="container md:w-1/2 mx-auto mt-5">
        <form class="p-8 border border-solid rounded-md bg-slate-200" method="post">
            <div class="mb-5">
                <label class="mb-3 block" for="content">Comment:</label>
                <textarea class="w-full" id="content" name="content" rows="5"></textarea>
            </div>
            <div style='display: flex; align-items: center; margin-top: -5px; color: red'><p><?php echo $commentErrorMessage?> </p></div>
            <div style='display: flex; align-items: center; margin-top: -5px; color: green'><p><?php echo $commentSuccessMessage?> </p></div>
            <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Post Comment" />
        </form>
    </section>
    <?php
}
?>

<section class="container md:w-1/2 mx-auto mt-5 mb-10">
    <?php
    foreach ($comments as $comment) : ?>
    <div class="p-8 border border-solid rounded-md bg-slate-200 mb-2">
        <div class="text-2xl mb-3"><?php echo $comment->username . ' - ' . $comment->timeStamp; ?></div>
        <p> <?php echo $comment->content; ?>.</p>
    </div>
    <?php endforeach;
    if (empty($comments)) : echo 'No comments yet';
    endif;
    ?>
</section>
</body>
</html>