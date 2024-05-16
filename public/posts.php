<?php

$sql = "SELECT * FROM posts";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($posts as $post) { ?>
            <div class="group flex w-auto max-w-xs cursor-pointer flex-col items-start gap-2 overflow-hidden rounded-lg shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="<?php echo $post['image_url']; ?>" class="w-full h-96 object-cover transition-all duration-300 group-hover:opacity-90" />
                <div class="flex flex-col gap-4 p-4">
                    <h2 class="text-2xl font-semibold"><?php echo $post['title']; ?></h2>
                    <p class="text-base"><?php echo $post['tags']; ?></p>
                  <a href="view_post.php?blog_id=<?php echo $post['post_id']; ?>" class="w-[100px] rounded-md bg-blue-600 px-5 py-2 text-white text-center shadow-xl transition-all duration-300 hover:bg-blue-700">See Post!</a>
                    <p class="text-gray-500 text-sm">Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>