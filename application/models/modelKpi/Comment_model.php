<?php 
class Comment_model extends CI_Model {
	
	public function __construct() {

		parent::__construct();

    }
    



    public function getComment( $idLista, $tipo){

        if($tipo == 'A' or $tipo == 'a'){  // busca sobre tabla de Aesgener

            $this->db->where ('comentario.idLineaAES', $idLista );

        }

        if($tipo == 'C' or $tipo == 'c'){ // busca sobre tabla de Costos

            $this->db->where ('comentario.idLineaCostos', $idLista );

        }

        if($tipo == 'S' or $tipo == 's'){ // busca sobre tabla de SAP

            $this->db->where ('comentario.idLineaSAP', $idLista );

        }

        if($tipo == 'M' or $tipo == 'm'){  // busca sobre tabla de MTBF

            $this->db->where ('comentario.idLineaMTBF', $idLista );

        }

        $this->db->select('
        
        comentario.idComentario,
        comentario.idLineaAES,
        comentario.idLineaCostos,
        comentario.idLineaSAP,
        comentario.idLineaMTBF,
        comentario.comentario,
        comentario.fecha,
        comentario.estado,
        empleado.nombreE
        
        ');
        $this->db->from('comentario');
        $this->db->join('empleado', 'empleado.idEmpleado = comentario.idEmpleado');
        $query = $this->db->get();  // hago la consulta

            if ($query->num_rows() > 0) {

                return $query->result();

            }
            
            else{

                return "";

            }

    }


    /**
     * Este metodo cambia el estado de los comentarios
     * la variable estado indica que operacion se debe realizar si es activar o desactivar
     * idComment  es el id sobre el cual hay que actuar
     * recuerda  el 1 es activo  el 0  es desactivado
     */

    public function setComment($action, $idComment){

        //action true = 1, es activa el comentario,  false= 0 lo desactiva

        if($action){

            $data = array(
                'estado' => 1
            );
        }else{
            
            $data = array(
                'estado' => 0
            );
        }
        
        $this->db->where('idComentario', $idComment);
        $result= $this->db->update('comentario', $data); 

        return $result;
        
    }










}