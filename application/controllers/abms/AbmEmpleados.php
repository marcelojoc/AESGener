<?php
class AbmEmpleados extends My_Controller{

	function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url'); 
		$this->load->library('form_validation'); 
	}

	function index(){
		if (!isset($_POST['CargarTabla'])){
			$data['rut'] = '';
			$data['limiteTabla'] = "1000";
			$data['tablaEmpleados'] = $this->AbmEmpleados_model->obtenerEmpleados($data['rut']);	
		}

		$nombreVista="backend/abms/abmEmpleados_view";
		$this->cargarVista($nombreVista, $data);
	}

	function mostrarTablaEmpleados(){
		$data['rut'] = $this->input->post('rut');	
		$data['limiteTabla'] = "10000";
		$data['tablaEmpleados'] = $this->AbmEmpleados_model->obtenerEmpleados($data['rut']);	

      	$nombreVista="backend/abms/AbmEmpleados_view";
		$this->cargarVista($nombreVista, $data);
	}

	function cargarNuevoEmpleado(){	
		$data['tipoEmpleado'] = $this->AbmEmpleados_model->getTipoEmpleado();
		$nombreVista="backend/abms/abmEmpleadosAlta_view";
		$this->cargarVista($nombreVista, $data);
	}

	function recibirDatos(){
		$data = array(
		'nombreE' => $this->input->post('nombreE'),
		'apellidoE' => $this->input->post('apellidoE'),
		// 'telefono' => $this->input->post('telefono'),
		// 'direccion' => $this->input->post('direccion'),
		// 'rut' => $this->input->post('rut'),
		'tipoEmpleado' => $this->input->post('tipoEmpleado'),
		'email' => $this->input->post('email'));

        $this->form_validation->set_rules('nombreE','Nombre Empleado','trim|required');
        $this->form_validation->set_rules('apellidoE','Apellido Empleado','trim|required');
        //$this->form_validation->set_rules('rut','Nº RUT','trim|required');
        $this->form_validation->set_rules('tipoEmpleado','Tipo Responsable','trim|required');

       	$this->form_validation->set_message('required','Debe completar este campo'); 

        if ($this->form_validation->run() == FALSE) {
       		 echo '<script>alert("Debe completar todos los campos con *");</script>';
       		 redirect('/abms/AbmEmpleados/cargarNuevoEmpleado','refresh');

        } else {
            if (isset($_POST['GuardarEnDB'])){
				$this->AbmEmpleados_model->crearEmpleado($data);
			}

			redirect('/abms/AbmEmpleados','refresh');
        }	
	}

	function editarEmpleado(){
		$data['codE'] = $this->uri->segment(4);
		$data['empleado'] = $this->AbmEmpleados_model->obtenerEmpleado($data['codE']);
		$data['tipoEmpleado'] = $this->AbmEmpleados_model->getTipoEmpleado();
		
		$nombreVista="backend/abms/abmEmpleadosModificar_view";
		$this->cargarVista($nombreVista, $data);
	}

	function actualizarDatos(){
		$data['codE'] = $this->uri->segment(4);
		$datos = array(
					'nombreE' => $this->input->post('nombreE'),
					'apellidoE' => $this->input->post('apellidoE'),
					// 'telefono' => $this->input->post('telefono'),
					// 'direccion' => $this->input->post('direccion'),
					// 'rut' => $this->input->post('rut'),
					'idTipoEmpleado' => $this->input->post('idTipoEmpleado'),
					'email' => $this->input->post('email'));
 
        $this->form_validation->set_rules('nombreE','Nombre Empleado','trim|required');
        $this->form_validation->set_rules('apellidoE','Apellido Empleado','trim|required');
        //$this->form_validation->set_rules('rut','Nº Documento','trim|required');
        $this->form_validation->set_rules('idTipoEmpleado','Tipo Responsable','trim|required');

       	$this->form_validation->set_message('required','Debe completar este campo');  
 
        if ($this->form_validation->run() == FALSE) {
       		echo '<script>alert("Debe completar todos los campos con *");</script>';
       		redirect('/abms/AbmEmpleados/editarEmpleado/'.$data['codE'],'refresh');

        } else {
           	if (isset($_POST['ActualizarEnDB'])){
				$this->AbmEmpleados_model->actualizarEmpleado($this->uri->segment(4),$datos);
			}

			redirect('/abms/AbmEmpleados','refresh');
        }	
	}

	function borrarEmpleado(){
		$codE = $this->uri->segment(4);
		$this->AbmEmpleados_model->eliminarEmpleado($codE);

		redirect('/abms/AbmEmpleados','refresh');		
	}
}