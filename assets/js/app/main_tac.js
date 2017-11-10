var url= "http://localhost/AESGener/ajax/";


var app = new Vue({

    el:"#app",

    data:{

        kpi:[],

        ugen:[],  // unidades generadoras

        hard:[
            { id : "1", valor : '' }

        ],

        idSelect:""



    },
    created: function() {
        // fetch the data when the view is created and the data is
        // already being observed
        this.getugen()
    },

    methods:{

        getkpi: function(){

            this.$http.post(url+'vrtactic', { dato: this.idSelect,

                                              prueba: "lalalala",
                                              test: "uuuuuuuuuuu"
            
                                            } ).then( function (resp){

                this.kpi=resp.data;

            }, function(err){
                //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });


        },
        getugen: function(){

            this.$http.post(url+'vrPrueba' ).then( function (resp){

                this.ugen=resp.data;

            }, function(err){
                //si sale mal
                console.log(err);
                alert ('Error de conexion');
            });


        },


    }





})