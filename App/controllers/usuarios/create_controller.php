<?php
require_once("../../app/models/usuarios.class.php");
try{
    #Se crea una instancia de la clase Usuarios
$usuarios = new Usuarios;
#isset se ocupa para saber si una variable esta definida en este caso el $_POST['crear'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
if(isset($_POST['crear'])){
    $_POST = $usuarios->validateForm($_POST);
    #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
    if($usuarios->setNombre($_POST['nombre'])){
        if($usuarios->setApellido($_POST['apellido'])){
            if($usuarios->setAlias($_POST['alias'])){
                if($_POST['clave1'] == $_POST['clave2']){
                    if($usuarios->setClave($_POST['clave1'])){
                        if($usuarios->setTelefono($_POST['telefono'])){
                            if($usuarios->setCorreo($_POST['correo'])){
                                #Se ejecuta el metodo para crear usuario
                                if($usuarios->createUsuario()){
                                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                                    Page::showMessage(1, "Usuario creado", "index.php");
                                }else {
                                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                                    Page::showMessage(2, "No se creo", null);
                                }
                            }else{
                                #Lanza una excepcion  
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
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/usuarios/create_view.php");
?>