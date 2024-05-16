    <div class="container mx-auto py-8 mb-20">
        <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
            <h1 class="text-2xl font-bold mb-6">Create User</h1>
            <form action="../controllers/make_user.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
                    <input type="text" id="username" name="username" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500" placeholder="Separate tags with commas" required>
                    <p class="text-sm text-gray-600 mb-2">Password will be hashed</p>
                </div>
                <div class="mb-4">
                <label for="admin" class="block text-gray-700 text-sm font-bold mb-2">Admin</label>
                <select name="is_admin" id="is_admin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
                <div class="mt-6">
                    <button type="submit" name="create_user" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit User</button>
                    <a href="?page=manage_users"class="ml-4 text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>