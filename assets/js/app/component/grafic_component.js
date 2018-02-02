
//region filtros personalizados
    // filtro para truncar decimales
    Vue.filter('truncar', function(value) {

        if(value != "" && value != null){
            
            value= value*100;
            posiciones = 2
            var s = value.toString()
            var l = s.length;
            var decimalLength = s.indexOf('.') + 1
            var numStr = s.substr(0, decimalLength + posiciones)
            return Number(numStr)
        }else{

            return "";

        }

    });


    Vue.filter('onlytrunc', function(value) {
        
                if(value != "" && value != null){
                    
                    posiciones = 2
                    var s = value.toString()
                    var l = s.length;
                    var decimalLength = s.indexOf('.') + 1
                    var numStr = s.substr(0, decimalLength + posiciones)
                    return Number(numStr)
                }else{
        
                    return "";
        
                }
        
            });

    //filtro simplificado para quitar los decimales de valores grandes
    Vue.filter('sindec', function (value)  {

        if(value != ""){
            
            var result= Math.trunc(parseFloat(value))

            return result;

        }else{

            return "";

        }
        
    });

    
//endregion filtros personalizados


//region Component grafico

Vue.component('vm-grafico',{
    // options
    template: '#aesgen-graph',

    data: function () {

        return {

            
           
        }
    },




    props: ['lble','lblr','esperado','real'],
 
    computed: {
        
        getColor: function () {
        
        var color="";
        var esperado = parseFloat(this.esperado);
        var real = parseFloat(this.real);

        // console.log(esperado +"esperado");

        // console.log(real  +"real");
            if(real >= esperado){

                color= '#2ecc71';

            }else{

                color= '#E74C3C';
            }

        return color;

        }
    },

})


//endregion Component


//region Component semaforizacion

Vue.component('vm-semaforizado',{
    // options
    template: '#aesgen-semaf',

    data: function () {

        return {
            // esto es solo de prueba
            leyenda:""
            
        }
    },

    props: ['lbl','esperado','real', 'tipo'],
    

    computed: {
        
        getColorPoint: function () {
        
        var css="";
        var esperado = parseFloat(this.esperado);
        var real = parseFloat(this.real);

        var isTrueSet = (this.tipo === 'true'); // aqui valido si lo que viene en el atributo tipo es verdadero o false
            //este atributo cambia en la forma que se grafica

        if(isTrueSet){  // si el real es mayor que el esperado queda verde

            if(real >= esperado){

                //uso normal

                css= "#2ecc71";
                this.leyenda=" Valor actual superior al esperado";

            }else{
                css = "#E74C3C";
                this.leyenda=" Valor actual Inferior al esperado";
            }

        }else{
            if(real >= esperado){ // si el real es mayor que el esperado queda rojo

            //uso alternativo

                css= "#E74C3C";
                this.leyenda=" Valor actual Superior  al esperado";

            }else{
                css = "#2ecc71";
                this.leyenda=" Valor actual Inferior al esperado";
            }
        }

        return css;

        }
    },


})


//endregion Component






//region component comments


