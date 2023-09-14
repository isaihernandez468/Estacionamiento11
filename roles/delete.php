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
        <h1>Eliminación de un nuevo rol</h1>
 
        <!--  aqui se hace la consulta para que se pueda traer el nombre y se sepa que rol se quiere eliminar -->
        <?php
            $id_rol = $_GET['id'];
            /** aqui esta haicnedo un ciclo para mostrar la lista de ususarios */
            $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE id_rol = '$id_rol' AND estado = '1' ");
            $query_roles->execute();
            $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
            foreach($roles as $role){
            $id_rol = $role['id_rol'];
            $nombre = $role['nombre'];
            }
        ?>
        

        <!--   aqui se esta mostrando la tarjeta para crear nuevo usuario-->
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="card" style="border: 1px solid #606060">
                <div class="card-header" style="background-color: #d92005;color:white">
                  <h4>¿Estas seguro de eliminar este registro?</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre" value="<?php echo $nombre; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-danger" id="btn-borrar">Borrar</button>
                    <a href="<?php echo $URL;?>/roles/" class="btn btn-default">Cancelar</a>
                  </div>
                  <div id="respuesta">
                    
                  </div>
                </div>
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
    var id_rol = '<?php echo $id_rol; ?>';

  /**aqui revisa que os caompos no esten vacios */
    
      var url = 'controller_delete.php';
            /**aqui mandamos los valores por get */
            $.get(url, {id_rol:id_rol}, function(datos){
            /**alert(datos);  imprime todo lo que hay en el controlador */
            /**aqui se hace la referencia con jquery para poder mostrar los alert del controlador  sin que se refresque la pagina*/
            $('#respuesta').html(datos);
      });
    });
</script>
