<div class="main-content " >
    <div class="main-content-inner">
        <div class="page-content" id="app">
            
<?php //var_dump($meses); ?>
<?php //var_dump($panels); ?>

            <div class="row">

                        <input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url(); ?>">
                        <input type="hidden" name="idEmpleado" id="idEmpleado" value="<?php echo $_SESSION['logged_in']['idEmpleado']; ?>">
                        <input type="hidden" name="nombreE" id="nombreE" value="<?php echo $_SESSION['logged_in']['nombreE']; ?>">

                        <div class="page-header col-sm-12 text-center blueAES ">
                            <h1 class="blueAES">
                                
                                <strong>Tablero Historico </strong>
                            </h1>
                        </div>  
        
            </div>  


            <div class="row  col-sm-12" >

<?php  foreach ($panels as $item){ 
    

    
    
    ?>


    <table class="table table-striped table-hover responsive table-bordered table-responsive link-tab">
    
        
    
        <thead>
            <tr>
              <th class="text-center">AÑO</th>
              <th class="text-center">MES</th>
              <th class="text-center">PANELES</th>
            </tr>
          </thead>
          <tbody>
          
          
              <?php $rowspan= count($item[0]['valores']); ?>

                <?php foreach($item[0]['valores'] as $key=> $meses){

                    if($key == 0){ ?>
                        <tr>
                            <td WIDTH="20%" style="vertical-align:middle;" class="text-center"  rowspan="<?php echo $rowspan; ?>"> <p class="style-anio"  ><?php echo $item['anio']; ?></p> </td>
                            <td WIDTH="40%" class="text-center"><?php echo $meses['nombreMes']; ?></td>
                            <td >
                                
                            <a  target="_blank" href="<?php echo base_url('gener/est/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-success  ">Estratégico</span></a>

                            <a  target="_blank" href="<?php echo base_url('gener/tac/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-info ">Táctico</span></a>

                            <a  target="_blank" href="<?php echo base_url('gener/ops/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-warning ">Operativo</span></a>

                            <a  target="_blank" href="<?php echo base_url('gener/general/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-danger ">General</span></a>



                            </td>
                        </tr>
                    <?php  }else{ ?>

                        <tr WIDTH="40%">
                            <td class="text-center" ><?php echo $meses['nombreMes']; ?></td>
                            <td > 


                            <a  target="_blank" href="<?php echo base_url('gener/est/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-success  ">Estratégico</span></a>

                            <a  target="_blank" href="<?php echo base_url('gener/tac/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-info ">Táctico</span></a>

                            <a  target="_blank" href="<?php echo base_url('gener/ops/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-warning ">Operativo</span></a>

                            <a target="_blank"  href="<?php echo base_url('gener/general/'.$meses['nroMes'].'/'.$item['anio']); ?>"> <span class="label label-danger ">General</span></a>

                            </td>
                        </tr>
                        <br>
                    <?php    }


                } ?>



          </tbody>
      </table>


    <?php   

}  ?>
        






            </div>

      


        </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->




