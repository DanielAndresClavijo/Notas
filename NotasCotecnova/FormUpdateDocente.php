    <div class="card-body">
        <div id="editar2" class="form-inline md-form mr-auto mb-4" >
            <input name="buscar22" id="buscar22" type="text" class="form-control col-md-8"  placeholder="Ingrese documento a buscar" >
            <span >
                <button name="enviar22" class="btn aqua-gradient btn-rounded btn-sm my-1" type="button" onclick="loadLog2()">Enviar</button>
            </span>
        </div>
        <script>
            function loadLog2() {
                var buscar22= document.getElementById('buscar22').value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                    if (xhttp.readyState == 4 && xhttp.status == 200){
                        document.getElementById("editar2").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                    }
                };
                xhttp.open("POST", "FormUpdateDocente.php", true);//Realiza la petición de apertura de comunicación con método POST.
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                xhttp.send("buscar22="+buscar22+"");//Envia la peticion al servidor
            }
        </script>                                      
    </div>
    <?php
        require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        $id = $_POST['buscar22'];
        $cont=0;$cont2=0;//Contador para saber si no hay registro
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Conexion a la base de datos
        //Select para hacer la consulta de los docentes, para mostrar la info en la grid de docentes
        $docentes = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.numero_de_identificacion,notas.tipo_documento.tipo_documento, notas.tipo_documento.id_tipo_documento,notas.estado_civil.estado_civil, notas.estado_civil.id_estado_civil, notas.ciudades.ciudad_nacimiento, notas.ciudades.id_ciudad_nacimiento,notas.docentes.contrasenna FROM notas.docentes inner join notas.tipo_documento on notas.docentes.tipo_documento_id_tipo_documento=notas.tipo_documento.id_tipo_documento inner join notas.estado_civil on notas.docentes.estado_civil_id_estado_civil=notas.estado_civil.id_estado_civil inner join notas.ciudades on notas.docentes.ciudades_id_ciudad_nacimiento=notas.ciudades.id_ciudad_nacimiento where notas.docentes.numero_de_identificacion = ".$id."" );
        $docentes_id = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.numero_de_identificacion FROM notas.docentes");
//Select para hacer la consulta de los estudiantes, para mostrar la info en la grid de estudiantes
        $estudiantes = $mysql->efectuarConsulta("SELECT notas.estudiantes.id, notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.documento_de_identificacion, notas.programas.Programa_nombre FROM notas.estudiantes INNER JOIN notas.programas ON notas.programas.id_Programas=notas.estudiantes.Programas_id_Programas");
        $estudiantes_id = $mysql->efectuarConsulta("SELECT notas.estudiantes.id, notas.estudiantes.documento_de_identificacion FROM notas.estudiantes ");
//Select para hacer la consulta de los notas, para mostrar la info en la grid de notas
        $notas = $mysql->efectuarConsulta("SELECT notas.estudiantes.nombres AS nombreE, notas.estudiantes.apellidos AS apellidoE, notas.docentes.nombres AS nombreD, notas.docentes.apellidos AS apellidoD, notas.notas.nota1, notas.notas.nota2, notas.notas.nota3, notas.notas.nota_final, notas.notas.fecha_hora_actualizacion FROM notas.notas INNER JOIN notas.estudiantes ON notas.notas.estudiantes_id=notas.estudiantes.id INNER JOIN notas.docentes ON notas.notas.docentes_id=notas.docentes.id");
//Select para hacer la consulta de las ciudades, para mostrar la info en los selects de los formularios
        $selectCiudades = $mysql->efectuarConsulta("SELECT notas.ciudades.id_ciudad_nacimiento, notas.ciudades.ciudad_nacimiento FROM notas.ciudades");
//Select para hacer la consulta de las ciudades, para mostrar la info en los selects de los formularios
        $selectCiudades2 = $mysql->efectuarConsulta("SELECT notas.ciudades.id_ciudad_nacimiento, notas.ciudades.ciudad_nacimiento FROM notas.ciudades");
//Select para hacer la consulta de los Departamentos, para mostrar la info en los selects de los formularios
        $selectDepartamentos = $mysql->efectuarConsulta("SELECT notas.departamentos.id_departamento_nacimiento, notas.departamentos.departamento_nacimiento FROM notas.departamentos");
//Select para hacer la consulta del Estado Civil para los estudiantes, para mostrar la info en los selects de los formularios
        $selectEstadoCivil = $mysql->efectuarConsulta("SELECT notas.estado_civil.id_estado_civil, notas.estado_civil.estado_civil FROM notas.estado_civil");
