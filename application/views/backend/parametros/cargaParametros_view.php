<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Cargar Parámetros Constantes
				</h1>
			</div>


			<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>parametros/Parametros/datosMensuales" enctype="multipart/form-data">
				<h4 class="row header smaller lighter blue" style="font-size:19px;">
        			<span class="col-xs-12"> Parámetros Mensuales </span><!-- /.col -->
    			</h4>

    			<div class="form-group"> <!-- Empieza linea del form con desplegable -->
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mes</label>
						<div class="col-sm-4">
							<div>
								<select class="form-control" name="mes" placeholder="Seleccione Tipo Planilla" required><!-- Codigo de Combo con datos de la BD -->
									<option value="">--- Seleccione Mes ---</option>
									<?php 
           								foreach ($meses->result() as $mes) {
           							?>
										<option value="<?=$mes->nroMes?>"><?=$mes->nombreMes;?></option>																					
									<?php
										}
									?>
								</select>
							</div>
						</div>
				</div>

				<div class="form-group"> 
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> División</label>
						<div class="col-sm-4">
							<div>
								<select aria-controls="dynamic-table" class="form-control input-sm" id="divisionSAP" name="divisionSAP" required>
									<option value="">--- Seleccione División ---</option>
									<?php 
                   						foreach ($divisionesSAP->result() as $divSAP) {
                   					?>
										<option value="<?=$divSAP->idDivSAP?>"><?=$divSAP->nombreDivSAP;?></option>																					
									<?php
										}
									?>								
								</select>
							</div>									
						</div>
				</div>

				<div class="form-group"> <!-- Empieza una linea del formulario -->
					<label class="col-sm-3 control-label no-padding-right" for="apellidoE"> Horas Disponibles por Semana</label>
					<div class="col-sm-4">
						<input class="form-control" id="hsSemana" name="hsSemana" placeholder=""  type="text" required>
	                </div> 
				</div>

				<div class="center" style="width:50%; margin-right:auto; margin-left:auto;">
					<div class="hr hr-12 dotted"></div>

					<button class="btn btn-success" type="submit" name="GuardarEnDB">
						<i class="ace-icon fa fa-check bigger-110"></i>
							Guardar
					</button>
					
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
							Limpiar
					</button>
				</div>

			</form>


		</br>
		</br>
		

			<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>parametros/Parametros/datosAnuales" enctype="multipart/form-data">
				<h4 class="row header smaller lighter blue" style="font-size:19px;">
        			<span class="col-xs-12"> Parámetros Anuales </span><!-- /.col -->
    			</h4>

    			<div class="form-group"> <!-- Empieza linea del form con desplegable -->
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Año</label>
						<div class="col-sm-4">
							<div>
								<select class="form-control" name="anio" placeholder="Seleccione Tipo Planilla" required><!-- Codigo de Combo con datos de la BD -->
									<option value="">--- Seleccione Año ---</option>
									<?php 
           								$year = date("Y");
             							for ($i= 2015; $i <= $year ; $i++){
             								echo'<option value='.$i.'>'.$i.'</option>';
                 						}
            						?>
								</select>
							</div>
						</div>
				</div>

    			<div class="form-group"> <!-- Empieza una linea del formulario -->
					<label class="col-sm-3 control-label no-padding-right" for="budgetBacklog"> Budget Backlog </label>
					<div class="col-sm-4">
						<input class="form-control" id="budgetBacklog" name="budgetBacklog" placeholder=""  type="text" required>
	                </div> 
				</div>

				<div class="form-group"> <!-- Empieza una linea del formulario -->
					<label class="col-sm-3 control-label no-padding-right" for="budgetCorrectivo"> Budget % Correctivo </label>
					<div class="col-sm-4">
						<input class="form-control" id="budgetCorrectivo" name="budgetCorrectivo" placeholder=""  type="text" required>
	                </div> 
				</div>

				<div class="form-group"> <!-- Empieza una linea del formulario -->
					<label class="col-sm-3 control-label no-padding-right" for="budgetPreventivo"> Budget % Preventivo </label>
					<div class="col-sm-4">
						<input class="form-control" id="budgetPreventivo" name="budgetPreventivo" placeholder=""  type="text" required>
	                </div> 
				</div>

				<div class="form-group"> <!-- Empieza una linea del formulario -->
					<label class="col-sm-3 control-label no-padding-right" for="budgetPlaneado"> Budget % Planned Work</label>
					<div class="col-sm-4">
						<input class="form-control" id="budgetPlaneado" name="budgetPlaneado" placeholder=""  type="text" required>
	                </div> 
				</div>

				<div class="form-group"> <!-- Empieza una linea del formulario -->
					<label class="col-sm-3 control-label no-padding-right" for="budgetProactivo">Budget % Proactive Work </label>
					<div class="col-sm-4">
						<input class="form-control" id="budgetProactivo" name="budgetProactivo" placeholder="" type="text" required>
	                </div> 
				</div>

				<div class="form-group"> <!-- Empieza una linea del formulario -->
					<label class="col-sm-3 control-label no-padding-right" for="mtbfTarget">MTBF Target </label>
					<div class="col-sm-4">
						<input class="form-control" id="mtbfTarget" name="mtbfTarget" placeholder="" type="text" required>
	                </div> 
				</div>

				<div class="center" style="width:50%; margin-right:auto; margin-left:auto;">
					<div class="hr hr-12 dotted"></div>

					<button class="btn btn-success" type="submit" name="GuardarEnDB">
						<i class="ace-icon fa fa-check bigger-110"></i>
							Guardar
					</button>
					
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
							Limpiar
					</button>
				</div>

			</form>

		</div><!-- /.page-content -->
	</div><!-- /.main-content-inner -->
</div><!-- /.main-content -->