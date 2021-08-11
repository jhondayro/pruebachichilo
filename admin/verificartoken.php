<?php 
    include('./condb.php');
    $email =$_POST['email'];
    $token =$_POST['token'];
    $codigo =$_POST['codigo'];
    $res=$con->query("select * from passwords where 
        email='$email' and token='$token' and codigo=$codigo")or die($con->error);
    $correcto=false;
    if(mysqli_num_rows($res) > 0){
        $fila = mysqli_fetch_row($res);
        $fecha =$fila[4];
        $fecha_actual=date("Y-m-d h:m:s");
        $seconds = strtotime($fecha_actual) - strtotime($fecha);
        $minutos=$seconds / 60;
        if($minutos > $seconds){
            echo "token vencido";
        }else{
            echo " ";
        }
        $correcto=true;
    }else{
        $correcto=false;
    }
   
   

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cambio de contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-4 col-lg-4 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-password-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <!-- <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Lo entendemos, estas cosas pasan. Solo tienes que introducir tu dirección de correo electrónico a continuación
                                            y le enviaremos un enlace para restablecer su contraseña!</p>
                                    </div> -->
                                    <?php if($correcto){ ?>
                                    <form action="cambiarcontrasena.php" class="user">
                                        <div class="form-group">
                                            <label for="c" class="form-label">Nueva Contraseña</label>
                                            <input type="password" name="p1" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingrese nueva contraseña">                                                
                                        </div>
                                        <div class="form-group">
                                        <label for="c" class="form-label">Confirmar Contraseña</label>
                                            <input type="password" name="p2" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Repita nueva contraseña">         
                                            <input type="hidden" class="form-control" id="c" name="email" value="<?php echo $email?>">                                       
                                        </div>
                                        <input type="submit" value ="Restablecer Contraseña" class="btn btn-primary btn-user btn-block">
                                    </form>
                                        <?php }else{ ?>
                                        <div class="alert alert-danger" >Código incorrecto o vencido</div>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>