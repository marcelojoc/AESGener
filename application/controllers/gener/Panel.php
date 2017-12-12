<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends My_Controller{

	//#	region constructor de controlador test
	function __construct(){

		parent::__construct();
		//E		jecuta el controlador del padre
		$this->load->model('Bienvenida_model');
		
		$this->load->helper('url');

		$this->load->model('/prueba/Kpi_model');

	}
	
	
	//#	endregion constructor de controlador test
	
		function index(){


			
			
			$data="";
			
			$js['javascript']= ["vendor/vue-resource.js","app/component/grafic_component.js", "app/main_general.js"];

			$nombreVista="backend/panel/panel_general_view";

			$this->cargarVista($nombreVista,$data,$js);

		}


		public function est(){

				$data="";

				$js['javascript']= ["vendor/vue-resource.js","app/component/grafic_component.js", "app/main.js"];

				$nombreVista="backend/panel/panel_est_view";

				$this->cargarVista($nombreVista,$data,$js);
		}
			

		public function tac(){

            $data="";

            $js['javascript']= ["vendor/vue-resource.js", "app/component/grafic_component.js", "app/main_tac.js"];

            $nombreVista="backend/panel/panel_tac_view";

            $this->cargarVista($nombreVista,$data,$js);
			
		}
		
        
        
		
		
        public function ops(){
			
			$data="";
	
			$js['javascript']= ["vendor/vue-resource.js", "app/component/grafic_component.js", "app/main_op.js"];
	
			$nombreVista="backend/panel/panel_ops_view";
	
			$this->cargarVista($nombreVista,$data,$js);
			
			

        }

                


    }

	
	?>