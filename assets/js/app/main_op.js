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

        divlista:[],
        divselect:"",
        idPlanilla:"",
        valores: [],

        cakpi:[]

    },

    // metodo de escucha por el cambio del modelo divSelect
    watch: {
        divselect: function () {

            for (var i in this.divlista) {

                if(this.divlista[i].id == this.divselect){

                    this.idPlanilla= this.divlista[i].idPlanilla
                }
            
             }

        }
    },

    methods:{

        divSap: function(){
            
            //aqui tomo el id del empleado que esta ingresando y lo pongo en el poaramentro de data  usuario
            this.idEmpleado=$('#idEmpleado').val();
            this.nombreE=$('#nombreE').val();  // tomo el nombre del usuario para despues mostrarlo en los comentarios si es que añade uno
            this.anio=$('#anio').val();  // tomo el año
            this.mes=$('#mes').val();  // tomo el mes si viene en la url
            this.$http.get(url+'vrdivsap', { params: { tab: "ops",
                                                        anio: this.anio,
                                                        mes: this.mes
                                                        } } ).then(function (resp) {

                var data= parseData(resp.data);
                this.divlista = data;

            }, function (err) {
                //si sale mal

                console.log(err);
                alert('Error de conexion');
            })
        },


        getdatos: function(){

            this.$http.get(url+'vrdivsapdatos',{ params: { idlist: this.divselect ,
                                                           idPlanilla: this.idPlanilla 
                                                        } 
                }).then(function (resp) {

                this.valores = parseData(resp.data);

            }, function (err) {
            //si sale mal

                console.log(err);
                alert('Error de conexion');

            })
        },


    },

    //Ciclo de vida de la instancia

    created: function() {
        // fetch the data when the view is created and the data is
        // already being observed
        this.divSap()
    },












})