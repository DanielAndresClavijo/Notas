<?php 

    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Conexion a la base de datos
    //Declaracion de variables
    if($_POST){//valida si se ha enviado algo por el metodo post
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $pass = md5($_POST['contrasenna']);
    $programa = md5($_POST['programa']);
    //LLaves foraneas
    $tipoDocumento = $_POST['tipo_documento'];
    $estado_civil = $_POST['estado_civil'];
    $ciudad = $_POST['ciudad'];
    $dup=false;//Duplicacion de documento, False = No duplicado, True = Duplicado
    //Opciones de rango para el documento de identificacion
    $options = array(
        'options' => array( 'min_range' => 1000000,
                            'max_range' => 1999999999));
    // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
    //Consulta para los documentos de identidad del estudiante
    $estudiantes = $mysql->efectuarConsulta("SELECT notas.estudiantes.documento_de_identificacion FROM notas.estudiantes");
    //Recorre los documentos de identificacion de los estudiantes
    while($resultado = mysqli_fetch_assoc($estudiantes)){
        //Valida si el documento ingresado coincide con alguno ya creado
        if($documento===$resultado['documento_de_identificacion']){
            $dup=true;//Documento duplicado
        }
    }
    //Valida si la cedula esta duplicada
    if($dup===false){
        //Valida si hay algun campo vacio o sin seleccionar
        if(empty($documento) || empty($nombre) || empty($apellido) || empty($pass) || empty($tipoDocumento) || empty($estado_civil) || empty($ciudad) || empty($programa) || empty($programa)){
            echo 'Hay campos vacios o sin seleccionar';
        }else{
            //Valida si el documento es un numero entero y si esta en el rango apropiado
            if(filter_var($documento, FILTER_VALIDATE_INT, $options) === FALSE) {
                    echo 'Cedula incorrecta';
            }else{
                // Valida el rango del nombre ingresado
                if(strlen($nombre) < 2 || strlen($nombre) > 15){
                    echo 'Nombre incorrecto';                
                }else{
                    // Valida si se ha ingresado el patron de texto ya definido, solo letras y espacios
                    if(!preg_match($patron_texto, $nombre)){
                        echo 'Nombre incorrecto';
                    }else{
                        // Valida el rango del apellid ingresado
                        if(strlen($apellido) < 2 || strlen($apellido) > 15){
                            echo 'Apellido incorrecto';
                        }else{
                            // Valida si se ha ingresado el patron de texto ya definido, solo letras y espacios
                            if(!preg_match($patron_texto, $apellido)){
                                echo 'Apellido incorrecto';
                            }else{                                
                                echo $in = $mysql->ingresoRegistro("insert into notas.estudiantes (notas.estudiantes.documento_de_identificacion, notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.contrasenna, notas.estudiantes.Programas_id_Programas, notas.estudiantes.tipo_documento_id_tipo_documento, notas.estudiantes.estado_civil_id_estado_civil, notas.estudiantes.ciudades_id_ciudad_nacimiento, notas.estudiantes.estado_estudiantes) values(".$documento.", '".$nombre."', '".$apellido."', '".$pass."', ".$programa.", ".$tipoDocumento.", ".$estado_civil.", ".$ciudad.", 0)");
                            }
                        }
                    } 
                        
                }
            }

        }
    }else{//Documento duplicado
        echo 'Documento de identificacion duplicado';
    }
    }else{
        echo 'No se envio nada por post';
    }
 ?>