<?php 

//var_dump($maquina);
// $valor= $maquina[0];
// $res = ($valor->actualMes >= $valor->targetMes) ? "background: #2ecc71;" : "background: #E74C3C;";

?>

<div class="main-content " >
    <div class="main-content-inner">
        <div class="page-content" id="app">
            
        <div class="row">


                    <div class="page-header col-sm-4 text-center blueAES b-r">
                        <h1 class="blueAES">
                            Tablero Estratégico 
                            <?php //echo $valor->nombreMaquina  ?>
                        </h1>
                    </div>  
                    <div class=" col-sm-8 blueAES form-inline ">

                            <div class="row">
                                <div class="col-md-4">

                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        
                                                <div class="form-group">
                    
                                                        <select class="form-control" v-model="idSelect" name="category" @change="getLists">

                                                            <option value="" disabled selected hidden>Seleccionar</option>
                                                            <option v-for="option in busqueda" v-bind:value="option.id">
                                                            {{ option.nombre  }}
                                                            </option>

                                                        </select>   
                                                </div>
                                        </div>

                                </div>
                                <div class="col-md-8">

                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                        
                                                <div class="form-group">
                    
                                                    <select class="form-control" v-model="idList" name="category" >
                                                        <option value="" disabled selected hidden>Seleccionar</option>
                                                        <option v-for="option in seleccion" v-bind:value="option.id">
                                                            {{ option.nombre }}
                                                        </option>

                                                    </select>  
                                                </div>

                                                <button v-on:click.prevent="getData" >ir</button>
                                        </div>

                                </div>
                            </div>

                    </div>         

        </div>  



            <div class="row">

                <!-- <div class="col-xs-1 beige">aqui  va la tab</div> -->
                <div class="col-sm-7 ">
                   
                    <div class="social-widget col-sm-12 b-l b-r b-b">
                            <div class="soc-header box-corporativo" >
                                <i><h4>EAF (%) </h4></i>
                            </div>

                            <div class="soc-content">
                                <div class="col-xs-3 b-r b-b">
                                    <h5 class="font-medium" >{{kpi[0].actualMes |truncar  }}</h5>
                                    <h6 class="text-muted">Actual Mon</h6>
                                </div>
                            
                                <div class="col-xs-3 b-b b-r">
                                    <h5 class="font-medium">{{kpi[0].targetMes |truncar}}</h5>
                                    <h6 class="text-muted">Target Mon</h6>

                                </div>
                                <div class="col-xs-3 b-r b-b">
                                        <h5 class="font-medium">{{kpi[0].ytdActual |truncar}}</h5>
                                        <h6 class="text-muted">Actual Mon</h6>
                                    </div>
                                
                                    <div class="col-xs-3 b-b">
                                        <h5 class="font-medium">{{kpi[0].ytdTarget |truncar}}</h5>
                                        <h6 class="text-muted">Target Mon</h6>
    
                                </div>

                            </div> 

                    

                            <div class="row">

                                <div class="col-xs-6 b-r">

                                    <vm-grafico  v-if= " kpi[0].targetMes != ''"   v-bind:esperado='kpi[0].targetMes |truncar'  v-bind:real='kpi[0].actualMes |truncar'  lble="valor esperado" lblr="valor real"></vm-grafico>
                                    

                                </div>

                                <div class="col-xs-6 ">
                                        
                                    <vm-grafico v-if= " kpi[0].ytdActual != ''"  v-bind:esperado ='kpi[0].ytdTarget|truncar' v-bind:real='kpi[0].ytdActual|truncar'  lble="valor esperado" lblr="valor real"></vm-grafico>
                                    

                                </div>

                            </div>
                 
                    </div>

                </div>

                <div class="col-xs-4 animated jackInTheBox">

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
                                <i><h4>EFOF (%)</h4></i>
                            </div>

                            <div class="soc-content">
                                <div class="col-xs-3 b-r b-b">
                                    <h5 class="font-medium">{{kpi[1].actualMes |truncar }}</h5>
                                    <h6 class="text-muted">Actual Mon</h6>
                                </div>
                            
                                <div class="col-xs-3 b-b b-r">
                                    <h5 class="font-medium">{{kpi[1].targetMes |truncar}}</h5>
                                    <h6 class="text-muted">Target Mon</h6>

                                </div>
                                <div class="col-xs-3 b-r b-b">
                                        <h5 class="font-medium">{{kpi[1].ytdActual |truncar}}</h5>
                                        <h6 class="text-muted">Actual Mon</h6>
                                    </div>
                                
                                    <div class="col-xs-3 b-b">
                                        <h5 class="font-medium">{{kpi[1].ytdTarget |truncar}}</h5>
                                        <h6 class="text-muted">Target Mon</h6>
    
                                </div>

                            </div> 

                            <div class="row">

                                <div class="col-xs-6 b-r">

                                    <vm-semaforizado v-if= " kpi[1].targetMes != ''"  v-bind:esperado= 'kpi[1].targetMes |truncar' v-bind:real= 'kpi[1].actualMes |truncar'  lbl=""  tipo= "false"></vm-semaforizado>
                                    
                                </div>

                                <div class="col-xs-6">
                                        
                                    <vm-semaforizado    v-if= " kpi[1].ytdTarget != ''"  v-bind:esperado= 'kpi[1].ytdTarget |truncar' v-bind:real= 'kpi[1].ytdActual |truncar'  lbl="" tipo="false"></vm-semaforizado>
                                    
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
                                <i><h4>HEAT RATE (%)</h4></i>
                            </div>

                            <div class="soc-content">
                                <div class="col-xs-3 b-r b-b">
                                    <h5 class="font-medium">{{kpi[2].actualMes |sindec }}</h5>
                                    <h6 class="text-muted">Actual Mon</h6>
                                </div>
                            
                                <div class="col-xs-3 b-b b-r">
                                    <h5 class="font-medium">{{kpi[2].targetMes |sindec}}</h5>
                                    <h6 class="text-muted">Target Mon</h6>

                                </div>
                                <div class="col-xs-3 b-r b-b">
                                        <h5 class="font-medium">{{kpi[2].ytdActual |sindec}}</h5>
                                        <h6 class="text-muted">Actual Mon</h6>
                                    </div>
                                
                                    <div class="col-xs-3 b-b">
                                        <h5 class="font-medium">{{kpi[2].ytdTarget |sindec}}</h5>
                                        <h6 class="text-muted">Target Mon</h6>
    
                                </div>

                            </div> 

                            <div class="row">

                                <div class="col-xs-6 b-r">

                                    <vm-semaforizado  v-if= " kpi[2].targetMes != ''"  v-bind:esperado= 'kpi[2].targetMes |sindec' v-bind:real= 'kpi[2].actualMes |sindec'  lbl="valor esperado" tipo="true"></vm-semaforizado>

                                </div>

                                <div class="col-xs-6">
                                        
                                    <vm-semaforizado  v-if= " kpi[2].ytdTarget != ''"  v-bind:esperado= 'kpi[2].ytdTarget |sindec ' v-bind:real= 'kpi[2].ytdActual |sindec'  lbl="valor esperado" tipo= "true" ></vm-semaforizado>

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

            <pre>

            

            </pre>

        </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->




