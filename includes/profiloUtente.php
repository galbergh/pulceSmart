<?php

include 'includes/connection.php';

function leggiAnnunciUtente($connection) {
  $annunci = array();
  $risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");

  if ($connection->connect_errno) {
    $risultato["status"]="ko";
    $risultato["msg"]="errore nella connessione al db " . $connection->connect_error;
    return $risultato;
  }
    
  $ID_utente = $_SESSION["id"];
    
  $sql= "SELECT venditore, data_e_ora_pubblicazione, titolo, foto, nome_articolo, prezzo, 
  categoria_articolo, sottocategoria, regione_vendita, provincia_vendita, comune_vendita, visibilita, 
  regione_visibilita, provincia_visibilita, citta_visibilita, stato_articolo, stato_usura, tipo_garanzia, 
  periodo_garanzia, periodo_utilizzo, stato_annuncio FROM annuncio WHERE venditore = $ID_utente;";

  $res = $connection->query($sql);

  if ($res==null) {
    $msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
    $risultato["status"]="ko";
    $risultato["msg"]=$msg;			
  } elseif($res->num_rows==0) {
    $msg = "Nessun annuncio corrisponde ai criteri di ricerca...";
    $risultato["status"]="ko";
    $risultato["msg"]=$msg;		
  } else {
    while ($row=$res->fetch_assoc()) {
      $annunci[]=array("venditore"=>$row["venditore"], 
      "data_e_ora_pubblicazione"=>$row["data_e_ora_pubblicazione"], 
      "titolo"=>$row["titolo"], 
      "foto"=>$row["foto"],
      "nome_articolo"=>$row["nome_articolo"], 
      "prezzo"=>$row["prezzo"], 
      "categoria_articolo"=>$row["categoria_articolo"],
      "sottocategoria"=>$row["sottocategoria"], 
      "regione_vendita"=>$row["regione_vendita"], 
      "provincia_vendita"=>$row["provincia_vendita"],
      "comune_vendita"=>$row["comune_vendita"], 
      "visibilita"=>$row["visibilita"], 
      "regione_visibilita"=>$row["regione_visibilita"],
      "provincia_visibilita"=>$row["provincia_visibilita"], 
      "citta_visibilita"=>$row["citta_visibilita"], 
      "stato_articolo"=>$row["stato_articolo"],
      "stato_usura"=>$row["stato_usura"], 
      "tipo_garanzia"=>$row["tipo_garanzia"], 
      "periodo_garanzia"=>$row["periodo_garanzia"],
      "periodo_utilizzo"=>$row["periodo_utilizzo"],
      "stato_annuncio"=>$row["stato_annuncio"]);
    }	
    $risultato["contenuto"]=$annunci;
  }		
  return $risultato;
  mysqli_close($connection);
}

function visualizzaAnnunciUtente($connection, $annunci) {

  if ($connection->connect_errno) {
    $risultato["status"]="ko";
    $risultato["msg"]="errore nella connessione al db " . $connection->connect_error;
    return $risultato;
  }

  foreach ($annunci AS $annuncio) {          
    $venditore = $_SESSION['user'];
    $dataEOraPubblicazione = $annuncio["data_e_ora_pubblicazione"];
    $titolo = $annuncio["titolo"];
    $foto = base64_decode($annuncio["foto"]);
    $nomeArticolo = $annuncio["nome_articolo"];
    $prezzo = $annuncio["prezzo"];

    echo   "<div class='col-lg-4 col-md-6 mb-4'> 
              <div class='card h-100'>
                <a href='annuncio.php'>
                  <img class='card-img-top' src=$foto>
                </a>
                <div class='card-body'>
                  <h4 class='card-title'>
                    <a style='color:#c07348' href='annuncio.php'>
                      $titolo
                    </a>
                  </h4>
                  <p>
                    <strong>
                      $prezzo
                    </strong>
                    <span>
                      <i class='far fa-euro-sign'></i>
                    </span>
                  </p>
                  <p> 
                    Venditore: $venditore 
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                  </p>
                </div>
                <div class='card-footer' align=right>
                  <button class='btn'>
                    <i class='far fa-heart'></i>
                  </button>
                </div>
              </div>
            </div>";
  }
}

$res=leggiAnnunciUtente($connection);

if ($res["status"]!="ok") {
  header("Location: index.php?op=error");
}

?>

<div class="container-fluid">
  <br>
  <div class="row">
    <div class="col" align="center">
      <img src="assets/img/profile/profileImage.jpeg" class="rounded-circle" alt="Immagine profilo" width="300" height="300">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col" align="center">
      <h1 align="center">
        <?php echo $_SESSION['user']; ?>
      </h1>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col" align="center">
      <button type="button" class="btn btn-outline-dark">MODIFICA PROFILO</button>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col" align="center">
      <p>
        Valutazioni ricevute:
      </p>
      <h2 align="center">
        23
      </h2>
    </div>
    <div class="col" align="center">
      <p>
        Valutazione media:
      </p>
      <h2 align="center">
        4.1
      </h2>
    </div>
    <div class="col" align="center">
      <p>
        Articoli venduti:
      </p>
      <h2 align="center">
        15
      </h2>
    </div>
  </div>
  <br>
  <div class="dropdown-divider"></div>
  <br>
  <div class="row">
    <div class="col">
      <h1 align="center">
        Annunci dell'utente
      </h1>
    </div>
  </div>
  <br>
  <div class="row justify-content-center" id="spazioAnnunciUtente">
    <?php
      visualizzaAnnunciUtente($connection, $res["contenuto"]);
    ?>
  </div>
  <br>
  <div class="row justify-content-center">
    <nav aria-label="...">
      <ul class="pagination pagination-lg">
        <li class="page-item disabled">
          <span class="page-link">
            <i class="fas fa-angle-double-left"></i>
          </span>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">
            1
          </a>
        </li>
        <li class="page-item active">
          <span class="page-link">
            2
            <span class="sr-only">
              (current)
            </span>
          </span>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">
            3
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">
            <i class="fas fa-angle-double-right"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>

