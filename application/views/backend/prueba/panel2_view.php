<?php 

//var_dump($maquina);
$valor= $maquina[0];

$res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";

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


                            <div class="row">
                                <div class="col-md-4">

                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        
                                                <div class="form-group">
                    
                                                        <select class="form-control" name="category">
                                                                <option value="">seleccionar</option>
                                                                <option value="0">Maquina</option>
                                                                <option value="1">Division</option>
                                                                <option value="2">Complejo</option>
                                                        </select>   
                                                </div>
                                        </div>

                                </div>
                                <div class="col-md-8">

                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                        
                                                <div class="form-group">
                    
                                                        <select class="form-control" name="category">
                                                                <option value="">seleccionar</option>
                                                                <option value="0">Maquina</option>
                                                                <option value="1">Division</option>
                                                                <option value="2">Complejo</option>
                                                        </select>   
                                                </div>
                                        </div>

                                </div>
                            </div>




                    </div>
                        

        </div>  



            <div class="row">

                <!-- <div class="col-xs-1 beige">aqui  va la tab</div> -->
                <div class="col-sm-7 ">
                   
                    <div class="social-widget col-sm-12 b-l b-r b-b">
                            <div class="soc-header box-corporativo" id="app">
                                <i><h4>EAF (%) {{title}}</h4></i>
                            </div>

                            <div class="soc-content">
                                <div class="col-xs-3 b-r b-b">
                                    <h5 class="font-medium"><?php echo $valor->actualMes .'%'  ?></h5>
                                    <h6 class="text-muted">Actual Mon</h6>
                                </div>
                            
                                <div class="col-xs-3 b-b b-r">
                                    <h5 class="font-medium"><?php echo $valor->targetMes .'%' ?></h5>
                                    <h6 class="text-muted">Target Mon</h6>

                                </div>
                                <div class="col-xs-3 b-r b-b">
                                        <h5 class="font-medium"><?php echo $valor->actualMes .'%'  ?></h5>
                                        <h6 class="text-muted">Actual Mon</h6>
                                    </div>
                                
                                    <div class="col-xs-3 b-b">
                                        <h5 class="font-medium"><?php echo $valor->targetMes .'%' ?></h5>
                                        <h6 class="text-muted">Target Mon</h6>
    
                                </div>

                            </div> 

                    

                            <div class="row">

                                <div class="col-xs-6 b-r">

                                    <!-- contenedor general de la progress bar -->
                                    <div class="content-progres social-widget"> 

                                        <!-- este marca el 100% del progres bar -->
                                        <div class="progres-full limite " >

                                                <?php   $res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";   

                                                        $res.= 'width:'.$valor->actualMes .'%;';

                                                ?>

                                                <div class="indicador-kpi" style="height: 3.9em; <?php echo $res ?>">



                                                <p><strong>Valor Mensual</strong></p>
                                            </div>

                                        </div>
                                        <div class="progres-full">

                                                <div class="borde box-green" style="height: 3em; width: <?php echo $valor->targetMes .'%;' ?>;">

                                                <p><strong>Valor Esperado Mensual</strong></p>

                                            </div>

                                        </div><br>

                                    </div><br>

                                </div>

                                <div class="col-xs-6">
                                        
                                    <!-- contenedor general de la progress bar -->
                                    <div class="content-progres social-widget"> 

                                        <!-- este marca el 100% del progres bar -->
                                        <div class="progres-full limite " >

                                                    <?php   $res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";   

                                                            $res.= 'width:'.$valor->actualMes .'%;';

                                                    ?>

                                                <div class="indicador-kpi" style="height: 3.9em; <?php echo $res ?>">

                                                <p><strong>Valor Mensual</strong></p>
                                                </div>

                                        </div>
                                        <div class="progres-full">

                                            <div class="borde box-green" style="height: 3em; width: <?php echo $valor->targetMes .'%;' ?>;">

                                                <p><strong>Valor Esperado Mensual</strong></p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                 
                    </div>

                </div>



                <div class="col-xs-4">

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

                                <div class="tab-content ">
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
                                                <tr>
                                                <th scope="row">2</th>
                                                <td>7-jul. Curso forzoso por fuga vapor en domo ppal. Caldera</td>
                                                <td>Thornton</td>
                                                </tr>
                                                <tr>
                                                <th scope="row">2</th>
                                                <td>7-jul. Curso forzoso por fuga vapor en domo ppal. Caldera</td>
                                                <td>Thornton</td>
                                                </tr>

                                            </tbody>
                                            </table>

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


            </div>
            <div class="row">
                <div class="col-sm-7 ">
                   
                    <div class="social-widget col-sm-12 b-l b-r b-b">
                            <div class="soc-header box-corporativo">
                                <i><h4>EAF (%)</h4></i>
                            </div>

                            <div class="soc-content">
                                <div class="col-xs-3 b-r b-b">
                                    <h5 class="font-medium"><?php echo $valor->actualMes .'%'  ?></h5>
                                    <h6 class="text-muted">Actual Mon</h6>
                                </div>
                            
                                <div class="col-xs-3 b-b b-r">
                                    <h5 class="font-medium"><?php echo $valor->targetMes .'%' ?></h5>
                                    <h6 class="text-muted">Target Mon</h6>

                                </div>
                                <div class="col-xs-3 b-r b-b">
                                        <h5 class="font-medium"><?php echo $valor->actualMes .'%'  ?></h5>
                                        <h6 class="text-muted">Actual Mon</h6>
                                    </div>
                                
                                    <div class="col-xs-3 b-b">
                                        <h5 class="font-medium"><?php echo $valor->targetMes .'%' ?></h5>
                                        <h6 class="text-muted">Target Mon</h6>
    
                                </div>

                            </div> 

                    

                            <div class="row">

                                <div class="col-xs-6 b-r">

                                    <!-- contenedor general de la progress bar -->
                                    <div class="content-progres social-widget"> 

                                        <!-- este marca el 100% del progres bar -->
                                        <div class="progres-full limite " >

                                                <?php   $res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";   

                                                        $res.= 'width:'.$valor->actualMes .'%;';

                                                ?>

                                                <div class="indicador-kpi" style="height: 3.9em; <?php echo $res ?>">



                                                <p><strong>Valor Mensual</strong></p>
                                            </div>

                                        </div>
                                        <div class="progres-full">

                                                <div class="borde box-green" style="height: 3em; width: <?php echo $valor->targetMes .'%;' ?>;">

                                                <p><strong>Valor Esperado Mensual</strong></p>

                                            </div>

                                        </div><br>

                                    </div><br>

                                </div>

                                <div class="col-xs-6">
                                        
                                    <!-- contenedor general de la progress bar -->
                                    <div class="content-progres social-widget"> 

                                        <!-- este marca el 100% del progres bar -->
                                        <div class="progres-full limite " >

                                                <?php   $res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";   

                                                        $res.= 'width:'.$valor->actualMes .'%;';

                                                ?>

                                                <div class="indicador-kpi" style="height: 3.9em; <?php echo $res ?>">



                                                <p><strong>Valor Mensual</strong></p>
                                            </div>

                                        </div>
                                        <div class="progres-full">

                                                <div class="borde box-green" style="height: 3em; width: <?php echo $valor->targetMes .'%;' ?>;">

                                                <p><strong>Valor Esperado Mensual</strong></p>

                                            </div>

                                        </div><br>

                                    </div><br>

                                </div>



                            </div>
                 


                    </div>

                </div>



                <div class="col-xs-5">

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


            </div>

                













        </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->




