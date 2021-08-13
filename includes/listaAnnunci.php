
<?php 

include "API/annuncio/read_all.php";

$res=leggiAnnunci($connection);
if ($res["status"]=="ok") {
  visualizzaAnnunci($connection, $res["contenuto"]);
} else {
  echo $res["msg"];
}

?>
