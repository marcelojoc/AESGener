<div class="main-content " >
    <div class="main-content-inner">
        <div class="page-content" id="app">
            
        <div class="row">

                    <input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url(); ?>">
                    <input type="hidden" name="idEmpleado" id="idEmpleado" value="<?php echo $_SESSION['logged_in']['idEmpleado']; ?>">
                    <input type="hidden" name="nombreE" id="nombreE" value="<?php echo $_SESSION['logged_in']['nombreE']; ?>">
                    <input type="hidden" name="anio" id="anio" value="<?php echo $anio; ?>">
                    <input type="hidden" name="mes" id="mes" value="<?php echo $mes; ?>">
                    <div class="page-header col-sm-4 text-center blueAES b-r">
                        <h1 class="blueAES">
                            
                            <strong>Tablero Estratégico </strong>
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
                                <div class="col-md-4">

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
                                        </div>

                                </div>



                                <div class="col-md-4">
                                        
                                        <button v-on:click.prevent="getData" class="btn text-center btn-xs btn-greenAES" >
                                                <span class="bigger-110">Ir</span>
        
                                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                        </button>                                    

                                </div>                                
                            </div>

                    </div>         

        </div>  



            <div class="row" v-for ="item in kpi">

                <!-- <div class="col-xs-1 beige">aqui  va la tab</div> -->


                <div v-if="item.nombreKPI == 'EAF'">


                    <div class="col-sm-7 " >
                        
                         <div class="social-widget col-sm-12 b-l b-r b-b">
                                 <div class="soc-header box-corporativo" >
                                     <i><h4>{{item.nombreKPI}} (%) </h4></i>
                                 </div>
     
     
                                 <div class="soc-content">
                                     <div class="col-xs-3 b-r b-b">
                                         <h5 class="font-medium" >{{item.actualMes | truncar  }} %</h5>
                                         <h6 class="text-muted">Actual Mon</h6>
                                     </div>
                                 
                                     <div class="col-xs-3 b-b b-r">
                                         <h5 class="font-medium">{{item.targetMes  | truncar }} %</h5>
                                         <h6 class="text-muted">Target Mon</h6>
     
                                     </div>
                                     <div class="col-xs-3 b-r b-b">
                                             <h5 class="font-medium">{{item.ytdActual  | truncar  }}%</h5>
                                             <h6 class="text-muted">YTD Actual</h6>
                                         </div>
                                     
                                         <div class="col-xs-3 b-b">
                                             <h5 class="font-medium">{{item.ytdTarget | truncar  }}%</h5>
                                             <h6 class="text-muted">YTD Target</h6>
         
                                     </div>
     
                                 </div> 
     
                                 <div class="row">
     
                                     <div class="col-xs-6 b-r">
     
                                         <vm-grafico  v-if= " item.targetMes != ''"   v-bind:esperado='item.targetMes  |truncar'  v-bind:real='item.actualMes |truncar'  lble="valor esperado" lblr="valor real"></vm-grafico>
                                         
     
                                     </div>
     
                                     <div class="col-xs-6 ">
                                             
                                         <vm-grafico v-if= "item.ytdActual != ''"  v-bind:esperado ='item.ytdTarget|truncar' v-bind:real='item.ytdActual|truncar'  lble="valor esperado" lblr="valor real"></vm-grafico>
                                         
                                     </div>
     
                                 </div>
     
     
                         </div>
     
                     </div>




                     <div class="col-xs-4 animated jackInTheBox"><div class="tabbable"><ul class="nav nav-tabs" id="myTab"><li class="active"><a data-toggle="tab" href="#home">
                        <i class="greenAES ace-icon fa fa-comments bigger-120"></i>Comentarios</a></li><li>
                        <a data-toggle="tab" href="#messages"><i class="greenAES ace-icon fa fa-comment bigger-120"></i>Añadir Comentario</a>
                        </li></ul><div class="tab-content "><div id="home" class="tab-pane fade in active"><table class="table">
                        <thead><tr><th>#</th><th>Contenido</th><th>Autor</th></tr></thead>
                        <tbody><tr><th scope="row">1</th><td>Cambios de prefiltros en compresor</td><td>pepito h</td></tr><tr><tr></tbody></table></div>
                        <div id="messages" class="tab-pane fade"><form action="">
                        <div class="form-group"><label for="exampleFormControlTextarea1">Deja tu comentario</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
                        <button type="submit" class="btn btn-purple">Guardar Comentario</button></form></div></div></div><br></div>   <br> 


                </div>




                <div v-if="item.nombreKPI == 'EFOF'">

                    <div class="col-sm-7 " >
                        
                         <div class="social-widget col-sm-12 b-l b-r b-b">
                                 <div class="soc-header box-corporativo" >
                                     <i><h4>{{item.nombreKPI}} (%) </h4></i>
                                 </div>
     
     
                                 <div class="soc-content">
                                     <div class="col-xs-3 b-r b-b">
                                         <h5 class="font-medium" >{{item.actualMes |truncar  }} %</h5>
                                         <h6 class="text-muted">Actual Mon</h6>
                                     </div>
                                 
                                     <div class="col-xs-3 b-b b-r">
                                         <h5 class="font-medium">{{item.targetMes |truncar}} %</h5>
                                         <h6 class="text-muted">Target Mon</h6>
     
                                     </div>
                                     <div class="col-xs-3 b-r b-b">
                                             <h5 class="font-medium">{{item.ytdActual |truncar}}%</h5>
                                             <h6 class="text-muted">YTD Actual</h6>
                                         </div>
                                     
                                         <div class="col-xs-3 b-b">
                                             <h5 class="font-medium">{{item.ytdTarget |truncar}}%</h5>
                                             <h6 class="text-muted">YTD Target</h6>
         
                                     </div>
     
                                 </div> 
     
                                 <div class="row" >
                                         
                                     <div class="col-xs-6 b-r">
                         
                                         <vm-semaforizado v-if= " item.targetMes != ''"  v-bind:esperado= 'item.targetMes |truncar' v-bind:real= 'item.actualMes |truncar'  lbl=""  tipo= "false"></vm-semaforizado>
                         
                         
                                     </div>
                         
                                     <div class="col-xs-6 ">
                         
                                         <vm-semaforizado v-if= " item.ytdTarget != ''"  v-bind:esperado= 'item.ytdTarget |truncar' v-bind:real= 'item.ytdActual |truncar'  lbl=""  tipo= "false"></vm-semaforizado>
                         
                         
                                     </div>
                         
                                 </div>
     
     
                         </div>
     
                     </div>




                     <div class="col-xs-4 animated jackInTheBox"><div class="tabbable"><ul class="nav nav-tabs" id="myTab"><li class="active"><a data-toggle="tab" href="#home">
                        <i class="greenAES ace-icon fa fa-comments bigger-120"></i>Comentarios</a></li><li>
                        <a data-toggle="tab" href="#messages"><i class="greenAES ace-icon fa fa-comment bigger-120"></i>Añadir Comentario</a>
                        </li></ul><div class="tab-content "><div id="home" class="tab-pane fade in active"><table class="table">
                        <thead><tr><th>#</th><th>Contenido</th><th>Autor</th></tr></thead>
                        <tbody><tr><th scope="row">1</th><td>Cambios de prefiltros en compresor</td><td>pepito h</td></tr><tr><tr></tbody></table></div>
                        <div id="messages" class="tab-pane fade"><form action="">
                        <div class="form-group"><label for="exampleFormControlTextarea1">Deja tu comentario</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
                        <button type="submit" class="btn btn-purple">Guardar Comentario</button></form></div></div></div><br></div>   <br>




                </div>

                
                <div v-if="item.nombreKPI == 'ENPHR'">

                    <div class="col-sm-7 " >
                        
                         <div class="social-widget col-sm-12 b-l b-r b-b">
                                 <div class="soc-header box-corporativo" >
                                     <i><h4>{{item.nombreKPI}} </h4></i>
                                 </div>
     
     
                                 <div class="soc-content">
                                     <div class="col-xs-3 b-r b-b">
                                         <h5 class="font-medium" >{{item.actualMes |sindec  }} [BTU/MWH]</h5>
                                         <h6 class="text-muted">Actual Mon</h6>
                                     </div>
                                 
                                     <div class="col-xs-3 b-b b-r">
                                         <h5 class="font-medium">{{item.targetMes |sindec}} [BTU/MWH]</h5>
                                         <h6 class="text-muted">Target Mon</h6>
     
                                     </div>
                                     <div class="col-xs-3 b-r b-b">
                                             <h5 class="font-medium">{{item.ytdActual |sindec}}[BTU/MWH]</h5>
                                             <h6 class="text-muted">YTD Actual</h6>
                                         </div>
                                     
                                         <div class="col-xs-3 b-b">
                                             <h5 class="font-medium">{{item.ytdTarget |sindec}}[BTU/MWH]</h5>
                                             <h6 class="text-muted">YTD Target</h6>
         
                                     </div>
     
                                 </div> 
     
                                 <div class="row" >
                                         
                                     <div class="col-xs-6 b-r">
     
                                             <vm-semaforizado v-if= " item.targetMes != ''"  v-bind:esperado= 'item.targetMes |sindec' v-bind:real= 'item.actualMes |sindec'  lbl=""  tipo= "false"></vm-semaforizado>
                                             
     
                                     </div>
     
                                     <div class="col-xs-6 ">
                                             
                                             <vm-semaforizado v-if= " item.targetMes != ''"  v-bind:esperado= 'item.ytdTarget |sindec' v-bind:real= 'item.ytdActual |sindec'  lbl=""  tipo= "false"></vm-semaforizado>
                                             
     
                                     </div>
     
                                 </div>
     
     
                         </div>
     
                     </div>



                     <div class="col-xs-4 animated jackInTheBox"><div class="tabbable"><ul class="nav nav-tabs" id="myTab"><li class="active"><a data-toggle="tab" href="#home">
                        <i class="greenAES ace-icon fa fa-comments bigger-120"></i>Comentarios</a></li><li>
                        <a data-toggle="tab" href="#messages"><i class="greenAES ace-icon fa fa-comment bigger-120"></i>Añadir Comentario</a>
                        </li></ul><div class="tab-content "><div id="home" class="tab-pane fade in active"><table class="table">
                        <thead><tr><th>#</th><th>Contenido</th><th>Autor</th></tr></thead>
                        <tbody><tr><th scope="row">1</th><td>Cambios de prefiltros en compresor</td><td>pepito h</td></tr><tr><tr></tbody></table></div>
                        <div id="messages" class="tab-pane fade"><form action="">
                        <div class="form-group"><label for="exampleFormControlTextarea1">Deja tu comentario</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
                        <button type="submit" class="btn btn-purple">Guardar Comentario</button></form></div></div></div><br>
                    </div>   



                </div>

                <div  v-if="item.nombreKPI == 'CTM OPEX'">

                    <div class="col-sm-7 ">
                        
                         <div class="social-widget col-sm-12 b-l b-r b-b">
                                 <div class="soc-header box-twitter" >
                                     <i><h4>{{item.nombreKPI}} </h4></i>
                                 </div>
     
     
                                 <div class="soc-content">
                                     <div class="col-xs-6 b-r b-b">
                                         <h5 class="font-medium" >{{item.ctmActual}}</h5>
                                         <h6 class="text-muted">Actual Mon</h6>
                                     </div>
                                 
                                     <div class="col-xs-6 b-b ">
                                         <h5 class="font-medium">{{item.ctmBudget}}</h5>
                                         <h6 class="text-muted">Target Mon</h6>
     
                                     </div>
     
                                 </div> 
     
                                 <div class="row" >
     
                                     <div class="col-xs-12 ">
     
                                             <vm-semaforizado v-if= " item.ctmActual != ''"  v-bind:esperado= 'item.ctmBudget ' v-bind:real= 'item.ctmActual'  lbl=""  tipo= "false"></vm-semaforizado>
                                             
                                     </div>
     
     
                                 </div>
     
     
                         </div>
     
                     </div>
     

                     <div class="col-xs-4 animated jackInTheBox"><div class="tabbable"><ul class="nav nav-tabs" id="myTab"><li class="active"><a data-toggle="tab" href="#home">
                        <i class="greenAES ace-icon fa fa-comment bigger-120"></i>Comentarios</a></li><li>
                        <a data-toggle="tab" href="#messages"><i class="greenAES ace-icon fa fa-comment bigger-120"></i>Añadir Comentario</a>
                        </li></ul><div class="tab-content "><div id="home" class="tab-pane fade in active"><table class="table">
                        <thead><tr><th>#</th><th>Contenido</th><th>Autor</th></tr></thead>
                        <tbody><tr><th scope="row">1</th><td>Cambios de prefiltros en compresor</td><td>pepito h</td></tr><tr><tr></tbody></table></div>
                        <div id="messages" class="tab-pane fade"><form action="">
                        <div class="form-group"><label for="exampleFormControlTextarea1">Deja tu comentario</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
                        <button type="submit" class="btn btn-purple">Guardar Comentario</button></form></div></div></div><br></div>  <br> 

     
     
     
                </div>
     





                </div>

                

