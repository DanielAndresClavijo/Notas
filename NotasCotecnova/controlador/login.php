<?php
if(isset($_POST['txtcc']) && !empty($_POST['txtcc']) && isset($_POST['txtpass']) && !empty($_POST['txtpass'])){

    

    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    $documento = $_POST['txtcc'];
    $pass = md5($_POST['txtpass']);
    $tipouser= $_POST['tipousuario'];
    
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    
    if ($tipouser == 1){
    //consulta donde hace la comparacion de lo que el usuario ingresa con lo almacenado en la base de datos
    $usuarios = $mysql->efectuarConsulta("SELECT notas.docentes.nombres, notas.docentes.apellidos  FROM notas.docentes WHERE notas.docentes.numero_de_identificacion=".$documento." AND notas.docentes.contrasenna='".$pass."'");
    //echo "SELECT docentes.nombres, docentes.apellidos  FROM docentes WHERE docentes.numero_de_identificacion=".$documento." AND docentes.contrasenna='".$pass."'";
    
    
    
    }
    else{
     $usuarios = $mysql->efectuarConsulta("SELECT notas.estudiantes.nombres, notas.estudiantes.apellidos  FROM notas.estudiantes WHERE notas.estudiantes.documento_de_identificacion=".$documento." AND notas.estudiantes.contrasenna='".$pass."'");   
    
     //echo "SELECT docentes.nombres, docentes.apellidos  FROM docentes WHERE docentes.numero_de_identificacion=".$documento." AND docentes.contrasenna='".$pass."'";
    }
    $mysql->desconectar();
}

if (mysqli_num_rows($usuarios) > 0){
     
     //require_once '../Modelo/usuarios.php';
       //$mysql->conectar();
        //session_start();

       // $usuario = new Usuario();
        
 while ($resultado= mysqli_fetch_assoc($usuarios)){
       $nombre= $resultado["nombres"];
    $apellido= $resultado["apellidos"];
   // $id=  $resultado[""];
    
             //$usuario->setNombres($nombre);
             //$usuario->setApellidos($apellido);
             //$usuario->setId($id);
       }

       // $_SESSION['usuario'] = $usuario;
        //$_SESSION['acceso'] = true;
         if ($tipouser == 1){
       header("Location: ../docente.php");
         }
         else{
          header("Location: ../estudiante.php");
         }

        
   }
   else{
    header("Location: ../login.html"); 

    }
?>