<!-- tag de templates -->

<template id="aesgen-graph">

            <!-- contenedor general de la progress bar -->
            <div class="content-progres social-widget"> 

                <!-- este marca el 100% del progres bar -->
                <div class="progres-full limite animated zoomIn" >

                    <!-- <div class="indicador-kpi" style="height: 3.9em; background: #E74C3C; width:50%;" > -->
                    <div class="indicador-kpi" :style="{ background: getColor, height: '3.9em' , width: real + '%' }" >
                        
                        <p><strong>{{lblr + " "}}{{real +"%" }}</strong></p>

                    </div>

                </div>
                <div class="progres-full animated bounceIn">

                    <div class="borde box-green" :style="{ width: esperado + '%' }" >

                        <p><strong>{{lble +" " }} {{esperado +"%" }}</strong></p>

                    </div>

                </div>

            </div>

</template>



<template id="aesgen-semaf">

    <!-- contenedor general de la progress bar -->
    <div class="content-progres social-widget">

                <div class="progres-full limite animated zoomIn">
                
                    <!-- <div class="indicador-kpi" style="height: 3.9em; background: #E74C3C; width:50%;" > -->
                    <div class="indicador-kpi" :style="{ background: getColorPoint, height: '3.9em' , width: '100%' }">
                
                        <p>
                            <strong>{{lbl }}</strong>
                        </p>
                
                    </div>
                
                </div>


    </div>

</template>