<?php
include 'find-ip.php';
$mysqli = new mysqli('localhost', 'root', '123456', 'Captcha'); //datos de la bdd
$usuario = $_POST["user"]; //llaves js
$contra = $_POST["pass"];

$consult = "SELECT * FROM login WHERE user='$usuario' AND password='$contra'";
$ip = GetUserIp();
//$consult = "SELECT * from empleados WHERE user = 'Agustin'";

$vec = array();
if($result = $mysqli->query($consult)){
  while($fila = $result->fetch_assoc()){ $vec[] = $fila; }
}  //convertir en array asociativo para poder leer todo lo que se trajo de la bdd

// echo var_dump($vec);
//echo "hola: ".count($vec);
//exit;
if(count($vec)>0){
  session_start();
  $id = $vec[0]["id"];

  //$ipinsert = "INSERT INTO 'login'(user,password,ip,id) VALUES ('','','$ip','')";
  mysqli_query($mysqli, "INSERT INTO login(ip) VALUES('$ip') WHERE user='$usuario'");
  $ipconsult = "SELECT * FROM login WHERE id='$id' AND ip='$ip'";
  $ipvec = array();
  if($result = $mysqli->query($ipconsult)){
    while($fila = $result->fetch_assoc()){ $ipvec[] = $fila; }
  }  //convertir en array asociativo para poder leer todo lo que se trajo de la bdd
  $_SESSION['user'] = $usuario;
  if(count($ipvec)>0){
    echo json_encode(1);
  }else {
    echo json_encode(2);
  }
} else{
    echo json_encode(0); //si no encuentra nada, no hay coincidencia y se manda un 0
  }

?>
