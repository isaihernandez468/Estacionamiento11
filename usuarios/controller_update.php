<?php


include('../app/config.php');

    /** aqui recibimos estas variables por GET del create.php */
    // aqui estamos rescatando los datos de la tabla update 
    $nombres = $_GET['nombres'];
    $email = $_GET['email'];
    $password_user = $_GET['password_user'];
    $id_user = $_GET['id_user'];

    date_default_timezone_set('America/Mexico_City');
    $fechaHora = date("Y-m-d H:i:s");


    //aqui se dice que de la tabla tb_usuario  se actualizen los campos
    $sentencia = $pdo->prepare("UPDATE tb_usuarios SET
    nombres = :nombres, email = :email, password_user = :password_user, fyh_actualizacion = :fyh_actualizacion
    WHERE id = :id");
    
    $sentencia->bindParam(':nombres', $nombres,);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password_user', $password_user);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id', $id_user);


    //aqui se comprueba y ejecuta la actualizacion de datos
    if($sentencia->execute()){
        echo "se actualizo el registro de la manera correcta";
        ?>
        <script>location.href = "../usuarios/";</script>
        <?php
    }else{
        echo "error al actualizar el registro";
    }

?>