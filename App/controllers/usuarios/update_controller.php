<?php
require_once("../../app/models/usuarios.class.php");
try{
    if ($_GET['id']) {
        #Se crea una instancia de la clase Usuarios
      $usuarios = new Usuarios;
      #Se manda el id al metodo correspondiente
      $usuarios->setId($_GET['id']);
       #Se ejecuta el metodo para leer usuario
      $usuarios->readUsuario();
      #isset se ocupa para saber si una variable esta definida en este caso el $_POST['actualizar'] 
	#En este caso solo se definira cuando manden datos por get a travez de la url
      if(isset($_POST['actualizar'])){
        $_POST = $usuarios->validateForm($_POST);
            #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
        if($usuarios->setNombre($_POST['nombre'])){
            if($usuarios->setApellido($_POST['apellido'])){
                if($usuarios->setAlias($_POST['alias'])){
                    if($_POST['clave1'] == $_POST['clave2']){
                        if($usuarios->setClave($_POST['clave1'])){
                            if($usuarios->setTelefono($_POST['telefono'])){
                                if($usuarios->setCorreo($_POST['correo'])){
                                    #Se ejecuta el metodo para actualizar usuario
                                    if($usuarios->updateUsuario()){
                                         #Se llama al metodo showMessage y se le pasan los argumentos indicados
                                        Page::showMessage(1, "Usuario Modificado", "index.php");
                                    }else {
                                         #Se llama al metodo showMessage y se le pasan los argumentos indicados
                                        Page::showMessage(2, "No se creo", null);
                                    }
                                }else{
                                    #Se lanza una exception
                                    throw new Exception("Correo incorrecto");
                                }
                    }else{
                        throw new Exception("Telelfono incorrecto");
                    }
                }else{
                    throw new Exception("Clave incorrecto");
                }
        }else{
            throw new Exception("Contraseñas distintas");
        }
    
        }else{
            throw new Exception("Alias incorrecto");
        }
    }else{
        throw new Exception("Apellido incorrecto");
    }
    }else{
            throw new Exception("Nombre incorrecto");
        }
    }
    }else {
      Page::showMessage(3, "Seleccione usuario", "index.php");
    }
    #Se captura la exception
}catch(Exception $error){
    #Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/usuarios/update_view.php");
?>