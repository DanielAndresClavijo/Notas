<?php

//Estudiantes
if( isset($_POST['enviar1']) && !empty($_POST['tipo_documento1']) && !empty($_POST['estado_civil1']) && !empty($_POST['ciudad1']) && !empty($_POST['programa1']) && !empty($_POST['documento1']) && !empty($_POST['nombre1']) && !empty($_POST['apellido1']) && !empty($_POST['contrasenna1'])){
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    //Variables de la tabla estudiantes    
    $documento1 = $_POST['documento1'];
    $nombre1 = $_POST['nombre1'];
    $apellido1 = $_POST['apellido1'];
    $pass1 = md5($_POST['contrasenna1']);
    $enviar1 = $_POST['enviar1'];
    //LLaves foraneas
    $tipoDocumento1 = $_POST['tipo_documento1'];
    $estado_civil1 = $_POST['estado_civil1'];
    $ciudad1 = $_POST['ciudad1'];
    $programa1 = $_POST['programa1'];

    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos
    
    //Variable para llamar el ingreso de usuario y entregarle el insert    
    $in = $mysql->EditarRegistros("UPDATE notas.estudiantes SET notas.estudiantes.documento_de_identificacion =".$documento1.",notas.estudiantes.nombres='".$nombre1."',notas.estudiantes.apellidos='".$apellido1."',notas.estudiantes.contrasenna='".$pass1."',notas.estudiantes.ciudades_id_ciudad_nacimiento=".$ciudad1.",notas.estudiantes.Programas_id_Programas=".$programa1.",notas.estudiantes.tipo_documento_id_tipo_documento=".$tipoDocumento1.",notas.estudiantes.estado_civil_id_estado_civil=".$estado_civil1." where ".$enviar1." = notas.estudiantes.documento_de_identificacion");
    
    //Validacion para saber si el registro se ejecuto correctamente
    if($in){
        echo "<script>alert('Datos registrados');
        location.href = '../docente.php';
        </script>";
        //header("Location: ../docente.php");
    }else{
        echo "Erroooooooooooooooooooooooooooooooor ";
        echo 'Hola mundo 000000000';
    }
    $mysql->desconectar();//Desconexion 
}else{
    //Docentes
    if( isset($_POST['enviar2']) && !empty($_POST['tipo_documento2']) && !empty($_POST['estado_civil2']) && !empty($_POST['ciudad2']) && !empty($_POST['documento2']) && !empty($_POST['nombre2']) && !empty($_POST['apellido2']) && !empty($_POST['contrasenna2'])){
        require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        //declaracion de variables
        //Variables de la tabla estudiantes
        //
        $documento2 = $_POST['documento2'];
        $nombre2 = $_POST['nombre2'];
        $apellido2 = $_POST['apellido2'];
        $pass2 = md5($_POST['contrasenna2']);
        $enviar2 = $_POST['enviar2'];
        //LLaves foraneas
        $tipoDocumento2 = $_POST['tipo_documento2'];
        $estado_civil2 = $_POST['estado_civil2'];
        $ciudad2 = $_POST['ciudad2'];

        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Se conecta a la base de datos

        //Variable para llamar el ingreso de usuario y entregarle el insert
        $in2 = $mysql->EditarRegistros("UPDATE notas.docentes SET notas.docentes.numero_de_identificacion =".$documento2.",notas.docentes.nombres='".$nombre2."',notas.docentes.apellidos='".$apellido2."',notas.docentes.contrasenna='".$pass2."',notas.docentes.ciudades_id_ciudad_nacimiento=".$ciudad2.",notas.docentes.tipo_documento_id_tipo_documento=".$tipoDocumento2.",notas.docentes.estado_civil_id_estado_civil=".$estado_civil2." where notas.docentes.numero_de_identificacion = ".$enviar2." ");
        
        //Validacion para saber si el registro se ejecuto correctamente
        if($in2){
            echo "<script>alert('Datos registrados');
            location.href = '../docente.php';
            </script>";
            //header("Location: ../docente.php");
        }else{
            echo "Erroooooooooooooooooooooooooooooooor";
            echo 'Hola mundo 11111111';
        }
        $mysql->desconectar();//Desconexion 
    }else{
        //Notas
        if( isset($_POST['enviar3']) && !empty($_POST['fechanota']) && !empty($_POST['nota1']) && !empty($_POST['nota2']) && !empty($_POST['nota3']) && !empty($_POST['documento21']) && !empty($_POST['documento11'])){
            require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
            //declaracion de variables
            //Variables de la tabla estudiantes 
            $fechanota = $_POST['fechanota'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];
            $notafinal = ($nota1*0.35) + ($nota2*0.35) + ($nota3*0.30);
            //LLaves foraneas               
            $documento21 = $_POST['documento21'];
            $documento11 = $_POST['documento11'];
            

            $mysql = new MySQL(); //se declara un nuevo array
            $mysql->conectar();//Se conecta a la base de datos
            //select notas.docentes.id, notas.docentes.nombres From notas.docentes inner join notas.notas on notas.docentes.id = notas.notas.docentes_id where notas.docentes.numero_de_identificacion = 55555
            //$id_documento21 = $mysql->efectuarConsulta("select notas.docentes.id From notas.docentes inner join notas.notas on notas.docentes.id = notas.notas.docentes_id ");
            //$id_documento21 = $mysql->efectuarConsulta("");
            
            //Variable para llamar el ingreso de usuario y entregarle el insert
            $in = $mysql->EditarRegistros("insert into notas.notas (notas.notas.fecha_hora_actualizacion, notas.notas.nota1, notas.notas.nota2, notas.notas.nota3,notas.notas.nota_final, notas.notas.docentes_id, notas.notas.estudiantes_id) values('".$fechanota."',".$nota1.",".$nota2.",".$nota3.",".$notafinal.",".$documento21.",".$documento11.")");
            
            //Validacion para saber si el registro se ejecuto correctamente
            if($in){
                echo "<script>alert('Datos registrados');
                location.href = '../docente.php';
                </script>";
                //header("Location: ../docente.php");
            }else{
                echo "Erroooooooooooooooooooooooooooooooor";
                echo 'Hola mundo 222222';
            }
            $mysql->desconectar();//Desconexion 
        }else{
            echo "<script>alert('Faltan campos por ingresar');
        location.href = '../docente.php';
        </script>";
        }
        
    }    
}
