<?php 
class History_model extends CI_Model {
	
	public function __construct() {

		parent::__construct();
		
    }
    



    /**
     * Este metodo trae todos los meses cargados y su orden
     */

    private function getMonth(){

        $this->db->from('mes');
        $this->db->select('*');
        $query = $this->db->get();
		if ($query->num_rows() > 0) {

			return $query->result();

		}else{

			return false;

		}

    }

    /**
     * Este metodo trae todos los años de los cuales al menos una planilla ha sido cargada
     */

    private function getYears(){

        $this->db->group_by("anio"); 
        $this->db->from('planilla');
        $this->db->select('anio');
        $query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();

		}else{

			return false;

		}


    }

    /**
     * Este metodo verifica si existe alguna planilla cargada para ese mes y ese año
     */
    private function checkPlanilla($anio, $mes){

        $this->db->where ('mes', $mes);
        $this->db->where ('anio', $anio);
        $this->db->from('planilla');
        $this->db->select('*');
        $query = $this->db->get();
		if ($query->num_rows() > 0) {

			return true;

		}else{

			return false;

		}


    }

    /**
     * Este metodo consulta en base a los años que se cargaron, iterando con la lista de meses
     * y la tabla planillas para obtener los meses que si tienen cargados las planillas
     * 
     * ejemplo  si enero 2017 no tiene planillas no lo muestra  o no muestra los enlaces a los tableros hostoricos
     */

public function getPanles(){

    $meses= $this->getMonth();  // traigo todos los meses 

    $anios= $this->getYears();  // traigo los años que se han cargados

    $respuesta=[];

    if($anios == false){

        return $respuesta=["mensaje"=>"No hay planillas cargadas"];

    }else{


        foreach($anios as $key => $itemYear){    // bucle exterior ciclando entre los años cargados 
    
            $respuesta[$key]= ["anio"=>$itemYear->anio];

            $tmp=[];

                foreach($meses as $itemMonth){

                    $dato = $this->checkPlanilla($itemYear->anio, $itemMonth->nroMes);

                    if($dato){

                        array_push($tmp, ["nombreMes"=>$itemMonth->nombreMes, "nroMes"=>$itemMonth->nroMes]);
                        
                    }


                }

                array_push($respuesta[$key],["valores"=>$tmp]);
    
        } // cierre bucle exterior de años cargados



    }

    return $respuesta;
    // var_dump($respuesta[0]);

}






}