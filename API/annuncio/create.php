<?php
include '../../includes/connection.php';
header('content-type: application/json');
header('Access-Control-Allow-Methods: POST');
session_start();

$_POST = json_decode(file_get_contents('php://input'),true);

$category = $_POST["categoria_articolo"];
$subcategory = $_POST["sottocategoria"];

$sql = "SELECT id FROM categoria WHERE categoria = '$category' AND sottocategoria = '$subcategory'";

$res = $connection->query($sql);
$row = $res->fetch_assoc();
$id_categoria = $row["id"];

$venditore = isset($_SESSION["id"])?$_SESSION["id"] : die();
$titolo = isset($_POST["titolo"])?$_POST["titolo"] : "";
$foto = isset($_POST["foto"])?base64_encode($_POST["foto"]) : NULL;
$periodo_garanzia = isset($_POST["periodo_garanzia"])? $_POST["periodo_garanzia"] : NULL;
$tipo_garanzia= isset($_POST["tipo_garanzia"])?$_POST["tipo_garanzia"] : NULL;
$visibilita = isset($_POST["visibilita"])?$_POST["visibilita"] : "Pubblico";

$regione_visibilita= $_POST["regione_visibilita"];
if($regione_visibilita=="nessuna"){
    $regione_visibilita = NULL;
}

$provincia_visibilita= $_POST["provincia_visibilita"];
if($provincia_visibilita=="nessuna"){
    $provincia_visibilita = NULL;
}

$citta_visibilita= isset($_POST["citta_visibilita"])?$_POST["citta_visibilita"] : NULL;
$comune_vendita = isset($_POST["comune_vendita"])?$_POST["comune_vendita"] : "";
$provincia_vendita= isset($_POST["provincia_vendita"])?$_POST["provincia_vendita"] : "";
$regione_vendita= isset($_POST["regione_vendita"])?$_POST["regione_vendita"] : "";
$prezzo= isset($_POST["prezzo"])?$_POST["prezzo"] : 0.0;
$nome_articolo= isset($_POST["nome_articolo"])?$_POST["nome_articolo"] : "";
$categoria_articolo = isset($_POST["categoria_articolo"])?$_POST["categoria_articolo"] : "Elettrodomestici";
$sottocategoria = (int)$id_categoria;
$periodo_validita = isset($_POST["periodo_validita"])?$_POST["periodo_validita"]:"10 giorni";
$stato_annuncio = isset($_POST["stato_annuncio"])?$_POST["stato_annuncio"] : "In vendita";
$stato_articolo = isset($_POST["stato_articolo"])?$_POST["stato_articolo"] : "Nuovo";
$stato_usura = $_POST["stato_usura"];
if($stato_usura=="nessuna"){
    $stato_usura = NULL;
}

$periodo_utilizzo = isset($_POST["periodo_utilizzo"])?$_POST["periodo_utilizzo"] : "";

$stmt = mysqli_prepare($connection,"INSERT INTO la_pulce_smart_db.annuncio(venditore,titolo,foto,periodo_garanzia,tipo_garanzia,
visibilita,regione_visibilita,provincia_visibilita,
citta_visibilita,comune_vendita,provincia_vendita,regione_vendita,prezzo,nome_articolo,categoria_articolo,
sottocategoria,periodo_validita,stato_annuncio,stato_articolo,stato_usura,periodo_utilizzo) 
            values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

mysqli_stmt_bind_param($stmt,"isssssssssssdssisssss",$venditore,$titolo,$foto,$periodo_garanzia,
$tipo_garanzia,$visibilita,$regione_visibilita,$provincia_visibilita,$citta_visibilita,$comune_vendita,$provincia_vendita,$regione_vendita,$prezzo,
$nome_articolo,$categoria_articolo,$sottocategoria,$periodo_validita,$stato_annuncio,$stato_articolo,$stato_usura,$periodo_utilizzo);

$result = mysqli_stmt_execute($stmt);
if($result){
    $resultData = array('status' => true, 'message' => 'Nuovo Annuncio inserito correttamente...');
}else{
    $resultData = array('status' => false, 'message' => 'Impossibile inserire un nuovo annuncio...');
}


echo json_encode($resultData);

mysqli_close($connection);

?>