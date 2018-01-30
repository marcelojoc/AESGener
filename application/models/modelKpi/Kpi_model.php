<?php 
class Kpi_model extends CI_Model {
	
	public function __construct() {

		parent::__construct();
		$this->load->model('/modelKpi/Comment_model');
	}

	/**
	* Este metodo trae todas las maquinas de un a misma planilla
	* el primer paramerto es el id de la planilla
	* el segundo es opcional puedo pasar el id de maquina 
	* Devuelve el resultado encontrado, o falso si no hay nada
	*/

	public function getLists($idKpiPlanilla, $selector){

		/**
		 * 1) unidad generdora
		 * 2) Divicion
		 * 3) Complejo
		 */

		if($selector == "1"){

			$this->db->select('idUnidadGen AS id, nombreUG as nombre');
			$this->db->from('unidad_generadora');

		}
		
		if($selector == "2"){

			$this->db->select('idDivision AS id, nombreDivision as nombre');
			$this->db->from('division');

		}
		
		if($selector == "3"){

			$this->db->select('idComplejo AS id, nombreComplejo as nombre');
			$this->db->from('complejo');

		}

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();
		}else{

			return false;
		}

	}
	
	
	

	public function checkplanill($tablero, $anio=null, $mes=null){



		if($tablero == "est"){

			if($anio=="0" && $mes=="0" ){

				$fecha= $this->lastDay(1);
				
				$anio= $fecha['anio'];
				$mes = $fecha['mes'];
			}
			
				$this->db->limit(1);
				$this->db->order_by("idPlanilla", "desc"); 
				$this->db->where ('mes', $mes );
				$this->db->where ('anio', $anio );
				$this->db->where (' idTipoPlanilla= 1');
				$this->db->from('planilla');
				$this->db->select('idPlanilla');
				$query = $this->db->get();
				$idplnillaAes= $query->result();


				//pido las de planilla 2
				$this->db->limit(1);
				$this->db->order_by("idPlanilla", "desc"); 
				$this->db->where ('mes', $mes );
				$this->db->where ('anio', $anio );
				$this->db->where ('idTipoPlanilla= 2');
				$this->db->from('planilla');
				$this->db->select('idPlanilla');
				$query = $this->db->get();
				$idplanillaCosto= $query->result();

				//aqui verifico que si la segunda planilla no esta cargada la suplanto por null para que al menos 
				// muestre los datos de la primera tabla
			
					if(empty($idplanillaCosto)){

						$idplanillaCosto[]=['idPlanilla' =>null];
						
					}
				
			$resultado = array_merge($idplnillaAes, $idplanillaCosto);  // unifico los arreglos para devolver los resultados
			


			
		}else{


			if($tablero == "tac"){


				if($anio =="0" && $mes =="0" ){

					$fecha= $this->lastDay(1);
					$anio= $fecha['anio'];
					$mes = $fecha['mes'];

				}

					// si es panel tac  es el tipo de tabla 1 y 4
					$this->db->limit(1);
					$this->db->order_by("idPlanilla", "desc"); 
					$this->db->where ('mes', $mes );
					$this->db->where ('anio', $anio );
					$this->db->where (' idTipoPlanilla= 1');
					$this->db->from('planilla');
					$this->db->select('idPlanilla');
					$query = $this->db->get();
					$idplnillaAes= $query->result();


					//pido las de planilla 4 mes y año
					$this->db->limit(1);
					$this->db->order_by("idPlanilla", "desc"); 
					$this->db->where ('mes', $mes );
					$this->db->where ('anio', $anio );
					$this->db->where (' idTipoPlanilla= 4');
					$this->db->from('planilla');
					$this->db->select('idPlanilla');
					$query = $this->db->get();
					$idplnillaMtbf= $query->result();


				$resultado = array_merge($idplnillaAes , $idplnillaMtbf);  // unifico los arreglos para devolver los resultados




			}else{

				// panel operATIVO
				$resultado=[];
				$this->db->from('division_sap');
				$query = $this->db->get();
				$division_sap= $query->result(); // todas las diviciones de sap

				if($anio !="0" && $mes !="0" ){ // si es distinto de 0  entonces estoy buscando un mes especifico

					foreach($division_sap as $item){  
					
						// recorro cada una de las diviciones
						// buscando en las ultimas planillas  y traigo los id
	
						// si es panel op  es el tipo de tabla 3
						$this->db->limit(1);
						$this->db->order_by("idPlanilla", "desc"); 
						$this->db->where ('mes', $mes );
						$this->db->where ('anio', $anio );
						$this->db->like('url', $item->nombreDivSAP); 
						$this->db->where (' idTipoPlanilla= 3');
						$this->db->from('planilla');
						$this->db->select('*');
	
						$query = $this->db->get();
	
							if ($query->num_rows() > 0) {
								$dato= $query->result();
							
								$resultado[]=["id"=>$item->idDivSAP,
											  "nombreDivSAP"=>$item->nombreDivSAP,
											  "idPlanilla"=>$dato[0]->idPlanilla
							];
								
							}
	
					}

				}else{ // en este caso solo busco el ultimo cargado


					$fecha= $this->lastDay(3); // busco ultimo mes y año de carga de el tipo de planilla 3  sap

					foreach($division_sap as $item){  
					
						// recorro cada una de las diviciones
						// buscando en las ultimas planillas  y traigo los id
						// si es panel op  es el tipo de tabla 3
						$this->db->limit(1);
						$this->db->order_by("idPlanilla", "desc"); 
						$this->db->where ('mes', $fecha['mes'] );
						$this->db->where ('anio', $fecha['anio'] );
						$this->db->like('url', $item->nombreDivSAP); 
						$this->db->where (' idTipoPlanilla= 3');
						$this->db->from('planilla');
						$this->db->select('*');
	
	
						$query = $this->db->get();
	
							if ($query->num_rows() > 0) {
								$dato= $query->result();
							
								$resultado[]=["id"=>$item->idDivSAP,
											  "nombreDivSAP"=>$item->nombreDivSAP,
											  "idPlanilla"=>$dato[0]->idPlanilla
							];
								
							}
	
					}

				}

				return $resultado;

			}
		
		}

		// aqui compruebo si el array de resultado esta vacio
		// en caso de que este vacio devuelve falso disparando el alert de no hay datos
		//si hay al menos un dato  lo devuelve 

		if (count($resultado) > 1) {

			return $resultado;

		}else{

			return false;

		}



	}



	
	
	// 	traigo los valores de el cmplejo
	public function getValueComplejo($idComplejo , $idplnillaAes= null, $idPlanillaCosto= null){


				$this->db->where ('idDivision = 0' );
				$this->db->where ('idUnidadGen = 0');
				$this->db->where ('idComplejo', $idComplejo);				
				$this->db->where ('linea_aes.idPlanilla', $idplnillaAes);
				$this->db->select('
							linea_aes.idLineaAES, 
							linea_aes.actualMes, 
							linea_aes.targetMes, 
							linea_aes.ytdActual, 
							linea_aes.ytdTarget, 
							kpi.abreviaturaKPI AS nombreKPI');
		 		$this->db->from('linea_aes');
		 		$this->db->join('kpi','kpi.idKPI = linea_aes.idKPI','left');

				$query = $this->db->get();

					$array1= $query->result();  // almaceno el resultado en el array 1


				
					$this->db->where ('linea_costos.idPlanilla', $idPlanillaCosto);
					$this->db->where ('idDivision =0' );
					$this->db->where ('idComplejo', $idComplejo);
					$this->db->select('
								linea_costos.idLineaCostos,
								linea_costos.ctmActual,
								linea_costos.ctmBudget,
								kpi.abreviaturaKPI AS nombreKPI');
					 $this->db->from('linea_costos');
					 $this->db->join('kpi','kpi.idKPI = linea_costos.idKPI','left');
	
					 $query2 = $this->db->get();
					 
						$array2= $query2->result(); // vuelco el resultado en array2
						
				
					$arraytmp = array_merge($array1 , $array2);  // unifico los arreglos para devolver los resultados
					// compruebo que el array no este vacio
	
					if(count($arraytmp)==0) { 
	
						return false;
	
					}else{ 


						foreach($arraytmp as $item){

							if($item->nombreKPI == 'CTM OPEX'){
	
								$resultado[]=["idLineaCostos"=>$item->idLineaCostos, 
	
												"ctmActual"=>$item->ctmActual,
												"ctmBudget"=>$item->ctmBudget,
												"nombreKPI"=>$item->nombreKPI,
												"comentarios"=>$this->Comment_model->getComment( $item->idLineaCostos, 'c')
											];
	
							}else{
	
								$resultado[]=["idLineaAES"=>$item->idLineaAES, 
												"actualMes"=>$item->actualMes, 
												"targetMes"=>$item->targetMes, 
												"ytdActual"=>$item->ytdActual, 
												"ytdTarget"=>$item->ytdTarget, 
												"nombreKPI"=>$item->nombreKPI,
												"comentarios"=>$this->Comment_model->getComment( $item->idLineaAES, 'a')
											
											];
							}
	
						}
	
						return $resultado; 
					}  
	
		
	}
	
	
	
	
	// 	traigo valores de division
	public function getValueDiv($idDivision, $idplnillaAes= null, $idPlanillaCosto= null){



				$this->db->where ('idDivision',$idDivision );
				$this->db->where ('idUnidadGen= 0');
				$this->db->where ('idComplejo= 0');				
				$this->db->where ('linea_aes.idPlanilla', $idplnillaAes);
				$this->db->select('
							linea_aes.idLineaAES, 
							linea_aes.actualMes, 
							linea_aes.targetMes, 
							linea_aes.ytdActual, 
							linea_aes.ytdTarget, 
							kpi.abreviaturaKPI AS nombreKPI');
		 		$this->db->from('linea_aes');
		 		$this->db->join('kpi','kpi.idKPI = linea_aes.idKPI','left');

				$query = $this->db->get();

					
					$array1= $query->result(); 
					
				

				$this->db->where ('linea_costos.idPlanilla', $idPlanillaCosto);
				$this->db->where ('idDivision',$idDivision );
				$this->db->where ('idComplejo= 0');
				$this->db->select('
							linea_costos.idLineaCostos,
							linea_costos.ctmActual,
							linea_costos.ctmBudget,
							kpi.abreviaturaKPI AS nombreKPI');
		 		$this->db->from('linea_costos');
		 		$this->db->join('kpi','kpi.idKPI = linea_costos.idKPI','left');

				$query2 = $this->db->get();

				$array2= $query2->result(); 

				$arraytmp = array_merge($array1 , $array2);


				// compruebo que el array no este vacio


				if(count($arraytmp)==0) { 

					return false;

				}else{ 

					foreach($arraytmp as $item){

						if($item->nombreKPI == 'CTM OPEX'){

							$resultado[]=["idLineaCostos"=>$item->idLineaCostos, 

											"ctmActual"=>$item->ctmActual,
											"ctmBudget"=>$item->ctmBudget,
											"nombreKPI"=>$item->nombreKPI,
											"comentarios"=>$this->Comment_model->getComment( $item->idLineaCostos, 'c')
										];

						}else{

							$resultado[]=["idLineaAES"=>$item->idLineaAES, 
											"actualMes"=>$item->actualMes, 
											"targetMes"=>$item->targetMes, 
											"ytdActual"=>$item->ytdActual, 
											"ytdTarget"=>$item->ytdTarget, 
											"nombreKPI"=>$item->nombreKPI,
											"comentarios"=>$this->Comment_model->getComment( $item->idLineaAES, 'a')
										
										];
						}

					}


					// var_dump($resultado); exit;
					return $resultado; 
				}  

				

	}
	


	// 	traigo los valores de Unidades generadoras
	public function getValueUg( $idUg , $idPlanilla=null){
				
		/**
		 * recibo el id de la unidad generadora y el id de la planilla del mes seleccionado
		 */

		$resultado=[];
		$idLineaAES="";  // variable para almacenar el id de referencia al cual hacer los comentarios

				$this->db->where ('idUnidadGen',$idUg );
				$this->db->where ('idComplejo= 0');
				$this->db->where ('idDivision= 0');
				$this->db->where ('linea_aes.idPlanilla', $idPlanilla);
				$this->db->select('
							linea_aes.idLineaAES , 
							linea_aes.actualMes , 
							linea_aes.targetMes, 
							linea_aes.ytdActual, 
							linea_aes.ytdTarget, 
							kpi.abreviaturaKPI AS nombreKPI
							');
		 		$this->db->from('linea_aes');

		 		$this->db->join('kpi','kpi.idKPI = linea_aes.idKPI','left');

				$query = $this->db->get();



				if ($query->num_rows() > 0) {



					foreach($query->result() as $item){

						$resultado[]=["idLineaAES"=>$item->idLineaAES, 
										"actualMes"=>$item->actualMes, 
										"targetMes"=>$item->targetMes, 
										"ytdActual"=>$item->ytdActual, 
										"ytdTarget"=>$item->ytdTarget, 
										"nombreKPI"=>$item->nombreKPI,
										"comentarios"=>$this->Comment_model->getComment( $item->idLineaAES, 'a')
									
									];

					}

					return $resultado;

				}
				
				else{

					return false;

				}
		
	}
	

	// 	traigo los valores de Unidades generadoras
	public function getValueUgfortac( $idUg, $idplanillaAes, $idPlanillaMtbf){

		//var_dump($idplanillaAes);
		$resultado=[];
		$idLineaAES="";  // variable para almacenar el id de referencia al cual hacer los comentarios
		// $idPlanillaMtbf=25;

		$this->db->where ('linea_aes.idKPI = 5' ); // busco los HEDP
		$this->db->where ('linea_aes.idPlanilla',$idplanillaAes );
		$this->db->where ('linea_aes.idUnidadGen',$idUg );
		$this->db->select('linea_aes.hedp, kpi.nombreKPI');
		$this->db->join('kpi','kpi.idKPI = linea_aes.idKPI','left');
		$this->db->from('linea_aes');
		$query = $this->db->get();
		$hedp = $query->result();

		foreach($hedp as $item){
			
			$resultado[]=["nombre"=>"HEDP", "valor"=>$item->hedp, "leyenda"=>$item->nombreKPI];

		}

		$this->db->where ('linea_aes.idKPI = 7' ); // busco los HSF
		$this->db->where ('linea_aes.idPlanilla',$idplanillaAes );
		$this->db->where ('linea_aes.idUnidadGen',$idUg );
		$this->db->select('linea_aes.hsf, kpi.nombreKPI, linea_aes.idLineaAES');
		$this->db->join('kpi','kpi.idKPI = linea_aes.idKPI','left');
		$this->db->from('linea_aes');
		$query = $this->db->get();
		$hsf = $query->result();
	
		
		foreach($hsf as $item){

			// $resultado['hsf']=$item->hsf;
			$resultado[]=[ "idLineaAES"=> $item->idLineaAES ,"nombre"=>"HSF", "valor"=>$item->hsf, "leyenda"=>$item->nombreKPI];
			$idLineaAES=$item->idLineaAES;

		}

		$this->db->where ('linea_aes.idKPI = 6' ); // busco los Hedf
		$this->db->where ('linea_aes.idPlanilla',$idplanillaAes );
		$this->db->where ('linea_aes.idUnidadGen',$idUg );
		$this->db->select('linea_aes.hedf, kpi.nombreKPI');
		$this->db->join('kpi','kpi.idKPI = linea_aes.idKPI','left');
		$this->db->from('linea_aes');
		$query = $this->db->get();
		$hedf = $query->result();
		//array_push($resultado['hedf'],$hedf->hedf);
		foreach($hedf as $item){

			//$resultado['hedf']=$item->hedf;
			$resultado[]=["nombre"=>"HEDF", "valor"=>$item->hedf ,"leyenda"=>$item->nombreKPI];

		}


			$comentarios= $this->Comment_model->getComment( $idLineaAES, 'm'); // busco los comentarios de los hsf hedf y el otro
	
			//$resultado['hedf']=$item->hedf;
			// $resultado[]=["comentarios"=>$comentarios];
			$resultado['comments']=["comentarios"=>$comentarios, "idLineaAES"=>$idLineaAES ];

		

		$this->db->where ('linea_mtbf.idKPI = 8' ); // busco los MTBF
		$this->db->where ('linea_mtbf.idPlanilla',$idPlanillaMtbf );
		$this->db->where ('linea_mtbf.idUnidadGen',$idUg );
		$this->db->select('*');
		$this->db->from('linea_mtbf');
		$query = $this->db->get();
		$mtbf = $query->result();




		if ($query->num_rows() > 0) {
			
			foreach($mtbf as $item){
				
					$resultado['idLineaMTBF']=$item->idLineaMTBF;
					$resultado['mtbf']=$item->mtbf;
					$resultado['mtbfTarget']=$item->mtbfTarget;
					$resultado['tsf']=$item->tsf;
					$resultado['mtbfComments']=$this->Comment_model->getComment( $item->idLineaMTBF, 'm'); // aqui  mandar los comentarios de MTBF

			}

		}else{

			$resultado['mtbf']=false;
			$resultado['mtbfTarget']=false;
			$resultado['tsf']=false;
		}
		return $resultado;



}



	public function getCa($idCa=0 , $idPlanilla= null){
		//en este caso kpi planilla es 4, pero esto debe ser dinamico

		$this->db->select('  
							linea_aes.idLineaAES ,
							linea_aes.actualMes,
							linea_aes.targetMes,
							linea_aes.ytdActual,
							linea_aes.ytdTarget,
							planta.nombrePlanta
							');
		
		$this->db->from('linea_aes');
		$this->db->join('planta', 'linea_aes.idPlanta = planta.idPlanta','left');
		
		if($idCa != 0 ){  // si no envia parametros o es un valor inferior a 1 devuelve todos los valores

			$this->db->where ('linea_aes.idPlanta',$idCa );
		}else{

			$this->db->where ('linea_aes.idPlanta > 0' );
		}


		$this->db->where ('linea_aes.idPlanilla',$idPlanilla );	
				
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			
			$valores= $query->result();  // traigo todos los valores pedidos de los indicadores

			$resultado=[];

			foreach($valores as $item){

				$comentarios= $this->Comment_model->getComment( $item->idLineaAES, 'a');

				// array_push($valores[$key],  ['comentarios'=>$comentarios]);

				$resultado[]=[

					'idLineaAES'=>$item->idLineaAES,
					'actualMes'=>$item->actualMes,
					'targetMes'=>$item->targetMes,
					'ytdActual'=>$item->ytdActual,
					'ytdTarget'=>$item->ytdTarget,
					'nombrePlanta'=>$item->nombrePlanta,
					'comentarios'=>$comentarios,

					];
			}

			return $resultado;
						// return [$valores, 'comentarios'=>$comentarios];

		}else{

			return false;
		}


		
	}
	

	/**
	* Este metodo trae todas las maquinas de un a misma planilla
	* el primer paramerto es el id de la planilla
	* el segundo es opcional puedo pasar el id de maquina 
	* Devuelve el resultado encontrado, o falso si no hay nada
	*/

	public function getKpi(){

		$this->db->select('*');
		$this->db->from('kpi');
		$this->db->order_by("nroBloque", "asc");

		//$this->db->where('nroBloque',8);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $fila){

				$data[] = $fila;
			}
			return $data;

		}else{

			return false;

		}

	}
	

	public function getDivision($idKpiPlanilla, $idDivision = null){

		$this->db->select('*');

		$this->db->from('division');
		$this->db->where('idKPIPlanilla', $idKpiPlanilla);
		$this->db->where('idDivision', $idDivision);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {

			return $query->result();
			
		}
		else{

			return false;

		}

	}
	
	
	

	public function getDivSap(){

		$this->db->select('*');
		
				$this->db->from('division_sap');
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
		
					return $query->result();
					
				}
				else{
		
					return false;
				}

	}


	/**
	 * Este metodo trae la coleccion de datos de el tablero operativo
	 * mezcla dos fuentes
	 * 1) tabla parametros de cada unidad generadora
	 * 2) tabla linea_sap con los datos de  unidad generadora  y id planilla 
	 * que se guarda cuando es publicada la tabla de excel
	 */

	public function getDataDivSap($idDiv, $idPlanilla=null){

		$resultado=[];
		// traigo los paramentros para la division generadora
		//unificando con la tabla kpi
		//y la tabla linea_sap
				$this->db->where ('parametro.activo', 1 );
				$this->db->order_by('kpi.orden', 'asc');
				$this->db->where ('linea_sap.idPlanilla',$idPlanilla );
				$this->db->where ('linea_sap.idDivSAP',$idDiv );

				$this->db->select('
					linea_sap.idLineaSAP,
					linea_sap.hsPlanificadasBL,
					linea_sap.hsEjecutadasBL,
					linea_sap.hsPendientesBL,
					linea_sap.backlogReal,
					linea_sap.hsTrabRealTotal,
					linea_sap.hsTRCorrectivo,
					linea_sap.hsTRPreventivo,
					linea_sap.hsDispMensual,
					linea_sap.hsTRPlanificadas,
					linea_sap.cantOTCompletas,
					linea_sap.cantOTs,
					linea_sap.trabajoProactivo,
					parametro.trabajoProactivo as proactivoBudget,
					kpi.nombreKPI,
					parametro.backlogBudget,
					parametro.hsDispSemana,
					parametro.correctivoBudget,
					parametro.preventivoBudget,
					parametro.trabajoPlaneado
					
				');
				$this->db->from('linea_sap');
				$this->db->join('kpi','kpi.idKPI = linea_sap.idKPI','left');
				$this->db->join('parametro','parametro.idDivSAP = linea_sap.idDivSAP','left');
				 
				$query = $this->db->get();

				if ($query->num_rows() > 0) {

					foreach($query->result() as $item){

						$resultado[]=[  "idLineaSAP"=>$item->idLineaSAP, 
										"hsPlanificadasBL"=>$item->hsPlanificadasBL, 
										"hsEjecutadasBL"=>$item->hsEjecutadasBL, 
										"hsPendientesBL"=>$item->hsPendientesBL, 
										"backlogReal"=>$item->backlogReal, 
										"hsTrabRealTotal"=>$item->hsTrabRealTotal,
										"hsTRCorrectivo"=>$item->hsTRCorrectivo,
										"hsTRPreventivo"=>$item->hsTRPreventivo,
										"hsDispMensual"=>$item->hsDispMensual,
										"hsTRPlanificadas"=>$item->hsTRPlanificadas,
										"cantOTCompletas"=>$item->cantOTCompletas,
										"cantOTs"=>$item->cantOTs,
										"trabajoProactivo"=>$item->trabajoProactivo,
										"proactivoBudget"=>$item->proactivoBudget,
										"nombreKPI"=>$item->nombreKPI,
										"backlogBudget"=>$item->backlogBudget,
										"hsDispSemana"=>$item->hsDispSemana,
										"correctivoBudget"=>$item->correctivoBudget,
										"preventivoBudget"=>$item->preventivoBudget,
										"comentarios"=>$this->Comment_model->getComment( $item->idLineaSAP, 's')
									
									];

					}

					return $resultado;



				}
				else{
		
					return false;
				}
		
	}



	public function lastDay($tipo){

		//en base a ese año  saco el mes mas alto
		
		$this->db->where ('idTipoPlanilla', $tipo);
		$this->db->select_max('anio');
		$this->db->from('planilla');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {

			$anio= $query->result()[0]->anio; // guardo el año mayor para el tipo de planilla seleccionado

		}else{

			return false; // si no hay años cargados probablemente no hay fichas cargadas para ese tipo de planilla
		}

		$this->db->where ('anio', $anio);
		$this->db->where ('idTipoPlanilla', $tipo);
		$this->db->select_max('mes');
		$this->db->from('planilla');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {

			$mes= $query->result()[0]->mes; // guardo el año mayor para el tipo de planilla seleccionado

		}


		return ['anio'=>$anio , 'mes'=>$mes ];

	}




	
}

?>