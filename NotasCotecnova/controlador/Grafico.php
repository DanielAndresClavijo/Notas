<?php
header('Content-Type: application/json');
require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos

$mysql = new MySQL(); //se declara un nuevo array
$mysql->conectar();//Se conecta a la base de datos

$estudiantes3 = $mysql->efectuarConsulta("SELECT COUNT(notas.estudiantes.Programas_id_Programas) as Cantidad, notas.programas.Programa_nombre FROM notas.estudiantes inner join notas.programas on notas.estudiantes.Programas_id_Programas = notas.programas.id_Programas GROUP by notas.estudiantes.Programas_id_Programas");


$data = array();
foreach ($estudiantes3 as $row) {
        $data[] = $row;
}


$mysql->desconectar();//Desconexion

echo json_encode($data);
//echo json_encode($data2);
