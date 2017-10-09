<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

 public function __construct(){
  
    parent::__construct();
        $this->load->library('excel');
    }
    
    public function exportarExcel(){
    $this->excel->setActiveSheetIndex(0);
    //name the worksheet
    $this->excel->getActiveSheet()->setTitle('Informe');
    //set cell A1 content with some text
    $this->excel->getActiveSheet()->setCellValue('A1','Celda1');
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(10);
    
    $filename="nombre.xls"; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    }
    
}
?>