<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller{

    function __construct(){
      	parent::__construct(); //Ejecuta el controlador del padre
		$this->load->model('Bienvenida_model');
		$this->load->helper('url');
		$this->load->library('HelperE');		
		$this->load->library('/Excel/PHPExcel');
		$this->load->library('/Excel/PHPExcel/IOFactory');		
  	}

  	function index(){
        $data="";
        // $nombreVista="backend/bienvenida";
		  // $this->cargarVista($nombreVista,$data);
		  
	


		  $nombrefile = "C:\wamp\www\AESGener\application\controllers\prueba\KPI_operacionales_Julio_2017.xlsx";
		  $objexcel= IOFactory::load($nombrefile);
		  
		  
		  //Asigno la hoja de calculo activa
		  $objexcel->setActiveSheetIndex(0);
		  //Obtengo el numero de filas del archivo
		  $numRows = $objexcel->setActiveSheetIndex(0)->getHighestRow();
		  
		  
		  var_dump($this->HelperE);
		  //echo($this->helperExcel->test());
		  
			  echo '<table border=1><tr><td>Producto</td><td>Precio</td><td>Existencia</td></tr>';
			  
			  for ($i = 5; $i <= $numRows; $i++) {
				  
				  $nombre = $objexcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
				  $precio = $objexcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
				  $existencia = $objexcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();


				  
				  echo '<tr>';
				  echo '<td>'. $nombre.'</td>';
				  echo '<td>'. 'sssssssssss'.'</td>';
				  echo '<td>'.($existencia* 100).'</td>';
				  echo '</tr>';
		  
			  }
			  
			  echo '<table>';





	}  
	



	public function load(){ 


		$data="";
		$nombreVista="backend/prueba/subir_view";
		$this->cargarVista($nombreVista,$data);

		




   }
    
	public function subir(){
		//Ruta donde se guardan los ficheros
			$config['upload_path'] = './uploads/';
			
		//Tipos de ficheros permitidos
			$config['allowed_types'] = 'xlsx';
			
		//Se pueden configurar aun mas parámetros.
		//Cargamos la librería de subida y le pasamos la configuración 
			$this->load->library('upload', $config);
	
			if(!$this->upload->do_upload()){
				/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/

				var_dump($_POST);
					$error=array('error' => $this->upload->display_errors());
					$data="";
					$nombreVista="backend/prueba/subir_view";
					$this->cargarVista($nombreVista,$data);



			}else{
				//Datos del fichero subido
				$datos["img"]=$this->upload->data();
	
				// Podemos acceder a todas las propiedades del fichero subido 
				// $datos["img"]["file_name"]);
	
				//Cargamos la vista y le pasamos los datos
				$data="";
				$nombreVista="backend/prueba/subir_view";
				$this->cargarVista($nombreVista,$data);
		
			}
		}   







}
?>