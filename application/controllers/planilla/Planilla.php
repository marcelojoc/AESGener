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
        /*Falta agregar en la vista el campo de seleccion de que division es la planilla si es SAP*/
        /*Falta agregar en la vista el campo de seleccion de que division es la planilla si es SAP*/
        /*Falta agregar en la vista el campo de seleccion de que division es la planilla si es SAP*/
        /*Falta agregar en la vista el campo de seleccion de que division es la planilla si es SAP*/
        $anio = $this->input->post('anio');
        $mes = $this->input->post('mes');
        $tipoP = $this->input->post('tipoPlanilla');
        $data['divisionSAP'] = $this->input->post('divisionSAP');

		//Ruta donde se guardan los ficheros
		$planilla['upload_path'] = './uploads/';
		//Tipos de ficheros permitidos
		$planilla['allowed_types'] ='xlsx|xlsb|csv';

		//Tomo datos del sistema
		date_default_timezone_set('America/Santiago');
        $fecha = getdate();
        $dia = $fecha['mday'];
        $hora = $fecha['hours'];
        $min = $fecha['minutes'];


        //Analizo que Tipo de Planilla recibi
        if($tipoP == "1"){//TIpo Planilla AES Gener

            $planilla['file_name'] = 'AES_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';
            $archivo = './uploads/'.$planilla['file_name'];

            $this->load->library('upload', $planilla);
            $this->upload->do_upload();

            $objExcel = PHPExcel_IOFactory::load($archivo);
            $objExcel->setActiveSheetIndex(0);
            $nroFilas = $objExcel->setActiveSheetIndex(0)->getHighestRow();
            $nroCol = $objExcel->setActiveSheetIndex(0)->getHighestColumn();

            //Crear Planilla
            $idPlanilla = $this->Planilla_model->crearPlanilla($archivo, $fecha, $anio, $mes, $tipoP);

            //Recorro toda la planilla y guardo los KPI: AEF, EFOF, ENPHR y CA
            for ($i = 2; $i <= $nroFilas; $i++) {

                //Busco a que KPI corresponde cada linea
                $nombreKPI = $objExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
                $data['KPI'] = $this->Planilla_model->getKPI($nombreKPI);

                if($nombreKPI != ""){
                    foreach ($data['KPI'] as $kpi){
                        $idKPI = $kpi->idKPI;
                    }
                }
                
                $data['ubicacionKPI'] = $this->Planilla_model->buscarUbicacionKPI($idKPI);

                foreach ($data['ubicacionKPI'] as $ubiKPI){
                    $inicio = $ubiKPI->inicioNro;
                    $fin = $ubiKPI->finNro;
                }

                //Si pertenece al rango de ubicaciones del KPI, lo guardo
                if($i >= $inicio && $i <= $fin){
                    $columna = "C";
                    $fila = $i;

                    $ubicacion = $this->Planilla_model->buscarUbicacion($fila, $columna, $idKPI);

                    foreach ($ubicacion as $ubi){
                        $id = $ubi->idUbicacion;
                        $idUnidadGen = $ubi->idUnidadGen;
                        $idDivision = $ubi->idDivision;
                        $idComplejo = $ubi->idComplejo;
                        $idPlanta= $ubi->idPlanta;
                    }

                    $actualMes = $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                    $targetMes = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                    $ytdActual = $objExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                    $ytdTarget = $objExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                    $fyf       = $objExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
                    $fyBudget  = $objExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();

                    $hedp  = 0;
                    $hedf = 0;
                    $hsf = 0;
                    
                    $idLineaAES = $this->Planilla_model->crearLineaAES($actualMes, $targetMes, $ytdActual, $ytdTarget, $fyf, $fyBudget, $hedp, 
                                                                            $hedf, $hsf, $idUnidadGen, $idDivision, $idComplejo, $idPlanilla, $idKPI);
                   //$idKPILinea = $this->Planilla_model->crearKPILinea($idKPI, $idKPILinea)
                }           
            }

            //Recorro nuevamente la planilla y guardo los KPI: HEDP, HEDF y HSF       
            foreach(range("J", $nroCol) as $columna) {

                //Busco a que KPI corresponde cada columna
                $nombreKPI = $objExcel->getActiveSheet()->getCell($columna. 3)->getCalculatedValue();
                $data['KPI'] = $this->Planilla_model->getKPI($nombreKPI);

                if($nombreKPI != ""){
                    foreach ($data['KPI'] as $kpi){
                        $idKPI = $kpi->idKPI;
                    }
                }

                $data['ubicacionKPI'] = $this->Planilla_model->buscarUbicacionKPI($idKPI);

                foreach ($data['ubicacionKPI'] as $ubiKPI){
                    $inicio = $ubiKPI->inicioNro;
                    $fin = $ubiKPI->finNro;
                }

                //Si pertenece al rango de ubicaciones del KPI, lo guardo
                for ($fila = $inicio; $fila <= $fin; $fila++) {

                    $ubicacion = $this->Planilla_model->buscarUbicacion($fila, $columna, $idKPI);
                 
                    if($ubicacion){
                        foreach ($ubicacion as $ubi){
                            $id = $ubi->idUbicacion;
                            $idUnidadGen = $ubi->idUnidadGen;
                        }

                        if($idKPI == 5){
                            $hedp = $objExcel->getActiveSheet()->getCell($columna.$fila)->getCalculatedValue();
                            $hedf = 0;
                            $hsf = 0;

                        }elseif($idKPI == 6){
                            $hedf = $objExcel->getActiveSheet()->getCell($columna.$fila)->getCalculatedValue();
                            $hedp = 0;
                            $hsf = 0;

                        }elseif($idKPI == 7){
                            $hsf = $objExcel->getActiveSheet()->getCell($columna.$fila)->getCalculatedValue();
                            $hedf = 0;
                            $hedp = 0;
                        }

                        $actualMes = 0;
                        $targetMes = 0;
                        $ytdActual = 0;
                        $ytdTarget = 0;
                        $fyf       = 0;
                        $fyBudget  = 0;
                        $idDivision = 0;
                        $idComplejo = 0;
                        
                        $idLineaAES = $this->Planilla_model->crearLineaAES($actualMes, $targetMes, $ytdActual, $ytdTarget, $fyf, $fyBudget, $hedp, 
                                                                            $hedf, $hsf, $idUnidadGen, $idDivision, $idComplejo, $idPlanilla, $idKPI);
                       //$idKPILinea = $this->Planilla_model->crearKPILinea($idKPI, $idKPILinea)
                    }                     
                }
            }

        }elseif($tipoP == "2"){//TIpo Planilla Costos
            /*Revisar no lee tipo archivo xlsb y si lopaso a xls se excede el tiempo de ejecucion*/
            /*Revisar no lee tipo archivo xlsb y si lopaso a xls se excede el tiempo de ejecucion*/
            /*Revisar no lee tipo archivo xlsb y si lopaso a xls se excede el tiempo de ejecucion*/
            /*Revisar no lee tipo archivo xlsb y si lopaso a xls se excede el tiempo de ejecucion*/
            /*Revisar no lee tipo archivo xlsb y si lopaso a xls se excede el tiempo de ejecucion*/

            $nombreKPI = "CTM OPEX"; //Pensar si no habria que traerlo tbn de la db
            $data['KPI'] = $this->Planilla_model->getKPI($nombreKPI);

            foreach ($data['KPI'] as $kpi){
                $idKPI = $kpi->idKPI;
            }

            $planilla['file_name'] = 'COSTOS_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';
            $archivo = './uploads/'.$planilla['file_name'];

            //Cargamos la librería de subida y le pasamos la configuración 
            $this->load->library('upload', $planilla);
            $this->upload->do_upload();

            $objExcel = PHPExcel_IOFactory::load($archivo);
            $objExcel->setActiveSheetIndex(0);
            $nroFilas = $objExcel->setActiveSheetIndex(0)->getHighestRow();

            //Crear Planilla
            $idPlanilla = $this->Planilla_model->crearPlanilla($archivo, $fecha, $anio, $mes, $tipoP);

            for ($i = 8; $i <= $nroFilas; $i++){
                $columna = "D";
                $fila = $i;

                $ubicacion = $this->Planilla_model->buscarUbicacion($fila, $columna, $idKPI);

                if($ubicacion){
                    foreach ($ubicacion as $ubi){
                        $id = $ubi->idUbicacion;
                    }

                    foreach ($ubicacion as $ubi){

                            $idDivision = $ubi->idDivision;
                            $idComplejo = $ubi->idComplejo;
                            $ctmActual = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $ctmBudget = $objExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();

                            $idLineaCostos = $this->Planilla_model->crearLineaCostos($ctmActual, $ctmBudget, $idDivision, $idComplejo, $idPlanilla, $idKPI);
                    }
                }
            }


                        echo $nroFilas;
            die();

        }elseif($tipoP == "3"){//TIpo Planilla SAP

            $data['divisionSAP'] = $this->Planilla_model->obtenerDivision($data['divisionSAP']);

            foreach ($data['divisionSAP'] as $divSAP){
                $nombreDiv = $divSAP->nombreDivSAP;
            }

        	$planilla['file_name'] = 'SAP_'.$nombreDiv.'_'.$anio.'-'.$mes.'-'.$dia.'_'.$hora.'-'.$min.'.xlsx';
            $archivo = './uploads/'.$planilla['file_name'];

            //Cargamos la librería de subida y le pasamos la configuración 
            $this->load->library('upload', $planilla);
            $this->upload->do_upload();

            $objExcel = PHPExcel_IOFactory::load($archivo);
            // //$objExcel->setActiveSheetIndex(3);
            // $nroFilas = $objExcel->setActiveSheetIndex(0)->getHighestRow();

            $pestanias = $objExcel->getSheetCount()-1;

            // echo $nroFilas;
            // echo "</br>";
            //echo $pestanias;

            //Calculo HORAS CORRECTIVAS
            $objExcel->setActiveSheetIndex(0);
            $nroFilas = $objExcel->setActiveSheetIndex(0)->getHighestRow();
            $letraCol = $objExcel->setActiveSheetIndex(0)->getHighestColumn();

            //Guardo en que columna estan los valores de "Trabajo Real"
            foreach(range("A", $letraCol) as $columna) {
                $nombreCol = $objExcel->getActiveSheet()->getCell($columna. 2)->getCalculatedValue();

                if ($nombreCol == "Trabajo real"){
                    $col = $columna;
                }   
            }

            $contadorHs = 0;

            for ($i = 3; $i <= $nroFilas; $i++) {

                $horaLinea = $objExcel->getActiveSheet()->getCell($col.$i)->getCalculatedValue();
                $contadorHs = $horaLinea + $contadorHs;
            }

            echo $contadorHs;
            die();








        }elseif($tipoP == "4"){//TIpo Planilla MTBF
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

                        $idLineaMTBF = $this->Planilla_model->crearLineaMTBF($mtbf, $mtbfTarget, $idUnidadGen, $idPlanilla, $idKPI);
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



                // echo "nombreKPI linea: ".$i." nombre: ".$nombreKPI;
                // echo "</br>";

                // //if($nombreKPI != ""){ //Aca puede fallar porque en muchas lineas es ""

                //     $data['KPI'] = $this->Planilla_model->getKPI($nombreKPI);

                //     var_dump($data['KPI']);
                //     echo "</br>";
                //     echo "evaluar getKPI";

                //     foreach ($data['KPI'] as $kpi){
                //         $idKPI = $kpi->idKPI;
                //     }


                //     //Deberia buscar la ubicacion del KPI completo en la TABLA UBICACION no hardcodear los valores de inicio y fin
                //     //Deberia buscar la ubicacion del KPI completo en la TABLA UBICACION no hardcodear los valores de inicio y fin
                //     //Deberia buscar la ubicacion del KPI completo en la TABLA UBICACION no hardcodear los valores de inicio y fin
                //     if($idKPI){
                //         if($idKPI == 1){
                //             $inicio = 4;
                //             $fin = 38;

                //             echo "entra a kpi 1";
                //             echo "</br>";

                //         }elseif($idKPI == 2){
                //             $inicio = 39;
                //             $fin = 73;

                //             echo "entra a kpi 2";
                //             echo "</br>";

                //         }elseif($idKPI == 3){   
                //             $inicio = 74;
                //             $fin = 97;

                //             echo "entra a kpi 3";
                //             echo "</br>";
                //         }elseif($idKPI == 4){
                //             $inicio = 98;
                //             $fin = 104;

                //             echo "entra a kpi 4";
                //             echo "</br>";
                //         }
                //     }
                //     //Deberia buscar la ubicacion del KPI completo en la TABLA UBICACION no hardcodear los valores de inicio y fin

                //     echo "idKPI nro".$i;
                //     var_dump($idKPI);
                //     echo "</br>";
                //     echo "</br>";
                //     echo "</br>";
                //     echo "</br>";

                //     for ($i = $inicio; $i <= $fin; $i++) {

                //         echo $i;
                //         echo "</br>";
                //         echo $fin;
                //         echo "</br>";
                //         $columna = "C";
                //         $fila = $i;

                //         $ubicacion = $this->Planilla_model->buscarUbicacion($fila, $columna, $idKPI);

                //         foreach ($ubicacion as $ubi){
                //             $id = $ubi->idUbicacion;
                //         }

                //         foreach ($ubicacion as $ubi){

                //                 $idUnidadGen = $ubi->idUnidadGen;
                //                 $idDivision = $ubi->idDivision;
                //                 $idComplejo = $ubi->idComplejo;
                //                 $actualMes = $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                //                 $targetMes = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                //                 $ytdActual = $objExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                //                 $ytdTarget = $objExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                //                 $fyf = $objExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
                //                 $fyBudget = $objExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
                                
                //                 $idLineaAES = $this->Planilla_model->crearLineaAES($actualMes, $targetMes, $ytdActual, $ytdTarget, $fyf, $fyBudget,
                //                                                                     $idUnidadGen, $idDivision, $idComplejo, $idPlanilla, $idKPI);
                //                //$idKPILinea = $this->Planilla_model->crearKPILinea($idKPI, $idKPILinea)

                //         }
                //     }




























?>