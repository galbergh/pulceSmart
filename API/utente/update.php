<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: POST');

$_POST = json_decode(file_get_contents('php://input'),true);

$id=isset($_POST["id"])?$_POST["id"] : die();


$user_by_id = mysqli_prepare($connection,"SELECT * FROM utente WHERE id=?");
mysqli_stmt_bind_param($user_by_id,"s",$id);
mysqli_stmt_execute($user_by_id);
$user_query_result=mysqli_stmt_get_result($user_by_id);
$user=mysqli_fetch_assoc($result2);

	


$cod_fiscale = isset($_POST["cod_fiscale"])?$_POST["cod_fiscale"] : $user["cod_fiscale"];
$nome = isset($_POST["nome"])?$_POST["nome"] : $user["nome"];
$cognome = isset($_POST["cognome"])?$_POST["cognome"] : $user["cognome"];
$email = isset($_POST["email"])?$_POST["email"] : $user["email"];
$password = isset($_POST["password"])?password_hash($_POST["password"],PASSWORD_DEFAULT):$user["password"];
$via_residenza = isset($_POST["via_residenza"])?$_POST["via_residenza"] : $user["via_residenza"];
$n_civico_residenza = isset($_POST["n_civico_residenza"])?$_POST["n_civico_residenza"] : $user["n_civico_residenza"];
$citta_residenza= isset($_POST["citta_residenza"])?$_POST["citta_residenza"] : $user["citta_residenza"];
$provincia_residenza= isset($_POST["provincia_residenza"])?$_POST["provincia_residenza"] : $user["provincia_residenza"];
$regione_residenza= isset($_POST["regione_residenza"])?$_POST["regione_residenza"] : $user["regione_residenza"];
$nome_utente = isset($_POST["nome_utente"])?$_POST["nome_utente"] : $user["nome_utente"];
$immagine= isset($_POST["immagine"])?$_POST["immagine"] : $user["immagine"];
$valutazione_media= isset($_POST["valutazione_media"])?$_POST["valutazione_media"] : $user["valutazione_media"];
$attivo= isset($_POST["attivo"])?$_POST["attivo"] : $user["attivo"];
$venditore= isset($_POST["venditore"])?$_POST["venditore"] : $user["venditore"];
$acquirente = isset($_POST["acquirente"])?$_POST["acquirente"] : $user["acquirente"];
	
	

	if(!empty($id)){
        $stmt = mysqli_prepare($connection,"UPDATE la_pulce_smart_db.utente SET nome=?,cognome=?,password=?,via_residenza=?,n_civico_residenza=?,citta_residenza=?,provincia_residenza=?,regione_residenza=?,immagine=?,valutazione_media=?,venditore=?,acquirente=? where id=?");
        mysqli_stmt_bind_param($stmt,"ssssissssdsss",$nome,$cognome,$password,$via_residenza,$n_civico_residenza,$citta_residenza,$provincia_residenza,$regione_residenza,$immagine,$valutazione_media,$venditore,$acquirente,$id);
        $result = mysqli_stmt_execute($stmt);
		if($result){
		    $resultData = array('status' => true, 'message' => 'Utente modificato con successo...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Impossibile modicare utente...');
	    }
	}
	else{
    	$resultData = array('status' => false, 'message' => 'Specificare utente...');
    }

    echo json_encode($resultData);
?>