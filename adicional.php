<?php 
  session_start();
  if(!isset($_SESSION['user']))
      header("location:login.html");

    //echo $_SESSION['user'];
   

 ?>  <!-- Restringe a la pagina cuando no tiene inicio de sesion y redirecciona hacia la pagina del login -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/robot.ico">

    <title>Productos</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="css/materialize.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
   <script src="js/ie-emulation-modes-warning.js"></script>


  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <a> <img src="images/multiagente.jpg"  class="img-responsive" width="150" height="40"> </a>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.php">Inicio</a></li>

            <li><a class="btn btn-primary btn-large" href="#Concepto">Concepto</a>

            <li><a class="btn btn-primary btn-large" href="#Practicas">Practicas</a>

            <li class="active"><a href="#cerrarsesion" id="Btnlogout">Salir</a></li>

          </ul>
        </nav>
      </div>
    </div>



      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1><em>INTELIGENCIA ARTIFICIAL DISTRIBUIDA</em></h1>
        <p class="lead">Pagina de autenticacion utilizando agentes inteligentes en inteligencia artificial distribuida."</p>
        <p><a class="btn btn-lg btn-success" href="#Check" role="button">Check</a></p>
      </div>


      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2015 Inteligencia Artificial, Benji.</p>
      </footer>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

         <script>
            $(document).on('click', '#Btnlogout', function(e){  //toma el boton
              e.preventDefault() //detiene evento y hace lo que ajax indique
              //alert()

            $.ajax({
            url:'logout.php',
            type:'post',
            success: function(data){
              if(data == 1){
                window.location = "login.html"  // direccion hacia donde se dirige la pagina
              }
              else{
                alert("No se pudo cerrar sesion correctamente!!!")
              }

            }
          }); //fin ajax

        }) //fin click Btnlogout
     </script>
	 <script src="js/jquery-1.10.2.js"></script>


  </body>
</html>