<!-- 
            <pre>

            {{$data}}

            </pre> -->


            <hr><br>
            <div class="row">
                    

                <div class="page-header col-sm-4 text-center blueAES b-r">
                    <h1 class="blueAES">
                        <strong>Tablero CA </strong>  
                    </h1>
                </div>  
                <div class=" col-sm-8 form-inline ">

                        <div class="row">
                            <div class="col-xs-6">

                                    <div class="input-group" >
                                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    
                                            <div class="form-group">
                
                                                    <select class="form-control" v-model="idcaSelect" name="caSelect" >

                                                            <option value="" disabled selected hidden>Seleccionar</option>
                                                            <option value="0">Todas</option>
                                                            <option v-for="option in camodel" v-bind:value="option.id">
                                                            {{ option.nombre  }}
                                                            </option>

                                                    </select>   
                                            </div>
                                    </div>

                            </div>
                            <div class="col-xs-6">

                                <button v-on:click.prevent="getCa" class="btn btn-xs btn-greenAES" >
                                        <span class="bigger-110">Ir</span>

                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                </button>

                            </div>
                        </div>

                </div>  
            
                    <hr>
            </div>  


<!-- inicio bloque Ca -->

                     
            <div class="row" v-for ="item in cakpi" >     <!-- inicio contenedor V-FOR -->

                    <div class="col-sm-7 ">
                    
                        <div class="social-widget col-sm-12 b-l b-r b-b">
                                <div class="soc-header box-ca">
                                    <i><h4>{{item.nombrePlanta}}</h4></i>
                                </div>

                                <div class="soc-content">
                                    <div class="col-xs-3 b-r b-b">
                                        <h5 class="font-medium">{{item.actualMes | truncar}} %</h5>
                                        <h6 class="text-muted">Actual Mon</h6>
                                    </div>
                                
                                    <div class="col-xs-3 b-b b-r">
                                        <h5 class="font-medium">{{item.targetMes | truncar }} %</h5>
                                        <h6 class="text-muted">Target Mon</h6>

                                    </div>
                                    <div class="col-xs-3 b-r b-b">
                                            <h5 class="font-medium">{{item.ytdActual | truncar}} %</h5>
                                            <h6 class="text-muted">Actual Mon</h6>
                                        </div>
                                    
                                        <div class="col-xs-3 b-b">
                                            <h5 class="font-medium">{{item.ytdTarget | truncar}} %</h5>
                                            <h6 class="text-muted">Target Mon</h6>

                                    </div>

                                </div> 

                                <div class="row">

                                    <div class="col-xs-6 b-r">

                                            <vm-grafico  v-if= " item.targetMes != ''"   v-bind:esperado= "item.targetMes |truncar " v-bind:real= "item.actualMes |truncar"  lble="valor esperado  " lblr="valor real"></vm-grafico>

                                    </div>

                                    <div class="col-xs-6">

                                            <vm-grafico  v-if= " item.targetMes != ''"   v-bind:esperado="item.targetMes |truncar"  v-bind:real= "item.actualMes |truncar"  lble="valor esperado" lblr="valor real"></vm-grafico>

                                    </div>

                                </div>

                        </div>

                    </div>

                    <div class="col-xs-5">
                    <template>
                        <vm-comment v-bind:idempleado="idEmpleado" v-bind:idlinea="item.idLineaAES" tipo="a" v-bind:lista="item.comentarios"></vm-comment>
                        
                    </template>

                        <br>
                    </div><br>

            </div>  <!-- fin contenedor V-for -->

         

<!-- <pre>
{{$data}}
</pre>  -->




<!-- <vm-comment idempleado="tu Viejazzzzzz" idlinea="1" tipo="a"></vm-comment> -->


            </div>
        </div>



<!-- fin bloque CA -->


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