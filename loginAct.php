<?php

$email=$_POST['email'];
$senha=$_POST['senha'];
$msg = "";
$link = "login.php";

if($email==""){
    $msg="Por favor, preencha o campo e-mail!";
}else if($senha==""){
    $msg="Por favor, preencha o campo senha!";
}else{

    include_once('./Utilities/database_connection.php');
    
    $sql = "SELECT * FROM usuarios WHERE email_usuarios=:email";
    $stm_sql=$banco->prepare($sql);
    $stm_sql->bindParam(':email',$email);
    $stm_sql->execute();
    $user = $stm_sql->fetch(PDO::FETCH_ASSOC);

    $senha_db = $user['senha_usuarios'];
    if (password_verify($senha, $senha_db)) {   
        session_start();
        $_SESSION['user'] = $user['id_usuarios'];
        $_SESSION['idsessao'] = session_id();
        $link = "index.php";
    } else {
        $msg="Usuário ou senha incorretos!";
    }
}
    header("Location: " . $link . "?mensagem=" . $msg );
?>