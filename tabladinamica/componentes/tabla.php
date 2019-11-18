
<?php 
    session_start();
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos

 ?>
<div class="row">
	<div class="col-sm-12">
	<h2>Gestion de docente</h2>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<tr>
				<td>id</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Numero de identificacion</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
                                                $sql = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.estado_civil.id_estado_civil, notas.ciudades.id_ciudad_nacimiento, notas.docentes.numero_de_identificacion FROM notas.docentes inner join notas.estado_civil on notas.docentes.estado_civil_id_estado_civil=notas.estado_civil.id_estado_civil inner join notas.ciudades on notas.docentes.ciudades_id_ciudad_nacimiento=notas.ciudades.id_ciudad_nacimiento where notas.docentes.id = '$idp'" );
					}else{
						$sql = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.estado_civil.id_estado_civil, notas.ciudades.id_ciudad_nacimiento, notas.docentes.numero_de_identificacion FROM notas.docentes inner join notas.estado_civil on notas.docentes.estado_civil_id_estado_civil=notas.estado_civil.id_estado_civil inner join notas.ciudades on notas.docentes.ciudades_id_ciudad_nacimiento=notas.ciudades.id_ciudad_nacimiento" );
					}
				}else{
                                    $sql = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.estado_civil.id_estado_civil, notas.ciudades.id_ciudad_nacimiento, notas.docentes.numero_de_identificacion FROM notas.docentes inner join notas.estado_civil on notas.docentes.estado_civil_id_estado_civil=notas.estado_civil.id_estado_civil inner join notas.ciudades on notas.docentes.ciudades_id_ciudad_nacimiento=notas.ciudades.id_ciudad_nacimiento" );
				}

				while($ver=mysqli_fetch_row($sql)){ 

					$datos=$ver[0]."||".//id docente
						   $ver[1]."||".//Nombre docente
						   $ver[2]."||".//Apellidos docente
						   $ver[3]."||".//Id Ciudad de nacimiento
						   $ver[4];//Id estado civil Docente
			 ?>

			<tr>
				<td><?php echo $ver[0] ?></td>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>