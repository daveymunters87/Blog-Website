<?php

require_once('../config.php');

// kijkt of de request method een POST is
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // kijkt of er een post_id is meegegeven aan de form action
    if (isset($_GET['post_id'])) {
            // query om de post te updaten
            $query = "UPDATE posts SET title = :title, content = :content, tags = :tags, image_url = :image_url WHERE post_id = :post_id";
            // bereid de query voor
            $stmt = $pdo->prepare($query);
            // bind de parameters aan de query
            $stmt->bindParam(':title', $_POST['title']);
            $stmt->bindParam(':content', htmlspecialchars($_POST['content']));
            $stmt->bindParam(':tags', $_POST['tags']);
            $stmt->bindParam(':image_url', $_POST['image_url']);
            $stmt->bindParam(':post_id', $_GET['post_id']);
            // voer de query uit
            $stmt->execute();
            // stuur de gebruiker terug naar de manage_posts pagina
            header('Location: ../admin/?page=manage_posts');
            // kijkt of er een user_id is meegegeven aan de form action
    } elseif (isset($_GET['user_id'])) {
        // query om de user te updaten
        $query = "UPDATE users SET username = :username, email = :email, password = :password, is_admin = :is_admin WHERE user_id = :user_id";
        // bereid de query voor
        $stmt = $pdo->prepare($query);
        // bind de parameters aan de query
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
        $stmt->bindParam(':is_admin', $_POST['is_admin']);
        $stmt->bindParam(':user_id', $_GET['user_id']);
        // voer de query uit
        $stmt->execute();
        // stuur de gebruiker terug naar de manage_users pagina
        header('Location: ../admin/?page=manage_users');
    }
}

?>

