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
                    { id : "2", nombre : 'Division' },
                    { id : "3", nombre : 'Complejo' },

                ],
        seleccion:[],              
        kpi: [],
        idSelect:"",
        idList:""
    },

    methods:{

            //Metodo para listar las unidades, diviciones y complejos
            getLists: function(){

                this.$http.get(url, { params: { page: this.idSelect } } ).then( function (resp){

                    this.seleccion=resp.data;


                }, function(err){
                    //si sale mal

                    console.log(err);
                    alert ('Error de conexion');


                })

            },

            getData: function(){

                var geturl = "http://localhost/AESGener/prueba/test/vrdata";

                this.$http.get(geturl, { params: { idselect: this.idSelect, idlist: this.idList } }).then(function (resp) {

                    this.kpi = resp.data;


                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');


                })




            }



    }
})

//endregion Vue


