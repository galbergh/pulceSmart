<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: GET');

$id=isset($_GET['id'])?$_GET['id']:die();

$stmt = mysqli_prepare($connection,"SELECT * FROM utente WHERE id=?");
mysqli_stmt_bind_param($stmt,"s",$id);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($result);
    if($row){
		$user = $row;
	    $resultData = array('status' => true, 'Utente selezionato' => $user);
    }else{
    	$resultData = array('status' => false, 'message' => 'Nessun Utente trovato...');
    }

echo json_encode($resultData);

mysqli_close($connection);
?>