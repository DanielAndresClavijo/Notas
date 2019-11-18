
//Esta funcion es para ocultar el texto de los content cuando se minimiza el menu
function ocultarmenus(  ){
    if(document.getElementById('not').style.display === "block"){
        document.getElementById('est').style.display = "none";
        document.getElementById('doc').style.display = "none";
        document.getElementById('not').style.display = "none";
    }else{
        document.getElementById('est').style.display = "block";
        document.getElementById('doc').style.display = "block";
        document.getElementById('not').style.display = "block";
    }
}

//Esta funcion es para ocultar la Presentacion cuando se selecciona alguna opcion de algun content
function OcultarAviso(){
    document.getElementById('Presentacion').style.display = "none";
}

//Change1 -> mostrar el content1(Menu Estudiantes) y esconder los demas content
function change1(  )
{
    document.getElementById('content1').style.display = "block";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change11 -> mostrar el content11(Crear Estudiante) y esconder los demas content
function change11(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "block";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change12 -> mostrar el content12(Editar Estudiante) y esconder los demas content
function change12(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "block";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change13 -> mostrar el content13(Eliminar Estudiante) y esconder los demas content
function change13(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "block";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change2 -> mostrar el content2(Menu Docente) y esconder los demas content
function change2(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "block";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change21 -> mostrar el content21(Crear Docente) y esconder los demas content
function change21(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "block";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change22 -> mostrar el content22(Editar Docente) y esconder los demas content
function change22(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "block";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change23 -> mostrar el content23(Eliminar Docente) y esconder los demas content
function change23(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "block";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change3 -> mostrar el content3(Menu Notas) y esconder los demas content
function change3(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "block";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change31 -> mostrar el content31(Editar Notas) y esconder los demas content
function change31(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "block";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "none";
}
//Change32 -> mostrar el content32(Editar Notas) y esconder los demas content
function change32(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "block";
    document.getElementById('content33').style.display = "none";
}
//Change33 -> mostrar el content33(Eliminar Notas) y esconder los demas content
function change33(  )
{
    document.getElementById('content1').style.display = "none";
    document.getElementById('content11').style.display = "none";
    document.getElementById('content12').style.display = "none";
    document.getElementById('content13').style.display = "none";
    document.getElementById('content2').style.display = "none";
    document.getElementById('content21').style.display = "none";
    document.getElementById('content22').style.display = "none";
    document.getElementById('content23').style.display = "none";
    document.getElementById('content3').style.display = "none";
    document.getElementById('content31').style.display = "none";
    document.getElementById('content32').style.display = "none";
    document.getElementById('content33').style.display = "block";
}


