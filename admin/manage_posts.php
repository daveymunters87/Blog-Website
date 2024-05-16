<?php

$query = "SELECT * FROM posts";
$stmt = $pdo->prepare($query);
$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
    
    <div class="container mx-auto py-8 mb-96">
        <h1 class="text-3xl font- mb-4">Manage Posts</h1>
        <a href="?page=create_post" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Post</a>
        <table class="table-fixed w-full max-w-96 mt-8">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Content</th>
                    <th class="border px-4 py-2">Tags</th>
                    <th class="border px-4 py-2">Url</th>
                    <th class="border px-4 py-2">Edit</th>
                    <th class="border px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post) { ?>
                    <tr class="h-24">
                        <td class="border px-4 py-2 text-center"><?= $post['post_id']; ?></td>
                        <td class="border px-4 py-2 text-center"><?= $post['title']; ?></td>
                        <td class="overflow-hidden whitespace-nowrap text-ellipsis max-w-xs text-center"><?= $post['content']; ?></td>
                        <td class="border px-4 py-2 text-center"><?= $post['tags']; ?></td>
                        <td class="overflow-hidden whitespace-nowrap text-ellipsis max-w-xs text-center"><?= $post['image_url']; ?></td>
                        <td class="border px-4 py-2 text-center">
                        <a href="../admin/?page=edit_post&post_id=<?= $post['post_id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        </td>
                        <td class="border px-4 text-center">
                        <a href="../controllers/deleteData.php?post_id=<?= $post['post_id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>