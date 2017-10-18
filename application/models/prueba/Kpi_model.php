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
	
	public function getMaquina($idKpiPlanilla){
		
		
		$this->db->select('idMaquina, nombreMaquina');
		
		
		$this->db->from('maquina');
		
		
		$this->db->where('idKPIPlanilla', $idKpiPlanilla);
		
		$this->db->order_by("idMaquina", "asc");
		
		
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
	
	public function getDivicion($idKpiPlanilla, $idDivision = null){
		
		
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