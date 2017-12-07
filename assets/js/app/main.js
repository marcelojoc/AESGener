//region  jquery
    $(function() {
    
        //polifill para funcion trunc
        Math.trunc = Math.trunc || function(x) {
            return x - x % 1;
        }   
    });
    

    var url= $("#siteurl").val()+"ajax/";
//endregion  jquery


//region Vue

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
        cakpi:[] ,     // kpi de comertial A..

        idPlanilla:[
            
        ]


    },

    created: function () { 

                this.$http.get(url+'vrcheckpanel', { params: { tab: "est" } } ).then( function (resp){

                    this.idPlanilla=JSON.parse(resp.data);

                }, function(err){
                    //si sale mal
                    console.log(err);
                    alert ('Error de conexion');
                });
    },

    methods:{

            //Metodo para listar las unidades, diviciones y complejos
            getLists: function(){

                this.$http.get(url+'vrPrueba', { params: { page: this.idSelect } } ).then( function (resp){

                    this.seleccion=JSON.parse(resp.data);

                }, function(err){
                    //si sale mal
                    console.log(err);
                    alert ('Error de conexion');
                });

            },

            getData: function(){

                if(this.idPlanilla.idTipoPlanilla == '1'){

                    var planillaAes= this.idPlanilla.idPlanilla;

                }else{

                    var planillaAes= this.idPlanilla.idPlanilla;

                }

                this.$http.get(url+'vrdata', { params: { idselect: this.idSelect, idlist: this.idList,
                
                                                        idplanillaA: this.idSelect,
                                                        idPlanillaB: this.idSelect
                
                                                        } }).then(function (resp) {

                    this.kpi = JSON.parse(resp.data );

                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');

                })

            },

            getCa: function(){

                this.$http.get(url+'vrcadata', { params: { idcaSelect: this.idcaSelect} }).then(function (resp) {

                    this.cakpi = JSON.parse(resp.data);


                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');


                })

            }

    }
})

//endregion Vue


