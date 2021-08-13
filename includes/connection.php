
<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "la_pulce_smart_db";

// Create connection
//$connection = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die(mysqli_error());
$connection = new mysqli($db_host,$db_username,$db_password,$db_name);

$risultato= array("msg"=>"","status"=>"ok", "content"=>"");

?>