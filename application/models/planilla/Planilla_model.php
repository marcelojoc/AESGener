<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilla_model extends CI_Model {
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function crearPlanilla($ruta, $fecha, $anio, $mes, $tipoP){
		//Asignar idEmpleado Real
		//Asignar idEmpleado Real
		//Asignar idEmpleado Real
		//Asignar idEmpleado Real
		$this->db->insert('planilla', 
			array('url'=>$ruta, 
					'dia'=>$fecha['mday'], 
					'mes'=>$mes, 
					'anio'=>$anio,
					'idEmpleado'=>2,
					'idTipoPlanilla'=> $tipoP));
		$idPlanilla = $this->db->insert_id();
		return $idPlanilla;
	}

	function getKPI($nomKPI){
		$this->db->select('*');
		$this->db->where('kpi.abreviaturaKPI', $nomKPI);
		$this->db->from('kpi');
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

	function obtenerMeses(){
		$this->db->select('*');
		$this->db->from('mes');
		$query = $this->db->get();

		if ($query->num_rows() > 0) return $query;
			else return false;	
	}

	function obtenerTiposPlanillas(){
		$this->db->select('*');
		$this->db->from('tipo_planilla');
		$query = $this->db->get();

		if ($query->num_rows() > 0) return $query;
			else return false;	
	}

	function obtenerDivisionesSAP(){
		$this->db->select('*');
		$this->db->from('division_sap');
		$query = $this->db->get();

		if ($query->num_rows() > 0) return $query;
			else return false;
	}

	function buscarUbicacion($fi, $col, $idKPI){
		$this->db->select('*');
		$this->db->where('ubicacion.idKPI', $idKPI);
		$this->db->where('ubicacion.letra', $col);
		$this->db->where('ubicacion.nro', $fi);
		$this->db->from('ubicacion');
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

	function buscarUbicacionKPI($idKPI){
		$this->db->select('*');
		$this->db->where('ubicacion.idKPI', $idKPI);
		$this->db->where('ubicacion.idUnidadGen', 0);
		$this->db->where('ubicacion.idDivision', 0);
		$this->db->where('ubicacion.idComplejo', 0);
		$this->db->where('ubicacion.idPlanta', 0);
		$this->db->from('ubicacion');
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

	function crearLineaMTBF($mtbf, $mtbfTarget, $idUnidadGen, $idPlanilla, $idKPI){
		$this->db->insert('linea_mtbf', 
			array('mtbf'=>$mtbf, 
					'mtbfTarget'=>$mtbfTarget, 
					'idUnidadGen'=>$idUnidadGen,
					'idPlanilla'=> $idPlanilla,
					'idKPI'=> $idKPI));
		$idLineaMTBF = $this->db->insert_id();
		return $idLineaMTBF;
	}

	function crearLineaCostos($ctmActual, $ctmBudget, $idDivision, $idComplejo, $idPlanilla, $idKPI){
		$this->db->insert('linea_costos', 
			array('ctmActual'=>$ctmActual, 
					'ctmBudget'=>$ctmBudget, 
					'idDivision'=>$idDivision,
					'idComplejo'=>$idComplejo,
					'idPlanilla'=> $idPlanilla,
					'idKPI'=> $idKPI));
		$idLineaCostos = $this->db->insert_id();
		return $idLineaCostos;
	}

	function crearLineaAES($actualMes, $targetMes, $ytdActual, $ytdTarget, $fyf, $fyBudget, $hedp, $hedf, $hsf,
                            $idUnidadGen, $idDivision, $idComplejo, $idPlanilla, $idKPI){
		$this->db->insert('linea_aes', 
			array('actualMes'=>$actualMes, 
					'targetMes'=>$targetMes,
					'ytdActual'=>$ytdActual,
					'ytdTarget'=>$ytdTarget,
					'fyf'=>$fyf,
					'fyBudget'=>$fyBudget,
					'hedp'=>$hedp,
					'hedf'=>$hedf,
					'hsf'=>$hsf,
					'idUnidadGen'=>$idUnidadGen, 
					'idDivision'=>$idDivision,
					'idComplejo'=>$idComplejo,
					'idPlanilla'=> $idPlanilla,
					'idKPI'=> $idKPI));
		$idLineaAES = $this->db->insert_id();
		return $idLineaAES;
	}
		
}


	// function crearValor($actualMes, $targetMes, $ytdActual, $ytdTarget, $fyf, $fyBudget, $hedp, $hedf, $hsf, $mtbf, $mtbfTarget, 
	// 					$ctmActual, $ctmBudget, $idUnidadGen, $idDivision, $idComplejo ,$idKPIPlanilla, $idPlanta){
	// 	$this->db->insert('valores', 
	// 		array('actualMes'=>$actualMes,
	// 				'targetMes'=>$targetMes,
	// 				'ytdActual'=>$ytdActual,
	// 				'ytdTarget'=>$ytdTarget,
	// 				'fyf'=>$fyf,
	// 				'fyBudget'=>$fyBudget,
	// 				'hedp'=>$hedp,
	// 				'hedf'=>$hedf,
	// 				'hsf'=>$hsf,
	// 				'mtbf'=>$mtbf, 
	// 				'mtbfTarget'=>$mtbfTarget, 
	// 				'ctmActual'=>$ctmActual, 
	// 				'ctmBudget'=>$ctmBudget,
	// 				'idUnidadGen'=>$idUnidadGen,
	// 				'idDivision'=>$idDivision,
	// 				'idComplejo'=>$idComplejo,
	// 				'idKPIPlanilla'=> $idKPIPlanilla,
	// 				'idPlanta'=>$idPlanta));
	// 	$idValores = $this->db->insert_id();
	// 	return $idValores;
	// }




	// function crearKPIPlanilla($idPlan, $idKPI){
	// 	$this->db->insert('kpi_planilla', 
	// 		array('idPlanilla'=>$idPlan, 
	// 				'idKPI'=>$idKPI,
	// 				'idUbicacion'=>$idKPI)); //Cambia aca que ponga una ubicacion real
	// 	$idKPIPlanilla = $this->db->insert_id();
	// 	return $idKPIPlanilla;
	// }

	// function guardarDatos($data){
	// 	//Crear en orden de mas grande a menor, Complejo, Division y Maquina
	// 	$this->db->insert('maquina', 
	// 		array('nombreMaquina'=>$data['nombreMaquina'], 
	// 				'actualMes'=>$data['mesActual'], 
	// 				'targetMes'=>$data['mesActual'], 
	// 				'ytdActual'=>$data['ytdActual'],
	// 				'ytdTarget'=>$data['ytdTarget']));
	// 	$idMaquina = $this->db->insert_id();
	// 	return $idMaquina;
	// }

?>


