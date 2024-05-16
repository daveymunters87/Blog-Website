<?php $page = getPage('admin'); ?>
    <?php require_once $page; ?>
    <?php 
        $totalPosts = getAdminData()['totalPosts'];
        $totalUsers = getAdminData()['totalUsers'];
    ?>
    <?php if ($page == '../admin/index.php') : ?>

        <div class="container mx-auto py-28">
            <h1 class="text-3xl font-semibold mb-4">Welcome Admin</h1>

            <!-- Analysis Sectie -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-4 shadow-md">
                    <h2 class="text-xl font-semibold">Total Users</h2>
                    <p class="text-2xl font-bold"><?= $totalUsers ?></p>
                </div>
                <div class="bg-white p-4 shadow-md">
                    <h2 class="text-xl font-semibold">Total Posts</h2>
                    <p class="text-2xl font-bold"><?= $totalPosts ?></p>
                </div>
                <div class="mt-8">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

    <?php endif; ?>