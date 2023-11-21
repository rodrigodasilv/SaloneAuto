<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css?v=<?php echo time(); ?>">
</head>

<body class="vender">
    <header class="text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom" style="padding: 0 40px; border-bottom: 0 !important;">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="./src/img/logo-placeholder.png" alt="">

            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 ">Comprar</a></li>
            <li><a href="vender.php" class="nav-link px-2 link-secondary">Vender</a></li>
            <li><a href="anuncios.php" class="nav-link px-2">Meus Anuncios</a></li>
            <li><a href="sobre.php" class="nav-link px-2">Sobre</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>

            <a href="cadastro.php"><button type="button" class="btn btn-primary">Cadastro</button></a>
        </div>
    </header>
    <div class="container" style="text-align: center; margin-top: 50px">
        <h3>Cadastre seu carro.</h3>
        <form>
            <label for="marcaSelect">Selecione a marca do carro</label><br>
            <select class="form-select" id="marcaSelect">
                <?php
                include_once('./Utilities/database_connection.php');
                $query = "SELECT * FROM marcas";
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $marcas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($marcas as $marca) {
                    echo '<option value="' . $marca['id_marcas'] . '">' . $marca['desc_marcas'] . '</option>';
                }
                ?>
            </select><br><br>
            <label for="modeloSelect">Selecione o modelo do carro</label><br>
            <select class="form-select" id="modeloSelect">
                <?php
                include_once('./Utilities/database_connection.php');
                $query = "SELECT * FROM modelos WHERE nome_modelos = '106 KID 1.0'";
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $modelos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($modelos as $modelo) {
                    echo '<option value="' . $modelos['id_modelos'] . '">' . $modelos['nome_modelos'] . '</option>';
                }
                ?>
            </select><br><br>
            <label for="versaoSelect">Selecione a versão do carro</label><br>
            <select class="form-select" id="versaoSelect">
                <option value="sei la">Focus</option>
                <option value="sei la 2">Ka</option>
                <option value="N/A">N/A</option>
            </select><br><br>
            <label for="localizacao">Selecione a cor do carro</label>
            <br />
            <select class="form-select" id="corSelect">
                <option value="">Escolha uma cor</option>
                <?php
                include_once('./Utilities/database_connection.php');
                $query = "SELECT * FROM cores";
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $cores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cores as $cor) {
                    echo '<option value="' . $cor['id_cores'] . '">' . $cor['desc_cores'] . '</option>';
                }
                ?>
            </select><br><br>
            <label for="localizacao">Selecione sua localização</label>
            <br />
            <select class="form-select" name="localizacao" id="localizacao">
                <option value="">Escolha uma cidade</option>
                <?php
                include_once('./Utilities/database_connection.php');
                $query = "SELECT * FROM cidades";
                $stm_sql = $banco->prepare($query);
                $stm_sql->execute();
                $cidades = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cidades as $cidade) {
                    echo '<option value="' . $cidade['id_cidades'] . '">' . $cidade['nome_cidades'] . '</option>';
                }
                ?>
            </select><br><br>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>