<div id="updateEmp" class="modal fade" role="dialog">
    <div style="width:80%;" class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 170px;">
                <h4 style="text-align:center;" class="modal-title">Modificar Empleado</h4>
            </div>
            <div class="modal-body">
                <form class="form-validate form-horizontal">
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Tipo de usuario <span class="required">*</span></label>
                        <div class="col-lg-4">
                            <select class="form-control m-bot15" data-live-search="true" data-width="100%" id="rolEmp-mod" disabled>
                            </select>
                        </div>
                        <label for="cname" class="control-label col-lg-1">Cédula <span class="required">*</span></label>
                        <div class="col-lg-4">
                            <input class="form-control" id="cedulaEmp-mod" type="number" disabled />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                        <div class="col-lg-4">
                            <input class="form-control " type="text" id="nombreEmp-mod" />
                        </div>
                        <label for="cemail" class="control-label col-lg-1">Apellidos<span class="required">*</span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="apellidoEmp-mod" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-lg-2" for="inputSuccess">Género <span class="required">*</span></label>
                        <div class="col-lg-4">
                            <label class="radio-inline">
                                <input type="radio" name="generoEmp-mod" id="inlineRadio1" value="M" disabled> Masculino
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="generoEmp-mod" id="inlineRadio2" value="F" disabled> Femenino
                            </label>
                        </div>
                        <label for="cname" class="control-label col-lg-1">Correo <span class="required">*</span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="emailEmp-mod" type="email" disabled/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Teléfono <span class="required">*</span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="telefonoEmp-mod" type="number" />
                        </div>
                        <label for="cname" class="control-label col-lg-1">Dependencia<span class="required">*</span></label>
                        <div class="col-lg-4">
                            <select class="form-control m-bot15" data-live-search="true" data-width="100%" id="dependenciaEmp-mod" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Usuario <span class="required">*</span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="usuarioEmp-mod" type="text" disabled/>
                        </div>
                        <label for="cname" class="control-label col-lg-1">Contraseña<span class="required">*</span></label>
                        <div class="col-lg-4">
                            <input class="form-control " id="contraEmp-mod" type="password" required />
                        </div>
                    </div>
                    <div class="form-group ">
                            <input class="form-control " id="idEmp-mod" type="hidden" />
                            <input class="form-control " id="idUser-mod" type="hidden"  />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrarModal">Cancelar</button>
                <button type="button" class="btn btn-success" id="modificar" onclick=modificarEmp()>Guardar</button>
            </div>
        </div>

    </div>
</div>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="ion-document-text"></i> Lista de Empleados</h3>
                <ol class="breadcrumb">
                    <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                    <li><i class="ion-ios-people"></i>Empleados</li>
                    <li><i class="icon_plus_alt2"><a href="/user/setEmpleado"></i>Registrar Nuevo</a></li>
                </ol>
            </div>
        </div>
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel" id="secTableEmp">
                </section>
            </div>
        </div>
    </section>
</section>