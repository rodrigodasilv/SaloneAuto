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
            <li><a href="vender.php" class="nav-link px-2 ">Vender</a></li>
            <li><a href="anuncios.php" class="nav-link px-2 link-secondary">Meus Anúncios</a></li>
            <li><a href="sobre.php" class="nav-link px-2">Sobre</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>

            <a href="cadastro.php"><button type="button" class="btn btn-primary">Cadastro</button></a>
        </div>
    </header>
    <div class="container" style="text-align: center; margin-top: 50px">
        <h3 style="margin-bottom: 20px;">Meus anúncios.</h3>
        <div class="card mb-3" style="display: flex; flex-direction:row; text-align:start">
            <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 20%; display: block;" src="./src/img/sentra.jpg" data-holder-rendered="true">
            <div class="card-body">
                <div style="display: flex;">
                    <h5 style="padding-right: 10px;" class="card-title">MARCA MODELO</h5>
                    <p class="card-text">ANO</p>
                </div>
                <p class="card-text">VERSÃO DO CARRO</p>
                <p class="card-text">KM</p>
                <p class="card-text"><small class="text-muted">CIDADE</small></p>
            </div>
            <div class="vertical-center" style="display: flex; flex-direction: column; gap:20px;">
                <button>Editar anúncio</button>
                <button>Ver anúncio</button>
            </div>
        </div>
        <div class="card mb-3" style="display: flex; flex-direction:row; text-align:start">
            <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 20%; display: block;" src="./src/img/sentra.jpg" data-holder-rendered="true">
            <div class="card-body">
                <div style="display: flex;">
                    <h5 style="padding-right: 10px;" class="card-title">MARCA MODELO</h5>
                    <p class="card-text">ANO</p>
                </div>
                <p class="card-text">VERSÃO DO CARRO</p>
                <p class="card-text">KM</p>
                <p class="card-text"><small class="text-muted">CIDADE</small></p>
            </div>
            <div class="vertical-center" style="display: flex; flex-direction: column; gap:20px;">
                <button>Editar anúncio</button>
                <button>Ver anúncio</button>
            </div>
        </div>
        <div class="card mb-3" style="display: flex; flex-direction:row; text-align:start">
            <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 20%; display: block;" src="./src/img/sentra.jpg" data-holder-rendered="true">
            <div class="card-body">
                <div style="display: flex;">
                    <h5 style="padding-right: 10px;" class="card-title">MARCA MODELO</h5>
                    <p class="card-text">ANO</p>
                </div>
                <p class="card-text">VERSÃO DO CARRO</p>
                <p class="card-text">KM</p>
                <p class="card-text"><small class="text-muted">CIDADE</small></p>
            </div>
            <div class="vertical-center" style="display: flex; flex-direction: column; gap:20px;">
                <button>Editar anúncio</button>
                <button>Ver anúncio</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>