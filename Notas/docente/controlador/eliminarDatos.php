 <?php 
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Se conecta a la base de datos
        $id=$_POST['id'];
        $estado_doc = $_POST['estado_docentes'];
        if($estado_doc!=0){
            echo $in = $mysql->EditarRegistros("UPDATE notas.docentes SET notas.docentes.estado_docentes = 0 where notas.docentes.id = ".$id."");
        }else{
            echo $in = $mysql->EditarRegistros("UPDATE notas.docentes SET notas.docentes.estado_docentes = 1 where notas.docentes.id = ".$id."");
        }
        

 ?>