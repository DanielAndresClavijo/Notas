<?php 

    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Conexion a la base de datos
    //Declaracion de variables
    $documento2 = $_POST['documento2'];
    $nombre2 = $_POST['nombre2'];
    $apellido2 = $_POST['apellido2'];
    $pass2 = md5($_POST['contrasenna2']);
    //LLaves foraneas
    $tipoDocumento2 = $_POST['tipo_documento2'];
    $estado_civil2 = $_POST['estado_civil2'];
    $ciudad2 = $_POST['ciudad2'];
    $dup=false;//Duplicacion de documento, False = No duplicado, True = Duplicado
    //Opciones de rango para el documento de identificacion
    $options = array(
        'options' => array( 'min_range' => 1000000,
                            'max_range' => 1999999999));
    // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
    //Consulta para los documentos de identidad del docente
    $docentes = $mysql->efectuarConsulta("SELECT notas.docentes.numero_de_identificacion FROM notas.docentes");
    //Recorre los documentos de identificacion de los docentes
    while($resultado = mysqli_fetch_assoc($docentes)){
        //Valida si el documento ingresado coincide con alguno ya creado
        if($documento2===$resultado['numero_de_identificacion']){
            $dup=true;//Documento duplicado
        }
    }
    //Valida si la cedula esta duplicada
    if($dup===false){
        //Valida si hay algun campo vacio o sin seleccionar
        if(empty($documento2) || empty($nombre2) || empty($apellido2) || empty($pass2) || empty($tipoDocumento2) || empty($estado_civil2) || empty($ciudad2)){
            echo 'Hay campos vacios o sin seleccionar';
        }else{
            //Valida si el documento es un numero entero y si esta en el rango apropiado
            if(filter_var($documento2, FILTER_VALIDATE_INT, $options) === FALSE) {
                    echo 'Cedula incorrecta';
            }else{
                // Valida el rango del nombre ingresado
                if(strlen($nombre2) < 2 || strlen($nombre2) > 15){
                    echo 'Nombre incorrecto';                
                }else{
                    // Valida si se ha ingresado el patron de texto ya definido, solo letras y espacios
                    if(!preg_match($patron_texto, $nombre2)){
                        echo 'Nombre incorrecto';
                    }else{
                        // Valida el rango del apellid ingresado
                        if(strlen($apellido2) < 2 || strlen($apellido2) > 15){
                            echo 'Apellido incorrecto';
                        }else{
                            // Valida si se ha ingresado el patron de texto ya definido, solo letras y espacios
                            if(!preg_match($patron_texto, $apellido2)){
                                echo 'Apellido incorrecto';
                            }else{
                                echo $in2 = $mysql->ingresoRegistro("insert into notas.docentes (notas.docentes.numero_de_identificacion, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.contrasenna,notas.docentes.ciudades_id_ciudad_nacimiento, notas.docentes.tipo_documento_id_tipo_documento, notas.docentes.estado_civil_id_estado_civil) values(".$documento2.",'".$nombre2."','".$apellido2."','".$pass2."',".$ciudad2.",".$tipoDocumento2.",".$estado_civil2.")");
                            }
                        }
                    } 
                        
                }
            }

        }
    }else{//Documento duplicado
        echo 'Documento de identificacion duplicado';
    }
 ?>