<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: POST');

$_POST = json_decode(file_get_contents('php://input'),true);


$cod_fiscale = isset($_POST["cod_fiscale"])?$_POST["cod_fiscale"] : "";
$nome = isset($_POST["nome"])?$_POST["nome"] : "";
$cognome = isset($_POST["cognome"])?$_POST["cognome"] : "";
$email = isset($_POST["email"])?$_POST["email"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";
$via_residenza = isset($_POST["via_residenza"])?$_POST["via_residenza"] : "";
$n_civico_residenza = isset($_POST["n_civico_residenza"])?$_POST["n_civico_residenza"] : 0;
$citta_residenza= isset($_POST["citta_residenza"])?$_POST["citta_residenza"] : "";
$provincia_residenza= isset($_POST["provincia_residenza"])?$_POST["provincia_residenza"] : "";
$regione_residenza= isset($_POST["regione_residenza"])?$_POST["regione_residenza"] : "";
$nome_utente = isset($_POST["nome_utente"])?$_POST["nome_utente"] : "";
$immagine= isset($_POST["immagine"])?$_POST["immagine"] : NULL;
$valutazione_media= isset($_POST["valutazione_media"])?$_POST["valutazione_media"] : 0.0;
$attivo= isset($_POST["attivo"])?$_POST["attivo"] : "True";
$venditore= isset($_POST["venditore"])?$_POST["venditore"] : "False";
$acquirente = isset($_POST["acquirente"])?$_POST["acquirente"] : "False";


$stmt = mysqli_prepare($connection,"INSERT INTO la_pulce_smart_db.utente (cod_fiscale,nome,cognome,email,password,via_residenza,n_civico_residenza,citta_residenza,provincia_residenza,regione_residenza,nome_utente,immagine,valutazione_media,attivo,venditore,acquirente) 
            values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

mysqli_stmt_bind_param($stmt,"ssssssisssssdsss",$cod_fiscale,$nome,$cognome,$email,$password,$via_residenza,$n_civico_residenza,$citta_residenza,$provincia_residenza,$regione_residenza,$nome_utente,$immagine,$valutazione_media,$attivo,$venditore,$acquirente);

$result = mysqli_stmt_execute($stmt);
if($result){
    $resultData = array('status' => true, 'message' => 'Nuovo Utente inserito correttamente...');
}else{
    $resultData = array('status' => false, 'message' => 'Impossibile inserire un nuovo utente...');
}


echo json_encode($resultData);

mysqli_close($connection);

?>