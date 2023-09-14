<?php
    include('../app/config.php');
    include('../layout/admin/datos_usuario_sesion.php');

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
        <h1>Creación de un nuevo rol</h1>


        <!--   aqui se esta mostrando la tarjeta para crear nuevo usuario-->
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="card" style="border: 1px solid #606060">
                <div class="card-header" style="background-color: #007bff;color:white">
                  <h4>Nuevo Rol</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" id="btn-guardar">Guardar</button>
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
  $('#btn-guardar').click(function(){
    var nombre = $('#nombre').val();

  /**aqui revisa que os caompos no esten vacios */
    if(nombre == ""){
      alert('Debe de llenar el campo nombre');
      $('#nombre').focus();
    }else{
      var url = 'controller_create.php';
            /**aqui mandamos los valores por get */
            $.get(url, {nombre:nombre}, function(datos){
            /**alert(datos);  imprime todo lo que hay en el controlador */
            /**aqui se hace la referencia con jquery para poder mostrar los alert del controlador  sin que se refresque la pagina*/
            $('#respuesta').html(datos);
      });
    }
    });
</script>
