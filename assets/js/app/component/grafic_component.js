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
          type: String,
          default: 100,
          required: true
        },
        // a number with default value
        real: {
          type: String,
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
        
        var color="";
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



//region filtros personalizados


// Vue.filter('trunc', (value) => {

//     console.log(value);
//     if(value== ""){

//         return value;
//     }else{

//         return value.toFixed(2);
//     }
// });

//endregios filtros personalizados