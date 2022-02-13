<div class="container">

    <div class="row">
        <div class="col">
        <h2 class="text-center">Actualizar Usuario</h2>
        </div>
    </div>
    
    <form method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nombre">Nombres:</label>
      <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre" value="<?php print($usuarios->getNombre());?>" required/>
    </div>
    <div class="form-group col-md-6">
      <label for="Apellido">Apellidos:</label>
      <input name="apellido" type="text" class="form-control" id="Apellido" placeholder="Apellido" value="<?php print($usuarios->getApellido());?>" required/>
    </div>
    <div class="form-group col-md-6">
      <label for="Alias">Alias:</label>
      <input name="alias" type="text" class="form-control" id="Alias" placeholder="Alias" value="<?php print($usuarios->getAlias());?>" required/>
    </div>
    <div class="form-group col-md-6">
      <label for="Telefono">Telefono:</label>
      <input name="telefono" type="numer" class="form-control" id="Telefono" placeholder="Telefono" value="<?php print($usuarios->getTelefono());?>" required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Contraseña</label>
      <input name="clave1" type="password" class="form-control" id="inputPassword4" placeholder="Contraseña"  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword5">Confirmar Contraseña</label>
      <input name="clave2" type="password" class="form-control" id="inputPassword5" placeholder="Contraseña" required/>
    </div>
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlInput1">Direccion de Email</label>
    <input name="correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php print($usuarios->getCorreo());?>" required/>
  </div>

 <div class="row">
 <div class="center center-text mx-auto">
      <button name="actualizar" type="submit" class=" btn btn-success">Registrar</button>
      <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </div>
 </div>
</form>
        
</div>