//Select para hacer la consulta del Estado Civil ára los docentes, para mostrar la info en los selects de los formularios
        $selectEstadoCivil2 = $mysql->efectuarConsulta("SELECT notas.estado_civil.id_estado_civil, notas.estado_civil.estado_civil FROM notas.estado_civil");
//Select para hacer la consulta del Tipo de Documento para los estudiantes, para mostrar la info en los selects de los formularios
        $selectTipoDocumento = $mysql->efectuarConsulta("SELECT notas.tipo_documento.id_tipo_documento, notas.tipo_documento.tipo_documento FROM notas.tipo_documento");
//Select para hacer la consulta del Tipo de Documento para los docentes, para mostrar la info en los selects de los formularios
        $selectTipoDocumento2 = $mysql->efectuarConsulta("SELECT notas.tipo_documento.id_tipo_documento, notas.tipo_documento.tipo_documento FROM notas.tipo_documento");
//Select para hacer la consulta de los Programas, para mostrar la info en los selects de los formularios
        $selectPrograma = $mysql->efectuarConsulta("SELECT notas.programas.id_Programas, notas.programas.Programa_nombre FROM notas.programas");


        $mysql->desconectar();//desconexion de la conexion con elo servidor
    ?>
    <div class="content" id="content3" >
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Orders -->
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                           
    <?php
    if( !empty($_POST['buscar22'])){
    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($docentes_id)){
            if($_POST['buscar22']== $resultado['numero_de_identificacion']){
                while($resultado = mysqli_fetch_assoc($docentes)){
                    $tipo_documento_d=$resultado['tipo_documento'];
                    $id_tipo_documento_d=$resultado['id_tipo_documento'];
                    $documento_d=$resultado['numero_de_identificacion'];
                    $nombre_d=$resultado['nombres'];
                    $apellido_d=$resultado['apellidos'];
                    $estado_d=$resultado['estado_civil'];
                    $id_estado_d=$resultado['id_estado_civil'];
                    $ciudad_d=$resultado['ciudad_nacimiento'];
                    $id_ciudad_d=$resultado['id_ciudad_nacimiento'];
                    $contra_d=$resultado['contrasenna'];
                }
    ?>
    <h1>Editar Docente</h1>
    <div class="card-body">
        <form class="form-inline" action="controlador/Update.php" method="POST">
            <div class="form-group">
                <label>Tipo de Documento</label>
                <select name="tipo_documento2" class="form-control" id="tipo_documento2">
                    <option selected value="<?php echo $id_tipo_documento_d ?>"><?php echo $tipo_documento_d ?></option>
                    <?php 
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectTipoDocumento2)){
                    ?>
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <option value="<?php echo $resultado['id_tipo_documento'] ?>"><?php echo $resultado['tipo_documento'] ?></option>
            <?php   }   ?>
                </select>
            </div>
           
            <div class="form-group">
                <label>Numero de documento</label>
                <input type="text" class="form-control" id="documento2" name="documento2" value="<?php echo $documento_d ?>" placeholder="Ingrese Numero de identidad">
            </div>
            <div class="form-group">
                <label>Nombres</label>
                <input type="text" class="form-control" id="nombre2" name="nombre2" value="<?php echo $nombre_d ?>" placeholder="Ingrese nombre o  nombres">
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $apellido_d ?>" placeholder="Ingrese apellido o apellidos">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Estado Civil</label>
                <select name="estado_civil2" class="form-control" id="estado_civil2" data-live-search="true" >
                    <option value="<?php echo $id_estado_d ?>" selected ><?php echo $estado_d?> </option>
                    <?php
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectEstadoCivil)){
                    ?>
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <option value="<?php echo $id_estado_d ?>" ><?php echo $estado_d ?></option>
            <?php   }   ?>
                </select>
            </div>
         
            <div class="form-group">
                <label>Ciudad de nacimiento</label>
                <select name="ciudad2" class="form-control" id="ciudad2" data-live-search="true" >
                    <option value="<?php echo $id_ciudad_d ?>"  selected ><?php echo $ciudad_d ?> </option>
                    <?php
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectCiudades)){
                    ?>
               
            <?php   }   ?>
                </select>
            </div>  
                                             
            <div class="form-group">
                <label>Contraseña de estudiante</label>
                <input type="password" class="form-control" id="contrasenna2" name="contrasenna2" value="<?php echo $contra_d ?>" placeholder="Ingrese una contraseña para el estudiante">
            </div>
            <div class="form-group">
                <button type="submit" id="enviar2" name="enviar2" value="<?php echo $_POST['buscar22'];?>" class="btn btn-primary">Submit</button>
            </div>
        </form>                                    
    </div>
    <?php   }else{
                $cont=$cont+1;
            }  
            $cont2=$cont2+1;  
        }
    }if($cont==$cont2){
        echo 'No hay registros';
    }?>