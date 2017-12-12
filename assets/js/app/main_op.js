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

            this.$http.get(url+'vrdivsap').then(function (resp) {

                var data= JSON.parse(resp.data);
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

                this.valores = JSON.parse(resp.data);

            }, function (err) {
            //si sale mal

                console.log(err);
                alert('Error de conexion');

            })
        },

        modificar: function(valor){

            console.log(valor);
            //this.idPlanilla= valor

        }

    },

    //Ciclo de vida de la instancia

    created: function() {
        // fetch the data when the view is created and the data is
        // already being observed
        this.divSap()
    },












})