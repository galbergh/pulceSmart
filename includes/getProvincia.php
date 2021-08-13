<?php

require "connection.php";

if(!$connection->connect_errno)
{
   $regione= $_GET["regione"];
   $sql = "SELECT provincia FROM provincia WHERE regione = '$regione' ORDER BY provincia";

   $res = $connection->query($sql);
   if ($res==null)
	{
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella esecuzione della interrogazione " . $cid->error;

	}
	else
	{
    $prov= array();
	  while($row=$res->fetch_row())
	  {
      $prov[]=array("prov"=>$row[0]);
    }
	  $risultato["contenuto"]=$prov;
  }
}
echo json_encode($risultato);

?>
