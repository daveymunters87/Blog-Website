<?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
            }


        $query = "SELECT * FROM users WHERE user_id = :user_id";   
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        }
?>
   
   <form action="../controllers/edit.php?user_id=<?= $user_id; ?>" method="POST">
        <div class="container mx-auto py-32">
            <h1 class="text-3xl font- mb-4">Edit User</h1>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $post['username']; ?>">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $post['email']; ?>">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="admin" class="block text-gray-700 text-sm font-bold mb-2">Admin</label>
                <select name="is_admin" id="admin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="0" <?= $post['is_admin'] == 0 ? 'selected' : '' ?>>No</option>
                    <option value="1" <?= $post['is_admin'] == 1 ? 'selected' : '' ?>>Yes</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit User</button>
            <a href="?page=manage_users" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">Cancel</a>
        </div>
    </form>