//Funcion de creacion de nuevo registro
//Esta funcion recibe como parametros los datos ingresados en el formulario de creacion de docente
function agregardatos(tipo_documento2,documento2,nombre2,apellido2,ciudad2,estado_civil2,contrasenna2){
    //Se crea una variable para enviarla como data por ajax
    cadena="tipo_documento2=" + tipo_documento2 + 
            "&documento2=" + documento2 +
            "&nombre2=" + nombre2 +
            "&apellido2=" + apellido2+
            "&ciudad2=" + ciudad2+
            "&estado_civil2=" + estado_civil2+
            "&contrasenna2=" + contrasenna2;
    //Este ajax envia la cadena a un archivo php
    //EN el archivo php se encuentra el proceso de validar y crear los datos
    //En ese archivo php retorna un valor
    $.ajax({
        type:"POST",
        url:"docente/controlador/agregarDatos.php",
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
function agregaform(datos){
    //Se define una variable separando el parametro recibido
    d=datos.split('||');
    //Lo siguiente hace que aparezcan los datos en los input del formulario actualizar
    //Entregandole a cada input, por medio de su id, el value de la variable creada anteriormente
    $('#iddocente').val(d[0]);
    $('#nombre2u').val(d[1]);
    $('#apellido2u').val(d[2]);
    $('#estado_civil2u').val(d[3]);
    $('#ciudad2u').val(d[4]);        
}

//Funcion para la Actualizacion de docente
//Esta funcion se encuentra en el formulario de actualizacion
function actualizaDatos(){
    //Se reciben los valores de los inputs por medio de los id
    iddocente=$('#iddocente').val();
    nombre2=$('#nombre2u').val();
    apellido2=$('#apellido2u').val();
    estado_civil2=$('#estado_civil2u').val();
    ciudad2=$('#ciudad2u').val();
    
    //Se crea una cadena para enviarla por ajax con los valores creados anteriormente
    cadena= "iddocente=" + iddocente +
            "&nombre2=" + nombre2 +
            "&apellido2=" + apellido2 +
            "&estado_civil2=" + estado_civil2 +
            "&ciudad2=" + ciudad2;
    //Este ajax envia la cadena a un archivo php
    //EN el archivo php se encuentra el proceso de validar y actualizacion de datos
    //En ese archivo php retorna un valor
    $.ajax({
        type:"POST",
        url:"docente/controlador/actualizaDatos.php",
        data:cadena,
        success:function(r){//Esta funcion recibe el valor retornado
            if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                $('#tabladoc').load('docente/componentes/tabla.php');//Cargar la tabla donde estan los registros de de docente
                alertify.success("Actualizado con exito :)");
            }else{
                alertify.error("Fallo el servidor :(");//Se muestra una alerta con el valor retornado, que sera el mensaje de la validacion
            }
        }
    });

}

//Esta funciio
function preguntarSiNo(id, estado_docentes){
    if (estado_docentes==0) {
        alertify.confirm('Eliminar Docente', '¿Esta seguro de eliminar este registro?', 
        function(){ eliminarDatos(id, estado_docentes) }
        ,function(){ alertify.error('Cancelado')});
    }else{
        alertify.confirm('Restaurar Docente', '¿Esta seguro de restaurar este registro?', 
        function(){ eliminarDatos(id, estado_docentes) }
        ,function(){ alertify.error('Cancelado')});
    }
	
}

function eliminarDatos(id, estado_docentes){
	cadena="id=" + id +
               "&estado_docentes=" + estado_docentes;
    if (estado_docentes==0) {
        $.ajax({
            type:"POST",
            url:"docente/controlador/eliminarDatos.php",
            data:cadena,
            success:function(r){
                    if(r==1){
                            $('#tabladoc').load('docente/componentes/tabla.php');//Cargar la tabla donde estan los registros de de docente
                            alertify.success("Se elimino con exito!");
                    }else{
                            alertify.error("Fallo el servidor :(");
                    }
            }
        });
    } else {
        $.ajax({
            type:"POST",
            url:"docente/controlador/eliminarDatos.php",
            data:cadena,
            success:function(r){
                    if(r==1){
                            $('#tabladoc').load('docente/componentes/tabla2.php');//Cargar la tabla donde estan los registros de de docente
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