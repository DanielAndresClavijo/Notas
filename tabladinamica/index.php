<?php 
  session_start();

  unset($_SESSION['consulta']);

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- Titulo de la pagina -->
	<title>Notas Cotecnova</title>

  <!-- Icono de la pagina-->
  <link rel="apple-touch-icon" href="images/icon.png">
  <link rel="shortcut icon" href="images/icon.png">

  <!-- Archivos css -->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
  
  <!-- Archivos js -->
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
</head>
<body>
<?php
require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos

$mysql = new MySQL(); //se declara un nuevo array
$mysql->conectar();//Conexion a la base de datos
//Select para hacer la consulta de los docentes, para mostrar la info en la grid de docentes
$docentes = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.numero_de_identificacion FROM notas.docentes");
$docentes_id = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.numero_de_identificacion FROM notas.docentes");
//Select para hacer la consulta de los estudiantes, para mostrar la info en la grid de estudiantes
$estudiantes = $mysql->efectuarConsulta("SELECT notas.estudiantes.id, notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.documento_de_identificacion, notas.programas.Programa_nombre FROM notas.estudiantes INNER JOIN notas.programas ON notas.programas.id_Programas=notas.estudiantes.Programas_id_Programas");
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
    <div class="container">
        <div id="buscador"></div>
        <div id="tabla"></div>
    </div>

	<!-- Modal para registros nuevos -->

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega DOCENTE</h4>
      </div>
      <div class="modal-body">
        <label>Tipo de Documento</label>
        <select  class="form-control input-sm" id="tipo_documento2">
        <option disabled selected>Seleccione tipo de documento de identidad</option>
        <?php 
        //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($selectTipoDocumento2)){
        ?>
        <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
        <option value="<?php echo $resultado['id_tipo_documento'] ?>"><?php echo $resultado['tipo_documento'] ?></option>
        <?php   }   ?>
        </select>
        <label>Numero de documento</label>
        <input type="text" class="form-control input-sm" id="documento2"  placeholder="Ingrese Numero de identidad">
        <label>Nombres</label>
        <input type="text" class="form-control input-sm" id="nombre2"  placeholder="Ingrese nombre o  nombres">
        <label>Apellidos</label>
        <input type="text" class="form-control input-sm" id="apellido2"  placeholder="Ingrese apellido o apellidos">
        <label>Ciudad de nacimiento</label>
        <select  class="form-control input-sm" id="ciudad2" data-live-search="true" >
        <option disabled selected >Seleccione la ciudad de nacimiento</option>
        <?php 
        //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($selectCiudades2)){
        ?>
        <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
        <option value="<?php echo $resultado['id_ciudad_nacimiento'] ?>" ><?php echo $resultado['ciudad_nacimiento'] ?></option>
        <?php   }   ?>
        </select>
        <label >Estado Civil</label>
        <select  class="form-control input-sm" id="estado_civil2" data-live-search="true" >
        <option disabled selected >Seleccione Estado Civil</option>
        <?php 
        //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($selectEstadoCivil2)){
        ?>
        <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
        <option value="<?php echo $resultado['id_estado_civil'] ?>" ><?php echo $resultado['estado_civil'] ?></option>
        <?php   }   ?>
        </select>
        <label>Contraseña de docente</label>
        <input type="password" class="form-control input-sm" id="contrasenna2"  placeholder="Ingrese una contraseña para el docente">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
          <input type="text" hidden  id="iddocente">
      	<label>Nombres</label>
        <input type="text" class="form-control" id="nombre2u"  placeholder="Ingrese nombre o  nombres">
        <label>Apellidos</label>
        <input type="text" class="form-control" id="apellido2u"  placeholder="Ingrese apellido o apellidos">
        <label>Ciudad de nacimiento</label>
        <select  class="form-control" id="ciudad2u" data-live-search="true" >
        <option disabled selected >Seleccione la ciudad de nacimiento</option>
        <?php 
        //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($selectCiudades)){
        ?>
        <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
        <option value="<?php echo $resultado['id_ciudad_nacimiento'] ?>" ><?php echo $resultado['ciudad_nacimiento'] ?></option>
        <?php   }   ?>
        </select>
        <label>Estado Civil</label>
        <select class="form-control" id="estado_civil2u" data-live-search="true" >
        <option disabled selected >Seleccione Estado Civil</option>
        <?php 
        //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($selectEstadoCivil)){
        ?>
        <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
        <option value="<?php echo $resultado['id_estado_civil'] ?>" ><?php echo $resultado['estado_civil'] ?></option>
        <?php   }   ?>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
        $('#tabla').load('componentes/tabla.php');
        $('#buscador').load('componentes/buscador.php');
 
        $('#guardarnuevo').click(function(){
            tipo_documento2=$('#tipo_documento2').val();
            documento2=$('#documento2').val();
            nombre2=$('#nombre2').val();
            apellido2=$('#apellido2').val();
            ciudad2=$('#ciudad2').val();
            estado_civil2=$('#estado_civil2').val();
            contrasenna2=$('#contrasenna2').val();
            agregardatos(tipo_documento2,documento2,nombre2,apellido2,ciudad2,estado_civil2,contrasenna2);
        });

        $('#actualizadatos').click(function(){
            actualizaDatos();
        });


</script>

</body>
</html>

