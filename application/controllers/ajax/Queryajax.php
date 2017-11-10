<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Este controlador va a manejar todas las peticiones ajax
 * 
 * 
 * 
 */
class Queryajax extends My_Controller{

	//#	region constructor de controlador test
	function __construct(){

		parent::__construct();
		$this->load->model('Bienvenida_model');
		$this->load->helper('url');

		$this->load->model('/prueba/Kpi_model');

		
	}
	

		public function vrPrueba(){  // trae todos las unidades generadoras
			
			if(empty($_GET['page'])){
				
				$data = 1;
			}
			else{

				$data = $_GET['page'];
				
			}

			$lista=  $this->Kpi_model->getLists(1,$data);
			
			
			echo json_encode($lista);

		}




		public function vrdata(){  // trae los datos de cada unidad complejo o divicion

			if( isset($_GET) && (!empty($_GET['idlist']) ) && (!empty($_GET['idselect']) )){

				$idSelect= $_GET['idselect'];
				$idList= $_GET['idlist'];
				$datos=[];
				if($idSelect == "1"){ // busco por Unidad Gen

					$datos=$this->Kpi_model->getValueUg($idList);

				}else{

					if($idSelect == "2"){ // busca por division

						$datos=$this->Kpi_model->getValueDiv($idList);
						
					}else{               // Busca por Complejo

						$datos=$this->Kpi_model->getValueComplejo($idList);

					}
				}
				echo json_encode($datos);

			}else{


				echo('nada');
			}

		}


		// este metodo es donde accede la petiicion ajax  trae los datos de CA  independientes del resto
		public function vrcadata(){


			if( isset($_GET) || (!empty($_GET['idcaSelect'])) ){  // compruebo los datos enviados

				@$idcaSelect = $this->input->get('idcaSelect');  //si no hay nada o es 0  trae todo

				$datos=$this->Kpi_model->getCa($idcaSelect ? $idcaSelect : 0);

			}else{

				$datos=['sin datos'];
			}


			echo json_encode($datos);

		}





		// metodos parte tactica


		function vrtactic (){

			// if(empty($_GET['page'])){
				
			// 	$data = 1;
			// }
			// else{

			// 	$data = $_GET['page'];
				
			// }

			// $lista=  $this->Kpi_model->getLists(1,$data);


			// $lista= $_POST['dato'];
var_dump($_POST);
			//echo json_encode($lista);



		}



		function test(){

			$uno=$this->uri->segment(1); // controller
			$dos=$this->uri->segment(2); // action
			$tres=$this->uri->segment(3); // 1stsegment
			$cuatro=$this->uri->segment(4); // 2ndsegment



			echo($uno."<br>");
			echo($dos."<br>");
			echo($tres."<br>");
			echo($cuatro."<br>");


			var_dump($_POST);
		}



	}