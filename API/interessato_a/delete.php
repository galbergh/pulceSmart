<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: DELETE');

$_POST = json_decode(file_get_contents('php://input'),true);
var_dump($_POST);

$annuncio_id = isset($_POST["annuncio_id"])?$_POST["annuncio_id"] : die();
$acquirente_id = isset($_POST["acquirente_id"])?$_POST["acquirente_id"] : die();

    if(!empty($annuncio_id) && !empty($acquirente_id)){
        $stmt = mysqli_prepare($connection,"DELETE FROM la_pulce_smart_db.interessato_a where annuncio=? and acquirente =?");
        mysqli_stmt_bind_param($stmt,'ss',$annuncio_id,$acquirente_id);
        $result = mysqli_stmt_execute($stmt);
		if($result){
		    $resultData = array('status' => true, 'message' => 'Anunncio rimosso dai preferiti con successo...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Impossibile rimuovere annuncio dai preferiti...');
	    }
	}
	else{
    	$resultData = array('status' => false, 'message' => 'Specificare Annuncio...');
    }

    echo json_encode($resultData);
?>