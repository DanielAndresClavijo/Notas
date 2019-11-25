<?php 
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos
    //declaracion de variables
    //Variables de la tabla docentes
    $iddocente = $_POST['iddocente'];
    $nombre2 = $_POST['nombre2'];
    $apellido2 = $_POST['apellido2'];
    //LLaves foraneas
    $estado_civil2 = $_POST['estado_civil2'];
    $ciudad2 = $_POST['ciudad2'];

    //Variable para llamar el ingreso de usuario y entregarle el insert
    echo $up2 = $mysql->EditarRegistros("UPDATE notas.docentes SET notas.docentes.nombres='$nombre2',notas.docentes.apellidos='$apellido2',notas.docentes.ciudades_id_ciudad_nacimiento= '$ciudad2',notas.docentes.estado_civil_id_estado_civil= '$estado_civil2' where notas.docentes.id = '$iddocente' ");
    

 ?>