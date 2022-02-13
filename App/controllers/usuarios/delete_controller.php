<?php
require_once("../../app/models/usuarios.class.php");
try{
	#isset se ocupa para saber si una variable esta definida en este caso el $_POST['id'] 
	#En este caso solo se definira cuando manden datos por get a travez de la url 
	if(isset($_GET['id'])){
		#Se crea una instancia de la clase Usuarios
		$usuarios = new Usuarios;
		#Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
		if($usuarios->setId($_GET['id'])){
			 #Se ejecuta el metodo para leer usuario
			if($usuarios->readUsuario()){
				#isset se ocupa para saber si una variable esta definida en este caso el $_POST['delete'] 
				#En este caso solo se definira cuando manden datos por Post a travez de un submit 
				if(isset($_POST['delete'])){
					#Se ejecuta el metodo eliminar usuario
					if($usuarios->deleteUsuario()){
						#Se llama al metodo showMessage y se le pasan los argumentos indicados
						Page::showMessage(1, "Usuario eliminado", "index.php");
					}else{
						#Se lanza una Exception obteniendo su argumento de la clase Database
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Usuario inexistente");
			}
		}else{
			throw new Exception("Usuario incorrecta");
		}
	}else{
		Page::showMessage(3, "Seleccione Usuario", "index.php");
	}
	#Se captura la exception
}catch(Exception $error){
	 #Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/usuarios/delete_view.php");
?>