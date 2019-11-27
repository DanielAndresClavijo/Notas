<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol']!=1){
        header('location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Notas Cotecnova - Docente">
    
  <!-- Titulo de la pagina -->
	<title>Docente</title>

  <!-- Icono de la pagina-->
    <link rel="apple-touch-icon" href="images/icon.png">
    <link rel="shortcut icon" href="images/icon.png">

  <!-- Archivos css -->
  <link rel="stylesheet" type="text/css" href="librerias/propia/css/main.css"><!-- Botstrap -->
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css"><!-- Botstrap -->
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css"><!-- Mensajes de alerta -->
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css"><!-- Mensajes de alerta -->
    <link rel="stylesheet" type="text/css" href="librerias/datatables/css/dataTables.bootstrap.min.css"><!-- Tablas dinamicas -->
    <link rel="stylesheet" type="text/css" href="librerias/datatables/css/buttons/jquery.dataTables.min.css"><!-- Tablas dinamicas -->
    <link rel="stylesheet" type="text/css" href="librerias/datatables/css/buttons/buttons.dataTables.min.css"><!-- Botones de Tablas dinamicas -->
    <link rel="stylesheet" type="text/css" href="librerias/charts/css/Chart.css"><!-- Graficos -->
  
  <!-- Archivos js -->
    <script src="librerias/jquery/jquery-3.3.1.js"></script><!-- Jquery js -->
    <script src="docente/js/funciones.js"></script><!-- js propio, funciones de administracion -->
    <script src="estudiante/js/funciones.js"></script><!-- js propio, funciones de administracion -->
    <script src="librerias/bootstrap/js/bootstrap.js"></script><!-- Botstrap js -->   
    <script src="librerias/alertifyjs/js/alertify.js"></script><!-- js de los mensajes de alerta -->
    <!--js datatables-->
    <script src="librerias/datatables/js/jquery.dataTables.min.js"></script>
    <script src="librerias/datatables/js/dataTables.bootstrap.min.js"></script>
    <!-- js botones de las datatables -->
    <script src="librerias/datatables/js/buttons/dataTables.buttons.min.js"></script>
    <script src="librerias/datatables/js/buttons/buttons.colVis.min.js"></script>
    <!-- js para exportar pdf y excel con datatables -->
    <script src="librerias/datatables/js/buttons/jszip.min.js"></script>
    <script src="librerias/datatables/js/buttons/pdfmake.min.js"></script>
    <script src="librerias/datatables/js/buttons/vfs_fonts.js"></script>
    <script src="librerias/datatables/js/buttons/buttons.html5.min.js"></script>
    <!-- js Charts -->
    <script src="librerias/charts/js/Chart.bundle.js"></script>
    <script src="librerias/charts/js/Chart.js"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo.png" width="300" height="50" alt="NotasCotecnova" />
        </div>
        <nav class="menu">
            <header>Menu<span class="glyphicon glyphicon-remove"></span><br><?php echo $_SESSION['nombre'] ?></header>
            <ol>
                <li class="menu-item" ><a id="docentes"><span class="glyphicon glyphicon-user"></span> Gestionar docentes</a></li>
                <li class="menu-item"><a id="estudiante" ><span class="glyphicon glyphicon-education"></span> Gestionar estudiantes</a></li>
                <li class="menu-item"><a ><span class="glyphicon glyphicon-pencil"></span> Gestionar notas</a></li>
                <li class="menu-item"><a ><span class="glyphicon glyphicon-stats"></span> Graficos</a></li>
                <li class="menu-item"><a id="enviaremail"><span class="glyphicon glyphicon-bell"></span> Correo informativo</a></li>
                <li class="menu-item"><a id="backup"><span class="glyphicon glyphicon-export"></span> Backup DB</a></li>
                <li class="menu-item"><a id="cerrar_session"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesion</a></li>
            </ol>
            <footer>
                <button aria-label="Toggle menu">Toggle</button>
            </footer>
        </nav>
    </div>
<!--contenido docente-->
    <div class="container-fluid col-lg-12 col-md-12 col-sm-8">
        <div id="tabladoc" class="container-fluid col-lg-12 col-md-12 col-sm-8">
            <div class="container" id="inicio">
                <h1 class="titulo">
                    Bienvenido al Gestor de Administraci&oacute;n Docente
                </h1>
            </div>
        </div>
    </div><!-- fin contenidoDocente -->
<!--Fin contenido docente-->
    <script type="text/javascript">
        //Cuando se oprima el elemento con id docente se ejecutara las siguiente accion
        $('#docentes').click(function(){
            //Cargar la tabla donde estan los registros de de docente
            //En el elemento con id tabladoc
            $('#tabladoc').load('docente/componentes/tabla.php');
        });
        $('#enviaremail').click(function() {
            $('#tabladoc').load('controlador/formemail.php');
        });
        $('#backup').click(function() {
            $('#tabladoc').load('controlador/backup.php');
        });
         $('#estudiante').click(function() {
            $('#tabladoc').load('estudiante/componentes/tabla.php');
        });
        $('#cerrar_session').click(function() {
            alertify.confirm('Cerrar Sesion', '¿Esta seguro que desea cerrar sesion?', 
            function(){ 
                cadena="cerrar_session=" + 1;
                $.ajax({
                    type:"POST",
                    url:"login.php",
                    data:cadena,
                    success:function(r){
                        alertify.success("Sesion cerrada!");
                        setTimeout('location.reload()',2000);
                    }
                });
            }
            ,function(){ alertify.error('Cancelado')});
            
        });
        //Actualizar o Editar registro de docente
        //Cuando se oprima el elemento con id actualizardatos, se ejecutara la funcion actualizar datos
        ////Esta funcion esta en docente/js/funciones.js
        
        // Para menu toggle
        var $els = $('.menu a, .menu header, .menu li, .menu ol');
        var count = $els.length;
        var grouplength = Math.ceil(count/3);
        var groupNumber = 0;
        var i = 1;
        $('.menu').css('--count',count+'');
        $els.each(function(j){
            if ( i > grouplength ) {
                groupNumber++;
                i=1;
            }
            $(this).attr('data-group',groupNumber);
            i++;
        });

        $('.menu footer button').on('click',function(e){
            e.preventDefault();
            $els.each(function(j){
                $(this).css('--top',$(this)[0].getBoundingClientRect().top + ($(this).attr('data-group') * -15) - 20);
                $(this).css('--delay-in',j*.1+'s');
                $(this).css('--delay-out',(count-j)*.1+'s');
            });
            $('.menu').toggleClass('closed');
            e.stopPropagation();
        });
    </script>

</body>
</html>

