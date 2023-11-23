<?php
session_start();

include_once('./Utilities/database_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Define the target directory for uploaded files
$targetDir = "fotos/";

// Get the current user's name from the session
$userName = $_SESSION['user'];

// Create the target directory if it doesn't exist
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Get the uploaded file
$uploadedFile = $_FILES['foto'];

// Get the file name and extension
$fileName = basename($uploadedFile['name']);

if ($_POST['price']=='' || $_POST['ultRev']==''){
    header('vender.php?mensagem=Preencha o campo preco e última revisão!');
}

$sql = "INSERT INTO anuncios (preco_anuncios, km_anuncios, ult_revisao, vendido_anuncios, cidades_id, usuarios_id, modelos_id, cores_id, versoes_id) VALUES (:preco_anuncios, :km_anuncios, :ult_revisao, 0, :cidades_id, :usuarios_id, :modelos_id, :cores_id, :versoes_id)";
$stm_sql = $banco->prepare($sql);
$stm_sql->bindParam(':preco_anuncios', $_POST['price']);
$stm_sql->bindParam(':km_anuncios', $_POST['km']);
$stm_sql->bindParam(':ult_revisao', $_POST['ultRev']);
$stm_sql->bindParam(':cidades_id', $_POST['localizacao']);
$stm_sql->bindParam(':usuarios_id', $userName);
$stm_sql->bindParam(':modelos_id', $_POST['modelo']);
$stm_sql->bindParam(':versoes_id', $_POST['versao']);
$stm_sql->bindParam(':cores_id', $_POST['cor']);
$result = $stm_sql->execute();
$anuncio_id = $banco->lastInsertId();

$targetFilePath = $targetDir . $userName . "_" . $anuncio_id . ".png";

// Move the uploaded file to the target directory
if (move_uploaded_file($uploadedFile['tmp_name'], $targetFilePath)) {
    // File uploaded successfully. You can add code here to store additional form data in your database.
    header('location: anuncios.php');
}
?>
