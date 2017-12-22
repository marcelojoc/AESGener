<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AbmEmpleados_model extends CI_Model {
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function crearEmpleado($data){
		$this->db->insert('empleado', 
			array('nombreE'=>$data['nombreE'], 
					'apellidoE'=>$data['apellidoE'], 
					'telefono'=>$data['telefono'], 
					'direccion'=>$data['direccion'],
					'rut'=>$data['rut'],
					'email'=>$data['email'],
					'activo'=> 1,
					'idTipoEmpleado'=>$data['tipoEmpleado']));
		$codEmp = $this->db->insert_id();

		return $codEmp;
	}

	function obtenerEmpleados($rut){
		if ($rut == ''){
			$this->db->where('empleado.activo', 1);
			$this->db->from('empleado');
			$this->db->order_by('apellidoE','asc');
			$this->db->join('tipo_empleado', 'tipo_empleado.idTipoEmpleado = empleado.idTipoEmpleado', 'left');
			$query = $this->db->get();

		}else{
			$this->db->where('empleado.rut', $rut);
			$this->db->where('empleado.activo', 1);
			$this->db->from('empleado');
			$this->db->join('tipo_empleado', 'tipo_empleado.idTipoEmpleado = empleado.idTipoEmpleado', 'left');
			$query = $this->db->get();
		}
		
		if ($query->num_rows() > 0) return $query;
			else return false;	
	}

	function obtenerEmpleado($codE){
		$this->db->select('empleado.idEmpleado,empleado.apellidoE,
							empleado.nombreE,empleado.direccion,
							empleado.telefono,empleado.rut,
							empleado.email,empleado.idTipoEmpleado');
		$this->db->where('empleado.idEmpleado', $codE);
		$this->db->from('empleado');
		$this->db->join('tipo_empleado', 'tipo_empleado.idTipoEmpleado = empleado.idTipoEmpleado', 'left');
		$query = $this->db->get();

		if ($query->num_rows() > 0) return $query;
		else return false;
	}


	function obtenerEmpleadoByTipo($tipo = null){
		$this->db->select('empleado.idEmpleado,empleado.apellidoE,
							empleado.nombreE,empleado.direccion,
							empleado.telefono,empleado.rut,empleado.idTipoEmpleado');
		if($tipo != null){

			$this->db->where('empleado.idTipoEmpleado', $tipo);
			//$this->db->where('empleado.activo', 1);
		}
		
		$this->db->from('empleado');
		$this->db->order_by("empleado.nombreE", "asc"); 
		$query = $this->db->get();

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	function actualizarEmpleado($codE, $data){
		$datos = array(
			'nombreE'=>$data['nombreE'], 
			'apellidoE'=>$data['apellidoE'], 
			'telefono'=>$data['telefono'], 
			'direccion'=>$data['direccion'],
			'rut'=>$data['rut'],
			'email'=>$data['email'],
			'idTipoEmpleado'=>$data['idTipoEmpleado']
		);

		$this->db->where('empleado.idEmpleado', $codE);
		$this->db->update('empleado', $datos);
	}

	function getTipoEmpleado(){
		$this->db->select('*');
		$this->db->from('tipo_empleado');
		$this->db->order_by("nombreTipoE", "asc"); 
		$query = $this->db->get();

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	function eliminarEmpleado($codE){
		$datos = array('activo'=> 0);

		$this->db->where('empleado.idEmpleado', $codE);
		$query = $this->db->update('empleado', $datos);
	}	
}
?>