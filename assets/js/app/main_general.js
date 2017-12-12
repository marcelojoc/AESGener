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
    
            idPlanillaAes:0,
    
            idPlanillaCos:0,


        },




    },

    //Ciclo de vida de la instancia

    created: function() {
        // cuando se crea la instancia actualizo los datos de listas de planillas y unidades generadoras
        this.divSapOp();

        this.createEst();














    },

    watch: {
        trigerOp: function () {

            alert('hello');
            for (var i in this.op.divlista) {

                if(this.op.divlista[i].id == this.op.divselectOP){

                    this.op.idPlanilla= this.op.divlista[i].idPlanilla
                }
            
             }

        }
    },


    methods:{
        
        //Metodos para el tablero Oerativo
                divSapOp: function(){
        
                    this.$http.get(url+'vrdivsap').then(function (resp) {
        
                        var data= JSON.parse(resp.data);
                        this.op.divlista = data;
        
                    }, function (err) {
                        //si sale mal
        
                        console.log(err);
                        alert('Error de conexion');
                    })
                },
        
        
                getdatosOp: function(){
        
                    this.$http.get(url+'vrdivsapdatos',{ params: { idlist: this.op.divselectOP ,
                                                                   idPlanilla: this.op.idPlanilla 
                                                                } 
                        }).then(function (resp) {
        
                        this.op.valores = JSON.parse(resp.data);
        
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
                        
                                var datos =JSON.parse(resp.data);

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
    
                        this.est.seleccion=JSON.parse(resp.data);
    
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

                    this.est.kpi = JSON.parse(resp.data );

                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');

                })

            },















        }






});