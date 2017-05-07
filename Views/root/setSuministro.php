
<div id="updateSum" class="modal fade" role="dialog">
    <div style="width:70%;"  class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 170px;">
                <h4 style="text-align:center;" class="modal-title">Modificar Suministro</h4>
            </div>
            <div class="modal-body">
                <form class="form-validate form-horizontal">
                    <div class="form-group">
                        <label for="cemail" class="control-label col-lg-2">Referencia <span class="required"></span></label>
                        <div class="col-lg-4">
                        <input class="form-control" id="referenciaSum-mod" type="text" placeholder="Referencia" disabled />
                        </div>
                        <label for="cname" class="control-label col-lg-1">Tipo <span class="required"></span></label>
                        <div class="col-lg-4">
                        <input class="form-control" id="tipoSum-mod" type="text" placeholder="Tipo" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cemail" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                        <div class="col-lg-4">
                        <input class="form-control" id="nombreSum-mod" type="text" placeholder="Nombre" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="modificar" onclick=modificarSum()>Guardar</button>
            </div>
        </div>

    </div>
</div>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="ion-document-text"></i> Registro de Suministros</h3>
                <ol class="breadcrumb">
                    <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                    <li><i class="icon_folder-open"></i>Suministros</li>
                </ol>
            </div>
        </div>
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Formulario de Registro
                    </header>
                    <div class="panel-body">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="cemail" class="sr-only">Referencia <span class="required">*</span></label>
                                <input class="form-control" id="referenciaSum" type="text" name="referenciaSum" placeholder="Referencia" required />
                            </div>
                            <div class="form-group">
                                <label for="cemail" class="sr-only">Nombre <span class="required">*</span></label>
                                <input class="form-control" id="nombreSum" type="text" name="nombreSum" placeholder="Nombre" required />
                            </div>
                            <div class="form-group">
                                <label for="cname" class="sr-only">Tipo <span class="required">*</span></label>
                                <select class="form-control" id="tipoSum" name="tipoSum" required>
                                    <option disabled selected>- Tipo de Suministro -</option>
                                    <option>Consumible</option>
                                    <option>Ofimatico</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-5">
                                    <button type="button" class="btn btn-success" id="btnAgg-sum" name="btnAgg-sum"><i class="icon_plus_alt2"></i> Agregar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel" id="secTableSum-2">
                </section>
            </div>
        </div>
    </section>
</section>
