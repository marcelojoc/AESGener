<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros extends My_Controller{

    function __construct(){
      	parent::__construct(); //Ejecuta el controlador del padre
		$this->load->model('Bienvenida_model');		
  	}

  	function index(){
        $data = "";
		$nombreVista="backend/parametros/cargaParametros_view";
		$this->cargarVista($nombreVista,$data);

	}
}
?>