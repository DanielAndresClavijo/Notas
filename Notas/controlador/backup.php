<div class="row">
    <div class="container col-sm-5 col-md-12 col-lg-12">
        <h2>Gestion backup db</h2>
        <button class="btn btn-info" id="nuevodb">
            Crear respaldo de la base de datos
            <span class="glyphicon glyphicon-repeat"></span>
        </button>
        <table class="table table-bordered" id="tabla1">
            <caption>
                Listado de backup de la base de datos
            </caption>
            <thead>
                <tr>
                    <th scope="col">Nombre del Archivo</th>
                    <th scope="col">Eliminar copia</th>
                </tr>
            </thead>
            <tbody>
                
<?php
listFiles('../db/');
function listFiles($directorio){
    if (is_dir($directorio)) { //Comprobamos que sea un directorio Valido
        if ($dir = opendir($directorio)) {//Abrimos el directorio
            while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo
                if ($archivo != '.' && $archivo != '..'){//Omitimos los archivos del sistema . y ..                    
                    echo '
                    <tr>
                        <td>
                            <a href="db/'.$archivo.'">Archivo: '.$archivo.'</a>
                        </td>
                        <td>
                            <button class="btn btn-danger glyphicon glyphicon-remove" onclick="pregunta('.$directorio.$archivo.')">
                                Eliminar                       
                            </button>
                        </td>
                    </tr>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo
                }
            }//finaliza While
            closedir($dir);//Se cierra el archivo
        }
    }
}
?>
                
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $('#nuevodb').click(function (){
        $.ajax({
            type:"POST",
            url:"modelo/conexion.php",
            data:1,
            success:function(r){
                $('#tabladoc').load('controlador/backup.php');//Cargar la tabla donde estan los registros de de docente
                alertify.success("Respaldo creado!");
            }
        });
        
        
    });
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
            }
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


