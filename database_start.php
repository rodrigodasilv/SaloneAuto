<?php
    include_once('./utilities/database_connection.php');
    include_once('./Utilities/get_data_from_API.php');

    $cidades = get_data_from_api('https://servicodados.ibge.gov.br/api/v1/localidades/estados/SC/municipios');
    
    var_dump($cidades);
    //$query = "INSERT INTO alunos(nome, email,senha, celular, data_nasc) VALUES ('$nome','$email','$senha_cripto','$celular','$nasc')";
    //mysqli_query($banco, $query);

    mysqli_close($banco);
?>