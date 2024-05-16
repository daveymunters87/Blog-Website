<?php

require '../config.php';

// Kijkt of er een POST word gemaakt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Als er een post is gevonden kijkt het of er een user word gesubmit
    if(isset($_POST['create_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $is_admin = $_POST['is_admin'];
        
        // Zet de data door naar de database
        $sql = "INSERT INTO users (username, email, password, is_admin) VALUES (:username, :email, :password, :is_admin)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':is_admin', $is_admin);
        $stmt->execute();

        // Zodra voltooid word de user naar de home pagina gestuurd.
        header('Location: ../admin/?page=manage_users');
        exit();
    }
}