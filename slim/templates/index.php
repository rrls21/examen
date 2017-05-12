<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 main">
      <h1 class="page-header"></h1>

      <?php if($error!=''){ ?>
        <h2 class="sub-header">Error</h2>
        <?php echo $error;?>
      <?php }else{ 
        if(!empty($resultado)) { ?>

        <h2 class="sub-header">Resultado de busqueda</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Salary</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($resultado as  $value) { ?>
              <tr>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->email; ?></td>
                <td><?php echo $value->position; ?></td>
                <td><?php echo $value->salary; ?></td>
                <td><a href="<?php echo $base_url.'detalle/'.$value->id; ?>" title="detalle">Detalle</a></td>
              </tr>
              <?php } ?>

            </tbody>
          </table>

          <a href="<?php echo $base_url; ?>" class="btn btn-lg btn-primary">regresar</a>
        </div>
        <?php } else{ ?>

        <h2 class="sub-header">Lista de empleados</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Salary</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lista_empleados as  $value) { ?>
              <tr>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->email; ?></td>
                <td><?php echo $value->position; ?></td>
                <td><?php echo $value->salary; ?></td>
                <td><a href="<?php echo $base_url.'detalle/'.$value->id; ?>" title="detalle">Detalle</a></td>
              </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>

        <?php } ?>
    
      <?php } ?>


    </div>
  </div>
</div>
        