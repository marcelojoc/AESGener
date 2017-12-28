<div class="main-content " >
    <div class="main-content-inner">
        <div class="page-content" id="app">

<div class="row">
                    
                <input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url(); ?>">
                <div class="page-header col-sm-4 text-center blueAES b-r">
                    <h1 class="blueAES">
                         <strong>Tablero Operativo</strong>
                    </h1>
                </div>  
                <div class=" col-sm-8 form-inline ">

                        <div class="row">
                            <div class="col-xs-6">

                                    <div class="input-group" >
                                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    
                                            <div class="form-group">
                
                                                    <select class="form-control" v-model="divselect " name="opSelect" id="opSelect" >

                                                            <option value="" disabled selected hidden>Seleccionar</option>
                                                           
                                                            <option v-for="option in divlista" v-bind:value="option.id" v-bind:data-item="option.idPlanilla" >
                                                                {{ option.nombreDivSAP  }}
                                                            </option>

                                                    </select>   
                                            </div>
                                    </div>

                            </div>
                            <div class="col-xs-6">

                                <button v-on:click.prevent="getdatos" class="btn btn-xs btn-greenAES" >
                                        <span class="bigger-110">Ir</span>

                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                </button>

                            </div>
                        </div>

                </div>  
            
                    <hr>
            </div>  


