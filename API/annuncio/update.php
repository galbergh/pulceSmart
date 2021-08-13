<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: POST');

$_POST = json_decode(file_get_contents('php://input'),true);

$id=isset($_POST["id"])?$_POST["id"] : die();


$ad_by_id = mysqli_prepare($connection,"SELECT * FROM annuncio WHERE id=?");
mysqli_stmt_bind_param($ad_by_id,"s",$id);
mysqli_stmt_execute($ad_by_id);
$ad_query_result=mysqli_stmt_get_result($ad_by_id);
$ad=mysqli_fetch_assoc($ad_query_result);

	

$venditore = isset($_POST["venditore"])?$_POST["venditore"] : $ad["venditore"];
$titolo = isset($_POST["titolo"])?$_POST["titolo"] : $ad["titolo"];
$foto = isset($_POST["foto"])?$_POST["foto"] : $ad["foto"];
$periodo_garanzia = isset($_POST["periodo_garanzia"])? $_POST["periodo_garanzia"] : $ad["periodo_garanzia"];
$tipo_garanzia= isset($_POST["tipo_garanzia"])?$_POST["tipo_garanzia"] : $ad["tipo_garanzia"];
$visibilita = isset($_POST["visibilita"])?$_POST["visibilita"] : $ad["visibilita"];
$regione_visibilita= isset($_POST["regione_visibilita"])?$_POST["regione_visibilita"] : $ad["regione_visibilita"];
$provincia_visibilita= isset($_POST["provincia_visibilita"])?$_POST["provincia_visibilita"] : $ad["provincia_visibilita"];
$citta_visibilita= isset($_POST["citta_visibilita"])?$_POST["citta_visibilita"] : $ad["citta_visibilita"];
$comune_vendita = isset($_POST["comune_vendita"])?$_POST["comune_vendita"] : $ad["comune_vendita"];
$provincia_vendita= isset($_POST["provincia_vendita"])?$_POST["provincia_vendita"] : $ad["provincia_vendita"];
$regione_vendita= isset($_POST["regione_vendita"])?$_POST["regione_vendita"] : $ad["regione_vendita"];
$prezzo= isset($_POST["prezzo"])?$_POST["prezzo"] : $ad["prezzo"];
$nome_articolo= isset($_POST["nome_articolo"])?$_POST["nome_articolo"] : $ad["nome_articolo"];
$categoria_articolo = isset($_POST["categoria_articolo"])?$_POST["categoria_articolo"] : $ad["categoria_articolo"];
$sottocategoria = isset($_POST["sottocategoria"])?$_POST["sottocategoria"] : $ad["sottocategoria"];
$periodo_validita = isset($_POST["periodo_validita"])?$_POST["periodo_validita"] : $ad["periodo_validita"];
$stato_annuncio = isset($_POST["stato_annuncio"])?$_POST["stato_annuncio"] : $ad["stato_annuncio"];
$stato_articolo = isset($_POST["stato_articolo"])?$_POST["stato_articolo"] : $ad["stato_articolo"];
$stato_usura = isset($_POST["stato_usura"])?$_POST["stato_usura"] : $ad["stato_usura"];
$periodo_utilizzo = isset($_POST["periodo_utilizzo"])?$_POST["periodo_utilizzo"] : $ad["periodo_utilizzo"];
	
	

	if(!empty($id)){
        $stmt = mysqli_prepare($connection,"UPDATE mercatopulci.annuncio SET titolo=?,foto=?,periodo_garanzia=?,tipo_garanzia=?,visibilita=?,regione_visibilita=?,provincia_visibilita=?,citta_visibilita=?,comune_vendita=?,
        provincia_vendita=?,regione_vendita=?,prezzo=?,nome_articolo=?,categoria_articolo=?,sottocategoria=?,periodo_validita=?,stato_annuncio=?,stato_articolo=?,stato_usura=?,periodo_utilizzo=? where id=?");
        mysqli_stmt_bind_param($stmt,"sssssssssssdsssssssss",$titolo,$foto,$periodo_garanzia,$tipo_garanzia,$visibilita,$regione_visibilita,$provincia_visibilita,$citta_visibilita,$comune_vendita,$provincia_vendita,$regione_vendita,$prezzo,$nome_articolo,$categoria_articolo,$sottocategoria,$periodo_validita,$stato_annuncio,$stato_articolo,$stato_usura,$periodo_utilizzo,$id);
        $result = mysqli_stmt_execute($stmt);
		if($result){
		    $resultData = array('status' => true, 'message' => 'Annuncio modificato con successo...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Impossibile modicare Annuncio...');
	    }
	}
	else{
    	$resultData = array('status' => false, 'message' => 'Specificare Annuncio...');
    }

    echo json_encode($resultData);
?>