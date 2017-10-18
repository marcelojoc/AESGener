//region  jquery
    $(function() {
        // Handler for .ready() called.
    
        selector.bind();
    
    
    });
    
    var selector = {

        bind: function(){

            $( "#category" ).on(
            'change', function(){
                
                selector.submit();

            });

        },
    
        submit: function(){
            
            $( "#form_selector" ).submit();
        
        }
    
    }
//endregion  jquery




//region Vue
var url= "http://localhost/AESGener/prueba/test/vrPrueba";
var app = new Vue({
    el: '#app',
    data: {

        busqueda:[
                    { id : "1", nombre : 'Unidad Generadora' },
                    { id : "2", nombre : 'Divicion' },
                    { id : "3", nombre : 'Complejo' },

                ],
        seleccion:[],              
        
        title: 'Costos',

        nombre: 'EFOFO(%)',
        real:     '23%',
        esperado:  '34%',
        
    },

    methods:{

            //Metodo para listar las unidades, diviciones y complejos
            getLists: function(){

                this.$http.get(url).then( function (resp){

                    this.seleccion=resp.data;
                    // var limit = resp.data.length
                    
                    // for (var i = 0; i < limit; i+=1) {

                    //     this.seleccion.push({id: i , nombre: resp.data[i]});
                    //   }



                }, function(){
                    //si sale mal

                    alert ('todo malllllll');


                });


            }



    }
})

//endregion Vue


