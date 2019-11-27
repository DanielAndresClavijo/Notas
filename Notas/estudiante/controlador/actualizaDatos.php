<?php 
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos
    //declaracion de variables
    //Variables de la tabla docentes
    $idestudiante = $_POST['idestudiante'];
    $nombreu = $_POST['nombreu'];
    $apellidou = $_POST['apellidou'];
    //LLaves foraneas
    $estado_civilu = $_POST['estado_civilu'];
    $ciudadu = $_POST['ciudadu'];
    $programau = $_POST['programau'];

    //Variable para llamar el ingreso de usuario y entregarle el insert
    echo $up = $mysql->EditarRegistros("UPDATE notas.estudiantes SET notas.estudiantes.nombres='".$nombreu."',notas.estudiantes.apellidos='".$apellidou."',notas.estudiantes.ciudades_id_ciudad_nacimiento=".$ciudadu.",notas.estudiantes.Programas_id_Programas=".$programau.",notas.estudiantes.estado_civil_id_estado_civil=".$estado_civilu." where notas.estudiantes.id = ".$idestudiante."");
    

 ?>