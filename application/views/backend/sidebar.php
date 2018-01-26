<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<!--Comienza MenÃº de usuario-->	
					<ul class="nav ace-nav">
						<!-- #section:basics/navbar.user_menu -->
						<li class="blueAES">

							<a data-toggle="dropdown" href="#" class="dropdown-toggle" aria-expanded="true">
								<span class="menu-text">
									<small><?php $session_data = $this->session->userdata('logged_in'); 
													echo 'Bienvenido, &nbsp'.$session_data['nombreE'];?> 
									</small>									
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo base_url() ?>/login/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>

						</li>
						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

		</div><!-- /.navbar-container -->
	</div>
</body>


		<!-- /section:basics/navbar.layout -->
	<div class="main-container" id="main-container">

		<script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>

			<!-- #section:basics/sidebar -->
		<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

			<ul class="nav nav-list">

				<?php 
					if ($nivel){							
						foreach($nivel->result() as $niv){
      						if ($niv->descripNivel == "Administrador"){
				?>

				<!-- <li class="">
					<a href="<?php echo base_url()?>Bienvenida">
						<i class="menu-icon fa fa-wrench"></i>
						<span class="menu-text">Configuración</span>
					</a>

					<b class="arrow"></b>
				</li> -->

				<?php 		}
						}	
					}
				?>

				<?php 
					if ($nivel){							
						foreach($nivel->result() as $niv){
      						if ($niv->descripNivel == "Administrador"){
				?>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-cogs"></i> 
							<span class="menu-text">Gestiones Internas</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url()?>abms/AbmEmpleados">
									<i class="menu-icon fa fa-caret-right"></i>
									Empleados
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
				</li>

				<?php 		}
						}	
					}
				?>

				<?php 
					if ($nivel){							
						foreach($nivel->result() as $niv){
      						if ($niv->descripNivel == "Administrador"){
				?>

				<li class="">
					<a href="<?php echo base_url()?>parametros/Parametros">
						<i class="menu-icon fa fa-cog"></i>
						<span class="menu-text">Parámetros</span>
					</a>

					<b class="arrow"></b>
				</li>

				<?php 		}
						}	
					}
				?>

				<?php 
					if ($nivel){							
						foreach($nivel->result() as $niv){
      						if ($niv->descripNivel == "Administrador"){
				?>

				<li class="">
					<a href="<?php echo base_url()?>planilla/Planilla">
						<i class="menu-icon fa fa-upload"></i>
						<span class="menu-text">Planillas</span>
					</a>

					<b class="arrow"></b>
				</li>

				<?php 		}
						}	
					}
				?>

				<?php 
					if ($nivel){							
						foreach($nivel->result() as $niv){
      						if ($niv->descripNivel == "Administrador" || 
      							$niv->descripNivel == "Visualizador"){
				?>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Tableros</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					
					<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('gener/general')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									General
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('gener/est')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Estratégico
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('gener/tac')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Táctico
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('gener/ops')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Operativo
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url('gener/history')?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Historico
								</a>
								<b class="arrow"></b>
							</li>

						</ul>
				</li>				
				<?php 		}
						}	
					}
				?>
					
				<?php 
					if ($nivel){							
						foreach($nivel->result() as $niv){
      						if ($niv->descripNivel == "Administrador"){
				?>
				<li class="">
					<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Usuarios </span>
							<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url()?>seguridad/AbmUsuarios">
									<i class="menu-icon fa fa-caret-right"></i>
									Gestionar Usuarios
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
				</li>

				<?php 		}
						}	
					}
				?>
				
				<li class="">
					<a href="<?php echo base_url('Bienvenida') ?>">
						<i class="menu-icon fa fa-reply-all"></i>
						<span class="menu-text"> Inicio</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo base_url('login/logout') ?>">
						<i class="menu-icon fa fa-power-off"></i>
						<span class="menu-text"> Salir</span>
					</a>
					<b class="arrow"></b>
				</li>		

			</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
		</div>
	
