<!DOCTYPE html>
<html lang="pt-br">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SaloneAuto - O lugar para encontrar seu novo automóvel!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/style.css?v=<?php echo time(); ?>">
</head>

<body style="width: 100%; padding: 0">
  <header class="text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom" style="padding: 0 40px; border-bottom: 0 !important;">
    <div class="col-md-3 mb-md-0 text-center" style="padding-right: 4rem">
      <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img src="./src/img/SaloneAuto2.png" class="img-fluid logo" alt="">
      </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 link-secondary">Comprar</a></li>
      <?php
        session_start();
        if(isset($_SESSION['user'])){
          echo '<li><a href="vender.php" class="nav-link px-2">Vender</a></li>';
          echo '<li><a href="anuncios.php" class="nav-link px-2">Meus Anuncios</a></li>';
        }
      ?>
      <li><a href="sobre.php" class="nav-link px-2">Sobre</a></li>
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
  <div class="container-main">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 320px">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Filtros</span>
      </a>
      <hr />
      <div class="mb-3">
        <label for="localizacao" class="form-label">Localização</label>
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
        </select>
      </div>
      <div class="image-grid">
        <?php
        $query = "SELECT * FROM marcas";
        $stm_sql = $banco->prepare($query);
        $stm_sql->execute();
        $marcas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($marcas as $marca) {
          echo '<label>
                <input
                  type="radio"
                  name="option"
                  value="' . $marca['id_marcas'] . '"
                  onchange="updateImage(\'' . strtolower($marca['desc_marcas'])  . '\')"
                />
                <img src="./src/img/' . $marca['desc_marcas'] . '.png" alt="' . $marca['desc_marcas'] . '" />
              </label>';
        }
        ?>
      </div>
      <br />
      <label for="ano-carro" class="form-label">Ano</label>
      <input type="number" id="ano-carro" min="1980" max="2024" step="1" value="2023" class="form-control" />
      <br />
      <div class="form-group">
        <label for="customRange3">Valor</label>

        <div class="price">80000</div>
        <input type="range" class="custom-range" min="1000" max="1000000" step="1000" id="customRange3" name="Price" value="80000" style="width: 100%" />
      </div>
      <br />
      <div class="mb-3">
        <label for="quilometragem" class="form-label">Quilometragem</label>
        <br />
        <select class="form-select" name="quilometragem" id="quilometragem">
          <option value="">Escolha a quilometragem</option>
          <option value="zero">0km</option>
          <option value="10000">Até 10.000km</option>
          <option value="25000">Até 25.000km</option>
          <option value="50000">Até 50.000km</option>
          <option value="100000">Até 100.000km</option>
        </select>
      </div>
      <label class="form-label">Cor</label>
      <?php
      $query = "SELECT * FROM cores";
        $stm_sql = $banco->prepare($query);
        $stm_sql->execute();
        $cores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cores as $cor) {
          echo '<div class="form-check">
          <input type="checkbox" class="form-check-input" id="cor-'.$cor['desc_cores'].'" name="'.strtolower($cor['desc_cores']).'" value="'.strtolower($cor['desc_cores']).'">
          <label class="form-check-label" for="cor-'.$cor['desc_cores'].'">'.$cor['desc_cores'].'</label>
        </div>';
        }
          ?>
    </div>
    <div class="container-carros">
      <h3>Estoque de carros</h3>
      <div class="card-deck-container">
      <div class="card-deck" style="display: flex; flex-wrap:wrap">
        <?php include('cardAnuncio.php');
        $query = "select * from anuncios a join versoes v on v.id_versoes = a.versoes_id join modelos m on a.modelos_id = m.id_modelos
        join cores c on c.id_cores = a.cores_id join cidades ci on ci.id_cidades = a.cidades_id
        join marcas ma on ma.id_marcas = m.marcas_id and a.vendido_anuncios=0 limit 30";
        $stm_sql = $banco->prepare($query);
        $stm_sql->execute();
        $anuncios = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($anuncios as $anuncio) {
          criarCard($anuncio);
        }
        ?>
      </div>
    </div>

  </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function updateImage(option) {
      // You can perform additional actions here when a radio option is selected
      // For now, let's just log the selected option
      console.log('Selected Option:', option)
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#customRange3').on('input', function() {
        v = $('#customRange3').val()
        console.log(v)
        $('div.price').text(v)
      })
    })
  </script>
</body>

</html>