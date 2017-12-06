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

			$request = json_decode(file_get_contents('php://input'));

			try{
			//COLOCAMOS LA PROGRAMACION QUE NECESITAMOS HACER Y EN ESTE MISMO LUGAR CONFIGURAMOS            
			//NUESTRAS EXCEPCIONES.
				if(is_object($request)){

					$id_ugen= $request->dato;
				}else{

					throw new Exception('‘Existio un error, provocado’',0);

				}
			}catch(Exception $e){

				$id_ugen= 4;
			}

			$datos=$this->Kpi_model->getValueUgfortac($id_ugen);

			print json_encode($datos, true);



		}



		function vrdivsap(){

			//trae todos las diviciones segun la tabla sap
			$datos=[];
			$datos=$this->Kpi_model->getDivSap();
			echo json_encode($datos);


		}

		function vrdivsapdatos(){

			$datos=[];
			if( isset($_GET) && !empty($_GET['idlist'])) {
				
				$idList= $_GET['idlist'];

				$datos=$this->Kpi_model->getDataDivSap($idList);

			}
			//trae todos las diviciones segun la tabla sap
			
			echo json_encode($datos);


		}



	}