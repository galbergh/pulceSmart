<?php

require "connection.php";

if(!$connection->connect_errno)
{
   $categoria= $_GET["categoria"];
   $sql = "SELECT sottocategoria FROM categoria WHERE categoria = '$categoria' ORDER BY sottocategoria";

   $res = $connection->query($sql);
   if ($res==null)
	{
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella esecuzione della interrogazione " . $cid->error;

	}
	else
	{
    $sottocategorie= array();
	  while($row=$res->fetch_row())
	  {
      $sottocategorie[]=array("sottocategoria"=>$row[0]);
    }
	  $risultato["contenuto"]=$sottocategorie;
  }
}
echo json_encode($risultato);

?>
