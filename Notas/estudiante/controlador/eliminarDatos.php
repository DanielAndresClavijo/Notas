 <?php 
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Se conecta a la base de datos
        $id=$_POST['id'];
        $estado_est = $_POST['estado_estudiantes'];
        if($estado_est!=0){
            echo $in = $mysql->EditarRegistros("UPDATE notas.estudiantes SET notas.estudiantes.estado_estudiantes = 0 where notas.estudiantes.id = ".$id."");
        }else{
            echo $in = $mysql->EditarRegistros("UPDATE notas.estudiantes SET notas.estudiantes.estado_estudiantes = 1 where notas.estudiantes.id = ".$id."");
        }
        

 ?>