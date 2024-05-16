<?php

session_start();
require_once ('../config.php');

// Kijkt of er een POST word gemaakt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Als er een post word gemaakt kijkt de code of er een Create post is gesubmit
    if (isset($_POST['create_post'])) {
        $title = $_POST['title'];
        $content = htmlspecialchars($_POST['content']);
        $image_url = $_POST['image']; // Kijkt of er een geldige URL is meegegeven
        $author_id = $_SESSION['loggedInUser'];;
        $tags = $_POST['tags'];

        // Zet de data door naar de database
        $sql = "INSERT INTO posts (title, content, tags, image_url, author_id) VALUES (:title, :content, :tags, :image_url, :author_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':tags', $tags);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->execute();

        // Zodra voltooid word de user naar de home pagina gestuurd.
        header('Location: ../public/');
        exit();
    }
}