<!-- inicio bloque Ca -->

                     
<div class="row" v-for ="item in valores">     <!-- inicio contenedor V-FOR -->

                <div v-if="item.nombreKPI == 'Correctivo(%)'">             
                    <div class="col-sm-7 " >
                    
                        <div class="social-widget col-sm-12 b-l b-r b-b">
                                <div class="soc-header box-ca">
                                    <i><h4>{{item.nombreKPI}}</h4></i>
                                </div>

                                <div class="soc-content">
                                    <div class="col-xs-6 b-l b-r b-b">

                                        <h5 class="font-medium">{{item.hsTRCorrectivo | onlytrunc}} %</h5>
                                        <h6 class="text-muted">Real Mon</h6>  

                                    </div>
                                
                                    <div class="col-xs-6 b-b b-r">

                                        <h5 class="font-medium">{{item.correctivoBudget}} %</h5>
                                        <h6 class="text-muted">Bud Mon</h6>

                                    </div>

                                </div> 

                                <div class="row">

                                    <div class="col-xs-12 ">

                                            <vm-semaforizado  v-bind:esperado= 'item.correctivoBudget' v-bind:real= 'item.hsTRCorrectivo'  lbl=""  tipo= "false"></vm-semaforizado>
                                            
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


                </div> <!-- fin div contenerdor -->






                <div v-if="item.nombreKPI == 'Cumplimiento Plan Preventivo(%)'">             
                    <div class="col-sm-7 " >
                    
                        <div class="social-widget col-sm-12 b-l b-r b-b">
                                <div class="soc-header box-ca">
                                    <i><h4>{{item.nombreKPI}}</h4></i>
                                </div>

                                <div class="soc-content">
                                    <div class="col-xs-6 b-l b-r b-b">

                                        <h5 class="font-medium">{{item.hsTRPreventivo | onlytrunc}} %</h5>
                                        <h6 class="text-muted">Real Mon</h6>

                                    </div>
                                
                                    <div class="col-xs-6 b-b b-r">

                                        <h5 class="font-medium">{{item.preventivoBudget}} %</h5>
                                        <h6 class="text-muted">Bud Mon</h6>

                                    </div>

                                </div> 

                                <div class="row">

                                    <div class="col-xs-12 ">

                                            <vm-semaforizado  v-bind:esperado= 'item.preventivoBudget' v-bind:real= 'item.hsTRPreventivo'  lbl=""  tipo= "true"></vm-semaforizado>
                                            
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


                </div> <!-- fin div contenerdor -->




                <div v-if="item.nombreKPI == 'Backlog (semanas)'">             
                    <div class="col-sm-7 " >
                    
                        <div class="social-widget col-sm-12 b-l b-r b-b">
                                <div class="soc-header box-ca">
                                    <i><h4>{{item.nombreKPI}}</h4></i>
                                </div>

                                <div class="soc-content">
                                    <div class="col-xs-6 b-l b-r b-b">

                                        <h5 class="font-medium">{{item.backlogReal | onlytrunc}} </h5>
                                        <h6 class="text-muted">Real Mon</h6>

                                    </div>
                                
                                    <div class="col-xs-6 b-b b-r">

                                        <h5 class="font-medium">{{item.backlogBudget}} </h5>
                                        <h6 class="text-muted">Bud Mon</h6>

                                    </div>

                                </div> 

                                <div class="row">

                                    <div class="col-xs-12 ">

                                            <vm-semaforizado  v-bind:esperado= 'item.backlogBudget' v-bind:real= 'item.backlogReal'  lbl=""  tipo= "false"></vm-semaforizado>
                                            
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


                </div> <!-- fin div contenerdor -->









                <div v-if="item.nombreKPI == 'Planned Work(%)'">             
                    <div class="col-sm-7 " >
                    
                        <div class="social-widget col-sm-12 b-l b-r b-b">
                                <div class="soc-header box-ca">
                                    <i><h4>{{item.nombreKPI}}</h4></i>
                                </div>

                                <div class="soc-content">
                                    <div class="col-xs-6 b-l b-r b-b">

                                        <h5 class="font-medium">{{item.hsTRPlanificadas | onlytrunc}} %</h5>
                                        <h6 class="text-muted">Real Mon</h6>

                                    </div>
                                
                                    <div class="col-xs-6 b-b b-r">

                                        <h5 class="font-medium">{{item.trabajoPlaneado}} %</h5>
                                        <h6 class="text-muted">Bud Mon</h6>

                                    </div>

                                </div> 

                                <div class="row">

                                    <div class="col-xs-12 ">

                                            <vm-semaforizado  v-bind:esperado= 'item.trabajoPlaneado' v-bind:real= 'item.hsTRPlanificadas'  lbl=""  tipo= "true"></vm-semaforizado>
                                            
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


                </div> <!-- fin div contenerdor -->







     <div v-if="item.nombreKPI == 'Proactive Work(%)'">             
                    <div class="col-sm-7 " >
                    
                        <div class="social-widget col-sm-12 b-l b-r b-b">
                                <div class="soc-header box-ca">
                                    <i><h4>{{item.nombreKPI}}</h4></i>
                                </div>

                                <div class="soc-content">
                                    <div class="col-xs-6 b-l b-r b-b">

                                        <h5 class="font-medium">{{item.trabajoProactivo | onlytrunc}} %</h5>
                                        <h6 class="text-muted">Real Mon</h6>

                                    </div>
                                
                                    <div class="col-xs-6 b-b b-r">

                                        <h5 class="font-medium">{{item.proactivoBudget}} %</h5>
                                        <h6 class="text-muted">Bud Mon</h6>

                                    </div>

                                </div> 

                                <div class="row">

                                    <div class="col-xs-12 ">

                                            <vm-semaforizado  v-bind:esperado= 'item.proactivoBudget' v-bind:real= 'item.trabajoProactivo'  lbl=""  tipo= "true"></vm-semaforizado>
                                            
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


                </div> <!-- fin div contenerdor -->                                
            </div>  <!-- fin contenedor V-for -->  



<!-- fin bloque CA -->

<!-- <pre>{{$data.valores}}</pre> -->
        </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->





<!-- tag de templates -->
<script type="text/x-template" id="aesgen-graph" >
    <!-- <template id="aesgen-graph"> -->
    
                <!-- contenedor general de la progress bar -->
                <div class="content-progres social-widget"> 
    
                    <!-- este marca el 100% del progres bar -->
                    <!-- progres-full limite animated zoomIn -->
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
</script>
    
    
    
    <script type="text/x-template" id="aesgen-semaf">
    
        <!-- contenedor general de la progress bar -->
        <div class="content-progres social-widget">
    
            
                    <div class="progres-full limite animated rubberBand">
                    
                        <!-- <div class="indicador-kpi" style="height: 3.9em; background: #E74C3C; width:50%;" > -->
                        <div class="indicador-kpi" :style="{ background: getColorPoint, height: '3.9em' , width: '100%' }">
                    
                            <p>
                                <strong>{{leyenda }}</strong>
                            </p>
                    
                        </div>
                    
                    </div>


        </div>
    
    </script>