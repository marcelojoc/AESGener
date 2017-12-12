<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros extends My_Controller{

    function __construct(){
      	parent::__construct(); //Ejecuta el controlador del padre
        $this->load->model('parametros/Parametros_model');
		    $this->load->model('Bienvenida_model');	
        // $this->load->library('form_validation');
  	}

  	function index(){
  		  $data['meses'] = $this->Planilla_model->obtenerMeses(); 
  		  $data['divisionesSAP'] = $this->Planilla_model->obtenerDivisionesSAP();
		    $nombreVista="backend/parametros/cargaParametros_view";
		    $this->cargarVista($nombreVista,$data);
	  }

    public function datosMensuales(){
        $sesion = $this->session->userdata('logged_in');

        $data['mes'] = $this->input->post('mes');
        $data['divisionSAP'] = $this->input->post('divisionSAP');
        $data['hsSemana'] = $this->input->post('hsSemana');

        //Tomo fecha actual del sistema
        date_default_timezone_set('America/Santiago');
        $fecha = getdate();
        $anio = $fecha['year'];
        $mes = $fecha['mon'];
        $dia = $fecha['mday'];

        $day = $anio."-".$mes."-".$dia;

        if (isset($_POST['GuardarEnDB'])){
            $idParametro = $this->Parametros_model->guardarMensuales($sesion, $day, $mes, $data);

            echo '<script >alert("Parametros guardados con éxito!");</script>';
            redirect('/parametros/Parametros','refresh');
        }
    }

    public function datosAnuales(){
        $sesion = $this->session->userdata('logged_in');

        $anio = $this->input->post('anio');
        $data['budgetBacklog'] = $this->input->post('budgetBacklog');
        $data['budgetCorrectivo'] = $this->input->post('budgetCorrectivo');
        $data['budgetPreventivo'] = $this->input->post('budgetPreventivo');
        $data['budgetPlaneado'] = $this->input->post('budgetPlaneado');
        $data['budgetProactivo'] = $this->input->post('budgetProactivo');
        $data['mtbfTarget'] = $this->input->post('mtbfTarget');

        //Tomo fecha actual del sistema
        date_default_timezone_set('America/Santiago');
        $fecha = getdate();
        $year = $fecha['year'];
        $mes = $fecha['mon'];
        $dia = $fecha['mday'];

        $day = $year."-".$mes."-".$dia;

        if (isset($_POST['GuardarEnDB'])){
            $idParametro = $this->Parametros_model->guardarAnuales($sesion, $day, $anio, $data);

            echo '<script >alert("Parametros guardados con éxito!");</script>';
            redirect('/parametros/Parametros','refresh');
        }
    }
}
?>