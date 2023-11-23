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
        <div class="col-md-3 mb-md-0 text-center" style="padding-right: 4rem">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="./src/img/SaloneAuto2.png" class="img-fluid logo" alt="">
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2">Comprar</a></li>
            <?php 
                session_start();
                if(isset($_SESSION['user'])){
                echo '<li><a href="vender.php" class="nav-link px-2">Vender</a></li>';
                echo '<li><a href="anuncios.php" class="nav-link px-2">Meus Anuncios</a></li>';
                }
            ?>
            <li><a href="sobre.php" class="nav-link px-2 link-secondary">Sobre</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php 
            if(isset($_SESSION['user'])){
                echo '<a href="logout.php"><button type="button" class="btn btn-outline-primary me-2">Sair</button></a>';
            }else{
                echo '<a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>';
                echo '<a href="cadastro.php"><button type="button" class="btn btn-primary">Cadastro</button></a>';
            }
            ?>
        </div>
    </header>
    <div class="container" style="text-align: center; margin-top: 2rem">
        <h3 style="margin-bottom: 2rem;">Sobre a Salone Auto.</h3>
        <img src="./src/img/SaloneAuto2.png" class="img-fluid logo" style="filter: invert(100%);margin-bottom: 2rem" alt="">
        <h4>Bem-vindo à Salone Auto!</h4>
        <h5>O seu destino para realizar o sonho de possuir o carro perfeito em Santa Catarina!</h5>
        <h4>Compromisso com a Qualidade e Transparência</h4>
        <p>Na Salone Auto, acreditamos que a compra de um veículo não é apenas uma transação, mas sim a realização de um sonho.</p>
        <p>Nosso compromisso é proporcionar uma experiência de compra transparente, confiável e centrada no cliente.</p>
        <p>Trabalhamos incansavelmente para garantir que cada cliente encontre o veículo perfeito que atenda às suas necessidades e expectativas.</p>
        <h4>Variedade de Opções para Todos os Estilos de Vida</h4>
        <p>Com um extenso e diversificado inventário de veículos, desde carros compactos até SUVs espaçosos e picapes robustas, a Salone Auto oferece opções para todos os estilos de vida.</p>
        <p> Nossa equipe dedicada está sempre à disposição para orientar e ajudar você a fazer a escolha certa, seja para sua família, aventuras off-road ou para tornar suas viagens diárias mais confortáveis.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>