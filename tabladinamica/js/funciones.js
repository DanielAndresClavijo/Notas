function agregardatos(tipo_documento2,documento2,nombre2,apellido2,ciudad2,estado_civil2,contrasenna2){
    cadena="tipo_documento2=" + tipo_documento2 + 
            "&documento2=" + documento2 +
            "&nombre2=" + nombre2 +
            "&apellido2=" + apellido2+
            "&ciudad2=" + ciudad2+
            "&estado_civil2=" + estado_civil2+
            "&contrasenna2=" + contrasenna2;
    $.ajax({
        type:"POST",
        url:"php/agregarDatos.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla').load('componentes/tabla.php');
                $('#buscador').load('componentes/buscador.php');
                alertify.success("agregado con exito :)");
            }else{
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}

function agregaform(datos){
    d=datos.split('||');
    $('#iddocente').val(d[0]);
    $('#nombre2u').val(d[1]);
    $('#apellido2u').val(d[2]);
    $('#estado_civil2u').val(d[3]);
    $('#ciudad2u').val(d[4]);        
}

function actualizaDatos(){
    iddocente=$('#iddocente').val();
    nombre2=$('#nombre2u').val();
    apellido2=$('#apellido2u').val();
    estado_civil2=$('#estado_civil2u').val();
    ciudad2=$('#ciudad2u').val();
    
    cadena= "iddocente=" + iddocente +
            "&nombre2=" + nombre2 +
            "&apellido2=" + apellido2 +
            "&estado_civil2=" + estado_civil2 +
            "&ciudad2=" + ciudad2;
    $.ajax({
        type:"POST",
        url:"php/actualizaDatos.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla').load('componentes/tabla.php');
                alertify.success("Actualizado con exito :)");
            }else{
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
        function(){ eliminarDatos(id) }
        ,function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){
	cadena="id=" + id;
        $.ajax({
            type:"POST",
            url:"php/eliminarDatos.php",
            data:cadena,
            success:function(r){
                    if(r==1){
                            $('#tabla').load('componentes/tabla.php');
                            alertify.success("Eliminado con exito!");
                    }else{
                            alertify.error("Fallo el servidor :(");
                    }
            }
        });
}