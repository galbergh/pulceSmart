<?php

require "connection.php";

$risultato = array("msg"=>"", "status"=>"ok", "contenuto"=>"");

if($connection->connect_errno)
{
  $risultato["status"]="ko";
  $risultato["msg"]="errore nella esecuzione della interrogazione " . $cid->connect_error;
  //die("Errore connessione (" . $cid->connect_errno . ')' . $cid->connect_error);
  //$risultato["status"]="ko";
  //$risultato["msg"]='Errore connessione (' . $cid->connect_errno . ')' . $cid->connect_error;
}
else
{
  $sql = "SELECT DISTINCT regione FROM provincia order by regione";

  $res = $connection->query($sql);
  if ($res==null)
	{
	  $risultato["status"]="ko";
	  $risultato["msg"]="errore nella esecuzione della interrogazione " . $cid->error;
	}
	else
	{
    $regioni= array();
	  while($row=$res->fetch_row())
	  {
      $regioni[]=$row[0];
	  }
    $risultato["contenuto"]=$regioni;
  }
}
echo json_encode($risultato);

?>
