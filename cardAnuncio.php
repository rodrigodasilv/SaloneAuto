<?php
function criarCard($anuncio){
    echo '<div class="card">
      <img src="./fotos/'. $anuncio['usuarios_id'] . '_' . $anuncio['id_anuncios'] .'.png" class="card-img-top" style="height:8rem" alt="...">
      <div class="card-body">
        <h5 class="card-title">'. $anuncio['desc_marcas'] . ' ' .  $anuncio['nome_modelos'] .'</h5>
        <p class="card-text">'.$anuncio['desc_versoes'].'</p>
        <p><b>R$ '.$anuncio['preco_anuncios'].'</b></p>
        <div style="display:flex; justify-content: space-between; font-size: 12px">
          <p>'.$anuncio['ano_versoes'].'</p>
          <p>'.$anuncio['km_anuncios'].' KM</p>
        </div>
        <button type="button" class="btn btn-primary card-botao text-white" data-toggle="modal" data-target="#exampleModal">
          Ver detalhes
        </button>
      </div>
      <p style="font-size: 10px; padding-left: 20px">'.$anuncio['nome_cidades'].'</p>
  </div>';
}
?>