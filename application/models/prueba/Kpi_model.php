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
	
	
	
	
	
	// 	traigo los valores de el cmplejo
	public function getValueComplejo($idComplejo){

				$this->db->select('
								valores.actualMes, 
								valores.targetMes, 
								valores.ytdActual, 
								valores.ytdTarget, 
								valores.ctmActual, 
								valores.ctmBudget, 
								kpi.abreviaturaKPI as nombreKPI
							');
				$this->db->from('valores');
				$this->db->join('kpi_planilla','kpi_planilla.idKPIPlanilla = valores.idKPIPlanilla','left');
				$this->db->join('kpi','kpi.idKPI = kpi_planilla.idKPI','left');

				$this->db->where ('idComplejo',$idComplejo );
				$this->db->where ('idDivision= 0' );
				$this->db->where ('idUnidadGen= 0');
				
				//S		ELECT * FROM valores WHERE `idComplejo`= 1  AND `idDivision`= 0 AND `idUnidadGen`= 0
				$query = $this->db->get();
				
				if ($query->num_rows() > 0) {
			
					return $query->result();

				}else{

					return false;

				}
		
	}
	
	
	
	
	// 	traigo valores de division
	public function getValueDiv($idDivision){
		
				$this->db->where ('idDivision',$idDivision );
				$this->db->where ('idUnidadGen= 0');
				$this->db->select('
								valores.actualMes, 
								valores.targetMes, 
								valores.ytdActual, 
								valores.ytdTarget, 
								valores.ctmActual, 
								valores.ctmBudget, 
								kpi.abreviaturaKPI as nombreKPI
							');
		 		$this->db->from('valores');
		 		$this->db->join('kpi_planilla','kpi_planilla.idKPIPlanilla = valores.idKPIPlanilla','left');
		 		$this->db->join('kpi','kpi.idKPI = kpi_planilla.idKPI','left');
		
				$query = $this->db->get();
		
		if ($query->num_rows() > 0) {

			return $query->result();

		}else{

			return false;

		}

	}
	


	// 	traigo los valores de Unidades generadoras
	public function getValueUg( $idUg){
				
				$this->db->where ('idUnidadGen',$idUg );
				$this->db->select('
								valores.actualMes, 
								valores.targetMes, 
								valores.ytdActual, 
								valores.ytdTarget, 
								valores.ctmActual, 
								valores.ctmBudget, 
								kpi.abreviaturaKPI as nombreKPI
							');
		 		$this->db->from('valores');
		 		$this->db->join('kpi_planilla','kpi_planilla.idKPIPlanilla = valores.idKPIPlanilla','left');
		 		$this->db->join('kpi','kpi.idKPI = kpi_planilla.idKPI','left');

				
				//S		ELECT * FROM valores WHERE `idComplejo`= 1  AND `idDivision`= 0 AND `idUnidadGen`= 0
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
						valores.hedp, 
						valores.hedf, 
						valores.hsf, 
					');
		 $this->db->from('valores');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();
		}else{
			return false;
		}

}



	public function getCa($idCa=0){
		//en este caso kpi planilla es 4, pero esto debe ser dinamico
		$kpi_estatico= 4;
		$this->db->select(' valores.idvalores, 
							valores.actualMes,
							valores.targetMes,
							valores.ytdActual,
							valores.ytdTarget,
							planta.nombrePlanta
							');
		
		$this->db->from('valores');

		$this->db->join('planta', 'valores.idPlanta = planta.idPlanta','left');
		
		if($idCa != 0 ){  // si no envia parametros o es un valor inferior a 1 devuelve todos los valores

			$this->db->where ('valores.idPlanta',$idCa );
		}
		$this->db->where ('valores.idKPIPlanilla',$kpi_estatico );	
				
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