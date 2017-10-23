<?php 
class Kpi_model extends CI_Model {
	
	
	
	
	public function __construct() {
		
		
		
		parent::__construct();
		
		
		
		$this->load->library('miexcel');
		
		
		
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
			
			
			
		}
		
		else{
			
			
			
			return false;
			
			
			
		}
		
		
		
	}
	
	
	
	
	
	// 	traigo los valores de el cmplejo
	public function getValueComplejo($idComplejo){
		
		
		
		$this->db->select('*');
		
		
		$this->db->from('valores');
		
		
		$this->db->where ('idComplejo',$idComplejo );
		
		
		$this->db->where ('idDivision= 0' );
		
		
		$this->db->where ('idUnidadGen= 0');
		
		
		//S		ELECT * FROM valores WHERE `idComplejo`= 1  AND `idDivision`= 0 AND `idUnidadGen`= 0
		$query = $this->db->get();
		
		
		
		if ($query->num_rows() > 0) {
	
			return $query->result();

		}
		
		else{

			
			return false;
			
			
			
		}
		
		
	}
	
	
	
	
	// 	traigo valores de division
	public function getValueDiv($idDivision){
		
		
		
		// 		$this->db->where ('idDivision',$idDivision );
		
		
		// 		$this->db->where ('idUnidadGen= 0');
		
		
		// 		$this->db->select('*');
		
		
		// 		$this->db->from('valores');
		
		
		// 		$this->db->join('division','division.idDivision = valores.idDivision','left');
		
		
		// 		$this->db->join('division','division.idDivision = valores.idDivision','left');
		
		
		$query = $this->db->query('SELECT * FROM valores  where valores.idDivision = '.$idDivision.' AND valores.idUnidadGen=0');
		
		
		
		//S		ELECT * FROM valores WHERE `idComplejo`= 1  AND `idDivision`= 0 AND `idUnidadGen`= 0
		// 		$query = $this->db->get();
		
		
		
		//S		ELECT * FROM valores WHERE `idComplejo`= 1  AND `idDivision`= 0 AND `idUnidadGen`= 0
		// 		$query = $this->db->get();
		
		
		if ($query->num_rows() > 0) {
			
			
			
			return $query->result();
			
			
			
		}
		
		else{
			
			
			
			return false;
			
			
			
		}
		
		
		
	}
	
	
	
	
	// 	traigo los valores de Unidades generadoras
	public function getValueUg( $idUg){
		
		
		
		$this->db->select('*');
		
		
		$this->db->from('valores');
		
		
		//$		this->db->join('unidad_generadora', 'unidad_generadora.idUnidadGen = valores.idUnidadGen');
		
		
		
		$this->db->where ('idUnidadGen',$idUg );
		
		
		//S		ELECT * FROM valores WHERE `idComplejo`= 1  AND `idDivision`= 0 AND `idUnidadGen`= 0
		$query = $this->db->get();
		
		
		
		if ($query->num_rows() > 0) {
			
			
			
			return $query->result();
			
			
			
		}
		
		else{
			
			
			
			return false;
			
			
			
		}
		
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/**
* Este metodo trae todas las maquinas de un a misma planilla
* el primer paramerto es el id de la planilla
* el segundo es opcional puedo pasar el id de maquina 
* Devuelve el resultado encontrado, o falso si no hay nada
*/
	
	
	
	
	public function getDatosMaquina($idKpiPlanilla, $idMaquina = null){
		
		
		
		
		
		
		
		
		
		
		
		$this->db->select('*');
		
		
		
		
		
		
		
		
		
		
		
		$this->db->from('maquina');
		
		
		
		
		
		
		
		
		
		
		
		$this->db->where('idKPIPlanilla', $idKpiPlanilla);
		
		
		
		
		
		
		
		
		
		
		
		if(!is_null($idMaquina)){
			
			
			
			
			
			
			
			
			
			
			
			$this->db->where('idMaquina', $idMaquina);
			
			
			
			
			
			
			
			
			
			
			
		}
		
		
		
		
		
		
		
		
		
		
		
		$this->db->order_by("idMaquina", "asc");
		
		
		
		
		
		
		
		
		
		
		
		$query = $this->db->get();
		
		
		
		
		
		
		
		
		
		
		
		if ($query->num_rows() > 0) {
			
			
			
			return $query->result();
			
			
			
		}
		
		
		
		else{
			
			
			
			return false;
			
			
			
		}
		
		
		
	}
	
	
	
	public function getKpi(){
		
		
		
		$this->db->select('*');
		
		
		
		$this->db->from('kpi');
		
		
		
		$this->db->order_by("nroBloque", "asc");
		
		
		
		//$		this->db->where('nroBloque',8);
		
		
		
		$query = $this->db->get();
		
		
		
		if ($query->num_rows() > 0) {
			
			
			
			foreach ($query->result() as $fila){
				
				
				
				$data[] = $fila;
				
				
				
			}
			
			
			
			return $data;
			
			
			
		}
		
		
		
		else{
			
			
			
			return false;
			
			
			
		}
		
		
		
	}
	
	
	
	
	
	
	/**
* Este metodo trae todas las maquinas de un a misma planilla
* el primer paramerto es el id de la planilla
* el segundo es opcional puedo pasar el id de maquina 
* Devuelve el resultado encontrado, o falso si no hay nada
*/
	
	
	
	
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
	
	
	
	
}













?>