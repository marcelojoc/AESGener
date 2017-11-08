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

    Math.trunc = Math.trunc || function(x) {
        return x - x % 1;
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
        camodel:[
            { id : "1", nombre : 'AES Gener S.A' },
            { id : "2", nombre : 'ESSA' },
            { id : "3", nombre : 'Empresa Eléctrica Guacolda S.A' },
            { id : "4", nombre : 'Eléctrica Ventanas S.A' },
            { id : "5", nombre : 'Empresa Electrica Angamos S.A' },
            { id : "6", nombre : 'Empresa Electrica Campiche S.A' },
            { id : "7", nombre : 'Empresa Electrica Cochrane S.A' },

        ],

        seleccion:[],              
        kpi: [],
        idSelect:"",
        idList:"",

        idcaSelect:"",  //el id de seleccion del area de Ca
        cakpi:[]      // kpi de comertial A..
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

            },

            getCa: function(){

                var geturl = "http://localhost/AESGener/prueba/test/vrcadata";

                this.$http.get(geturl, { params: { idcaSelect: this.idcaSelect} }).then(function (resp) {

                    this.cakpi = resp.data;


                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');


                })

            }













    }
})

//endregion Vue


