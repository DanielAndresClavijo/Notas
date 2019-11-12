<?php
if(  !empty($_POST['docest']) ){
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    //Variables de la tabla estudiantes 
    $docest = $_POST['docest'];
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos
    $in = $mysql->EditarRegistros("UPDATE notas.estudiantes SET notas.estudiantes.estado_estudiantes=1 where ".$docest." = notas.estudiantes.documento_de_identificacion");
    //Validacion para saber si el registro se ejecuto correctamente
    if($in){
        echo "Inhabilitado";
        //header("Location: ../docente.php");
    }else{
        echo "Erroooooooooooooooooooooooooooooooor ";
        echo 'Hola mundo 000000000';
    }
    $mysql->desconectar();//Desconexion 
}else{
    if(  !empty($_POST['docdoc']) ){
        require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        //declaracion de variables
        //Variables de la tabla estudiantes 
        $dodoc = $_POST['docdoc'];
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Se conecta a la base de datos
        $in = $mysql->EditarRegistros("UPDATE notas.docentes SET notas.docentes.estado_docentes = 1 where notas.docentes.numero_de_identificacion = ".$dodoc."");
        //Validacion para saber si el registro se ejecuto correctamente
        if($in){
            echo "Inhabilitado";
            //header("Location: ../docente.php");
        }else{
            echo "Erroooooooooooooooooooooooooooooooor ";
            echo 'Hola mundo 000000000';
        }
        $mysql->desconectar();//Desconexion 
    }
}
