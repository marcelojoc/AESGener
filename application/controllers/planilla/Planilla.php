<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilla extends My_Controller{

    function __construct(){
      	parent::__construct(); //Ejecuta el controlador del padre
		$this->load->model('Bienvenida_model');
		$this->load->helper('url');
		$this->load->library('miexcel');				
		$this->load->library('/Excel/PHPExcel');
		$this->load->library('/Excel/PHPExcel/IOFactory');		
  	}

  	function index(){
  		$data ="";
		$nombreVista="backend/planilla/upload_view";
		$this->cargarVista($nombreVista,$data);

	}

	public function subir(){
		//Ruta donde se guardan los ficheros
		$planilla['upload_path'] = './uploads/';

		//Tomo datos del sistema
		date_default_timezone_set('America/Santiago');
        $fecha = getdate();
        $anio = $fecha['year'];
        $mes = $fecha['mon'];
        $dia = $fecha['mday'];
        $hora = $fecha['hours'];
        $min = $fecha['minutes'];

        //Leo tipo de planilla
        $tipoP = $this->input->post('tipoPlanilla');

        if($tipoP == "aesgener"){

        	$planilla['file_name'] = 'AES_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';

        }elseif($tipoP == "sap"){

        	$planilla['file_name'] = 'SAP_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';
        }

		//Tipos de ficheros permitidos
		$planilla['allowed_types'] = 'xlsx';
		
		//Cargamos la librería de subida y le pasamos la configuración 
		$this->load->library('upload', $planilla);

		if(!$this->upload->do_upload()){

			/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/
			$error=array('error' => $this->upload->display_errors());
			$data="";
			$nombreVista="backend/planilla/upload_view";
			$this->cargarVista($nombreVista,$data);

		}else{

			//Datos del fichero subido
			//$datos["xls"]=$this->upload->data();
			// Podemos acceder a todas las propiedades del fichero subido 
			// $datos["img"]["file_name"]);
			//Agregar que muestre un msj de exito antes de refrescar
			redirect('/planilla/Planilla','refresh');
	
		}
	}

}  

?>