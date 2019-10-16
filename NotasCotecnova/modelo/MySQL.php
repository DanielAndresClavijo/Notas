<?php
    
 class MySQL{
    
    //Datos de validacion para la conexion
    private $ipServidor ="localhost";
    private $usuarioBase ='root';
    private $contrasena = '';

    private $conexion;

    

    //Metodo para conectar la base de datos
    public function conectar(){
        $this->conexion = mysqli_connect($this->ipServidor, $this->usuarioBase, $this->contrasena);
    }

    public function conexionBD($nombreBD){
        mysqli_select_db($nombreBD, $this->conexion);
       
    }

    //Metodo que cierra la conexion
    public function desconectar(){
        mysqli_close($this->conexion);
    }

    //Metodo que efectua una consulta devuelve su resultado
    public function efectuarConsulta($consulta){

        mysqli_query($this->conexion, "SET lc_time_names = 'es_ES'" ); 
        //AÃ±ade el uso de caracteres especiales como tildes con el formato utf8
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        mysqli_query($this->conexion, "SET CHARACTER 'utf8'");

       $this->resultadoConsulta = mysqli_query($this->conexion, $consulta);
     
        
        return $this->resultadoConsulta; 
    }

    //Ingresa Registros a una tabla en la base de datos
    public function ingresoRegistro($registro){
        
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        mysqli_query($this->conexion, "SET CHARACTER 'utf8'");        
        //mysqli_query($this->conexion, $registro);
        $this->resultadoRegistro = mysqli_query($this->conexion, $registro);           
        return $this->resultadoRegistro; 
    }
    
    //Ingresa Registros a una tabla en la base de datos
    public function EditarRegistros($registro){        
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        mysqli_query($this->conexion, "SET CHARACTER 'utf8'");        
        //mysqli_query($this->conexion, $registro);
        $this->resultadoEditar = mysqli_query($this->conexion, $registro);           
        return $this->resultadoEditar; 
    }
}

?>