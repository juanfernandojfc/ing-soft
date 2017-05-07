
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="ion-document-text"></i> Registro de Proveedores</h3>
                <ol class="breadcrumb">
                    <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                    <li><i class="icon_group"><a href="/user/getProveedor"></i>Proveedores</a></li>
                    <li><i class="icon_plus_alt2"></i>Registrar Nuevo</li>
                </ol>
            </div>
        </div>
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Formulario de registro
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal">
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">NIT <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="nitPro" type="text" name="nitPro" required />
                                    </div>
                                    <label for="cemail" class="control-label col-lg-1">Nombre <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="nombrePro" type="text" name="nombrePro" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">Dirección <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="direccionPro" type="text" name="direccionPro" />
                                    </div>
                                    <label for="cname" class="control-label col-lg-1">Teléfono <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " id="telefonoPro" type="number" name="telefonoPro" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="button" id="btnAgg-pro" name="btnAgg-pro">Guardar</button>
                                        <button class="btn btn-default" type="button" id="btnLimp-pro" name="btnLimp-pro">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </section>
</section>