

<div class="main-content ">
<div class="main-content-inner">
    <div class="page-content" id="app">
        
        <div class="row">
                <input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url(); ?>">
            <div class="page-header col-sm-4 text-center blueAES b-r">
                <h1 class="blueAES">
                    Tablero Tactico
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


        <div class="row">


            <div class="col-sm-12 text-left" >

                <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>KPI</th>
                            <th>REAL MON</th>
                            <th>COMENTARIOS</th>
                        </tr>
                        </thead>


                        <tbody v-for="item in kpi">

                            <tr HEIGHT="50">
                                <td>HEDP</td>
                                <td>{{item.hedp}} [hr]</td>
                                <td class=" text-center">Traslado Mantenimiento al 2018 (840 hrs)</td>
                            </tr>

                            <tr HEIGHT="50">
                                <td>HEDF</td>
                                <td>{{item.hedf}} [hr]</td>
                                <td class=" text-center">Cambios de prefiltros en compresor</td>
                            </tr>

                            <tr HEIGHT="50">
                                <td>HSF</td>
                                <td>{{item.hsf}} [hr]</td>
                                <td class=" text-center">7-jul. Curso forzoso por fuga vapor en domo ppal. Caldera</td>
                            </tr>

                                
                            <tr HEIGHT="50">
                                <td>MTBF</td>
                                <td> 57 [hr. Oper]</td>
                                <td class=" text-center"></td>
                            </tr>

                            <tr HEIGHT="50">
                                <td>MTBF target</td>
                                <td>1600 [hr. Oper]</td>
                                <td class=" text-center">Comentario</td>
                            </tr>

                            <tr HEIGHT="50">
                                <td>Costo Mtto. Correctivo
                                        [K USD]</td>
                                <td>47.7</td>
                                <td class=" text-center">Comentario</td>
                            </tr>

                            <tr HEIGHT="50">
                                <td>Costo Mtto. Preventivo
                                        [K USD]</td>
                                <td>350.4</td>
                                <td class=" text-center">Comentario</td>
                            </tr>





                        </tbody>

                </table>
            </div>

        </div>


<pre>

{{$data}}</pre>





















<!-- 
<pre>
{{$data}}
</pre> -->





        </div>  


    </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->
