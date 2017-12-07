<?php 
class Kpi_model extends CI_Model {
	
	public function __construct() {

		parent::__construct();

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
	
	
	

	public function checkplanill($tablero){

		if($tablero == "est"){

			// si es panel estrategico  es el tipo de tabla 1 y 2
			$this->db->where (' idTipoPlanilla= 1 OR  idTipoPlanilla= 2');
			$this->db->select('*');
			$this->db->from('planilla');
			$this->db->order_by("idPlanilla", "ASC"); 
			$this->db->limit(2);

		}else{




		}

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();

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
								linea_costos.ctmActual,
								linea_costos.ctmBudget,
								kpi.abreviaturaKPI AS nombreKPI');
					 $this->db->from('linea_costos');
					 $this->db->join('kpi','kpi.idKPI = linea_costos.idKPI','left');
	
					 $query2 = $this->db->get();
					 
						$array2= $query2->result(); // vuelco el resultado en array2
						
				
					$resultado = array_merge($array1 , $array2);  // unifico los arreglos para devolver los resultados
					// compruebo que el array no este vacio
	
					if(count($resultado)==0) { 
	
						return false;
	
					}else{ 
	
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
							linea_costos.ctmActual,
							linea_costos.ctmBudget,
							kpi.abreviaturaKPI AS nombreKPI');
		 		$this->db->from('linea_costos');
		 		$this->db->join('kpi','kpi.idKPI = linea_costos.idKPI','left');

				 $query2 = $this->db->get();
				 
				
					
					$array2= $query2->result(); 
					
				

				$resultado = array_merge($array1 , $array2);
				// compruebo que el array no este vacio

				if(count($resultado)==0) { 

					return false;

				}else{ 

					return $resultado; 
				}  

				

	}
	


	// 	traigo los valores de Unidades generadoras
	public function getValueUg( $idUg , $idPlanilla=null){
				
		/**
		 * recibo el id de la unidad generadora y el id de la planilla del mes seleccionado
		 */
		

		
				$this->db->where ('idUnidadGen',$idUg );
				$this->db->where ('idComplejo= 0');
				$this->db->where ('idDivision= 0');
				$this->db->where ('linea_aes.idPlanilla', $idPlanilla);
				$this->db->select('
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

					return $query->result();

				}
				
				else{

					return false;

				}
		
	}
	
























	// 	traigo los valores de Unidades generadoras
	public function getValueUgfortac( $idUg){
		
		$this->db->where ('idUnidadGen',$idUg )->limit(1);

		$this->db->select('
		linea_aes.hedp, 
		linea_aes.hedf, 
		linea_aes.hsf, 
					');
		 $this->db->from('linea_aes');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();
		}else{
			return false;
		}

}



	public function getCa($idCa=0 , $idPlanilla= null){
		//en este caso kpi planilla es 4, pero esto debe ser dinamico
		
		$this->db->select('  
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
			
			return $query->result();

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



	public function getDataDivSap($idDiv){
		
		$this->db->where ('division_sap.idDivSAP',$idDiv );
				$this->db->select('*');
				$this->db->from('division_sap');
				$this->db->join('linea_sap','linea_sap.idDivSAP = division_sap.idDivSAP','left');
				$this->db->join('parametro','parametro.idDivSAP = division_sap.idDivSAP','left');
				 
						$query = $this->db->get();
						if ($query->num_rows() > 0) {
				
							return $query->result();
						}
						else{
				
							return false;
						}
		
			}




	
}

?>