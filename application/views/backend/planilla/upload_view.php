<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Subir Planillas
				</h1>
			</div>

			<div class="row">
				<div class="center" style="width:50%; margin-right:auto; margin-left:auto;">
					<!-- <h3 class="header greenAES smaller lighter">
						Subir planilla al servidor
					</h3> -->
					
					<!-- our form -->
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>planilla/Planilla/subir" enctype="multipart/form-data">
						
						<div class="form-group"> <!-- Empieza linea del form con desplegable -->
							<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Tipo de Planilla</label>
								<div class="col-sm-5">
									<div>
										<select class="form-control" name="tipoPlanilla" placeholder="Seleccione Tipo Planilla"><!-- Codigo de Combo con datos de la BD -->
											<option value="">--- Seleccione Tipo Planilla ---</option>
											<option value="aesgener">Planilla AES Gener</option>
											<option value="costos">Planilla Costos</option>
											<option value="mtbf">Planilla MTBF</option>
											<option value="sap">Planilla SAP</option>
										</select>
									</div>
							</div>
						</div>
 
						<div class="form-group">
							<label class="ace-file-input ace-file-multiple">
								<input type="file" name="userfile" value="fichero" multiple="">
								<span class="ace-file-container" data-title="Seleccione el archivo aquí">
									<span class="ace-file-name" data-title="No File ...">
										<i class=" ace-icon fa fa-upload"></i>
									</span>
								</span>
								<!-- <a class="remove" href="#">
									<i class=" ace-icon fa fa-times"></i>
								</a> -->
							</label>
						</div> 

						<div class="hr hr-12 dotted"></div>
						
						<button type="submit" class="btn btn-sm btn-success">Cargar</button>
						<button type="reset" class="btn btn-sm">Limpiar</button>
					</form>
				</div>
 			</div>

		</div><!-- /.page-content -->
	</div><!-- /.main-content-inner -->
</div><!-- /.main-content -->



<!--Para que se vean los botones de la tabla responsive-->

    <script type="text/javascript">
      window.jQuery || document.write("<script src='../assets/js/jquery.js'>"+"<"+"/script>");
    </script>


    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
    </script>
    <script src="../assets/js/bootstrap.js"></script>