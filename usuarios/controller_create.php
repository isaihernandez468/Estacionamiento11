<?php

    include('../app/config.php');

    /** aqui recibimos estas variables por GET del create.php */
    $nombres = $_GET['nombres'];
    $email = $_GET['email'];
    $password_user = $_GET['password_user'];

    date_default_timezone_set('America/Mexico_City');
    $fechaHora = date("Y-m-d H:i:s");


    /**aqui esta guardando los datos del nuevo ususario en la abse de datos */

    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
    (nombres, email, password_user, fyh_creacion, estado) 
    VALUES (:nombres, :email, :password_user, :fyh_creacion, :estado)");

    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('password_user', $password_user);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_del_registro);

    /**aqui esta checando si se registro o no el nuevo ususario */

    if($sentencia->execute()){
        echo "registro satisfactorio";
        ?>
        <script>location.href = "../roles/asignar.php";</script>
        <?php
    }else{
        echo "no se pudo resgistrar a la base de datos";
    }

?>