<?php
$stmt = Datos::vista_promocion();
//Se obtienen las promociones
$stmt2 = Datos::getMisVisitasRealizadas();
//se obtienen todas las visitas del usuario en sesion realizadas
if($resultado=="success")
{
  //Se hace un header a la vista categoria si el controlador returna succes en caso de no, no se cambiara de vista
  header('Location: index.php?action=categorias');
}


?>
<div class="col-md-12">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-lg-8">
        <div class="page-header-title">
          <i class="icofont icofont-table bg-c-blue"></i>
          <div class="d-inline">
            <h4>Historial de visitas</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
  <div class="row">
    <div class="col-xl-12">
      <!-- Sorting -->
      <div class="widget has-shadow">
        <div class="widget-body">
          <div class="table-responsive">
            <table id="sorting-table" class="table mb-0">
              <thead>
                <tr>
                  <th rowspan="1" colspan="1" width="10%">Fecha y hora de la Visita</th>
                </tr>
              </thead>
              <tbody>
                <?php while($datos = $stmt2->fetch(PDO::FETCH_ASSOC))
                              //Se hace un array asociativo para poder sacar los valores y eventualmente en cada interacion del while imprime las variables en los td
                                  {?>
                <tr>
                  <td rowspan="1" colspan="1">
                    <?=$datos["fecha_visita"]?>
                  </td>
                  <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- End Export -->
    </div>
  </div>
</div>