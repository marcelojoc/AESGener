<div class="main-content " >
    <div class="main-content-inner">
        <div class="page-content" id="app">

<div class="row">
                    
                <input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url(); ?>">
                <div class="page-header col-sm-4 text-center blueAES b-r">
                    <h1 class="blueAES">
                        Tablero General
                    </h1>
                </div>  
                <div class=" col-sm-8 form-inline ">

                        <div class="row">
                            <div class="col-xs-6">

                                    <div class="input-group" >
                                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    
                                            <div class="form-group">
                
                                                    <select class="form-control" v-model="divselect " name="caSelect" >

                                                            <option value="" disabled selected hidden>Seleccionar</option>
                                                           
                                                            <option>opciones</option>
                                                            <option>opciones</option>
                                                            <option>opciones</option>

                                                    </select>   
                                            </div>
                                    </div>

                            </div>
                            <div class="col-xs-6">

                                <button v-on:click.prevent="getdatos" class="btn btn-xs btn-success " >
                                        <span class="bigger-110">Ir</span>

                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                </button>

                            </div>
                        </div>

                </div><hr>
</div>  


<!-- inicio bloque Ca -->

<div class="row">   


            <div class="col-sm-4">


                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-corporativo"><i><h4>EAF (%) </h4></i></div> <div class="soc-content"><div class="col-xs-3 b-r b-b"><h5 class="font-medium">94.25 %</h5> <h6 class="text-muted">Actual Mon</h6></div> <div class="col-xs-3 b-b b-r"><h5 class="font-medium">95.83 %</h5> <h6 class="text-muted">Target Mon</h6></div> <div class="col-xs-3 b-r b-b"><h5 class="font-medium">93.74%</h5> <h6 class="text-muted">YTD Actual</h6></div> <div class="col-xs-3 b-b"><h5 class="font-medium">94.84%</h5> <h6 class="text-muted">YTD Target</h6></div></div> <div class="row"><div class="col-xs-6 b-r"><div class="content-progres social-widget"><div class="progres-full limite animated zoomIn"><div class="indicador-kpi" style="background: rgb(231, 76, 60); height: 3.9em; width: 94.25%;"><p><strong>valor real 94.25%</strong></p></div></div> <div class="progres-full animated bounceIn"><div class="borde box-green" style="width: 95.83%;"><p><strong>valor esperado  95.83%</strong></p></div></div></div></div> <div class="col-xs-6 "><div class="content-progres social-widget"><div class="progres-full limite animated zoomIn"><div class="indicador-kpi" style="background: rgb(231, 76, 60); height: 3.9em; width: 93.74%;"><p><strong>valor real 93.74%</strong></p></div></div> <div class="progres-full animated bounceIn"><div class="borde box-green" style="width: 94.84%;"><p><strong>valor esperado  94.84%</strong></p></div></div></div></div></div></div>


                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-corporativo"><i><h4>EFOF (%) </h4></i></div> <div class="soc-content"><div class="col-xs-3 b-r b-b"><h5 class="font-medium">1.31 %</h5> <h6 class="text-muted">Actual Mon</h6></div> <div class="col-xs-3 b-b b-r"><h5 class="font-medium">0.54 %</h5> <h6 class="text-muted">Target Mon</h6></div> <div class="col-xs-3 b-r b-b"><h5 class="font-medium">0.24%</h5> <h6 class="text-muted">YTD Actual</h6></div> <div class="col-xs-3 b-b"><h5 class="font-medium">0.52%</h5> <h6 class="text-muted">YTD Target</h6></div></div> <div class="row"><div class="col-xs-6 b-r"><div class="content-progres social-widget"><div class="progres-full limite animated zoomIn"><div class="indicador-kpi" style="background: rgb(231, 76, 60); height: 3.9em; width: 100%;"><p><strong> Valor actual Superior  al esperado</strong></p></div></div></div></div> <div class="col-xs-6 "><div class="content-progres social-widget"><div class="progres-full limite animated zoomIn"><div class="indicador-kpi" style="background: rgb(46, 204, 113); height: 3.9em; width: 100%;"><p><strong> Valor actual Inferior al esperado</strong></p></div></div></div></div></div></div>


                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-corporativo"><i><h4>ENPHR </h4></i></div> <div class="soc-content"><div class="col-xs-3 b-r b-b"><h5 class="font-medium">7993 [BTU/MWH]</h5> <h6 class="text-muted">Actual Mon</h6></div> <div class="col-xs-3 b-b b-r"><h5 class="font-medium">7891 [BTU/MWH]</h5> <h6 class="text-muted">Target Mon</h6></div> <div class="col-xs-3 b-r b-b"><h5 class="font-medium">7927 [BTU/MWH]</h5> <h6 class="text-muted">YTD Actual</h6></div> <div class="col-xs-3 b-b"><h5 class="font-medium">7899 [BTU/MWH]</h5> <h6 class="text-muted">YTD Target</h6></div></div> <div class="row"><div class="col-xs-6 b-r"><div class="content-progres social-widget"><div class="progres-full limite animated zoomIn"><div class="indicador-kpi" style="background: rgb(231, 76, 60); height: 3.9em; width: 100%;"><p><strong> Valor actual Superior  al esperado</strong></p></div></div></div></div> <div class="col-xs-6 "><div class="content-progres social-widget"><div class="progres-full limite animated zoomIn"><div class="indicador-kpi" style="background: rgb(231, 76, 60); height: 3.9em; width: 100%;"><p><strong> Valor actual Superior  al esperado</strong></p></div></div></div></div></div></div>

                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-twitter"><i><h4>CTM OPEX </h4></i></div> <div class="soc-content"><div class="col-xs-6 b-r b-b"><h5 class="font-medium">1950</h5> <h6 class="text-muted">Actual Mon</h6></div> <div class="col-xs-6 b-b "><h5 class="font-medium">1281</h5> <h6 class="text-muted">Target Mon</h6></div></div> <div class="row"><div class="col-xs-12 "><div class="content-progres social-widget"><div class="progres-full limite animated zoomIn"><div class="indicador-kpi" style="background: rgb(46, 204, 113); height: 3.9em; width: 100%;"><p><strong> Valor actual superior al esperado</strong></p></div></div></div></div></div></div>

            </div>


            <div class="col-sm-4">







                <div class="col-sm-12 text-left" >
                    
                                    <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>KPI</th>
                                                <th>REAL MON</th>
                                                
                                            </tr>
                                            </thead>
                    
                    
                                            <tbody v-for="item in kpi">
                    
                                                <tr HEIGHT="50">
                                                    <td>HEDP</td>
                                                    <td>34 [hr]</td>
                                                </tr>
                    
                                                <tr HEIGHT="50">
                                                    <td>HEDF</td>
                                                    <td>35[hr]</td>
                                                </tr>
                    
                                                <tr HEIGHT="50">
                                                    <td>HSF</td>
                                                    <td>36 [hr]</td>
                                                </tr>
                    
                                                    
                                                <tr HEIGHT="50">
                                                    <td>MTBF</td>
                                                    <td> 57 [hr. Oper]</td>
                                                </tr>
                    
                                                <tr HEIGHT="50">
                                                    <td>MTBF target</td>
                                                    <td>1600 [hr. Oper]</td>
                                                </tr>
                    
                                                <tr HEIGHT="50">
                                                    <td>Costo Mtto. Correctivo
                                                            [K USD]</td>
                                                    <td>47.7</td>
                                                </tr>
                    
                                                <tr HEIGHT="50">
                                                    <td>Costo Mtto. Preventivo
                                                            [K USD]</td>
                                                    <td>350.4</td>
                                                </tr>
                    
                    
                    
                    
                    
                                            </tbody>
                    
                                    </table>
                                </div>



            </div>



            <div class="col-sm-4">



                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-ca"><i><h4>Backlog</h4></i></div> <div class="soc-content"><div class="col-xs-6 b-l b-r b-b"><h5 class="font-medium">4</h5> <h6 class="text-muted">Bud Mon</h6></div> <div class="col-xs-6 b-b b-r"><h5 class="font-medium">5052</h5> <h6 class="text-muted">Real Mon</h6></div></div> <div class="row"><div class="col-xs-12 "><div class="content-progres social-widget"><div class="progres-full limite animated rubberBand"><div class="indicador-kpi" style="background: rgb(231, 76, 60); height: 3.9em; width: 100%;"><p><strong> Valor actual Superior  al esperado</strong></p></div></div></div></div></div></div>

                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-ca"><i><h4>Proactive Work (%)</h4></i></div> <div class="soc-content"><div class="col-xs-6 b-l b-r b-b"><h5 class="font-medium">80 %</h5> <h6 class="text-muted">Bud Mon</h6></div> <div class="col-xs-6 b-b b-r"><h5 class="font-medium">21%</h5> <h6 class="text-muted">Real Mon</h6></div></div> <div class="row"><div class="col-xs-12 "><div class="content-progres social-widget"><div class="progres-full limite animated rubberBand"><div class="indicador-kpi" style="background: rgb(46, 204, 113); height: 3.9em; width: 100%;"><p><strong> Valor actual Inferior al esperado</strong></p></div></div></div></div></div></div>

                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-ca"><i><h4>Planned work (%)</h4></i></div> <div class="soc-content"><div class="col-xs-6 b-l b-r b-b"><h5 class="font-medium">80 %</h5> <h6 class="text-muted">Bud Mon</h6></div> <div class="col-xs-6 b-b b-r"><h5 class="font-medium">352%</h5> <h6 class="text-muted">Real Mon</h6></div></div> <div class="row"><div class="col-xs-12 "><div class="content-progres social-widget"><div class="progres-full limite animated rubberBand"><div class="indicador-kpi" style="background: rgb(46, 204, 113); height: 3.9em; width: 100%;"><p><strong> Valor actual Inferior al esperado</strong></p></div></div></div></div></div></div>

                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-ca"><i><h4>Correctivo (%)</h4></i></div> <div class="soc-content"><div class="col-xs-6 b-l b-r b-b"><h5 class="font-medium">32 %</h5> <h6 class="text-muted">Bud Mon</h6></div> <div class="col-xs-6 b-b b-r"><h5 class="font-medium">1%</h5> <h6 class="text-muted">Real Mon</h6></div></div> <div class="row"><div class="col-xs-12 "><div class="content-progres social-widget"><div class="progres-full limite animated rubberBand"><div class="indicador-kpi" style="background: rgb(46, 204, 113); height: 3.9em; width: 100%;"><p><strong> Valor actual Inferior al esperado</strong></p></div></div></div></div></div></div>

                <div class="social-widget col-sm-12 b-l b-r b-b"><div class="soc-header box-ca"><i><h4>Cumplimiento Plan preventivo (%)</h4></i></div> <div class="soc-content"><div class="col-xs-6 b-l b-r b-b"><h5 class="font-medium">80 %</h5> <h6 class="text-muted">Bud Mon</h6></div> <div class="col-xs-6 b-b b-r"><h5 class="font-medium">95%</h5> <h6 class="text-muted">Real Mon</h6></div></div> <div class="row"><div class="col-xs-12 "><div class="content-progres social-widget"><div class="progres-full limite animated rubberBand"><div class="indicador-kpi" style="background: rgb(231, 76, 60); height: 3.9em; width: 100%;"><p><strong> Valor actual Superior  al esperado</strong></p></div></div></div></div></div></div>





            </div>











</div>





<!-- fin bloque CA -->

<!-- <pre>{{$data}}</pre> -->
        </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->






    
    
