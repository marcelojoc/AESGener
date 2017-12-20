$(function() {
    
    //polifill para funcion trunc
    Math.trunc = Math.trunc || function(x) {
        return x - x % 1;
    }   
});

var url= $("#siteurl").val()+"ajax/";

var app = new Vue({

    el: "#app",
    
    data:{

        trigerOp:"",
        op:{

            divlista:[],
            divselectOP:"",
            idPlanilla:"",
            valores: [],
            cakpi:[]

        },

        tac:{

            kpi:[],
            
            ugen:[],  // unidades generadoras
    
            count: 0,
    
            idSelect:"",
    
            idPlanillaAes:0,
    
            idPlanillaMtbf:0,


        },

        est:{

            busqueda:[
                { id : "1", nombre : 'Unidad Generadora' },
                { id : "2", nombre : 'División' },
                { id : "3", nombre : 'Complejo' },
    
            ],
    
            seleccion:[],              
            kpi: [],
            idSelect:"",
            idList:"",
    
            idcaSelect:"",  //el id de seleccion del area de Ca
            cakpi:[] ,     // kpi de comertial A..
    
            idPlanillaAes:0,
    
            idPlanillaCos:0,


        },




    },

    //Ciclo de vida de la instancia

    created: function() {
        // cuando se crea la instancia actualizo los datos de listas de planillas y unidades generadoras
        this.divSapOp();

        this.createEst();

        this.createTAC();

    },


    methods:{
        
        //Metodos para el tablero Oerativo
                divSapOp: function(){
        
                    this.$http.get(url+'vrdivsap').then(function (resp) {
        
                        var data= parseData(resp.data);
                        this.op.divlista = data;
        
                    }, function (err) {
                        //si sale mal
        
                        console.log(err);
                        alert('Error de conexion');
                    })
                },
        
        
                getdatosOp: function(){


                    for (var i in this.op.divlista) {
                        
                        if(this.op.divlista[i].id == this.op.divselectOP){
        
                            this.op.idPlanilla= this.op.divlista[i].idPlanilla
                        }
                
                    }


                    this.$http.get(url+'vrdivsapdatos',{ params: { idlist: this.op.divselectOP ,
                                                                   idPlanilla: this.op.idPlanilla 
                                                                } 
                        }).then(function (resp) {
        
                        this.op.valores = parseData(resp.data);
        
                    }, function (err) {
                    //si sale mal
        
                        console.log(err);
                        alert('Error de conexion');
        
                    })
                },

            // fin metodos para el tablero operativo



            //metodos tablero estrategico


            createEst: function(){

                    this.$http.get(url+'vrcheckpanel', { params: { tab: "est" } } ).then( function (resp){
                        
                                var datos =parseData(resp.data);

                                this.est.idPlanillaAes= datos[0].idPlanilla;
                                this.est.idPlanillaCos= datos[1].idPlanilla;

                            }, function(err){
                                //si sale mal
                                console.log(err);
                                alert ('Error de conexion');
                            })

           },


            //Metodo para listar las unidades, diviciones y complejos
            getListsEST: function(){
                
                    this.$http.get(url+'vrPrueba', { params: { page: this.est.idSelect } } ).then( function (resp){
    
                        this.est.seleccion=parseData(resp.data);
    
                    }, function(err){
                        //si sale mal
                        console.log(err);
                        alert ('Error de conexion');
                    });
                
            },
                
            getDataEST: function(){

                this.$http.get(url+'vrdata', { params: { idselect: this.est.idSelect, idlist: this.est.idList,
                
                                                        idplanillaAes: this.est.idPlanillaAes,
                                                        idPlanillaCos: this.est.idPlanillaCos
                
                                                        } }).then(function (resp) {

                    this.est.kpi = parseData(resp.data);

                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');

                })


                //llamo al metodo del tactico

                if(this.est.idSelect == "1"){

                    this.getkpiTAC()

                }else{

                    this.tac.kpi= {"0":{"nombre":"HEDP","valor":"--"},"1":{"nombre":"HSF","valor":"--"},"2":{"nombre":"HEDF","valor":"--"}};
                
                }

            },

            // fin metodos tablero estrategico


            //metodos tablero tactivo

            createTAC: function(){

                this.$http.get(url+'vrcheckpanel', { params: { tab: "tac" } } ).then( function (resp){
                    
                                    var datos =parseData(resp.data);
                                    this.tac.idPlanillaAes= datos[0].idPlanilla;
                                    this.tac.idPlanillaMtbf= datos[1].idPlanilla;
                    
                                }, function(err){
                                    //si sale mal
                                    console.log(err);
                                    alert ('Error de conexion');
                                });

            },




                getkpiTAC: function(){

                        this.$http.post(url+'vrtactic', { dato: this.est.idList,
                                                            idplanillaAes: this.tac.idPlanillaAes,
                                                            idPlanillaMtbf: this.tac.idPlanillaMtbf
                                                        } )
                        
                        .then( function (resp,status, request){

                            this.tac.kpi=parseData(resp.data);

                        }, function(err){
                            //si sale mal
                            console.log(err);
                            alert ('Error de conexion');
                        });


                    },
                // getugenTAC: function(){
        
                //     this.$http.post(url+'vrPrueba' ).then( function (resp){
        
                //         this.ugen = parseData(resp.data);
        
                //     }, function(err){
                //         //si sale mal
                //         console.log(err);
                //         alert ('Error de conexion');
                //     });
        
        
                // },



            // fin metodos tablero tactico


        }






});