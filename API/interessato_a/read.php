
<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: GET');

$id=isset($_GET['id'])?$_GET['id']:die();

$stmt = mysqli_prepare($connection,"SELECT concat(utente.nome,' ',utente.cognome) as venditore , annuncio.data_e_ora_pubblicazione, annuncio.titolo,annuncio.foto,annuncio.periodo_garanzia, annuncio.tipo_garanzia,annuncio.visibilita,
annuncio.regione_visibilita,annuncio.provincia_visibilita, annuncio.citta_visibilita,annuncio.comune_vendita,annuncio.provincia_vendita,annuncio.regione_vendita,annuncio.prezzo,annuncio.nome_articolo,
annuncio.categoria_articolo,annuncio.sottocategoria,annuncio.periodo_validita,annuncio.stato_annuncio,annuncio.stato_articolo,annuncio.stato_usura,annuncio.periodo_utilizzo from annuncio 
join interessato_a on interessato_a.annuncio=annuncio.id join utente on annuncio.venditore=utente.id where interessato_a.annuncio=?");
mysqli_stmt_bind_param($stmt,"s",$id);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($result);
    if($row){
		$ad = $row;
	    $resultData = array('status' => true, 'Dettagli Annuncio' => $ad);
    }else{
    	$resultData = array('status' => false, 'message' => 'Impossibile trovare annuncio richiesto...');
    }

echo json_encode($resultData);

mysqli_close($connection);
?>