<div class="main-content " >
    <div class="main-content-inner">
        <div class="page-content" id="app">
            
<?php //var_dump($meses); ?>
<?php var_dump($panels); ?>

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


    <table class="table table-striped table-hover responsive table-bordered table-responsive ">
    
        
    
        <thead>
            <tr>
              <th class="text-center">AÑO</th>
              <th class="text-center">MES</th>
              <th class="text-center">PANELES</th>
            </tr>
          </thead>
          <tbody>


                <?php foreach($item[0]['valores'] as $key=> $meses){


                    if(){


                    }else{

                        
                    }






                } ?>

            <tr >
              <td rowspan="12" > <?php echo $item['anio']; ?></td>


              <td>enero</td>
              <td>Otto</td>
            </tr>


            <tr >
                <td rowspan="12" > <?php echo $item['anio']; ?></td>
  
  
                <td>enero</td>
                <td>Otto</td>
              </tr>


          </tbody>
      </table>







    <?php   

}  ?>
        






            </div>

      


        </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->




