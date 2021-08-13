<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: POST');

$_POST = json_decode(file_get_contents('php://input'),true);

$id = isset($_POST["id"])?$_POST["id"] : die();

    if(!empty($id)){
        $stmt = mysqli_prepare($connection,"UPDATE la_pulce_smart_db.annuncio SET stato_annuncio='Eliminato' where id=?");
        mysqli_stmt_bind_param($stmt,'s',$id);
        $result = mysqli_stmt_execute($stmt);
		if($result){
		    $resultData = array('status' => true, 'message' => 'Annuncio eliminato con successo...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Impossibile eliminare Annuncio...');
	    }
	}
	else{
    	$resultData = array('status' => false, 'message' => 'Specificare Annuncio...');
    }

    echo json_encode($resultData);
?>