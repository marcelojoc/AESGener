<?php 
class Kpi_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function getMaquina($idKpiPlantilla){
		$this->db->select('*');
		$this->db->from('maquina');
		$this->db->where('idKPIPlanilla', $idKpiPlantilla); 
		$this->db->order_by("idMaquina", "asc"); 
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {	
			return $query->result();
		}else{
			return false;
		}

	}


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

    
}

?>