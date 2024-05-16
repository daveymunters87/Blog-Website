<?php
session_start();
require '../config.php';

$loggedInUser = $_SESSION['loggedInUser'];

if (isset($_GET['blog_id'])) {
    $blog_id = htmlspecialchars($_GET['blog_id']);
} else {
    die("No blog ID found.");
}

    $sql = "SELECT * FROM posts WHERE post_id = :blog_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':blog_id', $blog_id);
    $stmt->execute();
    
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$post) {
        die("Post not found.");
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include('../includes/header.php'); ?>
    <div class="container mx-auto py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-md overflow-hidden">
            <img src="<?php echo $post['image_url']; ?>" alt="Post Image" class="w-full h-64 object-cover object-center">
            <div class="p-6">
                <h1 class="text-3xl font-semibold mb-4"><?php echo $post['title']; ?></h1>
                <textarea class="w-full h-40 bg-gray-100 p-4 mb-4" readonly><?php echo $post['content']; ?></textarea>
                <div class="text-sm text-gray-500 mb-4">Tags: <?php echo $post['tags']; ?></div>
                <div class="text-sm text-gray-500 mb-2">Posted by <?php echo $post['author_id']; ?> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></div>
                <a href="../public/" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-blue-600">Go Back</a>
            </div>
        </div>
    </div>
</body>
</html>