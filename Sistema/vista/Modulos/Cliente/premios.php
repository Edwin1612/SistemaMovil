<?php
$stmt2 = Datos::getMisPremiosObtenidos();
//Se obtienen los premios obtenidos

?>
<div class="col-md-12">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-lg-8">
        <div class="page-header-title">
          <i class="icofont icofont-table bg-c-blue"></i>
          <div class="d-inline">
            <h4>Premios</h4>
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
                  <th rowspan="1" colspan="1" width="10%">Premio</th>
                  <th rowspan="1" colspan="1" width="10%">Fecha</th>
                  <th rowspan="1" colspan="1" width="10%">Codigo</th>
                </tr>
              </thead>
              <tbody>
                <?php while($datos = $stmt2->fetch(PDO::FETCH_ASSOC))
                              //Se hace un array asociativo para poder sacar los valores y eventualmente en cada interacion del while imprime las variables en los td
                                  {?>
                <tr>
                  <td rowspan="1" colspan="1">
                    <?php
                         $stmtResult = Datos::getPremioID($datos["idPremio"]) ;    
                         echo $stmtResult["nombre"]
                     ?>
                  </td>
                  <td rowspan="1" colspan="1">
                    <?php   
                         echo $datos["fecha"]
                     ?>
                  </td>
                  
                  <td rowspan="1" colspan="1">
                    <?php   
                         echo $datos["id"]
                     ?>
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