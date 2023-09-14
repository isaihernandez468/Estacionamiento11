<?php

    include('app/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link href="public/css/bootstrap.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>

</head>
<body style="background-image: url('public/imagenes/piso-fondo.jpg');
    background-repeat:no-repeat;
    z-index: -3;
    background-size: 100vw 100vh">


<!-- barra de menu-->
    
    <nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        SISPARQUEO
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="#">INICIO</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link active" href="#">SOBRE NOSOTROS</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PROMOCIONES
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">MENSUALES</a></li>
                            <li><a class="dropdown-item" href="#">DIAS</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">FICHAS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link active" href="#">CONTACTANOS</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ingresar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <br>


<!--parte del contenido-->
    <div class="container">
        <div class="row">
                                <?php
                                /** aqui esta haicnedo un ciclo para mostrar la lista de ususarios */
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
                                                <button class="btn btn-primary" style="width:100%; height:114px">
                                                    <p><?php echo $estado_espacio ?></p>
                                                </button>
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





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="public/js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="htt ps://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Inicio de Sesión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <label for="">Usuario/Email</label>
                <input type="email" id="usuario" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" id="password" class="form-control">
                </div>
            </div>
        </div>
        <div id="respuesta">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-ingresar">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<!-- EJEMPLO DE USO DE AJAX CON UN BOTON 
<script>
    $('#btn-ingresar').click(function(){
        alert('Usted hizo click en el boton');
    });
</script>

-->


<script>
    /**esto es al hacer click en registrar */
    $('#btn-ingresar').click(function(){

        login();
        
    });

    /**esto es para al dar enter se regista el usuario */

    $('#password').keypress(function(e){
            if(e.which == 13){
                login();
            }
    });


    function login(){
        /**aqui guardamos los valores de email y contraseña al iniciar sesion */
        var usuario = $('#usuario').val();
        var password_user = $('#password').val();

        /**comprobar que no se dejaron vacios los campos */
        if(usuario == ""){
            alert('Debe introducir su usuario....');
            $('#usuario').focus();
        }else if(password_user == ""){
            alert('Debe introducir su contraseña....');
            $('#password').focus();
        }else{
            var url = 'login/controller_login.php';
            /**aqui mandamos los valores por POST */
            $.post(url, {usuario:usuario, password_user:password_user}, function(datos){
            /**alert(datos);  imprime todo lo que hay en el controlador */
            /**aqui se hace la referencia con jquery para poder mostrar los alert del controlador  sin que se refresque la pagina*/
            $('#respuesta').html(datos);
        });


        }
        


    }


</script>



