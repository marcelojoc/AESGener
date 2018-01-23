<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends Ci_Controller {
    

    function __construct(){
    	parent::__construct();

      //Cargar todos los model del sistema
    	$this->load->model('Bienvenida_model');
    	$this->load->model('planilla/Planilla_model');
      $this->load->model('parametros/Parametros_model');
      $this->load->model('seguridad/AbmUsuarios_model');
      $this->load->model('seguridad/AbmNiveles_model');
      $this->load->model('abms/AbmEmpleados_model');
      $this->load->model('modelKpi/Kpi_model');
  	}

    function cargarVista($nombreV, $dataC, $javasc = null){
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['nombreE'] = $session_data['nombreE'];
        $data['nivel'] = $session_data['nivel'];
          
        $this->session->set_flashdata('username', $data);
        $this->session->set_flashdata('nombreE', $data);
        $this->session->set_flashdata('nivel', $data);

        //mantener sidebar dinamica
        $session_data = $this->session->userdata('logged_in');
        $data['nivel'] = $this->Bienvenida_model->obtenerNivel($session_data['nivel']);


        $this->load->view('backend/header');
        $this->load->view('backend/sidebar',$data);
        $this->load->view($nombreV, $dataC);


        $this->load->view('backend/footer');
        
        if(!is_null($javasc)){

          $this->load->view('backend/script_js', $javasc);
        }

        /**
         * esta linea añade archivos Js de ser necesario
         * el formato en que debe pasarse la info es:
         * un arreglo asociativo y dentro separado por comas los Strings de cada nombre de archivo
         * los Js los busca en el directorio assets del raiz de CI
         * ejemplo:
         * $js['javascript']= ["archivo.js","tuVieja.js","bloqueaa.js"];
         */
        


      }else{
        $this->load->helper(array('form'));
        $this->load->view('login_view');
      }
    }
}

?>