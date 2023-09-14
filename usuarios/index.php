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
    

  <!-- aqui solo muetsra el titulo de la tabla -->

    <div class="container">
        <h1>Listado de Usuarios</h1>
        
        <br>

        <table class="table table-bordered table-sm table-striped">
          <th><center>Nro</center></th>
          <th>Nombre de Usuarios</th>
          <th>Email</th>
          <th><center>Acción</center></th>
     
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
            $contador = $contador + 1;
            ?>

            <!-- aqui esta mostrando la tabla de la lista -->

            <tr>
            <td><center><?php echo $contador; ?></center></td>
            <td><?php echo $nombres;?></td>
            <td><?php echo $email;?></td>
            <td>
              <center>
              <a href="update.php?id=<?php echo $id;?>" class="btn btn-success">Editar</a>
              <a href="delete.php?id=<?php echo $id;?>" class="btn btn-danger">Borrar</a>
              </center>
            </td>
          </tr>
            <?php
            }
          ?>
        </table>
    </div>
  </div>
  <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>
