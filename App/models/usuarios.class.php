<?php
#Se crea una clase Usuarios que hereda los elementos de Validator(clase de validaciones)
class Usuarios extends Validator{
    #Se crean las variables privadas y se inicializan en null
    private $idUsuario = null;
    private $nombre = null;
    private $apellido = null;
    private $alias = null;
    private $clave = null;
    private $telefono = null;
    private $correo = null;

//Elementos del id para ingresar
    public function setId($value){
        if($this->validateId($value)){
			$this->idUsuario = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el id
    public function getId(){
        return $this->idUsuario;
    }

//Elementos del nombre para ingresar
    public function setNombre($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el nombre
    public function getNombre(){
        return $this->nombre;
    }

//Elementos del apellido para ingresar
    public function setApellido($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->apellido = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el apellido
    public function getApellido(){
        return $this->apellido;
    }

//Elementos del alias para ingresar
    public function setAlias($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->alias = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el alias
    public function getAlias(){
        return $this->alias;
    }

//Elementos de clave para ingresar
    public function setClave($value){
		if($this->validateAlphanumeric($value,1,50)){
			$this->clave = $value;
			return true;
		  }else{
		  	return false;
		  } 
    }
    //Funcion para recolectar la clave
	public function getClave(){
		return $this->contrasena;
    }
//Elementos del telefono para ingresar
    public function setTelefono($value){
        if($this->validateNumeric($value,1,50)){
            $this->telefono = $value;
            return true;
        }else{
            return false;
        }
    }
//Funcion para recolectar el telefono
    public function getTelefono(){
        return $this->telefono;
    }

//Elementos del correo para ingresar
    public function setCorreo($value){
		if($this->validateEmail($value)){
			$this->correo = $value;
			return true;
		}else{
			return false;
		}
    }
//Funcion para recolectar el correo
	public function getCorreo(){
		return $this->correo;
    }

#Funcion para crear usuario
    public function createUsuario(){    
        #Se ocupa una funcion nativa de php para encriptar contraseña   
        $hash = password_hash($this->clave,PASSWORD_DEFAULT);
        #Se guarda la consulta en una variable
        $sql = "INSERT INTO usuarios(nombres,apellidos,alias,clave,telefono,correo) VALUES(?,?,?,?,?,?)";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->nombre,$this->apellido,$this->alias,$this->clave,$this->telefono,$this->correo);
        #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para leer usuario 
    public function readUsuario(){
        #Se guarda la consulta en una variable
		$sql = "SELECT nombres, apellidos, alias, clave, telefono ,correo FROM usuarios WHERE id_usuario = ?";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->idUsuario);
        #guarda los datos devueltos del metodo getRow
		$usuario = Database::getRow($sql, $params);
		if($usuario){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
			$this->nombre = $usuario['nombres'];
			$this->apellido = $usuario['apellidos'];
			$this->alias = $usuario['alias'];
			$this->clave = $usuario['clave'];
            $this->telefono = $usuario['telefono'];
            $this->correo = $usuario['correo'];            
			return true;
		}else{
			return null;
		}
	}
    #Funcion para actualizar usuario
    public function updateUsuario(){
        #Se ocupa una funcion nativa de php para encriptar contraseña   
        $hash = password_hash($this->clave,PASSWORD_DEFAULT);
         #Se guarda la consulta en una variable
        $sql = "UPDATE usuarios SET nombres = ?,apellidos = ?,alias = ?,clave = ?,telefono = ?,correo = ? WHERE id_usuario = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->nombre,$this->apellido,$this->alias,$hash,$this->telefono,$this->correo,$this->idUsuario);
          #Retorna el estado que devuelve el metodo executeRow 
        return Database::executeRow($sql, $params);
    }
    #Funcion para eliminar usuario
    public function deleteUsuario(){
         #Se guarda la consulta en una variable
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array($this->idUsuario);
           #Retorna el estado que devuelve el metodo executeRow 
		return Database::executeRow($sql, $params);
	}
    #Funcion para busqueda de registros
    public function searchUsuario($value){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM usuarios WHERE alias like  ? ORDER BY alias";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array("%$value%");
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
    }
    
    public function getUsuarios(){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM usuarios ORDER BY nombres";
         #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
		return Database::getRows($sql, $params);
	}

}
?>