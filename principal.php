<?php

    include('app/config.php');
    include('layout/admin/datos_usuario_sesion.php');
      
        //echo "Bienvenido administrador";
?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
          <!-- aqui se esta mandando a llamar el head-->
            <?php include('layout/admin/head.php'); ?>
        </head>
        <body class="hold-transition sidebar-mini">
        <div class="wrapper">

        <?php include('layout/admin/menu.php'); ?>
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    

    <!-- aqui solo muetsra el titulo de la tabla -->

    <div class="container">
        <h1>Bienvenido al SISTEMA DE PARQUEO-OLLIVIER</h1>
        
        <br>
    <!-- aqui se muestra la pantalla principal con los cubiculos-->
        <div class="row">
            <div class="col-md-12">        
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Mapeo actual del parqueo</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <?php
                                /** aqui esta haicnedo un ciclo para mostrar la lista de ususarios en forma de carritos*/
                                $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
                                $query_mapeos->execute();
                                $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                                foreach($mapeos as $mapeo){
                                    $id_map = $mapeo['id_map'];
                                    $nro_espacio = $mapeo['nro_espacio'];
                                    $estado_espacio = $mapeo['estado_espacio'];
                                    if($estado_espacio == "LIBRE"){
                                        ?>
                                        <div class="col">
                                            <center>
                                                <h2><?php echo $nro_espacio ?></h2>

                                                <button class="btn btn-primary" style="width:100%;height:114px"
                                                    data-toggle="modal" data-target="#modal<?php echo $id_map;?>">
                                                    <p><?php echo $estado_espacio ?></p>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal<?php echo $id_map ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ingreso del vehiculo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <!-- aqui esta un modal que se muestra al darle click al carrito libre-->
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Placa:</label>
                                                                    <div class="col-sm-7">
                                                                    <input type="text" style="text-transform:uppercase" class="form-control" id="placa-buscar<?php echo $id_map;?>">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <button class="btn btn-primary" id="btn-buscar-cliente<?php echo $id_map;?>" type="button">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                                        </svg>
                                                                            BUSCAR
                                                                        </button>
                                                                        <script>
                                                                            $('#btn-buscar-cliente<?php echo $id_map;?>').click(function(){
                                                                                var placa = $('#placa-buscar<?php echo $id_map;?>').val();
                                                                               
                                                                                if(placa==""){
                                                                                alert('Debe de llenar el campo placa');
                                                                                $('#placa-buscar<?php echo $id_map;?>').focus();
                                                                                }else{
                                                                                var url = 'clientes/controller_buscar_cliente.php';
                                                                                        /**aqui mandamos los valores por get */
                                                                                        $.get(url, {placa:placa}, function(datos){
                                                                                        /**alert(datos);  imprime todo lo que hay en el controlador */
                                                                                        /**aqui se hace la referencia con jquery para poder mostrar los alert del controlador  sin que se refresque la pagina*/
                                                                                        $('#respuesta_buscar_cliente<?php echo $id_map;?>').html(datos);
                                                                                });
                                                                                }
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <div id="respuesta_buscar_cliente<?php echo $id_map;?>">
                                                                        
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Fecha de ingreso:</label>
                                                                    <div class="col-sm-8">

                                                                    <!--  aqui estamos calculando la fecha automaticamente-->
                                                                        <?php 
                                                                        date_default_timezone_set('America/Mexico_City');
                                                                        $fechaHora = date("Y-m-d H:i:s");
                                                                        $dia = date('d');
                                                                        $mes = date('m');
                                                                        $año = date('Y');
                                                                        ?>
                                                                        <input type="date" class="form-control" value="<?php echo $año."-".$mes."-".$dia;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Hora de ingreso:</label>
                                                                    <div class="col-sm-8">
                                                                        <!-- aqui estamos calculando la hora automaticamente-->
                                                                    <?php 
                                                                        date_default_timezone_set('America/Mexico_City');
                                                                        $fechaHora = date("Y-m-d H:i:s");
                                                                        $hora = date('H');
                                                                        $minutos = date('i');
                                                                        
                                                                        ?>
                                                                        <input type="time" class="form-control" value="<?php echo $hora.":".$minutos;?>">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-primary">Imprimir ticket</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                        <?php
                                    }
                                    if($estado_espacio == "OCUPADO"){
                                        ?>
                                        <div class="col">
                                            <center>
                                                <h2><?php echo $nro_espacio ?></h2>
                                                <button class="btn btn-warning">
                                                    <img src="<?php echo $URL;?>/public/imagenes/auto.png" alt="" width="60px">
                                                </button>
                                                <p><?php echo $estado_espacio ?></p>
                                            </center>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    
                                <?php  
                                }
                                ?>
                            </div>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->      
            </div>
        </div>
    </div>
</div>
          <!--  aqui se esta mandand a llamar el footer-->

          <?php include('layout/admin/footer.php'); ?>

        </div>

        <!--  aqui se esta mandand a llamar los scripts del footer-->

        <?php include('layout/admin/footer_link.php'); ?>
        </body>
        </html>

        
        
