<div class="main-content " >
<div class="main-content-inner">
    <div class="page-content" id="app">
        
        <div class="row">

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
            
                                                <select class="form-control" v-model="idcaSelect" name="caSelect" >

                                                        <!-- <option value="" disabled selected hidden>Seleccionar</option>
                                                        <option value="0">Todas</option>
                                                        <option v-for="option in camodel" v-bind:value="option.id">
                                                        {{ option.nombre  }}
                                                        </option> -->

                                                </select>   
                                        </div>
                                </div>

                        </div>
                        <div class="col-xs-6">

                            <button v-on:click.prevent="getCa" class="btn btn-xs btn-success " >
                                    <span class="bigger-110">Ir</span>

                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>

                        </div>
                    </div>

            </div>  
        
                <hr>
        </div>  
        
        

<!-- aqui va el contenido -->

































        </div>  


    </div> <!-- fin page-content -->

    </div> <!-- fin main-content-inner -->

</div> <!-- fin main-content -->
