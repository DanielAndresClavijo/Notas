//Funcion de creacion de nuevo registro
//Esta funcion recibe como parametros los datos ingresados en el formulario de creacion de docente
function agregardatos2 (tipo_documento,documento,nombre,apellido,ciudad,estado_civil, programa,contrasenna){
    //Se crea una variable para enviarla como data por ajax
    cadena="tipo_documento=" + tipo_documento + 
            "&documento=" + documento +
            "&nombre=" + nombre +
            "&apellido=" + apellido+
            "&estado_civil=" + estado_civil+
            "&ciudad=" + ciudad+
            "&programa=" + programa+
            "&contrasenna=" + contrasenna;
    //Este ajax envia la cadena a un archivo php
    //EN el archivo php se encuentra el proceso de validar y crear los datos
    //En ese archivo php retorna un valor
    $.ajax({
        type:"POST",
        url:"estudiante/controlador/agregarDatos.php",
        data:cadena,
        success:function(r){//Esta funcion recibe el valor retornado
            if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                $('#tabladoc').load('docente/componentes/tabla.php');//Cargar la tabla donde estan los registros de de docente
                alertify.success("agregado con exito :)");
            }else{
                alertify.error(r);//Se muestra una alerta con el valor retornado, que sera el mensaje de la validacion
            }
        }
    });
}

//Funcion para agregar datos al formulario de actualizacion
//Esta Funcion recibe un parametro, este parametro se entrega en al dar click en actualizar
//Esta funcion se encuentra en la pagina tabla de docente
//Este parametro es un arreglo
function agregaform2(datos){
    //Se define una variable separando el parametro recibido
    d=datos.split('||');
    //Lo siguiente hace que aparezcan los datos en los input del formulario actualizar
    //Entregandole a cada input, por medio de su id, el value de la variable creada anteriormente
    $('#idestudiante').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#apellidou').val(d[2]);
    $('#estado_civilu').val(d[3]);
    $('#ciudadu').val(d[4]);      
    $('#programau').val(d[5]);
}

//Funcion para la Actualizacion de docente
//Esta funcion se encuentra en el formulario de actualizacion
function actualizaDatos2(){
    //Se reciben los valores de los inputs por medio de los id
    idestudiante=$('#idestudiante').val();
    nombreu=$('#nombreu').val();
    apellidou=$('#apellidou').val();
    estado_civilu=$('#estado_civilu').val();
    ciudadu=$('#ciudadu').val();      
    programau=$('#programau').val();
    
    //Se crea una cadena para enviarla por ajax con los valores creados anteriormente
    cadena= "idestudiante=" + idestudiante +
            "&nombreu=" + nombreu +
            "&apellidou=" + apellidou +
            "&estado_civilu=" + estado_civilu +
            "&ciudadu=" + ciudadu +
            "&programau=" + programau;
    //Este ajax envia la cadena a un archivo php
    //EN el archivo php se encuentra el proceso de validar y actualizacion de datos
    //En ese archivo php retorna un valor
    $.ajax({
        type:"POST",
        url:"estudiante/controlador/actualizaDatos.php",
        data:cadena,
        success:function(r){//Esta funcion recibe el valor retornado
            if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                $('#tabladoc').load('estudiante/componentes/tabla.php');//Cargar la tabla donde estan los registros de de docente
                alertify.success("Actualizado con exito :)");
            }else{
                alertify.error("Fallo el servidor :(");//Se muestra una alerta con el valor retornado, que sera el mensaje de la validacion
            }
        }
    });

}

//Esta funciio
function preguntarSiNo2(id, estado_estudiantes){
    if (estado_estudiantes==0) {
        alertify.confirm('Eliminar Estudiante', '¿Esta seguro de eliminar este registro?', 
        function(){ eliminarDatos2(id, estado_estudiantes) }
        ,function(){ alertify.error('Cancelado')});
    }else{
        alertify.confirm('Restaurar Estudiante', '¿Esta seguro de restaurar este registro?', 
        function(){ eliminarDatos2(id, estado_estudiantes) }
        ,function(){ alertify.error('Cancelado')});
    }
	
}

function eliminarDatos2(id, estado_estudiantes){
	cadena="id=" + id +
               "&estado_estudiantes=" + estado_estudiantes;
    if (estado_estudiantes==0) {
        $.ajax({
            type:"POST",
            url:"estudiante/controlador/eliminarDatos.php",
            data:cadena,
            success:function(r){
                    if(r==1){
                            $('#tabladoc').load('estudiante/componentes/tabla.php');//Cargar la tabla donde estan los registros de de docente
                            alertify.success("Se elimino con exito!");
                    }else{
                            alertify.error("Fallo el servidor :(");
                    }
            }
        });
    } else {
        $.ajax({
            type:"POST",
            url:"estudiante/controlador/eliminarDatos.php",
            data:cadena,
            success:function(r){
                    if(r==1){
                            $('#tabladoc').load('estudiante/componentes/tabla2.php');//Cargar la tabla donde estan los registros de de docente
                            alertify.success("Se ha restaurado con exito!");
                    }else{
                            alertify.error("Fallo el servidor :(");
                    }
            }
        });
    } 
} 

function emailinfo(email) {
    cadena= "email=" + email;
    $.ajax({
        type:"POST",
        url:"controlador/enviaremail.php",
        data:cadena,
        success:function(r){
                if(r==1){
                        $('#tabladoc').load('componentes/formemail.php');//Cargar la tabla donde estan los registros de de docente
                        alertify.success("Mensaje enviado!");
                }else{
                        alertify.error("Mensaje no enviado :(");
                }
        }
    });
}