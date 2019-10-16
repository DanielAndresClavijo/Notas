<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ESTUDIANTE</title>
    <meta name="description" content="Notas COTECNOVA">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Icono de la pagina-->
    <link rel="apple-touch-icon" href="images/icon1.png">
    <link rel="shortcut icon" href="images/icon1.png">
<!-- CSS de la pagina-->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">   
</head>

<body>
    <?php
        require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        $txtcc = $_POST['txtcc'];
        $cont=0;$cont2=0;//Contador para saber si no hay registro
        //ECHO $id;
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Conexion a la base de datos
        $usuarios = $mysql->efectuarConsulta("SELECT notas.tipo_documento.tipo_documento, notas.estudiantes.nombres AS nombreE, notas.estudiantes.apellidos AS apellidoE, notas.docentes.nombres AS nombreD, notas.docentes.apellidos AS apellidoD, notas.notas.nota1, notas.notas.nota2, notas.notas.nota3, notas.notas.nota_final, notas.notas.fecha_hora_actualizacion FROM notas.notas INNER JOIN notas.estudiantes ON notas.notas.estudiantes_id=notas.estudiantes.id INNER JOIN notas.docentes ON notas.notas.docentes_id=notas.docentes.id INNER JOIN notas.tipo_documento on notas.notas.estudiantes_id=notas.tipo_documento.id_tipo_documento where notas.estudiantes.documento_de_identificacion = ".$txtcc."");         
        $mysql->desconectar();//desconexion de la conexion con elo servidor 
        //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        
    ?>       
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="login.html"><i class="menu-icon fa fa-laptop"></i>Menu principal </a>
                    </li>
                    <li class="menu-title">Opciones</li><!-- /.menu-title -->
                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-id-card"></i>
                            <p id="est" style="display:block;">Notas</p>
                        </a>
                        
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand " href="estudiante.html"><img src="images/logo.png" alt="Logo" ></a>
                    <a id="menuToggle" class="menutoggle" onclick="return ocultarmenus(this);"><i class="fa fa-bars" ></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/icon1.png" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>Estudiante</a>
                            <a class="nav-link" href="login.html"><i class="fa fa-power-off"></i>Cerrar sesion</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Presentacion -->
        <div class="content" id="Presentacion">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="box-title text-center">BIENVENIDO ESTUDIANTE </h1>
                                </div>
                                
                                <div class="card-body--">
                                    <h2 class="box-title text-center">Aqui podra ver sus notas </h2>
                                </div>
                                <br>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.Presentacion -->
        <!-- Content 3 Menu Notas-->
        <div class="content" id="content3" >
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title" id="not" style="display:block;">NOTAS </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Nombre de estudiante</th>
                                                    <th>Nombre del docente</th>
                                                    <th>Nota1</th>
                                                    <th>Nota2</th>
                                                    <th>Nota3</th>
                                                    <th>Nota final</th>
                                                    <th>Fecha y hora<br>(Ultima actualizacion)</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($usuarios)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="name"><?php echo $consulta['nombreE'] ?> <?php echo $consulta['apellidoE'] ?></td>
                                                    <td> <span class="name"><?php echo $consulta['nombreD'] ?> <?php echo $consulta['apellidoD'] ?></span> </td>
                                                    <td> <span class="name"><?php echo $consulta['nota1'] ?></span></td>
                                                    <td> <span class="name"><?php echo $consulta['nota2'] ?></span></td>
                                                    <td> <span class="name"><?php echo $consulta['nota3'] ?></span></td>
                                                    <td> <span class="name"><?php echo $consulta['nota_final'] ?></span></td>
                                                    <td><span class="name"><?php echo $consulta['fecha_hora_actualizacion'] ?></span></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content3 -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer><!-- /.site-footer -->
    </div><!-- /#right-panel -->
    
    <!--Local Scripts-->
    <script src="bootstrap-4.3.1-dist/js/jquery-3_4_1.js"></script>
    <script src="bootstrap-4.3.1-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.3.1-dist/js/jquery.matchHeight.min.js"></script>  
    <script src="fontawesome-free-5.11.2-web/js/all.js"></script>          
    <script src="js/selectores.js"></script>
    <script src="assets/js/main.js"></script>
 
</body>
</html>

