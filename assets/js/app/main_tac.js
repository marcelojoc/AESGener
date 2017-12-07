var url= $("#siteurl").val()+"ajax/";



var app = new Vue({

    el:"#app",

    data:{

        kpi:[],

        ugen:[],  // unidades generadoras


        load: false,

        idSelect:""



    },

    beforeCreate: function () {
        
        
    },
    created: function() {
        // fetch the data when the view is created and the data is
        // already being observed
        this.getugen()
    },

    mounted: function () {
        this.load=true;
    },

    methods:{

        getkpi: function(){

            this.$http.post(url+'vrtactic', { dato: this.idSelect} )
            
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