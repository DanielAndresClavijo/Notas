<?php
header('Content-Type: application/json');
require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos

$mysql = new MySQL(); //se declara un nuevo array
$mysql->conectar();//Se conecta a la base de datos

$Notas = $mysql->efectuarConsulta("SELECT notas.notas.nota_final, notas.estudiantes.nombres FROM notas.notas INNER JOIN notas.estudiantes ON notas.notas.estudiantes_id=notas.estudiantes.id GROUP by notas.estudiantes.nombres");

$data2 = array();
foreach ($Notas as $row2) {
        $data2[] = $row2;
}

$mysql->desconectar();//Desconexion

echo json_encode($data2);
//echo json_encode($data2);
