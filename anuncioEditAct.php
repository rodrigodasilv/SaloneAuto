<?php
session_start();

include_once('./Utilities/database_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

$sql = "update anuncios set 
preco_anuncios = :preco_anuncios, 
km_anuncios = :km_anuncios, 
ult_revisao = :ult_revisao, 
vendido_anuncios = 0, 
cidades_id = :cidades_id, 
modelos_id = :modelos_id, 
cores_id = :cores_id, 
versoes_id = :versoes_id
where id_anuncios = :anuncios_id;";
$stm_sql = $banco->prepare($sql);
$stm_sql->bindParam(':preco_anuncios', $_POST['price']);
$stm_sql->bindParam(':km_anuncios', $_POST['km']);
$stm_sql->bindParam(':ult_revisao', $_POST['ultRev']);
$stm_sql->bindParam(':cidades_id', $_POST['localizacao']);
$stm_sql->bindParam(':modelos_id', $_POST['modelo']);
$stm_sql->bindParam(':versoes_id', $_POST['versao']);
$stm_sql->bindParam(':cores_id', $_POST['cor']);
$stm_sql->bindParam(':anuncios_id', $_POST['anuncio']);
$result = $stm_sql->execute();
    header('location: anuncios.php');
?>
