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
        
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Conexion a la base de datos
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
    ?>
    <h1>Editar Docente</h1>
    <div class="card-body">
        <form action="controlador/Update.php" method="POST">
            <div class="form-group">
                <label>Tipo de Documento</label>
                <select name="tipo_documento2" class="form-control" id="exampleFormControlSelect1" data-live-search="true">
                    <option disabled selected>Seleccione tipo de documento de identidad</option>
                    <?php 
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectTipoDocumento)){
                    ?>
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <option value="<?php echo $resultado['id_tipo_documento'] ?>"><?php echo $resultado['tipo_documento'] ?></option>
            <?php   }   ?>
                </select>
            </div>
            <div class="form-group">
                <label>Numero de documento</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="documento2" placeholder="Ingrese Numero de identidad">
            </div>
            <div class="form-group">
                <label>Nombres</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="nombre2" placeholder="Ingrese nombre o  nombres">
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="apellido2" placeholder="Ingrese apellido o apellidos">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Estado Civil</label>
                <select name="estado_civil2" class="form-control" id="exampleFormControlSelect1" data-live-search="true" >
                    <option disabled selected >Seleccione el estado civil</option>
                    <?php 
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectEstadoCivil)){
                    ?>
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <option value="<?php echo $resultado['id_estado_civil'] ?>" ><?php echo $resultado['estado_civil'] ?></option>
            <?php   }   ?>
                </select>
            </div>
            <div class="form-group">
                <label>Ciudad de nacimiento</label>
                <select name="ciudad2" class="form-control" id="exampleFormControlSelect1" data-live-search="true" >
                    <option disabled selected >Seleccione la ciudad de nacimiento</option>
                    <?php 
                    //Ciclo para recorrer los resultados de la consulta de la variable $selectTipoDocumento
                    while($resultado = mysqli_fetch_assoc($selectCiudades)){
                    ?>
                <!-- En el value y el la opcion de la seleccion se imprimen los resultados de la consulta -->
                    <option value="<?php echo $resultado['id_ciudad_nacimiento'] ?>" ><?php echo $resultado['ciudad_nacimiento'] ?></option>
            <?php   }   ?>
                </select>
            </div>                                      
            <div class="form-group">
                <label>Contraseña de estudiante</label>
                <input type="password" class="form-control" id="formGroupExampleInput2" name="contrasenna2" placeholder="Ingrese una contraseña para el estudiante">
            </div>
            <div class="form-group">
                <button type="submit" id="enviar2" name="enviar2" value="<?php echo $_POST['buscar22'];?>" class="btn btn-primary">Submit</button>
            </div>
        </form>                                    
    </div>
    <?php   }  
        }
    }?> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
