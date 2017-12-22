<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			<div class="page-header">
				<h1>
					Gestionar Empleados
				</h1>
			</div>	
			<div class="widget-box"> <!-- Empieza el recuadro con su titulo -->

				<div class="widget-header greenAES">
					<h5 class="widget-title">Registrar Nuevo Empleado</h5>
					<!-- #section:custom/widget-box.toolbar -->
					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>		
					</div>
					<!-- /section:custom/widget-box.toolbar -->
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div class="widget-main">
							<form class="form-horizontal" role="form" action="<?php echo base_url() ?>abms/AbmEmpleados/recibirDatos/" method="post" ><!-- Comienza formulario -->
								
								<div class="form-group"> <!-- Empieza una linea del formulario -->
									<label class="col-sm-3 control-label no-padding-right" for="apellidoE"> Apellidos Empleado(*) </label>
									<div class="col-sm-4">
										<input class="form-control" id="apellidoE" name="apellidoE" placeholder=""  type="text">
					                </div> 
								</div>

								<div class="form-group"> <!-- Empieza una linea del formulario -->
									<label class="col-sm-3 control-label no-padding-right" for="nombreE"> Nombres Empleado(*) </label>
									<div class="col-sm-4">
										<input class="form-control" id="nombreE" name="nombreE" placeholder=""  type="text">
					                </div> 
								</div>

								<div class="form-group"> <!-- Empieza una linea del formulario -->
									<label class="col-sm-3 control-label no-padding-right" for="rut">Nº RUT(*) </label>
									<div class="col-sm-4">
										<input class="form-control" id="rut" name="rut" placeholder=""  type="number" min="1000000" max="70000000">
					                </div> 
								</div>

								<div class="form-group"> <!-- Empieza una linea del formulario -->
									<label class="col-sm-3 control-label no-padding-right" for="telefono"> Teléfono </label>
									<div class="col-sm-4">
										<input class="form-control" id="telefono" name="telefono" placeholder=""  type="tel">
					                </div> 
								</div>

								<div class="form-group"> <!-- Empieza una linea del formulario -->
									<label class="col-sm-3 control-label no-padding-right" for="email"> E-Mail</label>
									<div class="col-sm-4">
										<input class="form-control" id="email" name="email" placeholder=""  type="email">
					                </div> 
								</div>

								<div class="form-group"> <!-- Empieza una linea del formulario -->
									<label class="col-sm-3 control-label no-padding-right" for="direccion"> Dirección </label>
									<div class="col-sm-4">
										<input class="form-control" id="direccion" name="direccion" placeholder=""  type="text">
					                </div> 
								</div>

								<div class="form-group"> 
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipo Empleado(*) </label>
										<div class="col-sm-4">
											<div>
												<select aria-controls="dynamic-table" class="form-control input-sm" id="tipoEmpleado" name="tipoEmpleado" OnChange="tipoEOnChange(this)">
													<option value="">--- Seleccione Tipo Empleado ---</option>
													<?php 	foreach ($tipoEmpleado->result() as $tipoE){						
                        							?>
													<option value="<?=$tipoE->idTipoEmpleado?>"><?=$tipoE->nombreTipoE;?></option>																					
													<?php
															}
													?>
												</select>
											</div>									
										</div>
								</div>

								<div class="center" style="width:50%; margin-right:auto; margin-left:auto;"><!-- Empiezan botones de guardar y limpiar -->
									<div class="hr hr-12 dotted"></div>

									<button class="btn btn-greenAES" type="submit" name="GuardarEnDB">
										<i class="ace-icon fa fa-check bigger-110"></i>
											Guardar
									</button>
									
									<button class="btn" type="reset">
										<i class="ace-icon fa fa-undo bigger-110"></i>
											Limpiar
									</button>
								</div>

							</form><!-- Termina formulario -->														
						</div>
					</div>
				</div>

			</div><!--Fin Cuadro Registrar Nuevo Empleado -->

		</div><!-- /.page-content -->
	</div><!-- /.main-content-inner -->
</div><!-- /.main-content -->



<!--Para que se vea el boton SALIR-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='../../../assets/js/jquery.js'>"+"<"+"/script>");
		</script>


		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../../../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="../../../assets/js/bootstrap.js"></script>


