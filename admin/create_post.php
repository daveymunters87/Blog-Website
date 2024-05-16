<div class="container mx-auto py-8">
        <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
            <h1 class="text-2xl font-bold mb-6">Create Post</h1>
            <form action="../controllers/make_post.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                    <textarea id="content" name="content" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500" rows="5" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="tags" class="block text-gray-700 font-bold mb-2">Tags</label>
                    <input type="text" id="tags" name="tags" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500" placeholder="Separate tags with commas"required >
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image url</label>
                    <input type="url" id="image" name="image" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mt-6">
                    <button type="submit" name="create_post" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit Post</button>
                    <a href="../admin/" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>