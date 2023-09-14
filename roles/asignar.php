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
        <h1>Asignación de roles a usuarios</h1>
        
        <br>

        <div class="row">
            <div class="col-md-12">        
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de usuarios</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table table-bordered table-sm table-striped">
                            <th><center>Nro</center></th>
                            <th>Nombre de Usuarios</th>
                            <th>Email</th>
                            <th><center>Asignar rol</center></th>
                        
                            <?php

                                $contador =0; /** esto es par a que el id funcione bien */

                                /** aqui esta haicnedo un ciclo para mostrar la lista de ususarios */
                                $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1' ");
                                $query_usuario->execute();
                                $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                                foreach($usuarios as $usuario){
                                $id = $usuario['id'];
                                $nombres = $usuario['nombres'];
                                $email = $usuario['email'];
                                $rol = $usuario['rol'];
                                $contador = $contador + 1;
                                ?>
                                <!-- aqui esta mostrando la tabla de la lista -->
                                <tr>
                                    <td><center><?php echo $contador; ?></center></td>
                                    <td><?php echo $nombres;?></td>
                                    <td><?php echo $email;?></td>
                                    <td>
                                    <center>

                                        <?php if($rol == ""){
                                            ?>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id;?>">
                                        Asignar
                                        </button>

                                        <!-- Modal -->
                                        <!--esto es lo que se muestra al darle click al boton de asignar-->
                                        <div class="modal fade" id="exampleModal<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar rol</h1>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="controller_asignar.php" method="post">
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Nombre del usuario</label>
                                                                    <input type="text" name="nombre" class="form-control" value="<?php echo $nombres; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Email</label>
                                                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                                                                    <input type="text" name="id_user" value="<?php  echo $id?>" hidden><!-- con el hidden ocultamos de la vista el input, solo queremos el valor del id-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">     <!-- aqui estamos asignando el rol al usuario-->
                                                                    <label for="">Rol</label>
                                                                    <select name="rol" id="" class="form-control" >
                                                                        <?php 
                                                                        /** aqui esta haicnedo un ciclo para mostrar la lista de ususarios */
                                                                        $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE estado = '1' ");
                                                                        $query_roles->execute();
                                                                        $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach($roles as $role){
                                                                        $id_rol = $role['id_rol'];
                                                                        $nombre = $role['nombre'];
                                                                        ?>
                                                                        <option value="<?php echo $nombre;?>"><?php echo $nombre;?></option>
                                                                        <?php
                                                                        }                                                         
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Asignar rol</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                            <?php
                                        }else{
                                            echo "";
                                        }
                                        ?>
                                    </center>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>
                        </table>
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