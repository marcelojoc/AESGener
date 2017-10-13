<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller{

	function __construct(){

		parent::__construct();

		//E		jecuta el controlador del padre
		$this->load->model('Bienvenida_model');

		$this->load->helper('url');

		$this->load->library('miexcel');

		$this->load->library('/Excel/PHPExcel');

		$this->load->library('/Excel/PHPExcel/IOFactory');

		$this->load->model('/prueba/Kpi_model');

	}

	
	function index(){

		$data="";

		// 		$nombreVista="backend/bienvenida";

		// 		$this->cargarVista($nombreVista,$data);

		$nombrefile = 'C:\wamp\www\AESGener\uploads\KPI_operacionales_Julio_2017.xlsx';

		$objexcel= IOFactory::load($nombrefile);
		
		
		//A		signo la hoja de calculo activa
		$objexcel->setActiveSheetIndex(0);

		
		//O		btengo el numero de filas del archivo
		$numRows = $objexcel->setActiveSheetIndex(0)->getHighestRow();
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//e		cho($this->helperExcel->test());
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		echo '<table border=1><tr><td>Producto</td><td>Precio</td><td>Existencia</td></tr>';
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		for ($i = 5; $i <= $numRows; $i++) {
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			$nombre = $objexcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			$precio = $objexcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			$existencia = $objexcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			echo '<tr>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			echo '<td>'. $nombre.'</td>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			echo '<td>'. $this->miexcel->truncateFloat(($precio*100),2).'</td>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			echo '<td>'. $this->miexcel->truncateFloat(($existencia*100),2).'</td>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			echo '</tr>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		echo '<table>';
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
	

	public function load(){

		$data="";

		$nombreVista="backend/prueba/subir_view";

		
		$this->cargarVista($nombreVista,$data);
	}
	

	public function panel (){
		
		$maquina= 3;
		$planilla= 1;
		$lista=  $this->Kpi_model->getMaquina($planilla);
		
		$maquinas = $this->Kpi_model->getDatosMaquina($planilla, $maquina);
		
		//$		maquinas = $this->Kpi_model->getDivicion($planilla, 2);

		$maquinas[0]->actualMes=$this->miexcel->truncateFloat($maquinas[0]->actualMes,2);
		
		$maquinas[0]->targetMes=$this->miexcel->truncateFloat($maquinas[0]->targetMes,2);
		
		$maquinas[0]->ytdActual=$this->miexcel->truncateFloat($maquinas[0]->ytdActual,2);
		
		$maquinas[0]->ytdTarget=$this->miexcel->truncateFloat($maquinas[0]->ytdTarget,2);
		
		$maquinas[0]->fyf=$this->miexcel->truncateFloat($maquinas[0]->fyf,2);
		
		$maquinas[0]->fyBudget=$this->miexcel->truncateFloat($maquinas[0]->fyBudget,2);
		
		
		
		$data['maquina']=$maquinas;
		
		$data['lista']=$lista;
		
		$js['javascript']= ["vendor/vue.js","app/main.js",];
		
		
		
		
		$nombreVista="backend/prueba/panel_view";

		$this->cargarVista($nombreVista,$data,$js);

	}
	

	public function subir(){

		//R		uta donde se guardan los ficheros
		$config['upload_path'] = './uploads/';

		$config['file_name'] = 'tuvieja.xlsx';

		//T		ipos de ficheros permitidos
		$config['allowed_types'] = 'xlsx';

		//S		e pueden configurar aun mas parámetros.
		//C		argamos la librería de subida y le pasamos la configuración 
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload()){

			/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/

			$error=array('error' => $this->upload->display_errors());

			$data="";

			$nombreVista="backend/prueba/subir_view";
			
			$this->cargarVista($nombreVista,$data);

		}

		
		else{

			//D			atos del fichero subido
			$datos["xls"]=$this->upload->data();

			// 			Podemos acceder a todas las propiedades del fichero subido 
			// 			$datos["img"]["file_name"]);

			var_dump($datos);

			//C			argamos la vista y le pasamos los datos
			$data="";

			$nombreVista="backend/prueba/subir_view";

			$this->cargarVista($nombreVista,$data);

		}

	}

}

?>