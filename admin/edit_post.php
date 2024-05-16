     <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
            }


        $query = "SELECT * FROM posts WHERE post_id = :post_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        }
?>
     <form action="../controllers/edit.php?post_id=<?= $post_id; ?>" method="POST">
        <div class="container mx-auto py-8 mb-44">
            <h1 class="text-3xl font- mb-4">Edit Post</h1>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $post['title']; ?>">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= $post['content']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags</label>
                <input type="text" name="tags" id="tags" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $post['tags']; ?>">
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700 text-sm font-bold mb-2">Image URL</label>
                <input type="text" name="image_url" id="image_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $post['image_url']; ?>">
            </div>
            <input type="submit" value="Edit Post" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <a href="?page=manage_posts" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
        </div>
    </form>
</body>