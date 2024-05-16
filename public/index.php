<?php

session_start();

require '../config.php'; // Database verbinding
require '../includes/functions.php'; // Functions toevoegen voor veiligheid

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dave's Blogpage</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
	<!-- Header file -->
	<?php include("../includes/header.php")  ?>

<!-- Main Content -->
 <?php require_once getPage(); ?>

<!-- Footer Bestand -->
<?php include("../includes/footer.php")  ?>

<!-- Javascript bestand voor Navbar -->
<script src="./scripts/script.js"></script>
</body>
</html>

