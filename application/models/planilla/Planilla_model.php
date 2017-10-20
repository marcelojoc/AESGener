<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilla_model extends CI_Model {
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function crearPlanilla($ruta, $fecha, $tipoP){
		$this->db->insert('planilla', 
			array('url'=>$ruta, 
					'dia'=>$fecha['mday'], 
					'mes'=>$fecha['mon'], 
					'anio'=>$fecha['year'],
					'idEmpleado'=>2,
					'idTipoPlanilla'=> $tipoP));
		$idPlanilla = $this->db->insert_id();
		return $idPlanilla;
	}

	function crearKPIPlanilla($idPlan, $idKPI){
		$this->db->insert('kpi_planilla', 
			array('idPlanilla'=>$idPlan, 
					'idKPI'=>$idKPI,
					'idUbicacion'=>$idKPI));
		$idKPIPlanilla = $this->db->insert_id();
		return $idKPIPlanilla;
	}

	function guardarDatos($data){
		//Crear en orden de mas grande a menor, Complejo, Division y Maquina
		$this->db->insert('maquina', 
			array('nombreMaquina'=>$data['nombreMaquina'], 
					'actualMes'=>$data['mesActual'], 
					'targetMes'=>$data['mesActual'], 
					'ytdActual'=>$data['ytdActual'],
					'ytdTarget'=>$data['ytdTarget']));
		$idMaquina = $this->db->insert_id();
		return $idMaquina;
	}

	function getKPI($nomKPI){
		$this->db->select('kpi.idKPI');
		$this->db->where('kpi.abreviatura', $nomKPI);
		$this->db->from('kpi');
		$query = $this->db->get();

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
		
}
?>