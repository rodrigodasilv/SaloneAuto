<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaloneAuto - Vender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css?v=<?php echo time(); ?>">
</head>

<body class="vender">
    <header class="text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom" style="padding: 0 40px; border-bottom: 0 !important;">
        <div class="col-md-3 mb-md-0 text-center" style="padding-right: 4rem">
        <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="./src/img/SaloneAuto2.png" class="img-fluid logo" alt="">
        </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 ">Comprar</a></li>
            <li><a href="vender.php" class="nav-link px-2 link-secondary">Vender</a></li>
            <li><a href="anuncios.php" class="nav-link px-2">Meus Anuncios</a></li>
            <li><a href="sobre.php" class="nav-link px-2">Sobre</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="logout.php"><button type="button" class="btn btn-outline-primary me-2">Sair</button></a>
        </div>
    </header>
    <div class="container" style="padding-top: 2rem">
        <h3>Edite seu anúncio.</h3>
        <div class="col-12">
                <?php if (isset($_GET['mensagem'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $_GET['mensagem']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>
        <form action="anuncioEditAct.php" method="post" enctype="multipart/form-data">
            <label for="marcaSelect">Selecione a marca do carro</label><br>
            <script>
                function addMarca() {
                    var lista = document.getElementById('modeloSelect');
                    var opcoes = lista.options;

                    for (var i = opcoes.length - 1; i >= 0; i--) {
                        opcoes[i].removeAttribute('hidden');
                        if (opcoes[i].getAttribute('marca') != document.getElementById('marcaSelect').value) {
                            opcoes[i].setAttribute('hidden', true);
                        }
                    }
                }

                function addModelo() {
                    var lista = document.getElementById('versaoSelect');
                    var opcoes = lista.options;

                    for (var i = opcoes.length - 1; i >= 0; i--) {
                        opcoes[i].removeAttribute('hidden');
                    }

                    for (var i = opcoes.length - 1; i >= 0; i--) {
                        if (opcoes[i].getAttribute('modelo') != document.getElementById('modeloSelect').value) {
                            opcoes[i].setAttribute('hidden', true);
                        }
                    }
                }
            </script>
            <select class="form-select" id="marcaSelect" onchange="addMarca()">
                <?php
                include_once('./validation.php');
                if (isset($_GET['marcas_id'])){
                    $marcaID = $_GET['marcas_id'];
                }
                include_once('./Utilities/database_connection.php');
                $query = "select * from anuncios a join versoes v on v.id_versoes = a.versoes_id join modelos m on a.modelos_id = m.id_modelos
                join cores c on c.id_cores = a.cores_id join cidades ci on ci.id_cidades = a.cidades_id
                join marcas ma on ma.id_marcas = m.marcas_id and a.vendido_anuncios=0 and a.id_anuncios=". $_GET['anuncio'];
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $anuncio = $stm_sql->fetch(PDO::FETCH_ASSOC);
                if(isset($anuncio['marcas_id'])){
                    $marcaID = $anuncio['marcas_id'];
                }

                $query = "SELECT * FROM marcas m where m.id_marcas=". $marcaID ."
                          union
                          SELECT * from marcas m where m.id_marcas<>". $marcaID;
                $stm_sql = $banco->prepare($query);
                var_dump($query);
                $stm_sql->execute();
                $marcas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($marcas as $marca) {
                    echo '<option value="' . $marca['id_marcas'] . '">' . $marca['desc_marcas'] . '</option>';
                }
                ?>
            </select>
            <?php echo '<input type="hidden" name="anuncio" id="anuncio" value="'.$anuncio['id_anuncios'].'">' ?>
            <label for="modeloSelect">Selecione o modelo do carro</label><br>
            <select class="form-select" id="modeloSelect" name="modelo" onchange="addModelo()">
                <?php
                if (isset($anuncio['modelos_id'])){
                    $modeloID = $anuncio['modelos_id'];
                }
                $query = "SELECT * FROM modelos m where m.id_modelos=". $modeloID ."
                          union
                          SELECT * FROM modelos m where m.id_modelos<>". $modeloID;
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $modelos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($modelos as $modelo) {
                    echo '<option marca="' . $modelo['marcas_id'] . '" value="' . $modelo['id_modelos'] . '">' . $modelo['nome_modelos'] . '</option>';
                }
                ?>
            </select>
            <label for="versaoSelect">Selecione a versão do carro</label><br>
            <select class="form-select" id="versaoSelect" name="versao">
            <?php
                $query = "SELECT * FROM versoes v where v.modelos_id=". $modeloID ."
                          union
                          SELECT * FROM versoes v where v.modelos_id<>". $modeloID;
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $versoes = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($versoes as $versao) {
                    echo '<option modelo="' . $versao['modelos_id'] . '" value="' . $versao['id_versoes'] . '">' . $versao['desc_versoes'] . '</option>';
                }
                ?>
            </select>
            <label for="localizacao">Selecione a cor do carro</label>
            <br />
            <select class="form-select" id="corSelect" name="cor">
                <?php
                $query = "SELECT * FROM cores c where c.id_cores=". $anuncio['cores_id'] ."
                union
                SELECT * FROM cores c where c.id_cores<>". $anuncio['cores_id'];
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $cores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cores as $cor) {
                    echo '<option value="' . $cor['id_cores'] . '">' . $cor['desc_cores'] . '</option>';
                }
                ?>
            </select>
            <label for="localizacao">Selecione sua localização</label>
            <br />
            <select class="form-select" name="localizacao" id="localizacao">
                <?php
                $query = "SELECT * FROM cidades c where c.id_cidades=". $anuncio['cidades_id'] ."
                union
                SELECT * FROM cidades c where c.id_cidades<>". $anuncio['cidades_id'];
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $cidades = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cidades as $cidade) {
                    echo '<option value="' . $cidade['id_cidades'] . '">' . $cidade['nome_cidades'] . '</option>';
                }
                ?>
            </select>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Preço</label>
                        <input class="form-control" type="decimal" value="<?php echo $anuncio['preco_anuncios']?>" name="price" id="price" placeholder="100000">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ultRev">Ano da última revisão:</label>
                        <input class="form-control" id="ultRev" value="<?php echo $anuncio['ult_revisao']?>" name="ultRev" type="number" placeholder="<?php echo date('Y') ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="km">Quilometragem:</label>
                        <input class="form-control" id="km" name="km" type="number" value="<?php echo $anuncio['km_anuncios']?>" placeholder="50000">
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding-top: 2rem; padding-bottom: 2rem">
                <button type="submit" class="btn btn-outline-primary text-bg-dark">Atualizar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>