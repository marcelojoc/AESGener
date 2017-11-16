var url= $("#siteurl").val()+"ajax/";

var app = new Vue({

    el: "#app",

    data:{

        divlista:[],
        divselect:"",
        valores: [],

        cakpi:[]

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

            this.$http.get(url+'vrdivsapdatos',{ params: { idlist: this.divselect } }).then(function (resp) {

                this.valores = JSON.parse(resp.data);

            }, function (err) {
            //si sale mal

                console.log(err);
                alert('Error de conexion');

            })
        }

    },

    //Ciclo de vida de la instancia

    created: function() {
        // fetch the data when the view is created and the data is
        // already being observed
        this.divSap()
    },












})