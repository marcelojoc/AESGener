<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros_model extends CI_Model {
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function guardarMensuales($sesion, $day, $mes, $data){
		$idEmpleado = $sesion['idEmpleado'];

		$parametro = $this->Parametros_model->getAnuales($data['divisionSAP']);

		foreach($parametro as $par){
			$backlogBudget = $par->backlogBudget;
			$correctivoBudget = $par->correctivoBudget;
			$preventivoBudget = $par->preventivoBudget;
			$trabajoPlaneado = $par->trabajoPlaneado;
			$trabajoProactivo = $par->trabajoProactivo;
			$idPar = $par->idParametro;
		}

		$this->db->insert('parametro', 
			array('fecha' => $day, 
					'mes' => $data['mes'], 
					'hsDispSemana' => $data['hsSemana'], 
					'activo' =>1,
					'idEmpleado' => $idEmpleado,
					'idDivSAP' => $data['divisionSAP'],
					'backlogBudget' => $backlogBudget,
					'correctivoBudget' => $correctivoBudget,
					'preventivoBudget' => $preventivoBudget,
					'trabajoPlaneado' => $trabajoPlaneado,
					'trabajoProactivo' => $trabajoProactivo));
		$idParametro = $this->db->insert_id();

		$this->Parametros_model->updateParametro($idPar);
		
		return $idParametro;
	}

	function getAnuales($idDivSAP){
		$this->db->select('*');
		$this->db->where('idDivSAP', $idDivSAP);
		$this->db->where('activo', 1);
		$this->db->from('parametro');
		$query = $this->db->get();

		if ($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}	
			return $data;
		}else{
			return false;
		}
	}

	function updateParametro($idParametro){
		$data = array('activo' => 0);
		$this->db->where('idParametro', $idParametro);
		$this->db->update('parametro', $data); 
	}

}


?>