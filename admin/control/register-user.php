<?php
include('../condb.php');

$nombres = $_POST['nombres'];
$correo = $_POST['correo'];
$contrasena = hash('sha512','73b0c0eeb6e3b347a4c32822293c71c72dafa8f5b08961c1811ab425fdf06a5dbf27b3b3200a7731b65ca36ff80a743' .$_POST['contrasena']);


$buscarUsuario = "SELECT * FROM tbl_usuarios
WHERE correo = '$correo' and contrasena = '$contrasena'";

$result = $con->query($buscarUsuario);

$count = mysqli_num_rows($result);

if ($count == 1){
    echo "<br/>". "El usuario ya a sido creado." . "<br/>";
    echo "<a href='../register.php'> Por favor ingrese otra información</a>";
}else{
    $query = "INSERT INTO tbl_usuarios (nombres, correo, contrasena) VALUES ('".$nombres."','".$correo."', '".$contrasena."')";
    if ($con->query($query) === TRUE) {
        echo "<br/>" . "<h2>" . "¡Usuario Creado Exitosamente!" . "</h2>";
        echo "<h4>" . "Bienvenido: " . $nombres . "</h4>" . "\n\n";
        echo "<h5>" . "Registrar otro usuario: " . "<a href='../register.php'>Insertar Otro Registro</h5>";
    }else{
        echo "Error al crear el usuario." . $query . "<br>" . $con->error;
    }
}
mysqli_close($con);
?>
<br/>
<a href="../register.php">Volver a insertar registros</a>
<br/>
<a href="../index.php">Volver al inicio</a>-->