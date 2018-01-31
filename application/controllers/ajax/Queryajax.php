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

		$this->load->model('/modelKpi/Kpi_model');
		$this->load->model('/modelKpi/Comment_model');

		
	}

	//area kpi
		public function vrcheckpanel(){

			// paso el tipo de tablero y devuelvo los id que se corresponden
			$tab = $_GET['tab'];
			$anio = $_GET['anio'];
			$mes = $_GET['mes'];

			$lista=  $this->Kpi_model->checkplanill($tab, $anio, $mes);

			echo json_encode($lista);

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
				$idplnillaAes=$_GET['idplanillaAes'];
				$idPlanillaCosto=$_GET['idPlanillaCos'];

				$datos=[];
				if($idSelect == "1"){ // busco por Unidad Gen

					$datos=$this->Kpi_model->getValueUg($idList,$idplnillaAes );

				}else{

					if($idSelect == "2"){ // busca por division

						$datos=$this->Kpi_model->getValueDiv($idList, $idplnillaAes, $idPlanillaCosto);
						
					}else{               // Busca por Complejo

						$datos=$this->Kpi_model->getValueComplejo($idList, $idplnillaAes, $idPlanillaCosto);

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
				@$idplanillaAes = $this->input->get('idplanillaAes');  //si no hay nada o es 0  trae todo

				$datos=$this->Kpi_model->getCa($idcaSelect ? $idcaSelect : 0, $idplanillaAes);

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
					$idplanillaAes =$request->idplanillaAes;
					$idPlanillaMtbf = $request->idPlanillaMtbf;
					$anio= $request->anio;
					$mes= $request->mes;

				}else{

					throw new Exception('‘Existio un error, provocado’',0);

				}
			}catch(Exception $e){

				$id_ugen= 4;
			}

			$datos=$this->Kpi_model->getValueUgfortac($id_ugen, $idplanillaAes, $idPlanillaMtbf );

			// var_dump($datos);

			print json_encode($datos, true);



		}


		function vrdivsap(){

			//trae todos las diviciones segun la tabla sap
			$tab = $_GET['tab'];
			$anio = $_GET['anio'];
			$mes = $_GET['mes'];
			
			$datos=$this->Kpi_model->checkplanill($tab, $anio, $mes);
			echo json_encode($datos);


		}

		function vrdivsapdatos(){

			$datos=[];
			if( isset($_GET) && !empty($_GET['idlist'])) {
				
				$idList= $_GET['idlist'];      // este es el id de division sap

				$idPlanilla= $_GET['idPlanilla']; // es la planilla correspondiente a la unidad generadora

				$datos=$this->Kpi_model->getDataDivSap($idList, $idPlanilla);

			}
			//trae todos las diviciones segun la tabla sap
			
			echo json_encode($datos);


		}


	// end area  kpi


		// metodos de commentarios


		public function getComment(){  // trae la lista de comentarios del indicador

			$linea = $_GET['linea'];
			$tipo = $_GET['tipo'];
			$lista=  $this->Comment_model->getComment($linea, $tipo);
			echo json_encode($lista);


		}
	
	
	
	
		public function saveComment(){  // guarda un comentario bajo un indicador
	
			
			$comentario = $_GET['comment'];
			$empleado = $_GET['empleado'];
			$aes = $_GET['aes'];
			$sap = $_GET['sap'];
			$mtbf = $_GET['mtbf'];
			$cost = $_GET['cost'];
			$hoy = date("Y-m-d");  

			$data = array(
				'comentario' => $comentario ,
				'fecha' => $hoy ,
				'idEmpleado' => $empleado ,
				'idLineaAES' => $aes ,
				'idLineaSAP' => $sap ,
				'idLineaMTBF' => $mtbf ,
				'idLineaCostos' => $cost ,
				'estado' => '1'
			 );
			 
			 $consulta= $this->db->insert('comentario', $data); 
	
			 if( $consulta ){

				 $last_id = $this->db->insert_id();
				 echo $last_id;

			 }else{

				echo false;
			 }

	
		}
	
	
	
		public function closeComment (){  // no elimina sino cambia el estado de un comentario bajo un indicador
	 
			$id= $_GET['idComment'];

			$respuesta= $this->Comment_model->setComment(false, $id);

			echo json_encode($respuesta);
	
		}

		public function activeComment (){  // no elimina sino cambia el estado de un comentario bajo un indicador
	 
			$id= $_GET['idComment'];

			$respuesta= $this->Comment_model->setComment(true, $id);

			echo json_encode($respuesta);
	
		}


	
	
		public function editComment(){   // Editar un comentario  pero eso es para despues
	
			$id= $_GET['idComment'];
			$comentario = $_GET['comment'];
			$empleado = $_GET['empleado'];
			$aes = $_GET['aes'];
			$sap = $_GET['sap'];
			$mtbf = $_GET['mtbf'];
			$cost = $_GET['cost'];
			$hoy = date("Y-m-d"); 

			$data = array(
				'comentario' => $comentario ,
				'fecha' => $hoy ,
				'idEmpleado' => $empleado ,
				'idLineaAES' => $aes ,
				'idLineaSAP' => $sap ,
				'idLineaMTBF' => $mtbf ,
				'idLineaCostos' => $cost ,
				'estado' => '1'
			);

			$this->db->where('id', $id);
			$this->db->update('comentario', $data); 
	
		}







	}