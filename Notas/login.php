<?php
session_start();//Inicio de sesion
if(isset($_POST['cerrar_session'])){//Se valida si existe la varible de cerrar sesion, esta se envia cuando se cierra sesion en algun perfil abierto
    session_unset();//libera todas las variables de sesión actualmente registradas
    session_destroy();//Destruye toda la información registrada de la sesión
}
if(isset($_SESSION['rol'])){//Valida si existe la variable de sesion rol, esta variable es la que define si es un docente o un estudiante
    if($_SESSION['rol']==1){//Validacion para saber si el rol es docente
//        echo $_SESSION['rol'].'<br>';
    header('location: docente.php');//Se redirecciona a docente.php
    }else{
        if($_SESSION['rol']==2){//Validacion para salber si el rol es estudiante
    //        echo $_SESSION['rol'];
        header('location: estudiante.php');//Se redirecciona a docente.php
        } 
    } 
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Notas COTECNOVA">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Icono de la pagina-->
    <link rel="apple-touch-icon" href="images/icon.png">
    <link rel="shortcut icon" href="images/icon.png">
<!-- CSS de la pagina-->
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
     <link rel="stylesheet" href="librerias/propia/css/style.css">
     <style type="txt/css">    
        form select {
            
        }        
     </style>
</head>

<body>
    <div class="wrapper">
	<div class="container">
            <img src="images/logo.png" width="300" height="50" alt="logo"/>
            <h1>INICIO DE SESION</h1> 
            <form action='#' method="POST">
                    <input placeholder="Numero de Documento" name='txtcc' required>
                    <input type="password" placeholder="Contraseña" name='txtpass' required><br>
                    <select name="tipousuario" style="color: #ffffff; outline: 0;border: 1px solid rgba(255, 255, 255, 0.4);background-color: rgba(255, 255, 255, 0.2);width: 250px;border-radius: 3px;padding: 10px 15px;margin: 0 auto 10px auto;display: block;text-align: center;font-size: 18px;-webkit-transition-duration: 0.25s;transition-duration: 0.25s;font-weight: 300;">
                        <option value="0" selected disabled >Seleccione un usuario</option>
                        <option value="1" style="color:#000000;">Docente</option>
                        <option value="2" style="color:#000000;">Estudiante</option>
                    </select><br>
                    <br><br>
                    <button type="submit" name="login">Entrar</button>
            </form> 
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src="librerias/jquery/jquery-3.3.1.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>    
    <script src="librerias/alertifyjs/js/alertify.js"></script>
    <script src="librerias/propia/js/index.js"></script>
</body>
</html>
<?php
if(isset($_POST['login'])){
    if(isset($_POST['txtcc']) && !empty($_POST['txtcc']) && isset($_POST['txtpass']) && !empty($_POST['txtpass']) && isset($_POST['tipousuario']) && $_POST['tipousuario']!='0'){
        require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        //declaracion de variables
        $documento = $_POST['txtcc'];
        $pass = md5($_POST['txtpass']);
        $tipouser= $_POST['tipousuario'];

        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();

        if ($tipouser == 1){
            $usuarios = $mysql->efectuarConsulta("SELECT notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.estado_docentes  FROM notas.docentes WHERE notas.docentes.numero_de_identificacion=".$documento." AND notas.docentes.contrasenna='".$pass."' AND notas.docentes.estado_docentes = 0");
        }else{
            $usuarios = $mysql->efectuarConsulta("SELECT notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.estado_estudiantes  FROM notas.estudiantes WHERE notas.estudiantes.documento_de_identificacion=".$documento." AND notas.estudiantes.contrasenna='".$pass."'  AND notas.estudiantes.estado_estudiantes = 0");   
        }
        $mysql->desconectar();
        
        if (mysqli_num_rows($usuarios) > 0){ 
            while ($resultado= mysqli_fetch_assoc($usuarios)){
                $nombre= $resultado["nombres"];
                $apellido= $resultado["apellidos"];
            }
            if ($tipouser == 1){
                $_SESSION['rol']=1;
                $_SESSION['nombre']=$nombre.' '.$apellido;
                header("Location: docente.php");
            }else{
                $_SESSION['rol']=2;
                $_SESSION['nombre']=$nombre.' '.$apellido;
                header("Location: estudiante.php");
            }
        }else{
                echo '<script>'
            . 'alertify.error("Usuario no encontrado");'
            . '</script>';
            //header("Location: ../login.html"); 
        }
    }else{
        if(isset($_POST['txtcc']) && empty($_POST['txtcc']) ){
            echo '<script>'
            . 'alertify.error("No ha ingresado la cedula");'
            . '</script>';
        }else{
            if(isset($_POST['txtpass']) && empty($_POST['txtpass']) ){
                echo '<script>'
                . 'alertify.error("No ha ingresado la contraseña");'
                . '</script>';
            }else{
                echo '<script>'
                . 'alertify.error("Usuario no seleccionado");'
                . '</script>';
            }
        }
        
    }
}
    
?>
