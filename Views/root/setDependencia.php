
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="ion-document-text"></i> Registro de Dependencias</h3>
                <ol class="breadcrumb">
                    <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                    <li><i class="icon_archive"></i><a href="/user/getDependencia">Dependencias</a></li>
                    <li><i class="icon_plus_alt2"></i>Registrar Nuevo</li>
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
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " type="text" id="nombreDep" name="nombreDep" required />
                                    </div>
                                    <label for="cemail" class="control-label col-lg-2">Dirección<span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " type="text" id="direccionDep" name="direccionDep" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Teléfono <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class="form-control " type="number" id="telefonoDep" name="telefonoDep" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="button" id="btnAgg-dep" name="btnAgg-dep">Guardar</button>
                                        <button class="btn btn-default" type="button" id="btnLimp-dep" name="btnLimp-dep">Cancelar</button>
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
