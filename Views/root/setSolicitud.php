
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="ion-document-text"></i> Solicitud de Suministros</h3>
                <ol class="breadcrumb">
                    <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                </ol>
            </div>
        </div>
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Agregar Suministro
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Código del Suministro <span class="required">*</span></label>
                                    <div class="col-lg-7">
                                        <input class="form-control " id="codigoSum-sol" type="text" readonly required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-4">Nombre del Suministro<span class="required">*</span></label>
                                    <div class="col-lg-7">
                                        <select class="form-control m-bot15" data-live-search="true" style="width: 80%" id="nombreSum-sol" required>
                                        </select>
                                        <button type="button" class="btn btn-info" id="buscarSum-sol"><i class="icon_cloud"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-4">Cantidad <span class="required">*</span></label>
                                    <div class="col-lg-7">
                                        <input class="form-control " id="cantidadSum-sol" type="number" max="3" required />
                                        <input class="form-control " id="tipoSum-sol" type="hidden" max="3" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4"></label>
                                    <div class="col-lg-7">
                                        <button type="button" class="btn btn-success" id="btnAgregarSol"><i class="icon_plus_alt2"></i> Agregar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Registro de Solicitud
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Descripción <span class="required">*</span></label>
                                    <div class="col-lg-7">
                                        <textarea style="resize:none;" rows="5" class="form-control " id="textDescripcion"  required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4"></label>
                                    <div class="col-lg-7">
                                        <button type="button" class="btn btn-primary" id="btnHacerSol"><i class="icon_document"></i> Hacer Solicitud</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped" id="tablaSolicitud-reg">
                    <thead>
                    <tr>
                        <th><i class="icon_id-2"></i> Referencia</th>
                        <th><i class="icon_folder"></i> Nombre</th>
                        <th><i class="icon_ribbon"></i> Tipo</th>
                        <th><i class="icon_datareport"></i> Cantidad</th>
                        <th><i class="icon_cogs"></i> Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody-Solicitud">
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>