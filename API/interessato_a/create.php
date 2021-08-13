<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: POST');

$_POST = json_decode(file_get_contents('php://input'),true);

$annuncio_id=isset($_POST["annuncio_id"])?$_POST["annuncio_id"]:die();
$acquirente_id=isset($_POST["acquirente_id"])?$_POST["acquirente_id"]:die();

$stmt=mysqli_prepare($connection,"INSERT INTO la_pulce_smart_db.interessato_a(annuncio,acquirente) VALUES (?,?)");
mysqli_stmt_bind_param($stmt,"ss",$annuncio_id,$acquirente_id);
$result = mysqli_stmt_execute($stmt);

if ($result){
    $resultData = array('status' => true, 'message' => 'Annuncio inserito correttamentre tra i preferiti...');
} else{
    $resultData = array('status' => false, 'message' => 'Impossibile inserire annuncio tra i preferiti...');
}

echo json_encode($resultData);
mysqli_close($connection);


?>