<link href="css/sb-admin-2.css" rel="stylesheet">
<?php
include('../condb.php');

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
//$contrasena = hash('sha512', '73b0c0eeb6e3b347a4c32822293c71c72dafa8f5b08961c1811ab4025fdf06a5dbf27b3b3200a7731b65ca36ff80a743'.$_POST['contrasena']);
$searchUser = "SELECT * FROM  tbl_usuarios WHERE correo = '$correo' and contrasena = '$contrasena'";

$result = $con->query($searchUser);

$count = mysqli_num_rows($result);

if ($count === 1){
// echo "<br/>". "El usuario o el correo ya existen" . "<br/>";	
    // while ($row = mysqli_fetch_row($result)) {
    //     session_start();
    //     $_SESSION['usuario'] = $row[2];
    //     $_SESSION['perfil'] = $row[4];
    //     $_SESSION['login'] = 'true';
    header('location: ../index.php');	
    // }

}else{
// echo "<br />"."Usuario y/o contraseña invalidos."."<br />" . $con->error;
    header('location: loginerror.php');

}

echo "<br/>";
echo "<a href='../login.php'> Volver a loguearse </a>";
mysqli_close($con);
?>
<br/>
<br/>
<a href="../index.php">Volver al inicio</a>