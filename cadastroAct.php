<?php
  $nome     = $_POST['nome'];
  $email   = $_POST['email'];
  $senha     = $_POST['senha'];
  $celular = $_POST['celular'];
  $cpf = $_POST['cpf'];
  $nasc = $_POST['nasc'];
  $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
  $msg = "";
  $link = "cadastro.php";
  include_once('./Utilities/database_connection.php');

  if($email==""){
    $msg = "Preencha o campo e-mail.";
  }elseif($nome==""){
    $msg = "Preencha o campo nome.";
  }elseif($senha==""){
    $msg = "Preencha o campo senha.";
  }elseif($celular==""){
    $msg = "Preencha o campo celular.";
}elseif($cpf==""){
    $msg = "Preencha o campo CPF.";
}elseif(!isset($_POST['nasc'])){
    $msg = "Preencha o campo Data de nascimento.";
  }else{

    $sql = "SELECT * FROM usuarios u WHERE u.email_usuarios=:email";

    $stm_sql = $banco->prepare($sql);
    $stm_sql->bindParam(':email', $email);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){
      $sql = "INSERT INTO usuarios (nome_usuarios, email_usuarios, senha_usuarios, cel_usuarios, cpf_usuarios, dat_nasc_usuarios) VALUES (:nome_usuarios, :email_usuarios, :senha_usuarios, :cel_usuarios, :cpf_usuarios, :dat_nasc_usuarios)";

      $stm_sql = $banco->prepare($sql);
      $stm_sql->bindParam(':nome_usuarios', $nome);
      $stm_sql->bindParam(':email_usuarios', $email);
      $stm_sql->bindParam(':senha_usuarios', $senha_criptografada);
      $stm_sql->bindParam(':cel_usuarios', $celular);
      $stm_sql->bindParam(':cpf_usuarios', $cpf);
      $stm_sql->bindParam(':dat_nasc_usuarios', $nasc);

      $result = $stm_sql->execute();

      if($result){
        $msg = "Cadastro efetuado com sucesso!";
      }else{
        $msg = "Falha ao cadastrar!";
      }
    }else{
      $msg = "Esse usuário já está cadastrado no banco de dados.";
    }
  }

  header("Location:" . $link . "?mensagem=".$msg);
?>