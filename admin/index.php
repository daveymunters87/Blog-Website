<?php

session_start();


require_once '../config.php';
require_once '../includes/functions.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dave's Blogpage - Analysis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Header Bestand -->
    <?php require_once("includes/header.php");  ?>
    
    <!-- Main sectie -->
    <?php require_once("includes/home.php"); ?>

    <!-- Footer Bestand -->
    <?php require_once("../includes/footer.php"); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Javascript bestand voor Navbar -->
<script src="../public/scripts/script.js"></script>
<script>
    //Script voor het maken van een Chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users', 'Posts'],
            datasets: [{
                label: 'Total',
                data: [<?= $totalUsers; ?>, <?= $totalPosts; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</html>