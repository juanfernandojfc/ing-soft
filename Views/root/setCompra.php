<section id="modals-ofi">
</section>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="ion-document-text"></i> Registro de Compras</h3>
                <ol class="breadcrumb">
                    <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                    <li><i class="icon_cart"></i><a href="/user/getCompra">Compras</a></li>
                    <li><i class="icon_plus_alt2"></i>Registrar Nueva</li>
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
                        <div class="form">
                            <form class="form-validate form-horizontal">
                                <div class="form-group">
                                    <label for="cemail" class="control-label col-lg-2">Fecha de Compra<span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="fechaCompra" type="date" style="width: 50%" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2">NIT del Proveedor <span class="required"></span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="nitProv-com" type="text" style="width: 50%" readonly required />
                                    </div>
                                    <label for="cemail" class="control-label col-lg-2">Nombre del Proveedor <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <select class="form-control m-bot15" data-live-search="true" style="width: 80%" id="nombreProv-com" required>
                                        </select>
                                        <button type="button" class="btn btn-info" id="buscarProv"><i class="icon_cloud"></i></button>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Referencia del Suministro <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="codigoSum-com" type="text" style="width: 50%" readonly required />
                                    </div>
                                    <label for="cemail" class="control-label col-lg-2">Nombre del Suministro<span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <select class="form-control m-bot15" data-live-search="true" style="width: 80%" id="nombreSum-com" required>
                                        </select>
                                        <button type="button" class="btn btn-info" id="buscarSum"><i class="icon_cloud"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2">Cantidad <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="tipoSuministro-com" type="hidden"/>
                                        <input class="form-control " id="stockSuministro-com" style="width: 50%" type="number"/>
                                    </div>
                                    <label for="cname" class="control-label col-lg-2">Valor unitario <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="valorSuministro-com" type="number" style="width: 60%" placeholder="$$$$" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2"></label>
                                    <div class="col-lg-4">
                                        <button type="button" class="btn btn-success" id="btnAgregarSum"><i class="icon_plus_alt2"></i> Agregar</button>
                                        <button type="button" class="btn btn-primary" id="btnRegistrarCompra"><i class="icon_cart"></i> Registrar Compra</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section class="panel">
            <div class="col-lg-12">
                <table class="table table-advance table-hover" id="tableCompra">
                    <thead>
                    <tr>
                        <th><i class="icon_id-2"></i> Referencia</th>
                        <th><i class="icon_folder"></i> Nombre</th>
                        <th><i class="icon_ribbon"></i> Tipo</th>
                        <th><i class="icon_datareport"></i> Stock</th>
                        <th><i class="icon_creditcard"></i> Valor unitario ($)</th>
                        <th><i class="icon_cogs"></i> Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody-Compra">
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</section>


