<?php 

var_dump($maquina);
$valor= $maquina[0];







$res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";

var_dump($res );






?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            
<div class="row">




            <div class="page-header col-sm-4 text-center blueAES b-r">
                <h1 class="blueAES">
 Tablero Estratégico 
<?php echo $valor->nombreMaquina  ?>



                </h1>
            </div>  
            <div class=" col-sm-8 blueAES form-inline ">


                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    
                            <div class="form-group">

                                    <select class="form-control" name="category">
                                            <option value=""></option>
                                            <option value="0">select1</option>
                                            <option value="1">select2</option>
                                            <option value="2">select3</option>
                                        </select>   
                            </div>
                   
                            <div class="form-group text-left">
                                <select class="form-control" name="category">
                                    <option value=""></option>

                                        <?php 

                                            foreach($lista as $item){

                                            echo('<option value="'.$item->idMaquina.'">'.$item->nombreMaquina.'</option>');

                                            }

                                        ?>

                                </select>           
                            </div>
                        </div>
                



            </div>  




</div>


            <div class="row">
                <div class="col-sm-4 ">
                    <div class="page-header center greenAES">
                        <h4>
                            Confiabilidad
                        </h4>
                    </div>  
                   
                    <div class="social-widget col-sm-12 b-l b-r">
                            <div class="soc-header box-corporativo">
                                <i><h4>EAF (%)</h4></i>
                            </div>

                            <div class="soc-content">
                                <div class="col-xs-6 b-r b-b">
                                    <h5 class="font-medium"><?php echo $valor->actualMes .'%'  ?></h5>
                                    <h6 class="text-muted">Actual Mon</h6>
                                </div>
                            
                                <div class="col-xs-6 b-b">
                                    <h5 class="font-medium"><?php echo $valor->targetMes .'%' ?></h5>
                                    <h6 class="text-muted">Target Mon</h6>

                                </div>
                            </div> 

                    

                            <div class="row">

                                <div class="col-xs-12">

                                    <!-- contenedor general de la progress bar -->
                                    <div class="content-progres social-widget"> 

                                        <!-- este marca el 100% del progres bar -->
                                        <div class="progres-full limite " >

                                                <?php $res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";   

                                                $res.= 'width:'.$valor->actualMes .'%;';

                                                ?>

                                                <div class="indicador-kpi" style="height: 3.9em; <?php echo $res ?>">



                                                <p><strong>Valor Mensual</strong></p>
                                            </div>

                                        </div>
                                        <div class="progres-full">



                                                <div class="borde box-green" style="height: 3em; width: <?php echo $valor->targetMes .'%;' ?>;">





                                                <p><strong>Valor Esperado Mensual 88,7%</strong></p>

                                            </div>

                                        </div><br>

                                    </div><br>

                                </div>

                            </div>

                            <div class="soc-content">
                                <div class="col-xs-6 b-r b-b b-t">
                                    <h5 class="font-medium">
                                        <?php echo $valor->ytdActual .'%'  ?>

                                    </h5>

                                    <h6 class="text-muted">Real YTD</h6>
                                </div>                          
                                <div class="col-xs-6 b-b b-t">
                                    <h5 class="font-medium">
                                        <?php echo $valor->ytdTarget .'%'  ?>

                                    </h5>

                                    <h6 class="text-muted">Bud YTD</h6>
                                </div>
                            </div>
                    

                            <div class="row">
                                
                                    <div class="col-xs-12">
            
                                        <!-- contenedor general de la progress bar -->
                                        <div class="content-progres social-widget"> 
            
                                            <!-- este marca el 100% del progres bar -->
                                            <div class="progres-full limite " >

                                                    <?php $res2 = ($valor->ytdActual >= $valor->ytdTarget) ? "background: #2ecc71;" : "background: #E74C3C;";   

                                                        $res2.= 'width:'.$valor->ytdActual .'%;';

                                                    ?>


            
                                                    <div class="indicador-kpi" style="height: 3.9em;<?php echo $res2 ?>">


            
                                                    <p><strong>Valor anual acumulado </strong></p>
                                                </div>
            
                                            </div>
                                            <div class="progres-full">
            
                                                    <div class="borde box-green" style="height: 3em; width: <?php echo $valor->ytdTarget .'%;' ?>">

            
                                                    <p><strong>Valor anual acumulado esperado</strong></p>
            
                                                </div>
            
                                            </div><br>
            
                                        </div>
            
                                    </div>
                                
                            </div>                    



                            <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active">
                                            <a data-toggle="tab" href="#home">
                                                <i class="greenAES ace-icon fa fa-key bigger-120"></i>
                                                Comentarios
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab" href="#messages">
                                                <i class="greenAES ace-icon fa fa-comments bigger-120"></i>
                                                Aañadir Comentario
                                                <!-- <span class="badge badge-danger">Nuevo</span> -->
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>Contenido</th>
                                                    <th>Autor</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <th scope="row">1</th>
                                                    <td>Cambios de prefiltros en compresor</td>
                                                    <td>pepito h</td>
                                                    </tr>

                                                    <tr>
                                                    <th scope="row">2</th>
                                                    <td>7-jul. Curso forzoso por fuga vapor en domo ppal. Caldera</td>
                                                    <td>Thornton</td>
                                                    </tr>

                                                </tbody>
                                                </table>

                                                <ul class="pagination pagination-sm">
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>

                                                </ul>
                                        </div>

                                        <div id="messages" class="tab-pane fade">
                                            
                                            <form action="">

                                                <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar Comentario</button>

                                            </form>

                                        </div>
                                    </div>
                            </div><br>

                    </div><br>

                    <!-- aqui comienza el otro indicador EFOF -->

                    <div class="social-widget col-sm-12 b-l b-r">
                        <div class="soc-header box-corporativo">
                            <i><h3>EFOF (%)</h3></i>
                        </div>

                        <div class="soc-content">
                            <div class="col-xs-6 b-r b-b">
                                <h5 class="font-medium">92,62 %</h5>
                                <h6 class="text-muted">Bud Mon</h6>
                            </div>
                            <div class="col-xs-6 b-b">
                                <h5 class="font-medium">92,62 %</h5>
                                <h6 class="text-muted">Real Mon</h6>
                            </div>
                        </div>

                            <div class="row">

                                <div class="col-xs-12">

                                    <!-- contenedor general de la progress bar -->
                                    <div class="content-progres social-widget"> 

                                        <!-- este marca el 100% del progres bar -->
                                        <div class="progres-full limite " >

                                            <div class="indicador-kpi" style="height: 3.9em; background: #2ecc71; width: 90%;" >

                                                <p><strong>Valor Mensual</strong></p>
                                            </div>

                                        </div>
                                        <div class="progres-full">

                                            <div class="borde box-green" style="height: 3em; width: 88%;" >

                                                <p><strong>Valor Esperado Mensual 88,7%</strong></p>

                                            </div>

                                        </div><br>

                                    </div><br>

                                </div>

                            </div>

                            <div class="soc-content">
                                <div class="col-xs-6 b-r b-b b-t">
                                    <h5 class="font-medium">92,62 %</h5>
                                    <h6 class="text-muted">Bud YTD</h6>
                                </div>                          
                                <div class="col-xs-6 b-b b-t">
                                    <h5 class="font-medium">92,62 %</h5>
                                    <h6 class="text-muted">Real YTD</h6>
                                </div>
                            </div>
                    

                            <div class="row">
                                
                                    <div class="col-xs-12">
            
                                        <!-- contenedor general de la progress bar -->
                                        <div class="content-progres social-widget"> 
            
                                            <!-- este marca el 100% del progres bar -->
                                            <div class="progres-full limite " >
            
                                                <div class="indicador-kpi" style="height: 3.9em; background: #E74C3C; width: 78%;" >
            
                                                    <p><strong>valor real 78%</strong></p>
                                                </div>
            
                                            </div>
                                            <div class="progres-full">
            
                                                <div class="borde box-green" style="height: 3em; width: 89.7%;" >
            
                                                    <p><strong>Valor Esperado 99,7%</strong></p>
            
                                                </div>
            
                                            </div><br>
            
                                        </div>
            
                                    </div>
                                
                            </div>                    



                            <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab2">
                                        <li class="active">
                                            <a data-toggle="tab2" href="#home">
                                                <i class="greenAES ace-icon fa fa-key bigger-120"></i>
                                                Comentarios
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab2" href="#messages">
                                                <i class="greenAES ace-icon fa fa-comments bigger-120"></i>
                                                Aañadir Comentario
                                                <!-- <span class="badge badge-danger">Nuevo</span> -->
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>Contenido</th>
                                                    <th>Autor</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <th scope="row">1</th>
                                                    <td>Cambios de prefiltros en compresor</td>
                                                    <td>pepito h</td>
                                                    </tr>

                                                    <tr>
                                                    <th scope="row">2</th>
                                                    <td>7-jul. Curso forzoso por fuga vapor en domo ppal. Caldera</td>
                                                    <td>Thornton</td>
                                                    </tr>

                                                </tbody>
                                                </table>

                                                <ul class="pagination pagination-sm">
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>

                                                </ul>
                                        </div>

                                        <div id="messages" class="tab-pane fade">
                                            
                                            <form action="">

                                                <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar Comentario</button>

                                            </form>

                                        </div>
                                    </div>
                            </div><br>



                    </div>

                </div>

                <div class="col-sm-4">
                        <div class="page-header center greenAES">
                            <h4>
                                Confiabilidad vista Compacta
                            </h4>
                        </div>  
                       
                        <div class="social-widget col-sm-12 b-l b-r">
                            <div class="soc-header box-corporativo">
                                <i><h4>EAF (%)</h4></i>
                            </div>

                        <div class="row">
    
                            <div class="col-xs-12">
    
                                <!-- contenedor general de la progress bar -->
                                <div class="content-progres social-widget"> 
    
                                    <!-- este marca el 100% del progres bar -->
                                    <div class="progres-full limite " >
    
                                        <div class="indicador-kpi " style="height: 3.9em; background: #F1C40F; width: 90%;" >
    
                                            <p><strong>Valor Mensual</strong></p>
                                        </div>
    
                                    </div>
                                    <div class="progres-full">
    
                                        <div class="borde box-green" style="height: 3em; width: 88%;" >
    
                                            <p><strong>Valor Esperado Mensual 88,7%</strong></p>
    
                                        </div>
    
                                    </div><br>
    
                                </div>
    
                            </div>
    
                        </div>
    
    
                                <div class="row">
                                    
                                        <div class="col-xs-12">
                
                                            <!-- contenedor general de la progress bar -->
                                            <div class="content-progres social-widget"> 
                
                                                <!-- este marca el 100% del progres bar -->
                                                <div class="progres-full limite " >
                
                                                    <div class="indicador-kpi" style="height: 3.9em; background: #E74C3C; width: 78%;" >
                
                                                        <p><strong>valor real 78%</strong></p>
                                                    </div>
                
                                                </div>
                                                <div class="progres-full">
                
                                                    <div class="borde box-green" style="height: 3em; width: 89.7%;" >
                
                                                        <p><strong>Valor Esperado 99,7%</strong></p>
                
                                                    </div>
                
                                                </div><br>
                
                                            </div>
                
                                        </div>
                                    
                                </div>                    
    
    
    
                            <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab3">
                                        <li class="active">
                                            <a data-toggle="tab3" href="#home">
                                                <i class="greenAES ace-icon fa fa-key bigger-120"></i>
                                                Comentarios
                                            </a>
                                        </li>
        
                                        <li>
                                            <a data-toggle="tab3" href="#messages">
                                                <i class="greenAES ace-icon fa fa-comments bigger-120"></i>
                                                Aañadir Comentario
                                                <!-- <span class="badge badge-danger">Nuevo</span> -->
                                            </a>
                                        </li>
                                    </ul>
        
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Contenido</th>
                                                    <th>Autor</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <th scope="row">1</th>
                                                    <td>Cambios de prefiltros en compresor</td>
                                                    <td>pepito h</td>
                                                  </tr>
    
                                                  <tr>
                                                    <th scope="row">2</th>
                                                    <td>7-jul. Curso forzoso por fuga vapor en domo ppal. Caldera</td>
                                                    <td>Thornton</td>
                                                  </tr>
    
                                                </tbody>
                                              </table>
    
                                              <ul class="pagination pagination-sm">
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
    
                                              </ul>
                                        </div>
        
                                        <div id="messages" class="tab-pane fade">
                                            
                                            <form action="">
    
                                                <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar Comentario</button>
    
                                            </form>
    
                                        </div>
                                    </div>
                            </div>
                            
                            <br>
    
                        </div>
    
                        <div class="social-widget col-sm-12 b-l b-r">
                                <div class="soc-header box-corporativo">

                                <i><h3>EFOF (%)</h3></i>
                            </div>
    
                            <div class="soc-content">
                                <div class="col-xs-6 b-r b-b">
                                    <h3 class="font-medium">92,62 %</h3>
                                    <h5 class="text-muted">Bud Mon</h5>
                                </div>
                                <div class="col-xs-6 b-b">
                                    <h3 class="font-medium">92,62 %</h3>
                                    <h5 class="text-muted">Real Mon</h5>
                                </div>
                            </div>
    
                            <br>
    
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab4">
                                    <li class="active">
                                        <a data-toggle="tab4" href="#home">
                                            <i class="greenAES ace-icon fa fa-key bigger-120"></i>
                                            KPI
                                        </a>
                                    </li>
    
                                    <li>
                                        <a data-toggle="tab4" href="#messages">
                                            <i class="greenAES ace-icon fa fa-comments bigger-120"></i>
                                            Comentarios
                                            <!-- <span class="badge badge-danger">Nuevo</span> -->
                                        </a>
                                    </li>
                                </ul>
    
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <p>Este KPI significa....</p>
                                    </div>
    
                                    <div id="messages" class="tab-pane fade">
                                        
                                        <form action="">
    
                                            <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Guardar Comentario</button>
    
                                        </form>
    
                                    </div>
                                </div>
                            </div>
    
                            <br>
    
                        </div>
    
                    </div>
                
                
                <div class="col-sm-4">
                        <div class="page-header center greenAES">
                            <h4>
                                Costos
                            </h4>
                        </div>

                        <div class="social-widget col-sm-12 b-l b-r">
                                <div class="soc-header box-corporativo">
                                    <i><h4>EAF (%)</h4></i>
                                </div>
        
                                <div class="soc-content">
                                    <div class="col-xs-6 b-r b-b">
                                        <h5 class="font-medium">92,62 %</h5>
                                        <h6 class="text-muted">Bud Mon</h6>
                                    </div>
                                   
                                    <div class="col-xs-6 b-b">
                                        <h5 class="font-medium">92,62 %</h5>
                                        <h6 class="text-muted">Real Mon</h6>
                                    </div>
                                </div> 
        
                            
        
                            <div class="row">
        
                                <div class="col-xs-12">
        
                                    <!-- contenedor general de la progress bar -->
                                    <div class="content-progres social-widget"> 
        
                                        <!-- este marca el 100% del progres bar -->
                                        <div class="progres-full limite " >
        
                                            <div class="indicador-kpi" style="height: 3.9em; background: #2ecc71; width: 90%;" >
        
                                                <p><strong>Valor Mensual</strong></p>
                                            </div>
        
                                        </div>
                                        <div class="progres-full">
        
                                            <div class="borde box-green" style="height: 3em; width: 88%;" >
        
                                                <p><strong>Valor Esperado Mensual 88,7%</strong></p>
        
                                            </div>
        
                                        </div><br>
        
                                    </div><br>
        
                                </div>
        
                            </div>
        
                            <div class="soc-content">
                                <div class="col-xs-6 b-r b-b b-t">
                                    <h5 class="font-medium">92,62 %</h5>
                                    <h6 class="text-muted">Bud Mon</h6>
                                </div>                          
                                <div class="col-xs-6 b-b b-t">
                                    <h5 class="font-medium">92,62 %</h5>
                                    <h6 class="text-muted">Real Mon</h6>
                                </div>
                            </div>
                            
        
                                    <div class="row">
                                        
                                            <div class="col-xs-12">
                    
                                                <!-- contenedor general de la progress bar -->
                                                <div class="content-progres social-widget"> 
                    
                                                    <!-- este marca el 100% del progres bar -->
                                                    <div class="progres-full limite " >
                    
                                                        <div class="indicador-kpi" style="height: 3.9em; background: #E74C3C; width: 78%;" >
                    
                                                            <p><strong>valor real 78%</strong></p>
                                                        </div>
                    
                                                    </div>
                                                    <div class="progres-full">
                    
                                                        <div class="borde box-green" style="height: 3em; width: 89.7%;" >
                    
                                                            <p><strong>Valor Esperado 99,7%</strong></p>
                    
                                                        </div>
                    
                                                    </div><br>
                    
                                                </div>
                    
                                            </div>
                                        
                                    </div>                    
        
        
        
                                <div class="tabbable">
                                        <ul class="nav nav-tabs" id="myTab5">
                                            <li class="active">
                                                <a data-toggle="tab" href="#home">
                                                    <i class="greenAES ace-icon fa fa-key bigger-120"></i>
                                                    Comentarios
                                                </a>
                                            </li>
            
                                            <li>
                                                <a data-toggle="tab" href="#messages">
                                                    <i class="greenAES ace-icon fa fa-comments bigger-120"></i>
                                                    Aañadir Comentario
                                                    <!-- <span class="badge badge-danger">Nuevo</span> -->
                                                </a>
                                            </li>
                                        </ul>
            
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th>#</th>
                                                        <th>Contenido</th>
                                                        <th>Autor</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <th scope="row">1</th>
                                                        <td>Cambios de prefiltros en compresor</td>
                                                        <td>pepito h</td>
                                                      </tr>
        
                                                      <tr>
                                                        <th scope="row">2</th>
                                                        <td>7-jul. Curso forzoso por fuga vapor en domo ppal. Caldera</td>
                                                        <td>Thornton</td>
                                                      </tr>
        
                                                    </tbody>
                                                  </table>
        
                                                  <ul class="pagination pagination-sm">
                                                        <li class="active"><a href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
        
                                                  </ul>
                                            </div>
            
                                            <div id="messages" class="tab-pane fade">
                                                
                                                <form action="">
        
                                                    <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Guardar Comentario</button>
        
                                                </form>
        
                                            </div>
                                        </div>
                                </div>
                                
                                <br>
        
                            </div>  




                </div>
        </div>




</div> 

</div> 

</div> 


