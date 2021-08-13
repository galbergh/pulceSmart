<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: POST');

$_POST = json_decode(file_get_contents('php://input'),true);


$acquirente = isset($_POST["acquirente"])?$_POST["acquirente"] : die();
$annuncio = isset($_POST["annuncio"])?$_POST["annuncio"] : "";
$metodo_pagamento = isset($_POST["metodo_pagamento"])?$_POST["metodo_pagamento"] : "Online";
$data = isset($_POST["data"])? $_POST["data"] : date("Y-m-d");
$conferma_acquisto= isset($_POST["conferma_acquisto"])?$_POST["conferma_acquisto"] : "False";
$avvenuta_consegna = isset($_POST["avvenuta_consegna"])?$_POST["avvenuta_consegna"] : "False";
$serieta_acquirente= isset($_POST["serieta_acquirente"])?$_POST["serieta_acquirente"] : NULL;
$puntualita_acquirente= isset($_POST["puntualita_acquirente"])?$_POST["puntualita_acquirente"] : NULL;
$valut_media_acquirente= isset($_POST["valut_media_acquirente"])?$_POST["valut_media_acquirente"] : NULL;
$serieta_venditore= isset($_POST["serieta_venditore"])?$_POST["serieta_venditore"] : NULL;
$puntualita_venditore= isset($_POST["puntualita_venditore"])?$_POST["puntualita_venditore"] : NULL;
$valut_media_venditore= isset($_POST["valut_media_venditore"])?$_POST["valut_media_venditore"] : NULL;



$stmt = mysqli_prepare($connection,"INSERT INTO la_pulce_smart_db.acquisto (acquirente,annuncio,metodo_pagamento,data,conferma_acquisto,
avvenuta_consegna,serieta_acquirente,puntualita_acquirente,valut_media_acquirente,serieta_venditore,puntualita_venditore,valut_media_venditore) 
            values (?,?,?,?,?,?,?,?,?,?,?,?)");

mysqli_stmt_bind_param($stmt,"ssssssssdssd",$acquirente,$annuncio,$metodo_pagamento,$data,$conferma_acquisto,$avvenuta_consegna,
$serieta_acquirente,$puntualita_acquirente,$valut_media_acquirente,$serieta_venditore,$puntualita_venditore,$valut_media_venditore);

$result = mysqli_stmt_execute($stmt);
if($result){
    $resultData = array('status' => true, 'message' => 'Nuovo Aquisto efettuato correttamente...');
}else{
    $resultData = array('status' => false, 'message' => 'Impossibile efetturare acquisto...');
}


echo json_encode($resultData);

mysqli_close($connection);

?>