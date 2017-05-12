<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 main">
      <h1 class="page-header"></h1>

      <h2 class="sub-header">Detalle del empleado</h2>
      <div class="table-responsive">

         <div class="page-header">
           <h1><?php echo $data['name'];?></h1>
         </div>
         <p class="lead"><b>Email :</b> <?php echo $data['name'];?><br/>
         <b>Phone :</b> <?php echo $data['phone'];?><br/>
         <b>Address :</b> <?php echo $data['address'];?><br/>
         <b>Position :</b> <?php echo $data['position'];?><br/>
         <b>Salary :</b> <?php echo $data['salary'];?><br/>
         <b>Skills :</p>
         <ul class="lead">
           <?php foreach ($data['skills'] as $value) {  ?>
             <li> <?php echo $value->skill; ?></li>
           <?php } ?>
         </ul>
         <a href="<?php echo $base_url; ?>" class="btn btn-lg btn-primary">regresar</a>

      </div>
    </div>
  </div>
</div>
        