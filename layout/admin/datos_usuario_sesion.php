<?php
/**se inicia sesion */
/**se guardan los datos de la sesion en una variable */
    session_start();
    /**si no ha pasado por la sesion se tiene que loggear */
    if(isset($_SESSION['usuario_sesion'])){
        $usuario_sesion = $_SESSION['usuario_sesion'];


        /** se realiza la consulta */
        $query_usuario_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_sesion' AND estado = '1' ");
        $query_usuario_sesion->execute();
        $usuarios_sesions = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios_sesions as $usuario_sesion){
            /**aqui ya tenemos las variables rescatadas */
            $id_user_sesion = $usuario_sesion['id'];
            $nombres_sesion = $usuario_sesion['nombres'];
            $email_sesion = $usuario_sesion['email'];
            $rol_sesion = $usuario_sesion['rol'];
        }
        //e
    }else{
        echo "para ingresar a esta plataforma debe iniciar sesion";

    }

?>