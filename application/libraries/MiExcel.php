<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MiExcel
{

    private $CI;
 
    public function __construct()
    {
        $this->CI = get_instance();


    } 
    
    public function truncateFloat($number, $digitos)
    {
        $raiz = 10;
        $multiplicador = pow ($raiz,$digitos);
        $resultado = ((int)($number * $multiplicador)) / $multiplicador;
        return (float)number_format($resultado, $digitos);

    }




}


?>