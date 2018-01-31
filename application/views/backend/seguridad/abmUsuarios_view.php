<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
				<div class="page-header">
						<h1>
							 Gestionar Usuarios
						</h1>
				</div>				
	

		<!-- Tabla para asignar Usuarios a cada Empleado-->	

		<form class="form-horizontal" role="form" action="<?php echo base_url() ?>abms/AbmEmpleados/mostrarTablaEmpleados" method="post"><!-- Comienza formulario -->
			<h4 class="row header smaller lighter blue">
                <span class="col-xs-12"> Tabla Empleados </span><!-- /.col -->
            </h4>
			
		<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
				<div class="row">

					<div class="col-xs-6">
						<div class="dataTables_length" id="longitudTabla">
							<button class="btn btn-purple btn-xs" type="submit" nombre="CargarTabla">
								<i class="fa fa-sign-in bigger-110 icon-only"></i> Gestionar Empleados
							</button>
						</div>
					</div>

					<!-- <div class="col-xs-6">
						<div id="dynamic-table_filter" class="dataTables_filter">

							<label>Nº RUT:
								<input type="search" class="form-control input-sm" placeholder="" name="rut" aria-controls="dynamic-table">
							</label>

							<button class="btn btn-greenAES btn-xs" type="submit" nombre="CargarTabla2" title="Buscar">
								<i class="ace-icon fa fa-search  bigger-110 icon-only"></i>
							</button>

						</div>
					</div> -->
				</div>

				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
							<tr>
								<th>Apellido y Nombre</th>
								<!-- <th>RUT</th>
								<th>Teléfono</th> -->
								<th>E-Mail</th>
								<th>Tipo Empleado</th>
								<th></th>
							</tr>
					</thead>

					<tbody>

						<?php //Limitar los datos segun lo que trae el select de cantidad de lineas a mostrar

							if ($tablaEmpleados){

								$contador = 0;
								foreach($tablaEmpleados->result() as $tabla){
									if( $contador == $limiteTabla )    break;
						?>

						<tr>
							<td>
								<label class="pos-rel">
									<?php echo $tabla->apellidoE; ?> <?php echo $tabla->nombreE; ?>
								</label>
							</td>
							<!-- <td><?= $tabla->rut;?></td>
							<td><?= $tabla->telefono;?></td> -->	
							<td><?= $tabla->email;?></td>	
							<td><?= $tabla->nombreTipoE; ?></td>
							
							<td>
								<div class="hidden-sm hidden-xs action-buttons text-center">
						
										<?php if(!$this->AbmUsuarios_model->tieneUsuario($tabla->idEmpleado)){?>			
										
										<a class="greenAES" href="<?php echo base_url()?>seguridad/AbmUsuarios/cargarNuevoUsuario/<?= $tabla->idEmpleado;?>">
											<i class="ui-icon ace-icon fa fa-plus-circle greenAES bigger-130"></i> Asignar Usuario
										</a>

										<?php }
										?>							
								</div>

								<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">

											<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
													
												<li>
													<a href="<?php echo base_url()?>seguridad/AbmUsuarios/cargarNuevoUsuario/<?= $tabla->idEmpleado;?>" class="tooltip-info" data-rel="tooltip" title="Asignar Usuario">
														<span class="blue">
															<i class="ace-icon fa fa-plus-circle bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
								</div>
							</td>
						</tr>

						<?php	 $contador++;}
							}	
						?>

					</tbody>
				</table>
			</div>
		</form>


		<br>


	<!-- Tabla para asignar Editar Datos de Usuario a cada Empleado con Usuario ya asignado-->	
		<form class="form-horizontal" role="form" action="<?php echo base_url() ?>seguridad/AbmUsuarios/mostrarTablaUsuarios" method="post"><!-- Comienza formulario -->
			<h4 class="row header smaller lighter blue">
                <span class="col-xs-12"> Tabla Usuarios </span><!-- /.col -->
            </h4>	

			<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
				<div class="row">

					<div class="col-xs-6">
						<div class="dataTables_length" id="longitudTabla">
							<label>Mostrar 
							<select aria-controls="dynamic-table" class="form-control input-sm" name="longitudTabla" id="longitudTabla" OnChange="longitudOnChange(this)">
								<option value="2000">Todos</option>
								<option value="3">3</option>
								<option value="20">20</option>
								<option value="40">40</option>
								<option value="60">60</option>
								<option value="80">80</option>
								<option value="100">100</option>
							</select> lineas
							</label>

							<button class="btn btn-grey btn-xs" type="submit" nombre="CargarTabla">
								<i class="fa fa-check bigger-110 icon-only"></i> Filtrar
							</button>
						</div>
					</div>

					<div class="col-xs-6">
							<div id="dynamic-table_filter" class="dataTables_filter">

								<label>Nombre Usuario:
									<input type="search" class="form-control input-sm" placeholder="" name="nombresUsuarios" aria-controls="dynamic-table">
								</label>

								<button class="btn btn-greenAES btn-xs" type="submit" nombre="CargarTabla1" title="Buscar">
									<i class="ace-icon fa fa-search  bigger-110 icon-only"></i>
								</button>

							</div>
					</div>
				</div>

				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
							<tr>
								<th>Apellido y Nombre</th>
								<!-- <th>RUT</th> -->
								<th>Nivel de Usuario</th>
								<th>Usuario</th>					
								<th></th>
							</tr>
					</thead>

					<tbody>

						<?php //Limitar los datos segun lo que trae el select de cantidad de lineas a mostrar
							if ($tablaUsuarios){
							$contador = 0;
									
								foreach($tablaUsuarios->result() as $tabla){

									
									if( $contador == $limiteTabla )    
										break;
						?>

						<tr>
							<td>
								<label class="pos-rel">
									<?php echo $tabla->apellidoE;?> <?php echo $tabla->nombreE;?>
								</label>
							</td>
							<!-- <td><?= $tabla->rut;?></td> -->
							<?php //Traer todos los niveles para mostrar el de cada usuario
								if ($niveles){						
									foreach($niveles->result() as $niv){
										if($niv->idNivel==$tabla->idNivel){
											$nivel=$niv->descripNivel;
										}
									}
								}					
							?>
							<td><?= $nivel;?></td>
							<td><?= $tabla->usuario;?></td>
							
							<td>
								<div class="hidden-sm hidden-xs action-buttons center">
										
										<a class="purple" href="<?php echo base_url()?>seguridad/AbmUsuarios/editarUsuario/<?= $tabla->idUsuario;?>">
											<i class="ace-icon fa fa-pencil bigger-130"></i>	
										</a>

										<a class="grey" href="<?php echo base_url()?>seguridad/AbmUsuarios/borrarUsuario/<?= $tabla->idUsuario;?>">
											<i class="ace-icon fa fa-trash-o bigger-130"></i>
										</a>
								</div>

								<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">

											<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
													
													<li>
														<a href="<?php echo base_url()?>seguridad/AbmUsuarios/editarUsuario/<?= $tabla->idUsuario;?>" class="tooltip-success" data-rel="tooltip" title="Editar Usuario">
															<span class="purple">
																<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
															</span>
														</a>
													</li>

													<li>
														<a href="<?php echo base_url()?>seguridad/AbmUsuarios/borrarUsuario/<?= $tabla->idUsuario;?>" class="tooltip-error" data-rel="tooltip" title="Eliminar Usuario">
															<span class="grey">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</span>
														</a>
													</li>
											</ul>
										</div>
								</div>
							</td>
						</tr>

						<?php	 $contador++;}
							}	
						?>

					</tbody>
				</table>
			</div><!-- Termina el cuadro con Medicamentos de la bd -->
		</form>


		</div><!-- /.page-content -->
	</div><!-- /.main-content-inner -->
</div><!-- /.main-content -->



<script type="text/javascript">
	function longitudOnChange(sel){
		if (sel.value=="10"){			
		}else if (sel.value=="20"){
		}else if (sel.value=="40"){		
		}else if (sel.value=="60"){			
		}else if (sel.value=="80"){	
		}else if (sel.value=="100"){		
		}
	}
</script>
