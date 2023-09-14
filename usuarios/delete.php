<?php
    include('../app/config.php');
    include('../layout/admin/datos_usuario_sesion.php');


    session_start();
    /**si no ha pasado por la sesion se tiene que loggear */
    if(isset($_SESSION['usuario_sesion'])){
        //echo "Bienvenido administrador";
        ?>
        
        <?php
    }else{
        //echo "para ingresar a esta plataforma debe iniciar sesion";

    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php include('../layout/admin/menu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="container">


    <?php 
    
        $id_get = $_GET['id'];
        /** aqui esta haicnedo un ciclo para mostrar la lista de ususarios */
        $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_get'  AND estado = '1'");
        $query_usuario->execute();
        $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios as $usuario){
            $id = $usuario['id'];
            $nombres = $usuario['nombres'];
            $email = $usuario['email'];
            $password_user = $usuario['password_user'];
        }
    
    ?>


    <!-- aqui esta el cuadro para actualizar los datos-->
        <h1>Eliminación de Usuarios</h1>


        <!--   aqui se esta mostrando la tarjeta para crear nuevo usuario-->
        <div class="container">
          <div class="row">
            <div class="col-md-6">
                <div class="card card-danger" style="border:1px solid #777777">
                    <div class="card-header">
                        <h3 class="card-title">Edicion de Usuario</h3>
                        
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="form-group">
                        <label for="">Nombres</label>
                        <input type="text" class="form-control" id="nombres" value="<?php echo $nombres;?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $email;?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" id="password_user" value="<?php echo $password_user;?>" disabled>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" id="btn-borrar">Borrar</button>
                        <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
                    </div>
                    <div id="respuesta">
                        
                    </div>
                    </div>
                <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
    </div>
  </div>
  <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


<script>
  $('#btn-borrar').click(function(){
    
    var id_user = '<?php echo $id_get = $_GET['id'];?>';
    var url = 'controller_delete.php';
        /**aqui mandamos los valores por get */
        $.get(url, {id_user:id_user}, function(datos){
        /**alert(datos);  imprime todo lo que hay en el controlador */
        /**aqui se hace la referencia con jquery para poder mostrar los alert del controlador  sin que se refresque la pagina*/
        $('#respuesta').html(datos);
    });
  });
</script>

