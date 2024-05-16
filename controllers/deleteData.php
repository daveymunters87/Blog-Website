<?php

require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['user_id'])) {
        // Code voor het verwijderen van een bestaande gebruiker door user_id
        $user_id = $_GET['user_id'];
        // Verwijder de gebruiker uit de database
        $query = "DELETE FROM users WHERE user_id = :user_id";
        // Bereid de query voor
        $stmt = $pdo->prepare($query);
        // Bind de user_id aan de query
        $stmt->bindParam(':user_id', $user_id);
        // Voer de query uit
        $stmt->execute();
        // Stuur de gebruiker terug naar de manage_users pagina
        header('Location: ../admin/?page=manage_users');
    } elseif (isset($_GET['post_id'])) {
        // Code voor het verwijderen van een bestaande post door post_id
        $post_id = $_GET['post_id'];
        // Verwijder de post uit de database
        $query = "DELETE FROM posts WHERE post_id = :post_id";
        // Bereid de query voor
        $stmt = $pdo->prepare($query);
        // Bind de post_id aan de query
        $stmt->bindParam(':post_id', $post_id);
        // Voer de query uit
        $stmt->execute();
        // Stuur de gebruiker terug naar de manage_posts pagina
        header('Location: ../admin/?page=manage_posts');
    }
} else {
    // Als de request method niet GET is, geef een foutmelding
    echo "Invalid request method.";
}
