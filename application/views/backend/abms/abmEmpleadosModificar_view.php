<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
			<div class="page-header">
					<h1>
						 Gestionar Empleados
					</h1>
			</div>	

			<div class="widget-box"><!--Empieza cuadro Modificar Medicamento -->
					<div class="widget-header greenAES">
						<h5 class="widget-title">Modificar Empleado </h5>

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

								<?php 	if ($empleado){
											foreach ($empleado->result() as $emp){
								?>

									<form class="form-horizontal" role="form" action="<?php echo base_url() ?>abms/AbmEmpleados/actualizarDatos/<?= $emp->idEmpleado;?>" method="post"><!-- Comienza formulario Modificar -->
									  
		                                <div class="form-group"> <!-- Empieza una linea del formulario -->
											<label class="col-sm-3 control-label no-padding-right" for="apellidoE">Apellidos Empleado(*) </label>

											<div class="col-sm-4">
												<input class="form-control" id="apellidoE" name="apellidoE" value="<?= $emp->apellidoE;?>"  type="text">		                        
											</div>
										</div>	                        
										
										<div class="form-group"> <!-- Empieza una linea del formulario -->
											<label class="col-sm-3 control-label no-padding-right" for="nombreE">Nombres Empleado(*) </label>

											<div class="col-sm-4">
												<input class="form-control" id="nombreE" name="nombreE" value="<?= $emp->nombreE;?>"  type="text">				                                
											</div> <!-- Cambiar lo de date picker??? -->
										</div>

										<div class="form-group"> <!-- Empieza una linea del formulario -->
											<label class="col-sm-3 control-label no-padding-right" for="rut">Nº Documento(*) </label>
											
											<div class="col-sm-4">
												<input class="form-control" id="rut" name="rut" placeholder=""  value="<?= $emp->rut;?>" type="number" min="1000000" max="70000000">
		                					</div> 
										</div>

										<div class="form-group"> <!-- Empieza una linea del formulario -->
											<label class="col-sm-3 control-label no-padding-right" for="telefono"> Teléfono </label>
											<div class="col-sm-4">
												<input class="form-control" id="telefono" name="telefono" placeholder="" value="<?= $emp->telefono;?>" type="tel">
		                					</div> 
										</div>

										<div class="form-group"> <!-- Empieza una linea del formulario -->
											<label class="col-sm-3 control-label no-padding-right" for="email"> E-Mail </label>
											<div class="col-sm-4">
												<input class="form-control" id="email" name="email" placeholder="" value="<?= $emp->email;?>" type="email">
		                					</div> 
										</div>

										<div class="form-group"> <!-- Empieza una linea del formulario -->
											<label class="col-sm-3 control-label no-padding-right" for="direccion"> Dirección </label>
											<div class="col-sm-4">
												<input class="form-control" id="direccion" name="direccion" value="<?= $emp->direccion;?>" placeholder=""  type="text">
		                					</div> 
										</div>

										<div class="form-group"> <!-- Empieza linea del form con desplegable -->
											<label class="col-sm-3 control-label no-padding-right" for="tipoEmpleado"> Tipo Empleado(*)</label>
											<div class="col-sm-4">
												<div>
													<?php 	if($emp->idTipoEmpleado == 3 || $emp->idTipoEmpleado == 4 || $emp->idTipoEmpleado == 5 || $emp->idTipoEmpleado == 6){
																echo '<select class="form-control" aria-controls="dynamic-table" id="idTipoEmpleado" name="idTipoEmpleado" OnClick="tipoEOnChange(this)">';

															}else{
																echo '<select class="form-control" aria-controls="dynamic-table" id="idTipoEmpleado" name="idTipoEmpleado" OnChange="tipoEOnChange(this)">';
															}
													?>
													
														<?php 	foreach ($tipoEmpleado->result() as $tipoE){     													
    													?>
    													<option value="<?=$tipoE->idTipoEmpleado?>" <?php if($tipoE->idTipoEmpleado == $emp->idTipoEmpleado){?> selected <?php }?>><?=$tipoE->nombreTipoE;?></option>
														<?php
																}
														?>
													</select>
												</div>
											</div>
										</div>

										<div class="center" style="width:50%; margin-right:auto; margin-left:auto;"><!-- Empiezan botones de guardar y limpiar -->
											<div class="hr hr-12 dotted"></div>

											<button class="btn btn-purple" type="submit" name="GuardarEnDB">
												<i class="ace-icon fa fa-check bigger-110"></i>
													Modificar
											</button>
											
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
													Limpiar
											</button>
										</div>

									</form><!-- Termina formulario -->	

								<?php
											}
										}
								?>

							</div>
						</div>
					</div>
			</div><!--Termina cuadro Modificar Medicamento -->	

		</div><!-- /.page-content -->
	</div><!-- /.main-content-inner -->
</div><!-- /.main-content -->



<!--Para que se vean los botones de la tabla responsive-->

	<script type="text/javascript">
		window.jQuery || document.write("<script src='../../../assets/js/jquery.js'>"+"<"+"/script>");
	</script>


	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='../../../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
	</script>
	<script src="../../../assets/js/bootstrap.js"></script>

