<?php

    //haalt de sessie op
    session_start();
    //haalt alles waardes uit de sessies
    session_unset();
    //Verwijderd de login sessie
    session_destroy();
    //Stuurt de user naar de login pagina
    header('Location: login.php');
    //Voorkomt verdere handelingen
    die();

?>