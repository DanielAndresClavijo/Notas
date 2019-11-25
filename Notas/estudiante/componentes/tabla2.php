
<?php 
    
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos

 ?>
<div class="row">
    <div class="col-sm-12">
        <h2>Restauraci&oacute;n de estudiantes eliminados</h2>
        <button class="btn btn-primary" id="ver">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Volver
        </button>
        <table class="table table-bordered" id="tabla2">
            <caption>
                Datos de estudiantes
            </caption>
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Documento de identidad</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Programa </th>
                    <th scope="col">Restaurar</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $sql = $mysql->efectuarConsulta("SELECT notas.estudiantes.id, notas.estudiantes.documento_de_identificacion, notas.estudiantes.nombres, notas.estudiantes.apellidos,notas.programas.Programa_nombre,notas.estudiantes.estado_estudiantes  FROM notas.estudiantes INNER JOIN notas.programas ON notas.estudiantes.Programas_id_Programas=id_Programas" );
            $datos=array();
            while($ver=mysqli_fetch_row($sql)){ 
                if($ver[5]==1){
                    $datos[0]=$ver[0];//id estudiante
                    $datos[1]=$ver[5];//Estado estudiantes
             ?>

            <tr>
                <th scope="col"><?php echo $ver[0] ?></th>
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td><?php echo $ver[4] ?></td>
                <td>
                    <button class="btn btn-warning glyphicon glyphicon-repeat" 
                    onclick="preguntarSiNo2('<?php echo $datos[0] ?>','<?php echo $datos[1] ?>' )"> 
                    </button>
                </td>
            </tr>
            <?php 
                }
            }
             ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $('#ver').click(function (){
        $('#tabladoc').load('estudiante/componentes/tabla.php');//Cargar la tabla donde estan los registros de de docente
    });
    $('#tabla2').DataTable({
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
                    title: 'Registro de estudiantes Cotecnova'                    
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
 
</script>

