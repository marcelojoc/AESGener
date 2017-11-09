<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilla extends My_Controller{

    function __construct(){
      	parent::__construct(); //Ejecuta el controlador del padre
		$this->load->model('Bienvenida_model');
		$this->load->helper('url');
		//$this->load->library('miexcel');				
		$this->load->library('/Excel/PHPExcel');
		$this->load->library('/Excel/PHPExcel/IOFactory');		
  	}

  	function index(){
  		$data ="";
		$nombreVista="backend/planilla/upload_view";
		$this->cargarVista($nombreVista,$data);

	}

	public function subir(){/*Falta pasar datos del empleado*/
		//Ruta donde se guardan los ficheros
		$planilla['upload_path'] = './uploads/';
		//Tipos de ficheros permitidos
		$planilla['allowed_types'] = 'xlsx';

		//Tomo datos del sistema
		date_default_timezone_set('America/Santiago');
        $fecha = getdate();
        $anio = $fecha['year'];
        $mes = $fecha['mon'];
        $dia = $fecha['mday'];
        $hora = $fecha['hours'];
        $min = $fecha['minutes'];

        //Leo tipo de planilla
        /*Modificar para que sea el idTIpoPlanilla*/
        $tipoP = $this->input->post('tipoPlanilla');

        if($tipoP == "aesgener"){

        	$planilla['file_name'] = 'AES_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';
        	//$archivo = base_url().'.uploads/'.$planilla['file_name'];
        	$archivo = './uploads/'.$planilla['file_name'];
        	
        	//Cargamos la librería de subida y le pasamos la configuración 
			$this->load->library('upload', $planilla);
			$this->upload->do_upload();

        	$objExcel = PHPExcel_IOFactory::load($archivo);
        	$objExcel->setActiveSheetIndex(0);
        	//$nroFilas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); //104 filas
        	$nroFilas = 4; 

        	//Crear Planilla
        	$idPlanilla = $this->Planilla_model->crearPlanilla($archivo, $fecha, $tipoP); 

        	for($i = 4; $i <= $nroFilas; $i++){
				
				$data['nombreMaquina'] = $objExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();  
			  	$data['mesActual'] = $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue()*100;
			  	$data['mesTarget'] = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue()*100;
			  	$data['ytdActual'] = $objExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue()*100;
			  	$data['ytdTarget'] = $objExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue()*100;

			  	$this->Planilla_model->guardarDatos($data, $idPlanilla);
		  
			}

        	// echo $nroFilas.'</br>';
        	// echo $data['nombreMaquina'].'</br>';
        	// echo $data['mesActual'].'</br>';
        	// echo $data['mesTarget'].'</br>';
        	// echo $data['ytdActual'].'</br>';
        	// echo $data['ytdTarget'].'</br>';
        	// die();


        	

        }elseif($tipoP == "sap"){

        	$planilla['file_name'] = 'SAP_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';


        	

        }elseif($tipoP == "mtbf"){
        	$nombreKPI = "MTBF";
        	$idKPI = $this->Planilla_model->getKPI($nombreKPI);

        	$planilla['file_name'] = 'MTBF_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';
        	//$archivo = base_url().'.uploads/'.$planilla['file_name'];
        	$archivo = './uploads/'.$planilla['file_name'];
        	
        	//Cargamos la librería de subida y le pasamos la configuración 
			$this->load->library('upload', $planilla);
			$this->upload->do_upload();

        	$objExcel = PHPExcel_IOFactory::load($archivo);
        	$objExcel->setActiveSheetIndex(0);
        	$nroFilas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

        	//Crear Planilla
        	$idPlanilla = $this->Planilla_model->crearPlanilla($archivo, $fecha, $tipoP);

        	//Crear KPI-Planilla
        	$idKPIPlanilla = $this->Planilla_model->crearKPIPlanilla($idPlanilla, $idKPI);

        }

		// if(!$this->upload->do_upload()){

		// 	/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/
		// 	$error=array('error' => $this->upload->display_errors());
		// 	$data="";
		// 	$nombreVista="backend/planilla/upload_view";
		// 	$this->cargarVista($nombreVista,$data);

		// }else{

		// 	//Datos del fichero subido
		// 	//$datos["xls"]=$this->upload->data();
		// 	// Podemos acceder a todas las propiedades del fichero subido 
		// 	// $datos["img"]["file_name"]);
		// 	//Agregar que muestre un msj de exito antes de refrescar
		// 	redirect('/planilla/Planilla','refresh');
	
		// }
	}

}  

?>