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
        <h1>Listado de Roles</h1>
        
        <br>

        <div class="row">
          <div class="col-md-6">
          <table class="table table-bordered table-sm table-striped">
          <th><center>Nro</center></th>
          <th>Nombres</th>
          <th><center>Acción</center></th>
     
          <?php

            $contador =0; /** esto es par a que el id funcione bien */

            /** aqui esta haicnedo un ciclo para mostrar la lista de ususarios */
            $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE estado = '1' ");
            $query_roles->execute();
            $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
            foreach($roles as $role){
            $id_rol = $role['id_rol'];
            $nombre = $role['nombre'];
            $contador = $contador + 1;


            ?>

            <!-- aqui esta mostrando la tabla de la lista -->

            <tr>
            <td><center><?php echo $contador; ?></center></td>
            <td><?php echo $nombre;?></td>
            <td>
              <center>
              <a href="delete.php?id=<?php echo $id_rol; ?>" class="btn btn-danger">Borrar</a>
              </center>
            </td>
          </tr>
            <?php
            }
          ?>
        </table>
          </div>
        </div>
    </div>
  </div>
  <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>
