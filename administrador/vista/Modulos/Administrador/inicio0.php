<?php
$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->activarPremio();
//se espera la reacion para el controlador activar premio, esto para cambiar de estad a los premios de 0 a 1
$resultado2= $registro ->activarPromocion();
//Se espera la reacion para el controlador activar promocion, esto para cambiar de estad a las promociones de 0 a 1


?>


<div class="row">
  <div class="page-header">
    <div class="d-flex align-items-center">
      <br><br>
      <h2 class="page-header-title">Activacion de promociones y premios</h2>
      <div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Components</a></li>
          <li class="breadcrumb-item active">Forms Validation</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End Page Header -->
<div class="row flex-row">
  <div class="col-xl-12">
    <!-- Form -->
    <div class="widget has-shadow">
      <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Activar Premio</h4>
      </div>
      <div class="widget-body">
        <form method="POST">
          <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Codigo</label>
            <div class="col-lg-5">
              <input type="number" class="form-control" placeholder="Ingresa el codigo" name="idPremio">
            </div>
          </div>
          <div class="text-right">
            <button class="btn btn-gradient-01" type="submit">Activar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="widget has-shadow">
      <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Activar Promocion</h4>
      </div>
      <div class="widget-body">
        <form method="POST">
          <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Codigo</label>
            <div class="col-lg-5">
              <input type="number" class="form-control" placeholder="Ingresa el codigo" name="idPromocion">
            </div>
          </div>
          <div class="text-right">
            <button class="btn btn-gradient-01" type="submit">Activar</button>
          </div>
        </form>
      </div>
    </div>
    <!-- End Form -->
  </div>
</div>