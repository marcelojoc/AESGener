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
			$anio = $par->anio;
			$backlogBudget = $par->backlogBudget;
			$correctivoBudget = $par->correctivoBudget;
			$preventivoBudget = $par->preventivoBudget;
			$trabajoPlaneado = $par->trabajoPlaneado;
			$trabajoProactivo = $par->trabajoProactivo;
			$mtbfTarget = $par->mtbfTarget;
			$idPar = $par->idParametro;
		}

		$this->db->insert('parametro', 
			array('fecha' => $day, 
					'mes' => $data['mes'], 
					'anio' => $anio,
					'hsDispSemana' => $data['hsSemana'], 
					'activo' =>1,
					'idEmpleado' => $idEmpleado,
					'idDivSAP' => $data['divisionSAP'],
					'backlogBudget' => $backlogBudget,
					'correctivoBudget' => $correctivoBudget,
					'preventivoBudget' => $preventivoBudget,
					'trabajoPlaneado' => $trabajoPlaneado,
					'trabajoProactivo' => $trabajoProactivo,
					'mtbfTarget' => $mtbfTarget));
		$idParametro = $this->db->insert_id();

		$this->Parametros_model->updateParametro($idPar);
		
		return $idParametro;
	}

	function guardarAnuales($sesion, $day, $anio, $data){
		$idEmpleado = $sesion['idEmpleado'];

		$parametros = $this->Parametros_model->getMensuales();

		foreach($parametros as $par){
			$hsSemana = $par->hsDispSemana;
			$mes = $par->mes;
			$idDivisionSAP = $par->idDivSAP;
			$idPar = $par->idParametro; 

			$this->db->insert('parametro', 
			array('fecha' => $day, 
					'mes' => $mes, 
					'anio' => $anio,
					'hsDispSemana' => $hsSemana, 
					'activo' =>1,
					'idEmpleado' => $idEmpleado,
					'idDivSAP' => $idDivisionSAP,
					'backlogBudget' => $data['budgetBacklog'],
					'correctivoBudget' => $data['budgetCorrectivo'],
					'preventivoBudget' => $data['budgetPreventivo'],
					'trabajoPlaneado' => $data['budgetPlaneado'],
					'trabajoProactivo' => $data['budgetProactivo'],
					'mtbfTarget' => $data['mtbfTarget']));
			$idParametro = $this->db->insert_id();

			$this->Parametros_model->updateParametro($idPar);
		}
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

	function getMensuales(){
		$this->db->select('*');
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

	public function getMTBF($idDivSAP){
		$this->db->select('mtbfTarget');
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
}

?>