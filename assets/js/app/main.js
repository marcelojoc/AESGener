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
            { id : "2", nombre : 'División' },
            { id : "3", nombre : 'Complejo' },

        ],
        camodel:[
            { id : "1", nombre : 'AES Gener S.A' },
            { id : "2", nombre : 'ESSA' },
            { id : "3", nombre : 'Empresa Eléctrica Guacolda S.A' },
            { id : "4", nombre : 'Eléctrica Ventanas S.A' },
            { id : "5", nombre : 'Empresa Eléctrica Angamos S.A' },
            { id : "6", nombre : 'Empresa Eléctrica Campiche S.A' },
            { id : "7", nombre : 'Empresa Eléctrica Cochrane S.A' },

        ],

        seleccion:[],              
        kpi: [],
        idSelect:"",
        idList:"",

        idcaSelect:"",  //el id de seleccion del area de Ca
        cakpi:[] ,     // kpi de comertial A..

        idPlanillaAes:0,  //valores seteados a estandar depende del tipo de panel que selecciona

        idPlanillaCos:0,

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
                
                this.$http.get(url+'vrcheckpanel', { params: { tab: "est",
                                                                anio: this.anio,
                                                                mes: this.mes
                                                                } } ).then( function (resp){

                var datos = parseData(resp.data);
                    if(datos){

                                this.idPlanillaAes= datos[0].idPlanilla;
                                this.idPlanillaCos= datos[1].idPlanilla;


                    }else{

                        alert('Sin datos para el mes '+this.mes+ ' del año '+ this.anio);

                    }

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

                    this.seleccion= parseData(resp.data);

                }, function(err){
                    //si sale mal
                    console.log(err);
                    alert ('Error de conexion');
                });

            },

            getData: function(){

                this.$http.get(url+'vrdata', { params: { idselect: this.idSelect, idlist: this.idList,
                
                                                        idplanillaAes: this.idPlanillaAes,
                                                        idPlanillaCos: this.idPlanillaCos
                
                                                        } }).then(function (resp) {

                    this.kpi = parseData(resp.data);

                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');

                })

            },

            getCa: function(){

                this.$http.get(url+'vrcadata', { params: { idcaSelect: this.idcaSelect,
                
                                                            idplanillaAes: this.idPlanillaAes,

                                                        } }).then(function (resp) {

                    this.cakpi = parseData(resp.data);


                }, function (err) {
                    //si sale mal

                    console.log(err);
                    alert('Error de conexion');


                })

            },

            activa: function(valor){

                this.coments.activo= valor;
                
            }

    }
})

//endregion Vue


