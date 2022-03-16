<?php
  require "conexion.php";

  session_start();

  if($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT id, password, empresa, tipoUsuario FROM usuarios WHERE usuario='$usuario'";
    $resultado = $mysql->query($sql);
    $num = $resultado->num_rows;

    if($num > 0) {
      $row = $resultado->fetch_assoc();
      $password_bd = $row['password'];
      $pass_c = sha1($password);

      if($password_bd == $pass_c){

        $_SESSION['id'] = $row['id'];
        $_SESSION['empresa'] = $row['empresa'];
        $_SESSION['tipoUsuario'] = $row['tipoUsuario'];

        header("Location: principal.php");

      }else {
        echo "Password Incorrecto";
      }

    }else {
      echo "EL USUARIO NO EXISTE";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Expires" content="0"> 
    <meta http-equiv="Last-Modified" content="0"> 
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate"> 
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="theme-color" content="#1e2126">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon"  href="./img/logo.png">
    <link rel="apple-touch-startup-image" href="./img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.scss?1.8" />
    <!--Manifest-->
    <link rel="manifest" href="manifest.json">
    <title>AR Report</title>
    <script>
        if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register("sw.js");
        }
    </script>
    
  </head>
  <body class="bg-dark">
      <section>
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item img-1 min-vh-100 active">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item img-2 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item img-3 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            <div class="col-lg-5 bg-dark d-flex flex-column align-items-end min-vh-100">
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100">
                    <img src="img/logo.png" class="img-fluid" />
                </div>
                <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                <h1 class="font-weight-bold mb-4">Bienvenido al equipo AR</h1>
                <form class="mb-5" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-4">
                      <label for="exampleInputEmail1" class="form-label font-weight-bold">Usuario</label>
                      <input type="text" name="usuario" class="form-control bg-dark-x border-0" id="exampleInputEmail1" placeholder="Ingresa tu email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                      <input type="password" name="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" id="exampleInputPassword1">
                      <a href="" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Iniciar sesión</button>
                  </form>
                </div>
            </div>
      </section>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" 
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>
    <script src="./script.js"></script>

    
    
    

  </body>
</html>