
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="ion-document-text"></i> Registro de Empleados</h3>
                    <ol class="breadcrumb">
                        <li><i class="ion-home"></i><a href="/user">Inicio</a></li>
                        <li><i class="icon_profile"></i><a href="/user/getEmpleado">Empleados</a></li>
                        <li><i class="ion-document-text"></i>Registrar Nuevo</li>
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
                                          <label for="cname" class="control-label col-lg-1">Tipo de usuario <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" data-live-search="true" data-width="100%" id="rolEmp" name="rolEmp" required>
                                              </select>
                                          </div>
                                          <label for="cname" class="control-label col-lg-2">Cédula <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="cedulaEmp" name="cedulaEmp" type="number" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-1">Nombre <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " type="text" id="nombreEmp" name="nombreEmp" required />
                                          </div>
                                          <label for="cemail" class="control-label col-lg-2">Apellidos <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="apellidoEmp" type="text" name="apellidoEmp" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label class="control-label col-lg-1" for="inputSuccess">Género <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <label class="radio-inline">
                                                  <input type="radio" name="generoEmp" id="inlineRadio1" value="M"> Masculino
                                              </label>
                                              <label class="radio-inline">
                                                  <input type="radio" name="generoEmp" id="inlineRadio2" value="F"> Femenino
                                              </label>
                                          </div>
                                          <label for="cname" class="control-label col-lg-2">Correo <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="emailEmp" type="email" name="emailEmp" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-1">Teléfono <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="telefonoEmp" type="number" name="telefonoEmp" />
                                          </div>
                                          <label for="cname" class="control-label col-lg-2">Dependencia <span class="required">*</span></label>
                                          <div class="col-lg-4">

                                              <select class="form-control m-bot15" data-live-search="true" data-width="100%" id="dependenciaEmp" name="dependenciaEmp" required>
                                              </select>
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-1">Usuario <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="usuarioEmp" type="text" name="usuarioEmp" />
                                          </div>
                                          <label for="cname" class="control-label col-lg-2">Contraseña <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="contraEmp" type="password" name="contraEmp" />
                                          </div>   
                                      </div>                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="button" id="btnAgg-emp" name="btnAgg-Emp">Guardar</button>
                                              <button class="btn btn-default" type="button" id="btnLimp-emp" name="btnLimp-Emp">Cancelar</button>
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