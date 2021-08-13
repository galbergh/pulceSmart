<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: GET');

$query = "SELECT * FROM utente ORDER BY  'nome' ASC";
$result = mysqli_query($connection,$query);
$rows_count= mysqli_num_rows($result);

    if($rows_count > 0){
		$users = array();
	    while($row = mysqli_fetch_assoc($result)){
	    	$users[] = $row;
	    }
	    $resultData = array('status' => true, 'Utenti registrati' => $users);
    }else{
    	$resultData = array('status' => false, 'message' => 'Nessun Utente trovato...');
    }

echo json_encode($resultData);

mysqli_close($connection);
?>