<?php
    include('../app/config.php');
    include('../layout/admin/datos_usuario_sesion.php');
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
    

    <!-- aqui solo muetsra el titulo de la tabla -->

    <div class="container">
        <h1>Creacion de una nueva informacion</h1>
        
        <br>

        <div class="row">
            <div class="col-md-12">        
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Registre los datos con mucho cuidado</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display:block;">
                        
                            <div class="row">

                                <div class="col-md-5">
                                    <label for="">Nombre del Parqueo <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="nombre_parqueo">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Actividad de la empresa <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="actividad_empresa">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Sucursal <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="sucursal">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dirección <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control"id="direccion">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Zona <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="zona">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Teléfono <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="telefono">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Departamento o Ciudad <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="departamento_ciudad">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Pais <span style="color:red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="pais">
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <button id="btn-registrar-informacion" class="btn btn-primary btn-block">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                            <div id="respuesta">
                    
                            </div>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->      
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
  $('#btn-registrar-informacion').click(function(){
    
    /**aqui se asignan en variables los valores del formulario */
    var nombre_parqueo = $('#nombre_parqueo').val();
    var actividad_empresa = $('#actividad_empresa').val();
    var sucursal = $('#sucursal').val();
    var direccion = $('#direccion').val();
    var zona = $('#zona').val();
    var telefono = $('#telefono').val();
    var departamento_ciudad = $('#departamento_ciudad').val();
    var pais = $('#pais').val();

    /**aqui revisa que los cmpos no esten vacios */
    if(nombre_parqueo == ""){
      alert('Debe de llenar el campo nombre_parqueo');
      $('#nombre_parqueo').focus();
    }else if(actividad_empresa == ""){
        alert('Debe de llenar el campo actividad_empresa');
        $('#actividad_empresa').focus();
    }else if(sucursal == ""){
        alert('Debe de llenar el campo sucursal');
        $('#sucursal').focus();
    }else if(direccion == ""){
        alert('Debe de llenar el campo direccion');
        $('#direccion').focus();
    }else if(zona == ""){
        alert('Debe de llenar el campo zona');
        $('#zona').focus();

    }else if(telefono == ""){
        alert('Debe de llenar el campo telefono');
        $('#telefono').focus();

    }else if(departamento_ciudad == ""){
        alert('Debe de llenar el campo departamento_ciudad');
        $('#departamento_ciudad').focus();

    }else if(pais == ""){
        alert('Debe de llenar el campo pais');
        $('#pais').focus();

    }
    else{
      var url = 'controller_create_informaciones.php';
            /**aqui mandamos los valores por get */
            $.get(url, {nombre_parqueo:nombre_parqueo,actividad_empresa:actividad_empresa,sucursal:sucursal,direccion:direccion,zona:zona,telefono:telefono,departamento_ciudad:departamento_ciudad,pais:pais}, function(datos){
            /**alert(datos);  imprime todo lo que hay en el controlador */
            /**aqui se hace la referencia con jquery para poder mostrar los alert del controlador  sin que se refresque la pagina*/
            $('#respuesta').html(datos);
      });
    }
    });
</script>
