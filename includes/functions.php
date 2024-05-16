<?php

function redirectToLoginWithError($errorMessage)
{
    header("Location: login.php?error=" . urlencode($errorMessage));
    exit();
}

function redirectToLoginIfNotLoggedIn()
{
    if (!isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser'])) {
        redirectToLoginWithError("You are not logged in.");
    }
}

function getPage($path = 'public')
{
    if (isset($_GET['page'])) {
        if (file_exists('../' . $path . '/' . $_GET['page'] . '.php')) {
            return '../' . $path . '/' . $_GET['page'] . '.php';
        }
    }
    if ($path == 'public') {
        return '../includes/home.php';
    } elseif ($path == 'admin') {
        return '../admin/index.php';
    }
}

function getAdminData()
{

    $pdo = dbConnect();

    // Query om alle bestaande users op te halen
    $queryUsers = "SELECT COUNT(user_id) AS total_users FROM users";
    $stmtUsers = $pdo->query($queryUsers);
    $totalUsers = $stmtUsers->fetch(PDO::FETCH_ASSOC)['total_users'];
    // Query om alle bestaande posts op te halen
    $queryPosts = "SELECT COUNT(post_id) AS total_posts FROM posts";
    $stmtPosts = $pdo->query($queryPosts);
    $totalPosts = $stmtPosts->fetch(PDO::FETCH_ASSOC)['total_posts'];

    return [
        'totalUsers' => $totalUsers,
        'totalPosts' => $totalPosts
    ];
}



if (!isset(($_SESSION['loggedInUser']))) {
    redirectToLoginIfNotLoggedIn();
} 
