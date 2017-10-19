//region Component grafico

Vue.component('vm-grafico',{
    // options
    template: '#aesgen-graph',


    data: function () {

        return {
            


        }
    },


    props: {

        lble: {
          type: String,
          required: true,
        },

        lblr: {
            type: String,
            required: true,
        },   
        // a number with default value
        esperado: {
          type: Number,
          default: 100,
          required: true
        },
        // a number with default value
        real: {
          type: Number,
          default: 100,
          required: true
        },
        // object/array defaults should be returned from a
        // factory function
        tipo: {
          type:String,
          default: 'true',
        }
    },
 



    computed: {
        
        getColor: function () {
        
        let color="";
            // `this` apunta a la instancia de vm
            if(this.tipo === 'true'){

                

                color= '#2ecc71';

            }else{

                color= '#E74C3C';
            }

        return color;

        }
    }



})


//endregion Component