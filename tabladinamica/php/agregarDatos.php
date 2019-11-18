<?php 

    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Conexion a la base de datos

    $documento2 = $_POST['documento2'];
    $nombre2 = $_POST['nombre2'];
    $apellido2 = $_POST['apellido2'];
    $pass2 = md5($_POST['contrasenna2']);
    //LLaves foraneas
    $tipoDocumento2 = $_POST['tipo_documento2'];
    $estado_civil2 = $_POST['estado_civil2'];
    $ciudad2 = $_POST['ciudad2'];

    echo $in2 = $mysql->ingresoRegistro("insert into notas.docentes (notas.docentes.numero_de_identificacion, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.contrasenna,notas.docentes.ciudades_id_ciudad_nacimiento, notas.docentes.tipo_documento_id_tipo_documento, notas.docentes.estado_civil_id_estado_civil) values(".$documento2.",'".$nombre2."','".$apellido2."','".$pass2."',".$ciudad2.",".$tipoDocumento2.",".$estado_civil2.")");

 ?>