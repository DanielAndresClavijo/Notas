<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol']!=2){
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
    <meta name="description" content="Notas Cotecnova - Estudiante">
    
  <!-- Titulo de la pagina -->
	<title>Estudiante</title>

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
    <!-- js Plotly -->
    <script src="librerias/plotly/js/plotly-latest.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo.png" width="300" height="50" alt="NotasCotecnova" />
        </div>
        <nav class="menu">
            <header>Menu<span class="glyphicon glyphicon-remove"></span><br><?php echo $_SESSION['nombre'] ?></header>
            <ol>
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
            <div class="row">
                <div class="container col-sm-5 col-md-12 col-lg-12">
                    <h2>Menu Estudiante</h2>
                    <table class="table table-bordered" id="tabla1">
                        <caption>
                            Datos de docente
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nota1</th>
                                <th scope="col">Nota2</th>
                                <th scope="col">Nota3</th>
                                <th scope="col">Nota Final</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Ultima Actuaizaci&oacute;n</th>
                                <th scope="col">Docente calificador</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
                        $mysql = new MySQL(); //se declara un nuevo array
                        $mysql->conectar();//Se conecta a la base de datos
                        $id = $_SESSION['idest'];
                        $sql = $mysql->efectuarConsulta("SELECT notas.estudiantes.id, notas.notas.nota1, notas.notas.nota2, notas.notas.nota3, notas.notas.nota_final, notas.programas.Programa_nombre, notas.notas.fecha_hora_actualizacion, notas.docentes.nombres, notas.docentes.apellidos FROM notas.estudiantes LEFT JOIN notas.programas ON notas.estudiantes.Programas_id_Programas = notas.programas.id_Programas LEFT JOIN notas.notas ON notas.notas.estudiantes_id = notas.estudiantes.id LEFT JOIN notas.docentes ON notas.notas.docentes_id = notas.docentes.id WHERE notas.notas.id>=1 AND notas.estudiantes.id = ".$id." AND notas.notas.estado_notas = 0" );
                        $datos = array();
                        if($sql){
                            while($ver=mysqli_fetch_row($sql)){
                         ?>
                        <tr>
                            <th scope="col"><?php echo $ver[0] ?></th>
                            <td><?php echo $ver[1] ?></td>
                            <td><?php echo $ver[2] ?></td>
                            <td><?php echo $ver[3] ?></td>
                            <td><?php echo $ver[4] ?></td>
                            <td><?php echo $ver[5] ?></td>
                            <td><?php echo $ver[6] ?></td>
                            <td><?php echo $ver[7].' '.$ver[8] ?></td>
                        </tr>
                        <?php 
                            }
                        }
                         ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- fin contenidoDocente -->
<!--Fin contenido docente-->
    <script type="text/javascript">
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
        
       
    $('#tabla1').DataTable({
        dom: '<"salto" B>lfrtip',
        colReorder: true,
        select: {
            style:    'os',
            selector: 'td:first-child',
            blurable: true
        },
        buttons: [{
            extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible',
                    title: 'Registro de docentes Cotecnova'                    
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible',
                    title: 'Registro de docentes Cotecnova'
                }
            },
            {
                extend: 'pdfHtml5',
                customize: function ( doc ) {
                    doc.content.splice( 0, 0, {
                        fit: [500, 200],
                        alignment: 'center',
                        image: 'data:image/png;base64,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'
                    });
                },
                exportOptions: {
                    columns: ':visible',
                    columnGap: 100,
                    filename: 'Registro Docentes',
                    title: 'Registro de docentes Cotecnova',
                    orientation: 'vertical',
                    pageSize: 'A4'
                }
            },
            'colvis'
        ],
        language:{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    });
    
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


