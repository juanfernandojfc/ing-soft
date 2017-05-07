<div id="updateProv" class="modal fade" role="dialog">
    <div style="width:70%;" class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 170px;">
                <h4 style="text-align:center;" class="modal-title">Modificar Proveedor</h4>
            </div>
            <div class="modal-body">
                <form class="form-validate form-horizontal">
                    <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">Identificación <span class="required"></span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="idPro-mod" type="text" name="nitPro" required disabled />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">NIT <span class="required"></span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="nitPro-mod" type="text" name="nitPro" required />
                        </div>
                        <label for="cemail" class="control-label col-lg-1">Nombre <span class="required"></span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="nombrePro-mod" type="text" name="nombrePro" required />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="curl" class="control-label col-lg-2">Dirección <span class="required"></span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="direccionPro-mod" type="text" name="direccionPro" />
                        </div>
                        <label for="cname" class="control-label col-lg-1">Teléfono <span class="required"></span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="telefonoPro-mod" type="number" name="telefonoPro" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="modificar" onclick=modificarProv()>Guardar</button>
            </div>
        </div>

    </div>
</div>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="ion-document-text"></i> Lista de Proveedores</h3>
                <ol class="breadcrumb">
                    <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                    <li><i class="icon_group"></i>Proveedores</li>
                    <li><i class="icon_plus_alt2"><a href="/user/setProveedor"></i>Registrar Nuevo</a></li>
                </ol>
            </div>
        </div>
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel" id="secTableProv">
                </section>
            </div>
        </div>
    </section>
</section>
