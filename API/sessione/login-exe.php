<?php

include "../../includes/connection.php";

session_start();
$email= $_POST["email"];
$pwd = $_POST["password"];

function isUser($connection, $email, $pwd) {
	$risultato = array("msg"=>"","status"=>"ok");

   	/* inserire controlli dell'input */
   	$sql = "SELECT * FROM utente WHERE email = '$email' AND password = '$pwd'";
    $res = $connection->query($sql);
	$row = $res->fetch_assoc();
	$_SESSION["user"] = $row["nome_utente"];
	$_SESSION["id"] = $row["id"];

	if ($res==null) {
		$msg = "Si sono verificati i seguenti errori:<br/>" . $res->error;
		$risultato["status"]="ko";
		$risultato["msg"]=$msg;	
	} elseif($res->num_rows==0 || $res->num_rows>1) {
		$msg = "Login o password sbagliate";
		$risultato["status"]="ko";
		$risultato["msg"]=$msg;		
	} elseif($res->num_rows==1) {
		$msg = "Login effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;
		$risultato["op"]="listaAnnunci";	
	}
    return $risultato;
}

if (isset($_POST['login'])) {

	if ($connection) {
		$result = isUser($connection, $email, $pwd);
		if ($result["status"]=="ok") {
			if (isset($_POST["ricordami"]))
				  // se l'utente richiede di essere ricordato, allora setto il cookie 
				setcookie ("email", $email, time()+43200,"/");
			elseif (isset($_COOKIE["email"])) {
				unset($_COOKIE['email']);
				setcookie('email', null, -1, '/');
			}

			$connection->close();
			$_SESSION["email"]=$email;
			$_SESSION["logged"]=true;
			header("Location:../../index.php?op=listaAnnunci&status=ok&msg=" . urlencode($result["msg"]));
		} else {
			header("Location:../../index.php?status=ko&msg=" . urlencode($result["msg"]));
		}
	} else {
		header("Location:../../index.php?status=ko&msg=". urlencode("errore di connessione al db"));
	}
}



?>