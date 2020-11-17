<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container-fluid">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4">
                <div class="card-login">
                    <div class="row justify-content-center">
                        <img src="<?=serverURL?>/img/MONTIAC 2.png" alt="Logo compañia" style="width: 340px;">
                    </div>
                    <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="text" name="email"  class="form-control form-control-sm w-100">
                    </div>
            
                    <div class="form-group">
                        <label for="pass">Contraseña:</label>
                        <input type="password" name="pass" class="form-control form-control-sm w-100">
                    </div>
                        <div class="row justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Entrar">      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if (isset($_POST['email']) && isset($_POST['pass'])) {
            echo 'entrando';
            echo $correo = $_POST['email'];
            echo $contraseña = $_POST['pass'];
            require_once './controller/sesionControlador.php';
            $sesion = new sesion_controlador();
            echo $sesion->IniciarSesion();
        }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
