<div class="main-content " >
    <div class="main-content-inner">
        <div class="page-content" id="app">
<!-- <pre>

    {{$data}}
</pre> -->
<div class="row">
                    
                <input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url(); ?>">
                <div class="page-header col-sm-12 text-center blueAES b-r">
                    <h1 class="blueAES">
                        <strong>Tablero General</strong>                       
                    </h1>
                </div>  

</div>  


<!-- inicio bloque Ca -->

<div class="row">   

            <div class="col-sm-4 b-r">

                <div class="page-header col-sm-12 text-center">
                    <h1 class="greenAES">
                        Estratégico
                    </h1>
                </div> 
                <div class="col-sm-12 espaciod">
                                     
                        <div class="col-xs-5">

                                <div class="input-group" >
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                
                                        <div class="form-group">
            
                                            <select class="form-control" v-model="est.idSelect" name="category" @change="getListsEST">

                                                <option value="" disabled selected hidden>Seleccionar</option>
                                                <option v-for="option in est.busqueda" v-bind:value="option.id">
                                                {{ option.nombre  }}
                                                </option>

                                            </select>    
                                        </div>
                                </div>

                        </div>

                        <div class="col-xs-5">

                                <div class="input-group" >
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                
                                        <div class="form-group">
            
                                                <select class="form-control" v-model="est.idList" name="category" >
                                                        <option value="" disabled selected hidden>Seleccionar</option>
                                                        <option v-for="option in est.seleccion" v-bind:value="option.id">
                                                            {{ option.nombre }}
                                                        </option>

                                                    </select>  
                                        </div>
                                </div>

                        </div>

                        <div class="col-xs-2">

                            <button v-on:click.prevent="getDataEST" class="btn btn-xs btn-blueAES" >
                                    <span class="bigger-110">Ir</span>

                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>

                        </div>
                                                
                </div>



                <div class="row" v-for ="item in est.kpi">
                        
                                        <!-- <div class="col-xs-1 beige">aqui  va la tab</div> -->
                        
                        
                                        <div v-if="item.nombreKPI == 'EAF'">
                        
                        
                                            <div class="col-sm-12 " >
                                                
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
                        
                        
                                        </div>
                        
                        
                        
                        
                                        <div v-if="item.nombreKPI == 'EFOF'">
                        
                                            <div class="col-sm-12 " >
                                                
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
                        
                        
                        
                                        </div>
                        
                                        
                                        <div v-if="item.nombreKPI == 'ENPHR'">
                        
                                            <div class="col-sm-12 " >
                                                
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
                                                                     <h5 class="font-medium">{{item.ytdActual |sindec}} [BTU/MWH]</h5>
                                                                     <h6 class="text-muted">YTD Actual</h6>
                                                                 </div>
                                                             
                                                                 <div class="col-xs-3 b-b">
                                                                     <h5 class="font-medium">{{item.ytdTarget |sindec}} [BTU/MWH]</h5>
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
                        
                        
                        
                        
                                        </div>
                        
                                        <div  v-if="item.nombreKPI == 'CTM OPEX'">
                        
                                            <div class="col-sm-12 ">
                                                
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
                             
                        
                             
                             
                                        </div>
                             
                        
                        
                        
                        
                        
                </div>




            </div>






            <div class="col-sm-4 b-r">

                    <div class="page-header col-sm-12 text-center  ">
                            <h1 class="greenAES">
                                Táctico
                            </h1>
                        </div> 

                <div class="col-sm-12 text-left" >
                    

                        <div class="col-xs-12 " >  
                                
                                
                            <div class="soc-content " v-for=" item in tac.kpi" >
                                    <div class="col-xs-6 b-r b-t" >
                                        <h4 class="font-medium" >{{item.nombre}} </h4>
                                        
                                    </div>
                                
                                    <div class="col-xs-6 b-t " >
                                        <h4 class="font-medium">{{item.valor}} </h4>
                                        
                
                                    </div>
                
                            </div>  
                                                    
                        </div>


                        <div class="row" v-if="this.tac.kpi.mtbf"> 
                                
                            <div class="col-xs-12 ">  
                                
                                    <div class="social-widget col-sm-12 b-l  b-b">
                                            <div class="soc-header box-twitter" >
                                                <i><h4> MTBF </h4></i>
                                            </div>
                
                
                                            <div class="soc-content">
                                                    <div class="col-xs-6 b-r b-b">
                                                        <h5 class="font-medium" >{{this.tac.kpi.mtbf | sindec}} [hr.Oper]</h5>
                                                        <h6 class="text-muted">Actual Mon</h6>
                                                    </div>
                                                
                                                    <div class="col-xs-6 b-b ">
                                                        <h5 class="font-medium">{{this.tac.kpi.mtbfTarget }} [hr.Oper]</h5>
                                                        <h6 class="text-muted">Target Mon</h6>
                    
                                                    </div>
                    
                                                </div> 
                    
                                                <div class="row" >
                    
                                                    <div class="col-xs-12 ">
                    
                                                        <vm-semaforizado  v-bind:esperado= 'this.tac.kpi.mtbfTarget' v-bind:real= 'this.tac.kpi.mtbf'  lbl=""  tipo= "false"></vm-semaforizado>
                                                        
                                                    </div>
                    
                    
                                                </div>
                
                                    </div>
                
                            </div>
                        </div>

                </div>



            </div>



            <div class="col-sm-4">

                    <div class="page-header col-sm-12 text-center  ">
                            <h1 class="greenAES">
                                Operativo
                            </h1>
                        </div> 
                        <div class="col-sm-12 espaciod">
                                             
                                <div class="col-xs-6">
        
                                        <div class="input-group" >
                                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        
                                                <div class="form-group">
                    
                                                    <select class="form-control" v-model="op.divselectOP " name="opSelect" id="opSelect" >

                                                        <option value="" disabled selected hidden>Seleccionar</option>

                                                        <option v-for="option in op.divlista" v-bind:value="option.id" v-bind:data-item="option.idPlanilla" >
                                                        {{ option.nombreDivSAP  }}
                                                        </option>

                                                    </select>  
                                                </div>
                                        </div>
        
                                </div>
        
        
                                <div class="col-xs-6">
        
                                    <button v-on:click.prevent="getdatosOp" class="btn btn-xs btn-blueAES" >
                                            <span class="bigger-110">Ir</span>
        
                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                    </button>
        
                                </div>
                                                        
                        </div>                





                        <div class="row" v-for ="item in op.valores">     <!-- inicio contenedor V-FOR -->
                            
                                            <div v-if="item.nombreKPI == 'Correctivo(%)'">             
                                                <div class="col-sm-12 " >
                                                
                                                    <div class="social-widget col-sm-12 b-l b-r b-b">
                                                            <div class="soc-header box-ca">
                                                                <i><h4>{{item.nombreKPI}}</h4></i>
                                                            </div>
                            
                                                            <div class="soc-content">
                                                                <div class="col-xs-6 b-l b-r b-b">
                                                                    <h5 class="font-medium">{{item.hsTRCorrectivo | onlytrunc }} %</h5>
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

                            
                                            </div> <!-- fin div contenerdor -->
                            
                            
                            
                            
                            
                            
                                            <div v-if="item.nombreKPI == 'Cumplimiento Plan Preventivo(%)'">             
                                                <div class="col-sm-12 " >
                                                
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
                            
                            
                            
                                            </div> <!-- fin div contenerdor -->
                            
                            
                            
                            
                                            <div v-if="item.nombreKPI == 'Backlog (semanas)'">             
                                                <div class="col-sm-12 " >
                                                
                                                    <div class="social-widget col-sm-12 b-l b-r b-b">
                                                            <div class="soc-header box-ca">
                                                                <i><h4>{{item.nombreKPI}}</h4></i>
                                                            </div>
                            
                                                            <div class="soc-content">
                                                                <div class="col-xs-6 b-l b-r b-b">
                                                                    <h5 class="font-medium">{{item.backlogReal | onlytrunc}}</h5>
                                                                    <h6 class="text-muted">Real Mon</h6>
                                                                </div>
                                                            
                                                                <div class="col-xs-6 b-b b-r">
                                                                    <h5 class="font-medium">{{item.backlogBudget}}</h5>
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
                            
                            
                            
                                            </div> <!-- fin div contenerdor -->
                            

                                            <div v-if="item.nombreKPI == 'Planned Work(%)'">             
                                                <div class="col-sm-12 " >
                                                
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

                            
                                            </div> <!-- fin div contenerdor -->
                            

                            
                                 <div v-if="item.nombreKPI == 'Proactive Work(%)'">             
                                                <div class="col-sm-12 " >
                                                
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

                            
                            
                                            </div> <!-- fin div contenerdor -->                                
                                        </div>  <!-- fin contenedor V-for -->                     



            </div>


</div>





<!-- fin bloque CA -->

<!-- <pre>{{$data}}</pre> -->
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