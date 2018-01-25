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

        idEmpleado:0,   // id empleado que esta logueado

        nombreE:"",   // nombre empleado loqueado

        anio:"",   // año seleccionado

        mes:"",   // mes seleccionado

    },


    created: function () { 
        
            //aqui tomo el id del empleado que esta ingresando y lo pongo en el poaramentro de data  usuario
            this.idEmpleado=$('#idEmpleado').val();
            this.nombreE=$('#nombreE').val();  // tomo el nombre del usuario para despues mostrarlo en los comentarios si es que añade uno
            this.anio=$('#anio').val();  // tomo el año
            this.mes=$('#mes').val();  // tomo el mes si viene en la url

            this.getugen()
            this.$http.get(url+'vrcheckpanel', { params: { tab: "tac",
                                                           anio: this.anio,
                                                           mes: this.mes
                                                         } } ).then( function (resp){

                var datos = parseData(resp.data);
                if(datos){
                    

                    this.idPlanillaAes= datos[0].idPlanilla;
                    this.idPlanillaMtbf= datos[1].idPlanilla;

                }else{

                    alert('Sin datos para el mes '+this.mes+ ' del año '+ this.anio);

                }

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

            this.$http.post(url+'vrtactic', {   dato: this.idSelect,
                                                idplanillaAes: this.idPlanillaAes,
                                                idPlanillaMtbf: this.idPlanillaMtbf,
                                                anio:this.anio,
                                                mes: this.mes
                                            } )
            
            .then( function (resp,status, request){

                this.kpi=parseData(resp.data);

            }, function(err){
                //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });


        },
        getugen: function(){    // trae las unidades generadoras

            this.$http.post(url+'vrPrueba' ).then( function (resp){

                this.ugen = parseData(resp.data);

            }, function(err){
                //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });


        },


    }


})


