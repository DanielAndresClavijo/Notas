<?php
if(  !empty($_POST['docest2']) ){
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    //Variables de la tabla estudiantes 
    $docest2 = $_POST['docest2'];
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos
    $in = $mysql->EditarRegistros("UPDATE notas.estudiantes SET notas.estudiantes.estado_estudiantes=0 where ".$docest2." = notas.estudiantes.documento_de_identificacion");
    //Validacion para saber si el registro se ejecuto correctamente
    if($in){
        echo 'Habilitado <script>header("Location: ../docente.php")</script>';
    }else{
        echo "Erroooooooooooooooooooooooooooooooor ";
        echo 'Hola mundo 000000000';
    }
    $mysql->desconectar();//Desconexion 
}else{
    if(  !empty($_POST['docdoc2']) ){
        require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        //declaracion de variables
        //Variables de la tabla estudiantes 
        $docdoc2 = $_POST['docdoc2'];
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Se conecta a la base de datos
        $in = $mysql->EditarRegistros("UPDATE notas.docentes SET notas.docentes.estado_docentes = 0 where notas.docentes.numero_de_identificacion = ".$docdoc2."");
        //Validacion para saber si el registro se ejecuto correctamente
        if($in){
            echo "Habilitado";
            //header("Location: ../docente.php");
        }else{
            echo "Erroooooooooooooooooooooooooooooooor ";
            echo 'Hola mundo 000000000';
        }
        $mysql->desconectar();//Desconexion 
    }else{
        if(  !empty($_POST['idnot2']) ){
            require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
            //declaracion de variables
            //Variables de la tabla estudiantes 
            $idnot2 = $_POST['idnot2'];
            $mysql = new MySQL(); //se declara un nuevo array
            $mysql->conectar();//Se conecta a la base de datos
            $in = $mysql->EditarRegistros("UPDATE notas.notas SET notas.notas.estado_notas = 0 where notas.notas.id = ".$idnot2."");
            //Validacion para saber si el registro se ejecuto correctamente
            if($in){
                echo "Habilitado";
                //header("Location: ../docente.php");
            }else{
                echo "Erroooooooooooooooooooooooooooooooor ";
                echo 'Hola mundo 000000000';
            }
            $mysql->desconectar();//Desconexion 
        }
    }
}
