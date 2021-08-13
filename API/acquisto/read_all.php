<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: GET');

$query = "SELECT * FROM acquisto where acquirente='dddddddddddddddd'";
$result = mysqli_query($connection,$query);
$rows_count= mysqli_num_rows($result);

    if($rows_count > 0){
		$annunci = array();
	    while($row = mysqli_fetch_assoc($result)){
	    	$annunci[] = $row;
	    }
	    $resultData = array('status' => true, 'Acquisti efettuati' => $annunci);
    }else{
    	$resultData = array('status' => false, 'message' => 'Nessun Acquisto efettuato...');
    }

echo json_encode($resultData);

mysqli_close($connection);
?>