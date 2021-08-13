<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: GET');

$query = "SELECT concat(utente.nome,' ',utente.cognome) as venditore , annuncio.data_e_ora_pubblicazione, annuncio.titolo,annuncio.foto,annuncio.periodo_garanzia, annuncio.tipo_garanzia,annuncio.visibilita,
annuncio.regione_visibilita,annuncio.provincia_visibilita, annuncio.citta_visibilita,annuncio.comune_vendita,annuncio.provincia_vendita,annuncio.regione_vendita,annuncio.prezzo,annuncio.nome_articolo,
annuncio.categoria_articolo,annuncio.sottocategoria,annuncio.periodo_validita,annuncio.stato_annuncio,annuncio.stato_articolo,annuncio.stato_usura,annuncio.periodo_utilizzo from annuncio 
join interessato_a on interessato_a.annuncio=annuncio.id join utente on annuncio.venditore=utente.id where interessato_a.acquirente=3";
$result = mysqli_query($connection,$query);
$rows_count= mysqli_num_rows($result);

    if($rows_count > 0){
		$annunci_interessato_a = array();
	    while($row = mysqli_fetch_assoc($result)){
	    	$annunci_interessato_a[] = $row;
	    }
	    $resultData = array('status' => true, 'Annunci alla quale sei interessato' => $annunci_interessato_a);
    }else{
    	$resultData = array('status' => false, 'message' => 'Nessun Annuncio nella lista dei preferiti...');
    }

echo json_encode($resultData);

mysqli_close($connection);
?>