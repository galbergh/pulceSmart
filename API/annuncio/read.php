<?php
include '../../includes/connection.php';
//header('content-type: application/json');
//header('Access-Control-Allow-Methods: POST');

//$json = file_get_contents("php://input");

//var_dump($json);

//$json = json_decode($json, true);

//$json_err = json_last_error(); 

//var_dump($json_err);
//var_dump($_GET);

$category = isset($_GET["categoria"])?$_GET["categoria"] : "nessuna";

$subcategory = isset($_GET["sottocategoria"])?$_GET["sottocategoria"] : "nessuna";

if ($category != "nessuna" && $subcategory != "nessuna") {
	$sql = "SELECT id FROM categoria WHERE categoria = '$category' AND sottocategoria = '$subcategory'";

	$res = $connection->query($sql);
	$row = $res->fetch_assoc();

	$subcategory = $row["id"];
}

$province = isset($_GET["provincia"])?$_GET["provincia"] : "nessuna";
$newArticles = $_GET["spuntaNuovi"];
$usedArticles = $_GET["spuntaUsati"];

//print_r($newArticles);
//print_r($usedArticles);

function convertiFiltri($subcat, $prov, $new, $used) {
    if ($subcat == "nessuna" && $prov == "nessuna" && $new == "true" && $used == "") {
        $stringa = "";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == "true" && $used == "true") {
        $stringa = " AND sottocategoria = '$subcat'";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == "true" && $used == "true") {
        $stringa = " AND provincia_vendita = '$prov'";
    } elseif ($subcat == "nessuna" && $prov == "nessuna" && $new == "false" && $used == "true") {
        $stringa = " AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat == "nessuna" && $prov == "nessuna" && $new == "true" && $used == "false") {
        $stringa = " AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == "true" && $used == "true") {
        $stringa = " AND sottocategoria = '$subcat' AND provincia_vendita = '$prov'";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == "false" && $used == "true") {
        $stringa = " AND provincia_vendita = '$prov' AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat == "nessuna" && $prov == "nessuna" && $new == "false" && $used == "false") {
        $stringa = " AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == "false" && $used == "true") {
        $stringa = " AND sottocategoria = '$subcat' AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == "true" && $used == "false") {
        $stringa = " AND sottocategoria = '$subcat' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == "true" && $used == "false") {
        $stringa = " AND provincia_vendita = '$prov' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == "false" && $used == "true") {
        $stringa = " AND sottocategoria = '$subcat' AND provincia_vendita = '$prov' AND NOT stato_articolo = 'Nuovo'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == "true" && $used == "false") {
        $stringa = " AND sottocategoria = '$subcat' AND provincia_vendita = '$prov' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov == "nessuna" && $new == "false" && $used == "false") {
        $stringa = " AND sottocategoria = '$subcat' AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat == "nessuna" && $prov != "nessuna" && $new == "false" && $used == "false") {
        $stringa = " AND provincia_vendita = '$prov' AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } elseif ($subcat != "nessuna" && $prov != "nessuna" && $new == "false" && $used == "false") {
        $stringa = " AND sottocategoria = '$subcat' AND provincia_vendita = '$prov' AND NOT stato_articolo = 'Nuovo' AND NOT stato_articolo = 'Usato'";
    } 
    return $stringa;
	var_dump($stringa);
}

function leggiAnnunciFiltrati($connection, $filtersString) {
    $annunci = array();
    $risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");

    if ($connection->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella connessione al db " . $connection->connect_error;
		return $risultato;
    }

	if (isset($_SESSION["id"])) {
		$ID_utente = $_SESSION["id"];
		
		$sql= "SELECT venditore, data_e_ora_pubblicazione, titolo, foto, nome_articolo, prezzo, categoria_articolo, 
		sottocategoria, regione_vendita, provincia_vendita, comune_vendita, visibilita, regione_visibilita, provincia_visibilita, 
		citta_visibilita, stato_articolo, stato_usura, tipo_garanzia, periodo_garanzia, periodo_utilizzo FROM annuncio 
		WHERE stato_annuncio = 'In vendita' AND NOT venditore = $ID_utente" . $filtersString . ";";
	} else {
		$sql= "SELECT venditore, data_e_ora_pubblicazione, titolo, foto, nome_articolo, prezzo, categoria_articolo,
		sottocategoria, regione_vendita, provincia_vendita, comune_vendita, visibilita, regione_visibilita, provincia_visibilita, 
		citta_visibilita, stato_articolo, stato_usura, tipo_garanzia, periodo_garanzia, periodo_utilizzo FROM annuncio 
		WHERE stato_annuncio = 'In vendita'" . $filtersString . ";";
	}

	$res = $connection->query($sql);

	if ($res==null || $res->num_rows==0) {
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

function visualizzaAnnunciFiltrati($connection, $annunci) {

	if ($connection->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="Errore nella connessione al db " . $connection->connect_error;
		return $risultato;
    } else {

		$innerHTMLannunci = "";

		foreach ($annunci AS $annuncio) {

			$venditore = $annuncio["venditore"];

			$sql= "SELECT nome_utente FROM utente WHERE id = $venditore;";
	
			$res = $connection->query($sql);
			
			while ($row=$res->fetch_assoc()) {
				$annuncio["venditore"] = $row["nome_utente"];
			}
	
			$venditore = $annuncio["venditore"];
			$dataEOraPubblicazione = $annuncio["data_e_ora_pubblicazione"];
			$titolo = $annuncio["titolo"];
			$foto = base64_decode($annuncio["foto"]);
			$nomeArticolo = $annuncio["nome_articolo"];
			$prezzo = $annuncio["prezzo"];
			$statoArticolo = $annuncio["stato_articolo"];
	
			$innerHTMLannunci = $innerHTMLannunci . 
					"<div class='col-lg-4 col-md-6 mb-4'> 
						<div class='card h-100'>
							<a href='annuncio.php'>
								<img class='card-img-top' src=$foto>
							</a>
							<div class='card-body'>
								<div class='dropdown-divider'></div>
								<h4 class='card-title'>
									<a style='color:#c07348' href='annuncio.php'>
										$titolo
									</a>
								</h4>
								<div class='dropdown-divider'></div>
								<br>
								<p>
									<strong>
										$prezzo
									</strong>
									<span>
										<i class='far fa-euro-sign'></i>
									</span>
								</p>
								<p>
									<strong>
										$statoArticolo
									</strong>
								</p>
								<br>
								<p>
									<strong> 
										Venditore:
									</strong>
								</p>
								<p> 
									$venditore 
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
		//$risultato["status"]="ok";
		//$risultato["msg"]="Annunci filtrati...";
		//$risultato["contenuto"]=$innerHTMLannunci;
	}
	return $innerHTMLannunci;
	mysqli_close($connection);
}

$stringaFiltri = convertiFiltri($subcategory, $province, $newArticles, $usedArticles);

$result = leggiAnnunciFiltrati($connection, $stringaFiltri);

$risposta = "";

if ($result["status"]=="ok") {
	$risposta = visualizzaAnnunciFiltrati($connection, $result["contenuto"]);
} else {
  echo $result["msg"];
}

echo $risposta;


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