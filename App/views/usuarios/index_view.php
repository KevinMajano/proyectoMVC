<div class="container">

  <div class="h2 text-center">
    <p>Tabla de usuarios</p>
  </div>

  <div class="row" style="margin-bottom:10px;">
    <div class="col">
      <form method="post">
        <div class="row">
          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <input name="alias" type="text" class="form-control" placeholder="Buscar por Alias">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <button name="buscar" type="submit" class="btn btn-success">Buscar</button>
          </div>
          <div class="col text-right">
            <a href="create.php">Agregar <img src="../../web/img/iconos/add.png"></a>
          </div>
        </div>
      </form>

    </div>
  </div>


  <div class="row">
    <div class="col col-sm-12 col-lg-12 col-md-12 table-responsive">

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Alias</th>
            <th scope="col">telefono</th>
            <th scope="col">correo</th>
            <th scope="col">accion</th>
          </tr>
        </thead>
        <tbody>
          <!--Se generan los datos de la tabla a partir del recorrido de un foreach-->
          <?php
foreach($data as $row){
print('
<tr>
    <td>'.$row['id_usuario'].'</td>
    <td>'.$row['nombres'].'</td>
    <td>'.$row['apellidos'].'</td>
    <td>'.$row['alias'].'</td>
    <td>'.$row['telefono'].'</td>
    <td>'.$row['correo'].'</td>
    <td>
    <a href="update.php?id='.$row['id_usuario'].'"><img src="../../web/img/iconos/edit.png"></a>
    <a href="delete.php?id='.$row['id_usuario'].'"><img src="../../web/img/iconos/delete.png"></a>
    </td>
</tr>
');
}
?>

        </tbody>
      </table>


    </div>
  </div>
</div>