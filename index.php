<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaloneAuto - O lugar para encontrar seu novo automóvel!</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css" />
  </head>
  <body style="width: 100%; padding: 0">
    <header
      class="text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom"
      style="padding: 0 40px; border-bottom: 0 !important;"
    >
      <div class="col-md-3 mb-2 mb-md-0">
        <a
          href="/"
          class="d-inline-flex link-body-emphasis text-decoration-none"
        >
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Comprar</a></li>
        <li><a href="#" class="nav-link px-2">Vender</a></li>
        <li><a href="#" class="nav-link px-2">Meus Anuncios</a></li>
        <li><a href="#" class="nav-link px-2">Sobre</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">
          Login
        </button>
        <button type="button" class="btn btn-primary">Cadastro</button>
      </div>
    </header>
    <div
      class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark"
      style="width: 320px"
    >
      <a
        href="/"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
      >
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
            $stm_sql=$banco->prepare($query);
            $stm_sql->execute();
            $cidades = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($cidades as $cidade){
              echo '<option value="'. $cidade['id_cidades']. '">' . $cidade['nome_cidades'] . '</option>';
            }
          ?>
        </select>
      </div>
      <div class="image-grid">
      <?php
      $query = "SELECT * FROM marcas";
      $stm_sql=$banco->prepare($query);
      $stm_sql->execute();
      $marcas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
      foreach($marcas as $marca){
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
      <input
        type="number"
        id="ano-carro"
        min="1980"
        max="2024"
        step="1"
        value="2023"
        class="form-control"
      />
      <br />
      <div class="form-group">
        <label for="price">Valor</label>

        <div class="price">80000</div>
        <input
          type="range"
          class="custom-range"
          min="1000"
          max="1000000"
          step="1000"
          id="customRange3"
          name="Price"
          value="80000"
          style="width: 100%"
        />
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
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault1"
        />
        <label class="form-check-label" for="flexRadioDefault1">
          Default radio
        </label>
      </div>
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="exampleRadios"
          id="exampleRadios1"
          value="option1"
          checked
        />
        <label class="form-check-label" for="exampleRadios1">
          Default radio
        </label>
      </div>
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="exampleRadios"
          id="exampleRadios2"
          value="option2"
        />
        <label class="form-check-label" for="exampleRadios2">
          Second default radio
        </label>
      </div>
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="exampleRadios"
          id="exampleRadios3"
          value="option3"
          disabled
        />
        <label class="form-check-label" for="exampleRadios3">
          Disabled radio
        </label>
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

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script>
      $(document).ready(function () {
        $('#customRange3').on('input', function () {
          v = $('#customRange3').val()
          console.log(v)
          $('div.price').text(v)
        })
      })
    </script>
  </body>
</html>
