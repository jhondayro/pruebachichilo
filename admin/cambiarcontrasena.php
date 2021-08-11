<?php 
    include('./condb.php');
    $correo =$_POST['correo'];
    $p1=hash('sha512', '73b0c0eeb6e3b347a4c32822293c71c72dafa8f5b08961c1811ab4025fdf06a5dbf27b3b3200a7731b65ca36ff80a743'.$_POST['p1']);
    $p2=hash('sha512', '73b0c0eeb6e3b347a4c32822293c71c72dafa8f5b08961c1811ab4025fdf06a5dbf27b3b3200a7731b65ca36ff80a743'.$_POST['p2']);
    if($p1 == $p2){
        $con->query("update tbl_usuarios set contrasena='$p1' where correo='$correo' ") or die($con->error);
        echo "Todo bien";
        
    }else{
        echo "No coinciden las contraseñas";
    }
?>