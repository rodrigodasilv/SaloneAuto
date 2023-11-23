<?php
session_start();

include_once('./Utilities/database_connection.php');

if (!isset($_SESSION['user'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

$sql = "UPDATE anuncios a set a.vendido_anuncios=1 where a.id_anuncios=".$_GET['anuncio'];
$stm_sql = $banco->prepare($sql);
$result = $stm_sql->execute();
header('location: anuncios.php');
?>