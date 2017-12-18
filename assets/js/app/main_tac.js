$(function() {
    
    //polifill para funcion trunc
    Math.trunc = Math.trunc || function(x) {
        return x - x % 1;
    }   
});

var url= $("#siteurl").val()+"ajax/";



var app = new Vue({

    el:"#app",

    data:{

        kpi:[],

        ugen:[],  // unidades generadoras

        count: 0,

        idSelect:"",

        idPlanillaAes:0,

        idPlanillaMtbf:0,

    },


    created: function () { 
        
            this.getugen()
            this.$http.get(url+'vrcheckpanel', { params: { tab: "tac" } } ).then( function (resp){

                var datos =JSON.parse(resp.data);
                this.idPlanillaAes= datos[0].idPlanilla;
                this.idPlanillaMtbf= datos[1].idPlanilla;

            }, function(err){
                //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });
    },

    watch: {
        kpi: function () {
            this.count=0;
            for (var i in this.kpi) {

                this.count ++;
            
             }

        }
    },

    methods:{

        getkpi: function(){

            this.$http.post(url+'vrtactic', { dato: this.idSelect,
                                                idplanillaAes: this.idPlanillaAes,
                                                idPlanillaMtbf: this.idPlanillaMtbf
                                            } )
            
            .then( function (resp,status, request){

                this.kpi=JSON.parse(resp.data);

            }, function(err){
                //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });


        },
        getugen: function(){

            this.$http.post(url+'vrPrueba' ).then( function (resp){

                this.ugen = JSON.parse(resp.data);

            }, function(err){
                //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });


        },


    }





})