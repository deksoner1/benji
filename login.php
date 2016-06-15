<?php
$mysqli = new mysqli('localhost', 'root', '', 'Captcha'); //datos de la bdd
$usuario = $_POST["user"]; //llaves js
$contra = $_POST["pass"];

$consult = "SELECT * FROM Login WHERE user='$usuario' AND password='$contra'";
echo $consult; //consulta sql
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
      $_SESSION['user'] = $usuario;
      echo json_encode(1); //si por lo menos hay un registro , se regresa un 1 a js
    }
    else{
      echo json_encode(0); //si no encuentra nada, no hay coincidencia y se manda un 0
    }


?>
