<?php
include 'find-ip.php';
$mysqli = mysqli_connect('localhost', 'root', '123456', 'Captcha'); //datos de bdd
$verdura = $_POST["verduras"];
$sentidos = $_POST["sentidos"];
$dolor = $_POST["dolor"];
$liquido = $_POST["liquido"];
$vehiculo = $_POST["vehiculo"];
$usuario = $_POST["user"];

$consult = "SELECT * FROM Preguntas WHERE verduras='$verdura' AND sentidos='$sentidos' AND dolor='$dolor' AND liquido='$liquido' AND vehiculo='$vehiculo' "; //consulta sql
$ip = GetUserIp();
//$consult = "SELECT * FROM Preguntas WHERE verduras='$verdura' AND vehiculo='$vehiculo' "; //consulta sql

$vec = array();
if($result = $mysqli->query($consult)){
	while($fila = $result->fetch_assoc()){ $vec[] = $fila; }
}  //convertir en array asociativo para poder leer todo lo que se trajo de la bdd
// echo var_dump($vec);
//echo "hola: ".count($vec);
//exit;

if(count($vec)>0){
	session_start();
	$_SESSION['verduras'] = $verdura;
	$_SESSION['sentidos'] = $sentidos;
	$_SESSION['dolor'] = $dolor;
	$_SESSION['liquido'] = $liquido;
	$_SESSION['vehiculo'] = $vehiculo;
	$idupdate = mysqli_query($mysqli,"UPDATE login SET ip='$ip' WHERE id='$id'");
	$idconsult = "SELECT * FROM login WHERE user='$usuario' AND password='$contra'";

	$idvec = array();
	if($result = $mysqli->query($idconsult)){
		while($fila = $result->fetch_assoc()){ $idvec[] = $fila; }
	}  //convertir en array asociativo para poder leer todo lo que se trajo de la bdd
	$id = $idvec[0]["id"];


	//$idupdate = "UPDATE login SET ip='$ip' WHERE id='$id'";
	echo json_encode(1); //si por lo menos hay un registro , se regresa un 1 a js
}
else{
	echo json_encode(0); //si no encuentra nada, no hay coincidencia y se manda un 0
}

?>
