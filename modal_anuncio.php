<?php

function criarModal($anuncio){
    echo '<div class="card modal bg-dark" id="modalCarros_'.$anuncio['id_anuncios'].'">
    <span class="close" onclick="closeModal('.$anuncio['id_anuncios'].')">&times;</span>
    <img class="card-img-top" style="" src="./fotos/'. $anuncio['usuarios_id'] . '_' . $anuncio['id_anuncios'] .'.png">
    <div class="card-body">
      <h3 style="margin-top: 10px;font-weight: bold; color:white; text-align: left !important">'. $anuncio['desc_marcas'] . ' ' .  $anuncio['nome_modelos'] .'</h3>
      <p style="color:white; text-align: left !important">Versão: '.$anuncio['desc_versoes'].'</p>
      <p style="color:white; text-align: left !important">Cor: '.$anuncio['desc_cores'].'</p>
      <p style="color:white; text-align: left !important"><small>Saúde do carro:</small></p>
      <div class="row">
        <div class="col-6">
        <p style="color:white; text-align: left !important">Ano da ultima revisão: '.$anuncio['ult_revisao'].'</p>
        </div>
        <div class="col-6">
            <p style="color:white; text-align: left !important">Quilometragem: '.$anuncio['km_anuncios'].' KM</p>
        </div>
      </div>
      
      <p style="color:white; text-align: left !important"><small>Informações do vendedor:</small></p>
      <div class="row">
        <div class="col-4">
        <p style="color:white; text-align: left !important">'.$anuncio['nome_usuarios'].'</p>
        </div>
        <div class="col-3">
        <a target="_blank" href="https://api.whatsapp.com/send?phone=+55'.$anuncio['cel_usuarios'].'&text=Opa! Vi seu anúncio do ' . $anuncio['desc_marcas'] . ' ' .  $anuncio['nome_modelos'] . ' no SaloneAuto e estou interessado!" style="color:white !important; text-align: left !important">'.$anuncio['cel_usuarios'].'</a>
        </div>
        <div class="col-5">
        <a href="mailto:'.$anuncio['email_usuarios'].'" style="color:white !important; text-align: left !important">'.$anuncio['email_usuarios'].'</a>
        </div>
      </div>
      
      <div class="row">
        <div class="col-7">
        <h4 style="color:white; text-align: left !important">Valor: R$'.$anuncio['preco_anuncios'].'</h4>
        </div>
        <div class="col-5">
                <p style="color:white; text-align: left !important">Localização: '.$anuncio['nome_cidades'].'</p>
        </div>
      </div>
      
      
      
    </div>
  </div>
  <div id="overlay_'.$anuncio['id_anuncios'].'" class="overlay" onclick="closeModal('.$anuncio['id_anuncios'].')"></div>';}
?>