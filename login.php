<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaloneAuto - O lugar para encontrar seu novo automóvel!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css?v=<?php echo time(); ?>">
</head>

<body style="width: 100%; padding: 0">
    <header
        class="text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom"
        style="padding: 0 40px; border-bottom: 0 !important;">
        <div class="col-md-3 mb-md-0 text-center" style="padding-right: 4rem">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="./src/img/SaloneAuto2.png" class="img-fluid logo" alt="">
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2">Comprar</a></li>
            <?php
            if (isset($_SESSION['user'])) {
                echo '<li><a href="vender.php" class="nav-link px-2">Vender</a></li>';
                echo '<li><a href="anuncios.php" class="nav-link px-2">Meus Anuncios</a></li>';
            }
            ?>
            <li><a href="sobre.php" class="nav-link px-2">Sobre</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php
            if (isset($_SESSION['user'])) {
                if (isset($_SESSION['user'])) {
                    header("Location: ./index.php");
                }
            }else{
                echo '<a href="cadastro.php"><button type="button" class="btn btn-outline-primary me-2">Cadastro</button></a>';
            }
            ?>
        </div>
    </header>
    <div class="container" style="text-align: center; margin-top: 2rem">
        <div class="col-12">

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h2>Login!</h2>
                </div>  
            </div>
            <div class="col-12">
                <?php if (isset($_GET['mensagem'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $_GET['mensagem']; ?>
                        <button style="bottom: 0 !important" type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                            &times;
                        </button>
                    </div>
                <?php } ?>
            </div>
            <div class="row text-start">
                <div class="col-sm-12 col-md-12">
                    <form name="insuser" action="loginAct.php" method="post">
                        <div class="form-group">
                            <label for="idemail">E-mail:</label>
                            <input type="email" class="form-control" id="idemail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="idsenha">Senha:</label>
                            <input type="password" class="form-control" id="idsenha" name="senha">
                        </div>
                        <button type="reset" class="btn btn-danger" style="margin-top: 1rem">Limpar</button>
                        <button type="submit" class="btn btn-success" style="margin-top: 1rem">Enviar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>