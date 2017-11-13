<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilla extends My_Controller{

    function __construct(){
      	parent::__construct(); //Ejecuta el controlador del padre
		$this->load->model('Bienvenida_model');			
		//$this->load->library('miexcel');				
		$this->load->library('/Excel/PHPExcel');
		$this->load->library('/Excel/PHPExcel/IOFactory');		
  	}

  	function index(){
        $data['meses'] = $this->Planilla_model->obtenerMeses();  
        $data['tipoPlanilla'] = $this->Planilla_model->obtenerTiposPlanillas();
        $data['divisionesSAP'] = $this->Planilla_model->obtenerDivisionesSAP();
		$nombreVista="backend/planilla/upload_view";
		$this->cargarVista($nombreVista,$data);

	}

	public function subir(){
        /*Falta pasar datos del empleado*/
        /*Falta pasar datos del empleado*/
        /*Falta pasar datos del empleado*/
        /*Falta pasar datos del empleado*/
        $anio = $this->input->post('anio');
        $mes = $this->input->post('mes');
        $tipoP = $this->input->post('tipoPlanilla');
        $data['divisionSAP'] = $this->input->post('divisionSAP');

		//Ruta donde se guardan los ficheros
		$planilla['upload_path'] = './uploads/';
		//Tipos de ficheros permitidos
		$planilla['allowed_types'] = 'xlsx';


		//Tomo datos del sistema
		date_default_timezone_set('America/Santiago');
        $fecha = getdate();
        $dia = $fecha['mday'];
        $hora = $fecha['hours'];
        $min = $fecha['minutes'];


        //Analizo que Tipo de Planilla recibi
        if($tipoP == "1"){

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

        }elseif($tipoP == "3"){

        	$planilla['file_name'] = 'SAP_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';

        }elseif($tipoP == "4"){
        	$nombreKPI = "MTBF"; //Pensar si no habria que traerlo tbn de la db
        	$data['KPI'] = $this->Planilla_model->getKPI($nombreKPI);

            foreach ($data['KPI'] as $kpi){
                $idKPI = $kpi->idKPI;
            }

        	$planilla['file_name'] = 'MTBF_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';
        	$archivo = './uploads/'.$planilla['file_name'];

        	//Cargamos la librería de subida y le pasamos la configuración 
			$this->load->library('upload', $planilla);
			$this->upload->do_upload();

        	$objExcel = PHPExcel_IOFactory::load($archivo);
        	$objExcel->setActiveSheetIndex(0);
        	$nroFilas = $objExcel->setActiveSheetIndex(0)->getHighestRow();

        	//Crear Planilla
        	$idPlanilla = $this->Planilla_model->crearPlanilla($archivo, $fecha, $anio, $mes, $tipoP);

            for ($i = 4; $i <= $nroFilas; $i++) {
                $columna = "A";
                $fila = $i;

                $ubicacion = $this->Planilla_model->buscarUbicacion($fila, $columna, $idKPI);

                foreach ($ubicacion as $ubi){
                    $id = $ubi->idUbicacion;
                }

                foreach ($ubicacion as $ubi){
                    if($ubi->idUnidadGen != 0){

                        $idUnidadGen = $ubi->idUnidadGen;
                        $mtbf = $objExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
                        $mtbfTarget = $objExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                        $idLineaMTBF = $this->Planilla_model->crearLineaMTBF($mtbf, $mtbfTarget, $idUnidadGen, $idPlanilla);
                    }
                }
            }







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