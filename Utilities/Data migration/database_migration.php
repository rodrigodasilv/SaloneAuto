<?php
    include_once('../Utilities/database_connection.php');
    include_once('./get_data_from_API.php');

    $cidades = get_data_from_api('http://servicodados.ibge.gov.br/api/v1/localidades/estados/SC/municipios');
    foreach($cidades as $cidade){
        $query = "INSERT INTO cidades(id_cidades, nome_cidades) VALUES (:id,:nome)";
        $stm_sql = $banco->prepare($query);
        $stm_sql->bindParam(":id", $cidade['id']);
        $stm_sql->bindParam(":nome", $cidade['nome']);
        $stm_sql->execute();
    };

    //$marcas = get_data_from_api('https://parallelum.com.br/fipe/api/v1/carros/marcas');
    //Buscaria todas as marcas do mundo, porém, gasta muito tempo
    $marcas = array(
        array("codigo" => "23",
              "nome"   => "GM - Chevrolet"),
        array("codigo" => "21",
              "nome"   => "Fiat"),
        array("codigo" => "22",
              "nome"   => "Ford"),
        array("codigo" => "25",
              "nome"   => "Honda"),
        array("codigo" => "26",
              "nome"   => "Hyundai"),
        array("codigo" => "41",
              "nome"   => "Mitsubishi"),
        array("codigo" => "48",
              "nome"   => "Renault"),
        array("codigo" => "56",
              "nome"   => "Toyota"),
        array("codigo" => "59",
              "nome"   => "VW - Volkswagen"),
        array("codigo" => "43",
              "nome"   => "Nissan"),
        array("codigo" => "44",
              "nome"   => "Peugeout")
    );

    foreach($marcas as $marca){
        $query = "INSERT INTO marcas(id_marcas, desc_marcas) VALUES (:id,:desc)";
        $stm_sql = $banco->prepare($query);
        $stm_sql->bindParam(":id", $marca['codigo']);
        $stm_sql->bindParam(":desc", $marca['nome']);
        $stm_sql->execute();

        $modelos = get_data_from_api('https://parallelum.com.br/fipe/api/v1/carros/marcas/'. $marca['codigo'] .'/modelos');
        foreach($modelos['modelos'] as $modelo){
            $query = "INSERT INTO modelos(id_modelos, marcas_id, nome_modelos) VALUES (:id,:marca,:modelo)";
            $stm_sql = $banco->prepare($query);
            $stm_sql->bindParam(":id", $modelo['codigo']);
            $stm_sql->bindParam(":marca", $marca['codigo']);
            $stm_sql->bindParam(":modelo", $modelo['nome']);
            $stm_sql->execute();

            $versoes = get_data_from_api('https://parallelum.com.br/fipe/api/v1/carros/marcas/'. $marca['codigo'] .'/modelos/'. $modelo['codigo'] . "/anos");
            foreach($versoes as $versao){
                $query = "INSERT INTO versoes(modelos_id, combustiveis_id, desc_versoes,ano_versoes) VALUES (:modelo,:combustivel,:desc,:ano)";
                $stm_sql = $banco->prepare($query);
                $stm_sql->bindParam(":modelo", $modelo['codigo']);
                $dados_versao = explode(" ", $versao['nome']);
                if (str_contains($dados_versao[1],'Gasolina')){
                    $combustivel=1; //Gasolina
                }else if (str_contains($dados_versao[1],'Diesel')){
                    $combustivel=2; //Diesel
                }else if (str_contains($dados_versao[1],'GNV')){
                    $combustivel=3; //GNV
                }else{
                    $combustivel=4; //Não disponível
                } 
                $stm_sql->bindParam(":combustivel", $combustivel);
                $desc = $versao['codigo'] . ' - ' . $dados_versao[1];
                $stm_sql->bindParam(":desc", $desc);
                $stm_sql->bindParam(":ano", $dados_versao[0]);
                $stm_sql->execute();
            };
        };
    };
    echo("Carregamento dos dados realizado com sucesso!");
?>