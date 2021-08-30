<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: GET');

$_GET = json_decode(file_get_contents('php://input'),true);

var_dump($_GET);

$subcategory = $_GET["sottocategoria_articolo"];
$province = $_GET["provincia_vendita"];
$newArticles = $_GET["spunta_articoli_nuovi"];
$usedArticles = $_GET["spunta_articoli_usati"];

function convertiFiltri($subcat, $prov, $new, $used) {
    if ($subcat == "nessuna" && $prov == "nessuna" && $new == TRUE && $used == TRUE) {
        $stringa = "";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == TRUE && $used == TRUE) {
        $stringa = "AND sottocategoria = $subcat";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == TRUE && $used == TRUE) {
        $stringa = "AND provincia_vendita = $prov";
    } elseif ($subcat == "nessuna" && $prov == "nessuna" && $new == FALSE && $used == TRUE) {
        $stringa = "AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat == "nessuna" && $prov == "nessuna" && $new == TRUE && $used == FALSE) {
        $stringa = "AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == TRUE && $used == TRUE) {
        $stringa = "AND sottocategoria = $subcat AND provincia_vendita = $prov";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == FALSE && $used == TRUE) {
        $stringa = "AND provincia_vendita = $prov AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat == "nessuna" && $prov == "nessuna" && $new == FALSE && $used == FALSE) {
        $stringa = "AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == FALSE && $used == TRUE) {
        $stringa = "AND sottocategoria = $subcat AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == TRUE && $used == FALSE) {
        $stringa = "AND sottocategoria = $subcat AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == TRUE && $used == FALSE) {
        $stringa = "AND provincia_vendita = $prov AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == FALSE && $used == TRUE) {
        $stringa = "AND sottocategoria = $subcat AND provincia_vendita = $prov AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == TRUE && $used == FALSE) {
        $stringa = "AND sottocategoria = $subcat AND provincia_vendita = $prov AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == FALSE && $used == FALSE) {
        $stringa = "AND sottocategoria = $subcat AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == FALSE && $used == FALSE) {
        $stringa = "AND provincia_vendita = $prov AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == FALSE && $used == FALSE) {
        $stringa = "AND sottocategoria = $subcat AND provincia_vendita = $prov AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } 
    return $stringa;
	var_dump($stringa);
}

function leggiAnnunci($connection, $filtersString) {
    $annunci = array();
    $risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");

    if ($connection->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella connessione al db " . $connection->connect_error;
		return $risultato;
    }

	if (isset($_SESSION["id"])) {
		$ID_utente = $_SESSION["id"];
		
		$sql= "SELECT venditore, data_e_ora_pubblicazione, titolo, foto, nome_articolo, prezzo, 
		categoria_articolo, sottocategoria, regione_vendita, provincia_vendita, comune_vendita, visibilita, 
		regione_visibilita, provincia_visibilita, citta_visibilita, stato_articolo, stato_usura, tipo_garanzia, 
		periodo_garanzia, periodo_utilizzo FROM annuncio WHERE stato_annuncio = 'In vendita' AND NOT venditore = $ID_utente" . $filtersString . ";";
	} else {
		$sql= "SELECT venditore, data_e_ora_pubblicazione, titolo, foto, nome_articolo, prezzo, 
    	categoria_articolo, sottocategoria, regione_vendita, provincia_vendita, comune_vendita, visibilita, 
    	regione_visibilita, provincia_visibilita, citta_visibilita, stato_articolo, stato_usura, tipo_garanzia, 
    	periodo_garanzia, periodo_utilizzo FROM annuncio WHERE stato_annuncio = 'In vendita'" . $filtersString . ";";
	}

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
			$annunci[]=array("venditore" => $row["venditore"], 
			"data_e_ora_pubblicazione" =>$row["data_e_ora_pubblicazione"], 
			"titolo" =>$row["titolo"], 
			"foto"=>$row["foto"],
			"nome_articolo" =>$row["nome_articolo"], 
			"prezzo" =>$row["prezzo"], 
			"categoria_articolo"=>$row["categoria_articolo"],
			"sottocategoria" =>$row["sottocategoria"], 
			"regione_vendita" =>$row["regione_vendita"], 
			"provincia_vendita"=>$row["provincia_vendita"],
			"comune_vendita" =>$row["comune_vendita"], 
			"visibilita" =>$row["visibilita"], 
			"regione_visibilita"=>$row["regione_visibilita"],
			"provincia_visibilita" =>$row["provincia_visibilita"], 
			"citta_visibilita" =>$row["citta_visibilita"], 
			"stato_articolo"=>$row["stato_articolo"],
			"stato_usura" =>$row["stato_usura"], 
			"tipo_garanzia" =>$row["tipo_garanzia"], 
			"periodo_garanzia"=>$row["periodo_garanzia"],
			"periodo_utilizzo"=>$row["periodo_utilizzo"]);
			
		}	
		$risultato["contenuto"]=$annunci;
	}		
	return $risultato;
	mysqli_close($connection);
}

function visualizzaAnnunci($connection, $annunci) {

	if ($connection->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella connessione al db " . $connection->connect_error;
		return $risultato;
    }

    $innerHTMLannunci = "";

	foreach ($annunci AS $annuncio) {

		$venditore = $annuncio["venditore"];

		$sql= "SELECT nome_utente FROM utente WHERE id = $venditore;";

		$res = $connection->query($sql);

		if ($res==null) {
			$msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;			
		} elseif ($res->num_rows==0) {
			$msg = "Nessun annuncio corrisponde ai criteri di ricerca...";
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;		
		} else {
			while ($row=$res->fetch_assoc()) {
				$annuncio["venditore"] = $row["nome_utente"];
			}
		}

		$venditore = $annuncio["venditore"];
		$dataEOraPubblicazione = $annuncio["data_e_ora_pubblicazione"];
		$titolo = $annuncio["titolo"];
		$foto = base64_decode($annuncio["foto"]);
		$nomeArticolo = $annuncio["nome_articolo"];
		$prezzo = $annuncio["prezzo"];

		$innerHTMLannunci = $innerHTMLannunci . 
                "<div class='col-lg-4 col-md-6 mb-4'> 
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
						<div class='card-footer'>
							<i class='far fa-heart'></i>
						</div>
					</div>
				</div>";

	}
    ?>
    <script>
        document.getElementById("spazioAnnunci").innerHTML = $innerHTMLannunci;
    </script>
    <?php
}

$stringaFiltri = convertiFiltri($subcategory, $province, $newArticles, $usedArticles);

$result = leggiAnnunci($connection, $stringaFiltri);

if ($result["status"]=="ok") {
  visualizzaAnnunci($connection, $result["contenuto"]);
} else {
  echo $result["msg"];
}


//$id=isset($_GET['id'])?$_GET['id']:die();

//$stmt = mysqli_prepare($connection,"SELECT * FROM annuncio WHERE id=?");
//mysqli_stmt_bind_param($stmt,"s",$id);
//mysqli_stmt_execute($stmt);
//$result=mysqli_stmt_get_result($stmt);
//$row=mysqli_fetch_assoc($result);
//    if($row){
//		$ad = $row;
//	    $resultData = array('status' => true, 'Annuncio selezionato' => $ad);
//    }else{
//    	$resultData = array('status' => false, 'message' => 'Nessun Annuncio trovato...');
//    }

//echo json_encode($resultData);

//mysqli_close($connection);

?>