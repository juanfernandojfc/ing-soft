      
<div id="detalleSol" class="modal fade" role="dialog">
    <div style="width:70%;"  class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 170px;">
                <h4 style="text-align:center;" class="modal-title">Detalles de Solicitud</h4>
            </div>
            <div class="modal-body">
                <form class="form-validate form-horizontal">
                    <div class="form-group">
                        <label for="cemail" class="control-label col-lg-1">Id <span class="required"></span></label>
                        <div class="col-lg-4">
                        <input class="form-control" id="referenciaSum-mod" type="text" disabled />
                        </div>
                        <label for="cname" class="control-label col-lg-2">Dependencia <span class="required"></span></label>
                        <div class="col-lg-4">
                        <input class="form-control" id="tipoSum-mod" type="text" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cemail" class="control-label col-lg-1">Estado</label>
                        <div class="col-lg-4">
                        <input class="form-control" id="nombreSum-mod" type="text" required disabled />
                        </div>
                        <label for="cname" class="control-label col-lg-2">Fecha</label>
                        <div class="col-lg-4">
                        <input class="form-control" id="tipoSum-mod" type="date" disabled />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
            </div>
        </div>

    </div>
</div>
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="ion-document-text"></i> Lista de Solicitudes</h3>
                    <ol class="breadcrumb">
                        <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                  <div class="col-lg-12">
                      <section class="panel" id="section-tablaSolicitudes">
                      </section>
                  </div>
              </div>
            </section>
      </section>
