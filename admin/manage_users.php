<?php

$query = "SELECT * FROM users";
$statement = $pdo->prepare($query);
$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
    <div class="container mx-auto py-8 mb-4">
        <h1 class="text-3xl font- mb-4">Manage Users</h1>
        <a href="?page=create_user" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create User</a>
        <table class="table-auto w-full mt-8 mb-80">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Username</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Password</th>
                    <th class="border px-4 py-2">Is Admin</th>
                    <th class="border px-4 py-2">Edit</th>
                    <th class="border px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?=  $user['user_id']; ?></td>
                        <td class="border px-4 py-2"><?=  $user['username']; ?></td>
                        <td class="border px-4 py-2"><?=  $user['email']; ?></td>
                        <td class="border px-4 py-2"><?=  $user['password']; ?></td>
                        <td class="border px-4 py-2"><?=  $user['is_admin']; ?></td>
                        <td class="border px-4 py-2">
                        <a href="../admin/?page=edit_user&user_id=<?= $user['user_id']; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        </td>
                        <td class="border px-4 py-2">
                        <a href="../controllers/deleteData.php?user_id=<?= $user['user_id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
