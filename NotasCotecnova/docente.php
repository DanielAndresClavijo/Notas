<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DOCENTE</title>
    <meta name="description" content="Notas COTECNOVA">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Icono de la pagina-->
    <link rel="apple-touch-icon" href="images/icon2.png">
    <link rel="shortcut icon" href="images/icon2.png">
<!-- CSS de la pagina-->
    <script src="js/jquery.js"></script>
    <script src="js/datatables.js"></script>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <LINK REL=StyleSheet HREF="css/datatables.css" TYPE="text/css" MEDIA=screen>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/tail.select.css">
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" id="opcionesizq" >
                    <li class="active">
                        <a href="login.html"><i class="menu-icon fa fa-laptop"></i>Menu principal</a>
                    </li>
                    <li class="menu-title">Opciones</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown" onclick="return OcultarAviso(this)">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="boton1"> 
                            <i class="menu-icon fa fa-graduation-cap"></i><p onclick="return change1(this);" id="est" style="display:block;">Estudiantes</p>
                        </a>
                        <ul class="sub-menu children dropdown-menu"> 
                            <li onclick="return change11(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Crear</p></li>
                            <li onclick="return change12(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Editar</p></li>
                            <li onclick="return change13(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Habilitar/Inhabilitar</p></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown" onclick="return OcultarAviso(this)">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-male"></i><p onclick="return change2(this);" id="doc" style="display:block;">Docentes</p>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li onclick="return change21(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Crear</p></li>
                            <li onclick="return change22(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Editar</p></li>
                            <li onclick="return change23(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Habilitar/Inhabilitar</p></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown" onclick="return OcultarAviso(this)">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-id-card"></i><p onclick="return change3(this);" id="not" style="display:block;">Notas</p>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li onclick="return change31(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Crear</p></li>
                            <li onclick="return change32(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Editar</p></li>
                            <li onclick="return change33(this);" style="cursor: pointer;"><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p style="font-size: 0.9em;">Habilitar/Inhabilitar</p></li>
                        </ul>
                    </li>
                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </nav><!-- /.navbar navbar-expand-sm navbar-default -->
    </aside><!-- /#left-panel -->
    
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand " href="docente.php"><img src="images/logo.png" alt="Logo" ></a>
                    <a id="menuToggle" class="menutoggle" onclick="return ocultarmenus(this);"><i class="fa fa-bars" ></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/icon2.png" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>Docente</a>
                            <a class="nav-link" href="login.html"><i class="fa fa-power-off"></i>Cerrar Sesión</a>
                        </div>
                    </div>

                </div>
            </div>
        </header><!-- /#header -->        
        <?php
        require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Conexion a la base de datos
//Select para hacer la consulta de los docentes, para mostrar la info en la grid de docentes
        $docentes = $mysql->efectuarConsulta("SELECT notas.docentes.estado_docentes, notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.numero_de_identificacion FROM notas.docentes");
        $docentes2 = $mysql->efectuarConsulta("SELECT notas.docentes.estado_docentes, notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.numero_de_identificacion FROM notas.docentes");
        $docentes_id = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.numero_de_identificacion FROM notas.docentes");
//Select para hacer la consulta de los estudiantes, para mostrar la info en la grid de estudiantes
        $estudiantes = $mysql->efectuarConsulta("SELECT notas.estudiantes.estado_estudiantes, notas.estudiantes.id, notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.documento_de_identificacion, notas.programas.Programa_nombre FROM notas.estudiantes INNER JOIN notas.programas ON notas.programas.id_Programas=notas.estudiantes.Programas_id_Programas");
        $estudiantes2 = $mysql->efectuarConsulta("SELECT notas.estudiantes.estado_estudiantes, notas.estudiantes.id, notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.documento_de_identificacion, notas.programas.Programa_nombre FROM notas.estudiantes INNER JOIN notas.programas ON notas.programas.id_Programas=notas.estudiantes.Programas_id_Programas");
        
        $estudiantes_id = $mysql->efectuarConsulta("SELECT notas.estudiantes.id, notas.estudiantes.documento_de_identificacion FROM notas.estudiantes ");
//Select para hacer la consulta de los notas, para mostrar la info en la grid de notas
        $notas = $mysql->efectuarConsulta("SELECT notas.estudiantes.nombres AS nombreE, notas.estudiantes.apellidos AS apellidoE, notas.docentes.nombres AS nombreD, notas.docentes.apellidos AS apellidoD, notas.notas.nota1, notas.notas.nota2, notas.notas.nota3, notas.notas.nota_final, notas.notas.fecha_hora_actualizacion FROM notas.notas INNER JOIN notas.estudiantes ON notas.notas.estudiantes_id=notas.estudiantes.id INNER JOIN notas.docentes ON notas.notas.docentes_id=notas.docentes.id");
//Select para hacer la consulta de las ciudades, para mostrar la info en los selects de los formularios
        $selectCiudades = $mysql->efectuarConsulta("SELECT notas.ciudades.id_ciudad_nacimiento, notas.ciudades.ciudad_nacimiento FROM notas.ciudades");
//Select para hacer la consulta de las ciudades, para mostrar la info en los selects de los formularios
        $selectCiudades2 = $mysql->efectuarConsulta("SELECT notas.ciudades.id_ciudad_nacimiento, notas.ciudades.ciudad_nacimiento FROM notas.ciudades");
//Select para hacer la consulta de los Departamentos, para mostrar la info en los selects de los formularios
        $selectDepartamentos = $mysql->efectuarConsulta("SELECT notas.departamentos.id_departamento_nacimiento, notas.departamentos.departamento_nacimiento FROM notas.departamentos");
//Select para hacer la consulta del Estado Civil para los estudiantes, para mostrar la info en los selects de los formularios
        $selectEstadoCivil = $mysql->efectuarConsulta("SELECT notas.estado_civil.id_estado_civil, notas.estado_civil.estado_civil FROM notas.estado_civil");
//Select para hacer la consulta del Estado Civil ára los docentes, para mostrar la info en los selects de los formularios
        $selectEstadoCivil2 = $mysql->efectuarConsulta("SELECT notas.estado_civil.id_estado_civil, notas.estado_civil.estado_civil FROM notas.estado_civil");
//Select para hacer la consulta del Tipo de Documento para los estudiantes, para mostrar la info en los selects de los formularios
        $selectTipoDocumento = $mysql->efectuarConsulta("SELECT notas.tipo_documento.id_tipo_documento, notas.tipo_documento.tipo_documento FROM notas.tipo_documento");
//Select para hacer la consulta del Tipo de Documento para los docentes, para mostrar la info en los selects de los formularios
        $selectTipoDocumento2 = $mysql->efectuarConsulta("SELECT notas.tipo_documento.id_tipo_documento, notas.tipo_documento.tipo_documento FROM notas.tipo_documento");
//Select para hacer la consulta de los Programas, para mostrar la info en los selects de los formularios
        $selectPrograma = $mysql->efectuarConsulta("SELECT notas.programas.id_Programas, notas.programas.Programa_nombre FROM notas.programas");         
        $mysql->desconectar();//desconexion de la conexion con elo servidor 
        
        ?>
        <!-- Presentacion -->
        <div class="content" id="Presentacion" style="display: block;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="box-title text-center">BIENVENIDO DOCENTE </h1>
                                </div>
                                <div class="card-body--">
                                    <h2 class="box-title text-center">Aqui podra gestionar su trabajo, seleccione una de las opciones a su izquierda y empiece <br></h2>
                                    <div id="chart-container" style="width: 100%; height: auto;">
                                        <canvas id="graphCanvas"></canvas>
                                    </div>
                                    <div id="chart-container2" style="width: 100%; height: auto;">
                                        <canvas id="graphCanvas2"></canvas>
                                    </div>
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
        <!-- Content 1 Menu Estudiantes -->
        <div class="content" id="content1" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">ESTUDIANTES </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table" id="tabla" style="width:100% border">
                                            <thead>
                                                <tr>
                                                    <th >Documento de identidad</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Programa </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($estudiantes)){
                                                if($consulta['estado_estudiantes']==='0'){
                                            ?>
                                            
                                                <tr>
                                                    <td><span class="serial"><?php echo $consulta['documento_de_identificacion'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['nombres'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['apellidos'] ?></span></td>
                                                    <td><span class="name"><?php echo $consulta['Programa_nombre'] ?></span></td>
                                                </tr>
                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
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
        <!-- /.content 1 -->
        <!-- Content 11 Crear informacion Estudiante-->
        <div class="content" id="content11" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">CREAR ESTUDIANTE </h4>
                                </div>
                                <div class="card-body">
                                    <div id="crear1">
                                        <div class="form-group">
                                            <label>Tipo de Documento</label><br>
                                            <select name="tipo_documento1" class="form-control" id="tipo_documento1" data-live-search="true">
                                                <option disabled selected value="">Seleccione tipo de documento de identidad</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectTipoDocumento)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_tipo_documento'] ?>"><?php echo $resultado['tipo_documento'] ?></option>
                                        <?php   }   ?>
                                            </select>                                            
                                        </div>
                                        <p id="TipDoc1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label>Numero de documento</label>
                                            <input type="text" class="form-control" id="documento1" name="documento1" placeholder="Ingrese Numero de identidad">
                                        </div>
                                        <p id="Doc1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Ingrese nombre o  nombres">
                                        </div>
                                        <p id="Nom1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Ingrese apellido o apellidos">
                                        </div>
                                        <p id="Ape1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Estado Civil</label>
                                            <select name="estado_civil1" class="form-control" id="estado_civil1" data-live-search="true" >
                                                <option disabled selected value="">Seleccione el estado civil</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectEstadoCivil)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_estado_civil'] ?>" ><?php echo $resultado['estado_civil'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <p id="EstCivil1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label>Departamento de nacimiento</label>
                                            <select name="departamento1" class="tail-dropdown-search" id="departamento1" data-live-search="true" > 
                                                <option disabled selected value="">Seleccione el departamento de nacimiento</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectDepartamentos)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_departamento_nacimiento'] ?>" ><?php echo $resultado['departamento_nacimiento'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <p id="Depa1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label>Ciudad de nacimiento</label>
                                            <select name="ciudad1" class="tail-dropdown-search" id="ciudad1" data-live-search="true" >
                                                <option disabled selected value="">Seleccione la ciudad de nacimiento</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectCiudades)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_ciudad_nacimiento'] ?>" ><?php echo $resultado['ciudad_nacimiento'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <p id="Ciu1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label>Programa que cursa</label>
                                            <select name="programa1" class="form-control" id="programa1" data-live-search="true" >
                                                <option disabled selected value="">Seleccione el Programa</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectPrograma)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_Programas'] ?>" ><?php echo $resultado['Programa_nombre'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <p id="Program1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <label>Contraseña de estudiante</label>
                                            <input type="password" class="form-control" id="contrasenna1" name="contrasenna1" placeholder="Ingrese una contraseña para el estudiante">
                                        </div>
                                        <p id="Contra1" style="text-align:center;background:rgba(0,0,0,0.1);margin: 0;"></p>
                                        <div class="form-group">
                                            <button type="button" id="enviar1" name="enviar1" onclick="return valiForm1()" class="btn btn-primary">Submit</button>
                                        </div>
                                        <p id="mensaje1" style="text-align:center;background:rgba(255,0,0,0.3);margin: 0;"></p>
                                    </div> 
                                    <script type="text/javascript">
                                        function valiForm1(){
                                            var tipo_documento1 = document.getElementById('tipo_documento1').value;
                                            var documento1 = document.getElementById('documento1').value;
                                            var nombre1 = document.getElementById('nombre1').value;
                                            var apellido1 = document.getElementById('apellido1').value;
                                            var estado_civil1 = document.getElementById('estado_civil1').value;
                                            var departamento1 = document.getElementById('departamento1').value;
                                            var ciudad1 = document.getElementById('ciudad1').value;
                                            var programa1 = document.getElementById('programa1').value;
                                            var contrasenna1 = document.getElementById('contrasenna1').value;
                                            var cont = 0;
                                            
                                            if( nombre1 == null || nombre1.length == 0 || /^\s+$/.test(nombre1) ) {
                                                cont=cont+1;
                                                document.getElementById('Nom1').innerHTML='Campo Nombre vacio'; 
                                            }else{
                                                document.getElementById('Nom1').innerHTML='';                                   
                                            }
                                            if(documento1 == "" ){
                                                cont=cont+1;
                                                document.getElementById('Doc1').innerHTML='Campo documento de identidad vacio'; 
                                            }else{
                                                document.getElementById('Doc1').innerHTML='';
                                            }
                                            if(apellido1 == "" ){
                                                cont=cont+1;
                                                document.getElementById('Ape1').innerHTML='Campo apellido vacio';    
                                            }else{
                                                document.getElementById('Ape1').innerHTML='';
                                            }
                                            if(estado_civil1 == "" ){
                                                cont=cont+1;
                                                document.getElementById('EstCivil1').innerHTML='El estado civil no a sido seleccionado';
                                            }else{
                                                document.getElementById('EstCivil1').innerHTML='';
                                            }
                                            if(departamento1 == "" ){
                                                cont=cont+1;
                                                document.getElementById('Depa1').innerHTML='El departamento no a sido seleccionado'; 
                                            }else{
                                                document.getElementById('Depa1').innerHTML='';
                                            }
                                            if(ciudad1 == "" ){
                                                cont=cont+1;
                                                document.getElementById('Ciu1').innerHTML='La ciudad no a sido seleccionada';  
                                            }else{
                                                document.getElementById('Ciu1').innerHTML='';
                                            }
                                            if(programa1 == "" ){
                                                cont=cont+1;
                                                document.getElementById('Program1').innerHTML='El programa no a sido seleccionado';
                                            }else{
                                                document.getElementById('Program1').innerHTML='';
                                            }
                                            if(contrasenna1 == "" ){
                                                cont=cont+1;
                                                document.getElementById('Contra1').innerHTML='No ha ingresado la contraseña'; 
                                            }else{
                                                document.getElementById('Contra1').innerHTML='';
                                            }
                                            if (cont===0) {
                                                document.getElementById('mensaje1').innerHTML='Datos registrados';
                                                var xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                    if (xhttp.readyState == 4 && xhttp.status == 200){
                                                        document.getElementById("crear1").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                    }
                                                };
                                                xhttp.open("POST", "controlador/inserts.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                                xhttp.send("tipo_documento1="+tipo_documento1+"&documento1="+documento1+"&nombre1="+nombre1+"&apellido1="+apellido1+"&estado_civil1="+estado_civil1+"&departamento1="+departamento1+"&ciudad1="+ciudad1+"&programa1="+programa1+"&contrasenna1="+contrasenna1+"");//Envia la peticion al servidor
                                            }else{
                                                document.getElementById('mensaje1').innerHTML='Datos no registrados';
                                            }
                                        }   
                                    </script>
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content11 -->
        <!-- Content 12 Editar informacion Estudiante-->
        <div class="content" id="content12" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">EDITAR ESTUDIANTE </h4>
                                </div>  
                                <div class="card-body">
                                    <div id="editar1" class="form-inline md-form mr-auto mb-4" > 
                                        <input name="buscar12" id="buscar12" type="text" class="form-control col-md-8"  placeholder="Ingrese documento a buscar" >
                                        <span >
                                            <button name="enviar12" class="btn aqua-gradient btn-rounded btn-sm my-1" type="button" onclick="loadLog1()">Enviar</button>
                                        </span>
                                    </div>
                                    <script>
                                        function loadLog1(){
                                            var buscar12= document.getElementById('buscar12').value;
                                            var xhttp = new XMLHttpRequest();
                                            xhttp.onreadystatechange = function() {
                                                //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                if (xhttp.readyState == 4 && xhttp.status == 200){
                                                    document.getElementById("editar1").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                }
                                            };
                                            xhttp.open("POST", "FormUpdateEstudiante.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                            xhttp.send("buscar12="+buscar12+"");//Envia la peticion al servidor
                                        }
                                    </script>                                     
                                </div> 
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 12 -->
        <!-- Content 13 Eliminar informacion Estudiante-->
        <div class="content" id="content13" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card" style="display: show;">
                                <div class="card-body">
                                    <h4 class="box-title">ELIMINAR ESTUDIANTES</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="name">Documento de identidad</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Programa </th>
                                                    <th text-align: center  >Estado</th>

                                                </tr>
                                            </thead>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($estudiantes2)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><span class="name"><?php echo $consulta['documento_de_identificacion'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['nombres'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['apellidos'] ?></span></td>
                                                    <td><span class="name"><?php echo $consulta['Programa_nombre'] ?></span></td>

                                                        <?php
                                      
                                                       if($consulta['estado_estudiantes']==0){
                                                           ?>
                                                        <td >
                                                            <div id="editar111" class="form-inline md-form mr-auto mb-4" > 
                                                                <input name="docest" id="docest" type="text" class="form-control col-md-8" value="<?php echo $consulta['documento_de_identificacion'] ?>"  disabled hidden>  
                                                                <span >
                                                                    <button name="inhabilitar" type="button" onclick="loadLog11()">Inhabilitar</button>
                                                                </span>
                                                            </div>
                                                            <script>
                                                                function loadLog11(){
                                                                    var docest= document.getElementById('docest').value;
                                                                    var xhttp = new XMLHttpRequest();
                                                                    xhttp.onreadystatechange = function() {
                                                                        //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                                        if (xhttp.readyState == 4 && xhttp.status == 200){
                                                                            document.getElementById("editar111").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                                        }
                                                                    };
                                                                    xhttp.open("POST", "controlador/inhabilitar.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                                                    xhttp.send("docest="+docest+"");//Envia la peticion al servidor
                                                                }
                                                            </script>
                                                        </td>
                                                        <?php
                                                        
                                                       } else {
                                                           
                                                        ?>
                                                        <td >
                                                            <div id="editar112" class="form-inline md-form mr-auto mb-4" > 
                                                                <input name="docest" id="docest2" type="text" class="form-control col-md-8" value="<?php echo $consulta['documento_de_identificacion'] ?>"  disabled hidden>  
                                                                <span >
                                                                    <button name="habilitar"  type="button" onclick="loadLog112()">Habilitar</button>
                                                                </span>
                                                            </div>
                                                            <script>
                                                                function loadLog112(){
                                                                    var docest2= document.getElementById('docest2').value;
                                                                    var xhttp = new XMLHttpRequest();
                                                                    xhttp.onreadystatechange = function() {
                                                                        //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                                        if (xhttp.readyState == 4 && xhttp.status == 200){
                                                                            document.getElementById("editar112").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                                        }
                                                                    };
                                                                    xhttp.open("POST", "controlador/habilitar.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                                                    xhttp.send("docest2="+docest2+"");//Envia la peticion al servidor
                                                                }
                                                            </script>
                                                        </td>
                                                        <?php
                                                   
                                                       }
                                                        
                                                        ?>



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
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content13 -->
        <!-- Content 2 Menu Docente-->
        <div class="content" id="content2" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">DOCENTES </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table" id="tabla2" style="width:100% border">
                                            <thead>
                                                <tr>
                                                    <th>Numero de documento</th>
                                                    <th>Nombres</th>
                                                    <th>apellidos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($docentes)){
                                                if($consulta['estado_docentes']==='0'){
                                            ?>
                                                <tr>
                                                    <td class="serial"><?php echo $consulta['numero_de_identificacion'] ?></td>
                                                    <td> <span class="name"><?php echo $consulta['nombres'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['apellidos'] ?></span></td>
                                                </tr>
                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
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
        <!-- /.content2 -->
        <!-- Content 21 Crear informacion Docente-->
        <div class="content" id="content21" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">CREAR DOCENTE </h4>
                                </div>
                                <div class="card-body">
                                    <form action="controlador/inserts.php" method="POST">
                                        <div class="form-group">
                                            <label>Tipo de Documento</label>
                                            <select name="tipo_documento2" class="form-control" id="tipo_documento2">
                                                <option disabled selected>Seleccione tipo de documento de identidad</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectTipoDocumento2)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_tipo_documento'] ?>"><?php echo $resultado['tipo_documento'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de documento</label>
                                            <input type="text" class="form-control" id="documento2" name="documento2" placeholder="Ingrese Numero de identidad">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Ingrese nombre o  nombres">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Ingrese apellido o apellidos">
                                        </div>
                                        <div class="form-group">
                                            <label>Ciudad de nacimiento</label>
                                            <select name="ciudad2" class="form-control" id="ciudad2" data-live-search="true" >
                                                <option disabled selected >Seleccione la ciudad de nacimiento</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectCiudades2)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_ciudad_nacimiento'] ?>" ><?php echo $resultado['ciudad_nacimiento'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Estado Civil</label>
                                            <select name="estado_civil2" class="form-control" id="estado_civil2" data-live-search="true" >
                                                <option disabled selected >Seleccione Estado Civil</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($selectEstadoCivil2)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id_estado_civil'] ?>" ><?php echo $resultado['estado_civil'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Contraseña de docente</label>
                                            <input type="password" class="form-control" id="formGroupExampleInput2" name="contrasenna2" placeholder="Ingrese una contraseña para el docente">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="enviar2" name="enviar2" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form> 
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 21-->
        <!-- Content 22 Editar informacion Docente-->
        <div class="content" id="content22" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">EDITAR DOCENTE </h4>
                                </div>
                                <div class="card-body">
                                    <div id="editar2" class="form-inline md-form mr-auto mb-4" > 
                                        <input name="buscar22" id="buscar22" type="text" class="form-control col-md-8"  placeholder="Ingrese documento a buscar" >
                                        <span >
                                            <button name="enviar22" class="btn aqua-gradient btn-rounded btn-sm my-1" type="button" onclick="loadLog2()">Enviar</button>
                                        </span>
                                    </div>
                                    <script>
                                        function loadLog2() {
                                            var buscar22= document.getElementById('buscar22').value;
                                            var xhttp = new XMLHttpRequest();
                                            xhttp.onreadystatechange = function() {
                                                //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                if (xhttp.readyState == 4 && xhttp.status == 200){
                                                    document.getElementById("editar2").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                }
                                            };
                                            xhttp.open("POST", "FormUpdateDocente.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                            xhttp.send("buscar22="+buscar22+"");//Envia la peticion al servidor
                                        }
                                    </script>                                      
                                </div> 
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 22 -->
        <!-- Content 23 Eliminar informacion Docente-->
        <div class="content" id="content23" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">ELIMINAR DOCENTE </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="name">Documento de identidad</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th text-align: center  >Estado</th>

                                                </tr>
                                            </thead>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($docentes2)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><span class="name"><?php echo $consulta['numero_de_identificacion'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['nombres'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['apellidos'] ?></span></td>

                                                        <?php
                                      
                                                       if($consulta['estado_docentes']==0){
                                                           ?>
                                                        <td >
                                                            <div id="editar222" class="form-inline md-form mr-auto mb-4" > 
                                                                <input name="docdoc" id="docdoc" type="text" class="form-control col-md-8" value="<?php echo $consulta['numero_de_identificacion'] ?>"  disabled hidden>  
                                                                <span >
                                                                    <button name="inhabilitar" type="button" onclick="loadLog222()">Inhabilitar</button>
                                                                </span>
                                                            </div>
                                                            <script>
                                                                function loadLog222(){
                                                                    var docdoc = document.getElementById('docdoc').value;
                                                                    var xhttp = new XMLHttpRequest();
                                                                    xhttp.onreadystatechange = function() {
                                                                        //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                                        if (xhttp.readyState == 4 && xhttp.status == 200){
                                                                            document.getElementById("editar222").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                                        }
                                                                    };
                                                                    xhttp.open("POST", "controlador/inhabilitar.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                                                    xhttp.send("docdoc="+docdoc+"");//Envia la peticion al servidor
                                                                }
                                                            </script>
                                                        </td>
                                                        <?php
                                                        
                                                       } else {
                                                           
                                                        ?>
                                                        <td >
                                                            <div id="editar223" class="form-inline md-form mr-auto mb-4" > 
                                                                <input name="docdoc2" id="docdoc2" type="text" class="form-control col-md-8" value="<?php echo $consulta['numero_de_identificacion'] ?>"  disabled hidden>  
                                                                <span >
                                                                    <button name="habilitar"  type="button" onclick="loadLog223()">Habilitar</button>
                                                                </span>
                                                            </div>
                                                            <script>
                                                                function loadLog223(){
                                                                    var docdoc2= document.getElementById('docdoc2').value;
                                                                    var xhttp = new XMLHttpRequest();
                                                                    xhttp.onreadystatechange = function() {
                                                                        //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                                        if (xhttp.readyState == 4 && xhttp.status == 200){
                                                                            document.getElementById("editar223").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                                        }
                                                                    };
                                                                    xhttp.open("POST", "controlador/habilitar.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                                                    xhttp.send("docdoc2="+docdoc2+"");//Envia la peticion al servidor
                                                                }
                                                            </script>
                                                        </td>
                                                        <?php
                                                   
                                                       }
                                                        
                                                        ?>



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
        <!-- /.content 23 -->
        <!-- Content 3 Menu Notas-->
        <div class="content" id="content3" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">NOTAS </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table" id="tabla3">
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
                                            while ($consulta= mysqli_fetch_assoc($notas)){
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
        <!-- Content 31 Crear informacion Notas-->
        <div class="content" id="content31" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">CREAR NOTAS </h4>
                                </div>
                                <div class="card-body">
                                    <form action="controlador/inserts.php" method="POST">
                                        <div class="form-group">
                                            <label>Numero de documento de docente</label>
                                            <select name="documento21" class="form-control" id="documento21" data-live-search="true">
                                                <option disabled selected>Seleccione el numero de documento del docente</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($docentes_id)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id'] ?>"><?php echo $resultado['numero_de_identificacion'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de documento de estudiante</label>
                                            <select name="documento11" class="form-control" id="documento11" data-live-search="true">
                                                <option disabled selected>Seleccione el numero de documento del estudiante</option>
                                                <?php 
                                                //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                                                while($resultado = mysqli_fetch_assoc($estudiantes_id)){
                                                ?>
                                            <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                                                <option value="<?php echo $resultado['id'] ?>"><?php echo $resultado['documento_de_identificacion'] ?></option>
                                        <?php   }   ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha y hora de ultima actualzacion</label>
                                            <input type="datetime-local" class="form-control" id="fechanota" name="fechanota" >
                                        </div>  
                                        <div class="form-group">
                                            <label>Nota 1</label>
                                            <input class="form-control" type="number" id="nota1" name="nota1" placeholder="Ingrese la nota 1 del estudiante">
                                        </div>
                                        <div class="form-group">
                                            <label>Nota 2</label>
                                            <input class="form-control" type="number" id="nota2" name="nota2" placeholder="Ingrese la nota 2 del estudiante">
                                        </div>
                                        <div class="form-group">
                                            <label>Nota 3</label>
                                            <input class="form-control" type="number" id="nota3" name="nota3" placeholder="Ingrese la nota 3 del estudiante">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="enviar3" name="enviar3" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content31 -->
        <!-- Content 32 Editar informacion Notas-->
        <div class="content" id="content32" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">EDITAR NOTAS </h4>
                                </div>
                                <div class="card-body">
                                    <div id="editar3" class="form-inline md-form mr-auto mb-4" > 
                                        <input name="buscar13" id="buscar12" type="text" class="form-control col-md-8"  placeholder="Ingrese documento a buscar" >
                                        <span >
                                            <button name="enviar13" class="btn aqua-gradient btn-rounded btn-sm my-1" type="button" onclick="loadLog3()">Enviar</button>
                                        </span>
                                    </div>
                                    <script>
                                        function loadLog3(){
                                            var buscar13= document.getElementById('buscar13').value;
                                            var xhttp = new XMLHttpRequest();
                                            xhttp.onreadystatechange = function() {
                                                //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                                                if (xhttp.readyState == 4 && xhttp.status == 200){
                                                    document.getElementById("editar1").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                                                }
                                            };
                                            xhttp.open("POST", "FormUpdateEstudiante.php", true);//Realiza la petición de apertura de comunicación con método POST.
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                                            xhttp.send("buscar12="+buscar12+"");//Envia la peticion al servidor
                                        }
                                    </script>                                     
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content32 -->
        <!-- Content 33 Eliminar informacion Notas-->
        <div class="content" id="content33" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">ELIMINAR NOTAS </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form-inline md-form mr-auto mb-4" ><!-- action="#" method="POST" -->
                                        <input name="buscar33" class="form-control col-md-8" type="text" placeholder="Ingrese documento a buscar" aria-label="Search">
                                        <button  class="btn aqua-gradient btn-rounded btn-sm my-1" type="submit">Buscar</button>
                                    </form> 
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                    <!-- /. rows -->
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content33 -->
        
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
    <script src="js/Chart.js"></script>
    <script src="js/selectores.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="bootstrap-4.3.1-dist/js/tail.select.js"></script>

    <script>
        $(document).ready(function () {
            showGraph();
            showGraph2();
        });


        function showGraph()
        {
            {
                $.post("controlador/Grafico.php",
                function (data)
                {
                    console.log(data);
                    var Programa_nombre = [];
                    var Cantidad = [];
                    
                    for (var i in data) {
                        Programa_nombre.push(data[i].Programa_nombre);
                        Cantidad.push(data[i].Cantidad);
                    }
                    
                    var chartdata = {
                        labels: Programa_nombre,
                        datasets: [
                            {
                                label: 'Estudiantes',
                                backgroundColor: '#3e95cd',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: Cantidad
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata
                    });
                    
                });
            }
        }
        
        function showGraph2()
        {
            {
                $.post("controlador/Grafico2.php",
                function (data2)
                {
                //----------------------------
                    console.log(data2);
                    var Nota = [];
                    var Cantidad2 = [];
                    
                    for (var j in data2) {
                        Nota.push(data2[j].Nota);
                        Cantidad2.push(data2[j].Cantidad2);
                    }
                    
                    var chartdata = {
                        labels: Nota,
                        datasets: [
                            {
                                label: 'Notas',
                                backgroundColor: '#3e95cd',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: Cantidad2
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas2");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
    </script>
   
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable( {
                "order": [[1, "asc" ]]
            } );
            
            $('#tabla2').DataTable( {
                "order": [[ 1, "asc" ]]
            } );
            
            $('#tabla3').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
    </script>
    <script>
        
        tail.select('#departamento1',{
            search: true,
            "placeholder":  "Seleccione una opcion...",
            "empty": "Opcion no disponible",
            "limit": "No puedes seleccionar mas opciones",
            "selectLimit": "Seleccione hasta %d opciones...",
            "searchField": "Escriba para buscar...",
            "searchEmpty": "Sin resultados...."
        });
        tail.select('#ciudad1',{
            search: true,
            "placeholder":  "Seleccione una opcion...",
            "empty": "Opcion no disponible",
            "limit": "No puedes seleccionar mas opciones",
            "selectLimit": "Seleccione hasta %d opciones...",
            "searchField": "Escriba para buscar...",
            "searchEmpty": "Sin resultados...."
        });
        tail.select('#ciudad2',{
            search: true,
            "placeholder":  "Seleccione una opcion...",
            "empty": "Opcion no disponible",
            "limit": "No puedes seleccionar mas opciones",
            "selectLimit": "Seleccione hasta %d opciones...",
            "searchField": "Escriba para buscar...",
            "searchEmpty": "Sin resultados...."
        });
    </script>
</body>
</html>

