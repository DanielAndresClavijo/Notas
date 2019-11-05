<?php

//Estudiantes
if( !empty($_POST['tipo_documento1']) && !empty($_POST['estado_civil1']) && !empty($_POST['ciudad1']) && !empty($_POST['programa1']) && !empty($_POST['documento1']) && !empty($_POST['nombre1']) && !empty($_POST['apellido1']) && !empty($_POST['contrasenna1'])){
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    //Variables de la tabla estudiantes    
    $documento1 = $_POST['documento1'];
    $nombre1 = $_POST['nombre1'];
    $apellido1 = $_POST['apellido1'];
    $pass1 = md5($_POST['contrasenna1']);
    //LLaves foraneas
    $tipoDocumento1 = $_POST['tipo_documento1'];
    $estado_civil1 = $_POST['estado_civil1'];
    $ciudad1 = $_POST['ciudad1'];
    $programa1 = $_POST['programa1'];

    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Se conecta a la base de datos
    $estudiantes = $mysql->efectuarConsulta("SELECT notas.estudiantes.id, notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.documento_de_identificacion, notas.programas.Programa_nombre FROM notas.estudiantes INNER JOIN notas.programas ON notas.programas.id_Programas=notas.estudiantes.Programas_id_Programas");
    $cont=0;
    while ($consulta= mysqli_fetch_assoc($estudiantes)){
        if($consulta['documento_de_identificacion']==$documento1){
            $cont = 1;
        }
    }
    if($cont==0){
        //Variable para llamar el ingreso de usuario y entregarle el insert
        $in = $mysql->ingresoRegistro("insert into notas.estudiantes (notas.estudiantes.documento_de_identificacion, notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.contrasenna,notas.estudiantes.Programas_id_Programas, notas.estudiantes.tipo_documento_id_tipo_documento, notas.estudiantes.estado_civil_id_estado_civil, notas.estudiantes.ciudades_id_ciudad_nacimiento) values(".$documento1.",'".$nombre1."','".$apellido1."','".$pass1."',".$programa1.",".$tipoDocumento1.",".$estado_civil1.",".$ciudad1.")");

        //Validacion para saber si el registro se ejecuto correctamente
        if($in){
            echo '<button type="button" class="btn btn-primary"><a class="nav-link" href="docente.php">Subir Cambios</a></button>';
            //header("Location: ../docente.php");
        }else{
            echo "Erroooooooooooooooooooooooooooooooor";
        }
        $mysql->desconectar();//Desconexion 
    }else{
        $url='tu/url';
echo '<meta http-equiv=refresh content="1; '.$url.'">';die('<script type="text/javascript">window.location=\''.$url.'\';</script‌​>');
    }                                      
        
}else{
    //Docentes
    if( !empty($_POST['tipo_documento2']) && !empty($_POST['estado_civil2']) && !empty($_POST['ciudad2']) && !empty($_POST['documento2']) && !empty($_POST['nombre2']) && !empty($_POST['apellido2']) && !empty($_POST['contrasenna2'])){
        require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        //declaracion de variables
        //Variables de la tabla estudiantes    
        $documento2 = $_POST['documento2'];
        $nombre2 = $_POST['nombre2'];
        $apellido2 = $_POST['apellido2'];
        $pass2 = md5($_POST['contrasenna2']);
        //LLaves foraneas
        $tipoDocumento2 = $_POST['tipo_documento2'];
        $estado_civil2 = $_POST['estado_civil2'];
        $ciudad2 = $_POST['ciudad2'];

        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Se conecta a la base de datos

        //Variable para llamar el ingreso de usuario y entregarle el insert
        $in2 = $mysql->ingresoRegistro("insert into notas.docentes (notas.docentes.numero_de_identificacion, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.contrasenna,notas.docentes.ciudades_id_ciudad_nacimiento, notas.docentes.tipo_documento_id_tipo_documento, notas.docentes.estado_civil_id_estado_civil) values(".$documento2.",'".$nombre2."','".$apellido2."','".$pass2."',".$ciudad2.",".$tipoDocumento2.",".$estado_civil2.")");

        //Validacion para saber si el registro se ejecuto correctamente
        if($in2){
            echo "<script>alert('Datos registrados');
            location.href = '../docente.php';
            </script>";
            //header("Location: ../docente.php");
        }else{
            echo "Erroooooooooooooooooooooooooooooooor";
        }
        $mysql->desconectar();//Desconexion 
    }else{
        
//******************************************************************************* Notas ***************************************************************************
        if(!empty($_POST['fechanota']) && !empty($_POST['documento21']) && !empty($_POST['documento11'])){
            require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
            //declaracion de variables
            //Variables de la tabla estudiantes 
            $fechanota = $_POST['fechanota'];
            //Verificacion por si alguna nota fue ingresada
            //Esta verificacion lo que hace s que verifica si alguna de las notas han sido ingresadas, 
            //para definir la variable de la nota como 0 si no se ingreso ninguna nota
            
            if(empty($_POST['nota1'])){//Verificacion par la nota 1
                $nota1=0;
            }else{
                $nota1 = $_POST['nota1'];
            }
            
            if(empty($_POST['nota2'])){//Verificacion par la nota 1
                $nota2=0;
            }else{
                $nota2 = $_POST['nota2'];
            }
            
            if(empty($_POST['nota3'])){//Verificacion par la nota 1
                $nota3=0;
            }else{
                $nota3 = $_POST['nota3'];
            }
            
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
            $in = $mysql->ingresoRegistro("insert into notas.notas (notas.notas.fecha_hora_actualizacion, notas.notas.nota1, notas.notas.nota2, notas.notas.nota3,notas.notas.nota_final, notas.notas.docentes_id, notas.notas.estudiantes_id) values('".$fechanota."',".$nota1.",".$nota2.",".$nota3.",".$notafinal.",".$documento21.",".$documento11.")");

            //Validacion para saber si el registro se ejecuto correctamente
            if($in){
                echo "<script>alert('Datos registrados');
                location.href = '../docente.php';
                </script>";
                //header("Location: ../docente.php");
            }else{
                echo "Erroooooooooooooooooooooooooooooooor";
            }
            $mysql->desconectar();//Desconexion 
        }else{
            echo "<script>alert('Faltan campos por ingresar');
        location.href = '../docente.php';
        </script>";
        }
        
    }    
}
