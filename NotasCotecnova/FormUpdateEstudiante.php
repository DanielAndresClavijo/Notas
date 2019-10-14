    <div class="card-body">
        <div id="editar1" class="form-inline md-form mr-auto mb-4" > 
            <input name="buscar12" id="buscar12" type="text" class="form-control col-md-8"  placeholder="Ingrese documento a buscar" >
            <span >
                <button name="enviar12" class="btn aqua-gradient btn-rounded btn-sm my-1" type="button" onclick="loadLog1()">Enviar</button>
            </span>
        </div>
        <script>
            function loadLog1(){
                var buscar12= document.getElementById('buscar12').value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    //Si 4 = se proceso y ya se recibieron los datos y 200 = se enviaron los datos correctamente
                    if (xhttp.readyState == 4 && xhttp.status == 200){
                        document.getElementById("editar1").innerHTML = xhttp.responseText;//obtener los datos de respuesta como una cadena
                    }
                };
                xhttp.open("POST", "FormUpdateEstudiante.php", true);//Realiza la petición de apertura de comunicación con método POST.
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//Añade un par cabecera – valor a la cabecera HTTP. Necesario para pasar datos por POST.
                xhttp.send("buscar12="+buscar12+"");//Envia la peticion al servidor
            }
        </script>                                     
    </div> 
    <?php
        require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        $id = $_POST['buscar12'];
        
        //ECHO $id;
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Conexion a la base de datos
        $id_estudiantes = $mysql->efectuarConsulta("SELECT notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estado_civil.estado_civil, notas.estado_civil.id_estado_civil, notas.ciudades.ciudad_nacimiento, notas.ciudades.id_ciudad_nacimiento,notas.programas.Programa_nombre, notas.programas.id_Programas, notas.tipo_documento.tipo_documento, notas.tipo_documento.id_tipo_documento, notas.estudiantes.documento_de_identificacion,notas.estudiantes.contrasenna FROM notas.estudiantes inner join notas.estado_civil on notas.estudiantes.estado_civil_id_estado_civil=notas.estado_civil.id_estado_civil inner join notas.ciudades on notas.estudiantes.ciudades_id_ciudad_nacimiento=notas.ciudades.id_ciudad_nacimiento inner join notas.programas on notas.estudiantes.Programas_id_Programas=notas.programas.id_Programas inner join notas.tipo_documento on notas.estudiantes.tipo_documento_id_tipo_documento=notas.tipo_documento.id_tipo_documento where notas.estudiantes.documento_de_identificacion = ".$id."");
     
//Select para hacer la consulta de los docentes, para mostrar la info en la grid de docentes
        $docentes = $mysql->efectuarConsulta("SELECT notas.docentes.id, notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.numero_de_identificacion FROM notas.docentes");
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
        //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($id_estudiantes)){
            $nombre_e=$resultado['nombres'];
            $apellido_e=$resultado['apellidos'];
            $estado_e=$resultado['estado_civil'];
            $id_estado_e=$resultado['id_estado_civil'];
            $ciudad_e=$resultado['ciudad_nacimiento'];
            $id_ciudad_e=$resultado['id_ciudad_nacimiento'];
            $programa_e=$resultado['Programa_nombre'];
            $id_programa_e=$resultado['id_Programas'];
            $tipo_documento_e=$resultado['tipo_documento'];
            $documento_e=$resultado['documento_de_identificacion'];
            $contra_e=$resultado['contrasenna'];
        }
    ?>                   
    <?php 
    if(!empty($_POST['buscar12'])){
    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
        while($resultado = mysqli_fetch_assoc($estudiantes_id)){
            if($_POST['buscar12']== $resultado['documento_de_identificacion']){
    ?>
    <h1>Editar Estudiante</h1>
        <form action="controlador/Update.php" method="POST">
            <div class="form-group">
                <label>Tipo de Documento</label>
               <input type="text" class="form-control" id="formGroupExampleInput2" name="tipo_documento1" value="<?php echo $tipo_documento_e ?>" placeholder="Ingrese tipo de documento">
            </div>
            <div class="form-group">
                <label>Numero de documento</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="documento1" value="<?php echo $documento_e ?>" placeholder="Ingrese Numero de identidad">
            </div>
            <div class="form-group">
                <label>Nombres</label>
               
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="nombre1" value="<?php echo $nombre_e ?>" placeholder="Ingrese nombre o  nombres">
            <?php     ?>
                
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="apellido1" value="<?php echo $apellido_e?>" placeholder="Ingrese apellido o apellidos">
           
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Estado Civil</label>    
                <select name="estado_civil1" class="form-control" id="exampleFormControlSelect1" data-live-search="true" >
                    <option value="<?php echo $id_estado_e ?>" disabled selected ><?php echo $estado_e?></option>
                    <?php 
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectEstadoCivil)){
                    ?>
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <option value="<?php echo $id_estado_e ?>" ><?php echo $estado_e ?></option>
            <?php   }   ?>
                </select>
            </div>
            <div class="form-group">
                <label>Ciudad de nacimiento</label>
                <select name="ciudad1" class="form-control" id="exampleFormControlSelect1" data-live-search="true" >
                    <option value="<?php echo $id_ciudad_e ?>" disabled selected ><?php echo $ciudad_e ?></option>
                    <?php 
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectCiudades)){
                    ?>
                
            <?php   }   ?>
                </select>
            </div>
            <div class="form-group">
                <label>Programa que cursa</label>
                <select name="programa1" class="form-control" id="exampleFormControlSelect1" data-live-search="true" >
                    <option value="<?php echo $id_programa_e?>" disabled selected ><?php echo $programa_e?></option>
                    <?php 
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectPrograma)){
                    ?>
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <option value="<?php echo $id_programa_e ?>" ><?php echo $programa_e ?></option>
            <?php   }   ?>
                </select>
            </div>                                        
            <div class="form-group">
                <label>Contraseña de estudiante</label>
                <input value="<?php echo $contra_e;?>" type="password" class="form-control" id="formGroupExampleInput2" name="contrasenna1" placeholder="Ingrese una contraseña para el estudiante">
            </div>
            <div class="form-group">
                <button type="submit" id="enviar1" name="enviar1" value="<?php echo $_POST['buscar12'];?>" class="btn btn-primary">Submit</button>
            </div>
        </form>   
    
    <?php   }else{
                echo 'Estudiante no encontrado';
            }  
        }
    }?> 
