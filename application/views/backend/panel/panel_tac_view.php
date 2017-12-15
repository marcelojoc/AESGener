

<div class="main-content ">
<div class="main-content-inner">
    <div class="page-content" id="app">
        
        <div class="row">
                <input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url(); ?>">
            <div class="page-header col-sm-4 text-center blueAES b-r">
                <h1 class="blueAES">
                    Tablero Táctico
                </h1>
            </div>  
            <div class=" col-sm-8 form-inline ">

                    <div class="row">
                        <div class="col-xs-6">

                                <div class="input-group" >
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                
                                        <div class="form-group">
            
                                                <select class="form-control" v-model="idSelect" name="ugenSelect" >

                                                        <option value="" disabled selected hidden>Seleccionar</option>
                                                        <!-- <option value="0">Todas</option> -->
                                                        <option v-for="option in ugen" v-bind:value="option.id">
                                                        {{ option.nombre  }}
                                                        </option>

                                                </select>   
                                        </div>
                                </div>

                        </div>
                        <div class="col-xs-6">

                            <button v-on:click.prevent="getkpi" class="btn btn-xs btn-success " >
                                    <span class="bigger-110">Ir</span>

                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>

                        </div>
                    </div>

            </div>  
        
                <hr>
        </div>  
        
        

<!-- aqui va el contenido -->


            <div class="row" >

                <div class="col-xs-6 " >  


                        <div class="soc-content " v-for=" item in kpi" >
                                <div class="col-xs-6 b-r b-t" >
                                    <h3 class="font-medium" >{{item.nombre}}</h3>
                                    
                                </div>
                            
                                <div class="col-xs-6 b-t " >
                                    <h3 class="font-medium">{{item.valor}}</h3>
                                    
            
                                </div>
            
                        </div>  
            
            

                    
                </div>
                <div class="col-xs-6 b-r" v-if="this.count > 3">  


                        <div class="col-xs-12 animated jackInTheBox"><div class="tabbable"><ul class="nav nav-tabs" id="myTab"><li class="active"><a data-toggle="tab" href="#home">
                                <i class="greenAES ace-icon fa fa-key bigger-120"></i>Comentarios</a></li><li>
                                <a data-toggle="tab" href="#messages"><i class="greenAES ace-icon fa fa-comments bigger-120"></i>Aañadir Comentario</a>
                                </li></ul><div class="tab-content "><div id="home" class="tab-pane fade in active"><table class="table">
                                <thead><tr><th>#</th><th>Contenido</th><th>Autor</th></tr></thead>
                                <tbody><tr><th scope="row">1</th><td>Cambios de prefiltros en compresor</td><td>pepito h</td></tr><tr><tr></tbody></table></div>
                                <div id="messages" class="tab-pane fade"><form action="">
                                <div class="form-group"><label for="exampleFormControlTextarea1">Deja tu comentario</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
                                <button type="submit" class="btn btn-primary">Guardar Comentario</button></form></div></div></div><br></div>



                </div>


            </div>


<div >                              <!-- wrapper DIV  -->
        <div class="row" v-if="this.kpi.mtbf"> 

            <div class="col-xs-6 ">  
                
                                        <div class="social-widget col-sm-12 b-l  b-b">
                                                <div class="soc-header box-twitter" >
                                                    <i><h4> MTBF </h4></i>
                                                </div>
                    
                    
                                                <div class="soc-content">
                                                    <div class="col-xs-6 b-r b-b">
                                                        <h5 class="font-medium" >{{this.kpi.mtbf | onlytrunc }}</h5>
                                                        <h6 class="text-muted">Actual Mon</h6>
                                                    </div>
                                                
                                                    <div class="col-xs-6 b-b ">
                                                        <h5 class="font-medium">{{this.kpi.mtbfTarget }}</h5>
                                                        <h6 class="text-muted">Target Mon</h6>
                    
                                                    </div>
                    
                                                </div> 
                    
                                                <div class="row" >
                    
                                                    <div class="col-xs-12 ">
                    
                                                        <vm-semaforizado  v-bind:esperado= 'this.kpi.mtbfTarget' v-bind:real= 'this.kpi.mtbf'  lbl=""  tipo= "false"></vm-semaforizado>
                                                        
                                                    </div>
                    
                    
                                                </div>
                    
                                        </div>

            </div>

            <div class="col-xs-6 b-r">  

                
                <div class="col-xs-12 animated jackInTheBox"><div class="tabbable"><ul class="nav nav-tabs" id="myTab"><li class="active"><a data-toggle="tab" href="#home">
                    <i class="greenAES ace-icon fa fa-key bigger-120"></i>Comentarios</a></li><li>
                    <a data-toggle="tab" href="#messages"><i class="greenAES ace-icon fa fa-comments bigger-120"></i>Aañadir Comentario</a>
                    </li></ul><div class="tab-content "><div id="home" class="tab-pane fade in active"><table class="table">
                    <thead><tr><th>#</th><th>Contenido</th><th>Autor</th></tr></thead>
                    <tbody><tr><th scope="row">1</th><td>Cambios de prefiltros en compresor</td><td>pepito h</td></tr><tr><tr></tbody></table></div>
                    <div id="messages" class="tab-pane fade"><form action="">
                    <div class="form-group"><label for="exampleFormControlTextarea1">Deja tu comentario</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
                    <button type="submit" class="btn btn-primary">Guardar Comentario</button></form></div></div></div><br></div>  <br>





            </div>


        </div>


</div>   <!-- Close wrapper DIV  -->


















<!-- 
<pre>
{{$data}}
</pre> -->





        </div>  


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

                <div class="progres-full limite animated zoomIn">
                
                    <!-- <div class="indicador-kpi" style="height: 3.9em; background: #E74C3C; width:50%;" > -->
                    <div class="indicador-kpi" :style="{ background: getColorPoint, height: '3.9em' , width: '100%' }">
                
                        <p>
                            <strong>{{leyenda }}</strong>
                        </p>
                
                    </div>
                
                </div>
    </div>

</script>