Vue.component('vm-comment',{
    
    // plantilla html
    template: `
            <div class="tabbable">
                <ul class="nav nav-tabs" >
                    <li v-bind:class="{ 'active': coments.activo == true }" >
                        <a data-toggle="tab"  @click="activa(true)">
                            <i class="greenAES ace-icon fa fa-comments bigger-120"></i>
                            Comentarios
                        </a>
                    </li>

                    <li v-bind:class="{ 'active': coments.activo == false}">
                        <a data-toggle="tab" href="#"  @click="activa(false)">
                            <i class="greenAES ace-icon fa fa-comment bigger-120"></i>
                            Añadir Comentario
                        </a>
                    </li>
                </ul>

                <div class="tab-content ">  
                    <template>
                                        
                    <div  v-if="coments.activo == true" class=" table-responsive ">

                            <table class="table table-striped  table-responsive table-condensed table-hover table-bordered ">
                                    <thead>
                                        <tr>
                                        <!-- <th>#</th> -->
                                            <th>Comentario</th>
                                            <th>Usuario</th>
                                            <th><span class="glyphicon glyphicon-align-center"></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in lista" class="text-center">


                                        

                                        <!--   <td>{{item.idComentario}}</td>-->
                                            <td v-if="item.estado == 0" class="danger"><del>{{item.comentario}}</del></td>
                                            <td v-else >{{item.comentario}}</td>
                                            <td>{{item.nombreE}}</td>

                                            <td v-if="item.estado == 0" class="success" >   
                                                    
                                                    <a @click="enabledComment(item.idComentario)"><span class="glyphicon glyphicon-ok"></span></a>
                                            </td>

                                            <td v-else class="danger" >   
                                                   <a @click="closeComment(item.idComentario)"><span class="glyphicon glyphicon-remove"></span></a>     
                                                   
                                            </td>





                                
                                        </tr>

                                                    
                                    </tbody>

                            </table>
                            <!--                        <ul class="pager">
                                    <li class="previous"><a href="#">&larr; Anterior</a></li>
                                    <li class="next"><a href="#">Siguiente &rarr;</a></li>
                            </ul>  -->


                    </div>



                        <div v-if="coments.activo == false" >
                        
                            <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="textArea"></textarea>
                            </div>
                            <button type="button" class="btn btn-purple" @click="saveComment">Guardar Comentario</button>

                        </div>

                    </template>

                </div>
            </div>

    `,

    data: function () {

        return {

            coments:{  // para switchar el cambio de vistas entre comentarios y nuevo comentario

                activo: true,  

            },

            textArea:"" ,// aqui esta la lista de comentarios 
 
        }
    },
    
    props: ['idempleado', 'nombre','idlinea', 'tipo', 'lista'],

    methods:{

        activa: function(valor){

            this.coments.activo= valor;
            
        },

        closeComment: function(idComment){ // hago la peticion al controlador con el id del comentario en este caso se desactiva

            
            this.$http.get(url+'closeComment',{ params: { idComment: idComment } 

            }).then(function (resp) {

                
                if(resp.data){
                    
                    //chastrinada ON
                    
                    for (var item in this.lista) {

                        if (this.lista[item].idComentario == idComment ) {
                            
                            this.lista[item].estado= 0;
                            alert('Comentario seleccionado CERRADO ');
                            
                        }
                    }

                }

            }, function (err) {
            //si sale mal

                console.log(err);
                alert('Error de actualizacion de estado');

            })

        },

        enabledComment: function (idComment){  // hago la peticion al controlador con el id del comentario en este caso se activa

            this.$http.get(url+'activeComment',{ params: { idComment: idComment } 

            }).then(function (resp) {

                if(resp.data){
                    //chastrinada ON
                    
                    for (var item in this.lista) {
                        
                        
                        if (this.lista[item].idComentario == idComment ) {
                            
                            this.lista[item].estado= 1;
                            
                            alert('Comentario seleccionado ABIERTO ');
                        }
                    }

                }

            }, function (err) {
            //si sale mal

                console.log(err);
                alert('Error de actualizacion de estado');

            })


        },

        saveComment: function(){  // guarda el comentario en la base y devuelve el ultimo id guardado


            this.$http.get(url+'saveComment', { params: {   comment: this.textArea,
                                                            empleado: this.idempleado, 
                                                            aes: this.tipo == 'a' ? this.idlinea : '0',
                                                            sap: this.tipo == 's' ? this.idlinea : '0', 
                                                            mtbf: this.tipo == 'm' ? this.idlinea : '0', 
                                                            cost: this.tipo == 'c' ? this.idlinea : '0',

                                                        } } ).then( function (resp){
                                
                console.log(this.lista);
                                if(this.lista== false){
                                    
                                    this.lista=
                        
                                        [{comentario: this.textArea,
                                        estado:"1",
                                        idComentario: resp.data,
                                        nombreE: this.nombre,    
                                        idEmpleado: this.idempleado,
                                        idLineaAES: this.tipo == 'a' ? this.idlinea : '0',
                                        idLineaCostos: this.tipo == 'c' ? this.idlinea : '0',
                                        idLineaMTBF: this.tipo == 'm' ? this.idlinea : '0',
                                        idLineaSAP: this.tipo == 's' ? this.idlinea : '0',}]
                    
                                }else{
                    
                                    this.lista.push(
                        
                                        {comentario: this.textArea,
                                        estado:"1",
                                        nombreE: this.nombre,  
                                        idComentario: resp.data,
                                        idEmpleado: this.idempleado,
                                        idLineaAES: this.tipo == 'a' ? this.idlinea : '0',
                                        idLineaCostos: this.tipo == 'c' ? this.idlinea : '0',
                                        idLineaMTBF: this.tipo == 'm' ? this.idlinea : '0',
                                        idLineaSAP: this.tipo == 's' ? this.idlinea : '0',}
                        
                                    )
                                }
                    
                                this.textArea="";
                                alert('El comentario se ha guardado ....');
                                this.coments.activo= true;

            }, function(err){
            //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });
            
        }
    }

})



// end region commponent comments
function parseData(dato){

    var retorno = null;

    if(typeof(dato) == "string"){

        retorno = JSON.parse(dato);

    }else{
        retorno= dato;
    }

    return retorno

}