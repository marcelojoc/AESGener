<?php 
class Comment_model extends CI_Model {
	
	public function __construct() {

		parent::__construct();

    }
    



    public function getComment( $idLista, $tipo){

        if($tipo == 'A' or $tipo == 'a'){  // busca sobre tabla de Aesgener

            $this->db->where ('idLineaAES', $idLista );

        }

        if($tipo == 'C' or $tipo == 'c'){ // busca sobre tabla de Costos

            $this->db->where ('idLineaCostos', $idLista );

        }

        if($tipo == 'S' or $tipo == 's'){ // busca sobre tabla de SAP

            $this->db->where ('idLineaSAP', $idLista );

        }

        if($tipo == 'M' or $tipo == 'm'){  // busca sobre tabla de MTBF

            $this->db->where ('idLineaMTBF', $idLista );

        }

        $this->db->select('*');
        $this->db->from('comentario');
        $query = $this->db->get();  // hago la consulta

            if ($query->num_rows() > 0) {

                return $query->result();

            }
            
            else{

                return false;

            }

    }









}