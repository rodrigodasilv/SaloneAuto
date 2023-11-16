<?php
    try{
        $banco = new PDO("mysql:host=127.0.0.1;dbname=SaloneDB;charset=utf8", "root", "");
        }catch(PDOexception $error){
            die("Falha ao conectar ao banco de dados: " . $error->getMessage());
        }
?>