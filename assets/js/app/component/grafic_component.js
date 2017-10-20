

//region filtros personalizados


Vue.filter('truncar', (value) => {
    
    if(value != ""){
        
        posiciones = 2
        var s = value.toString()
        var l = s.length
        var decimalLength = s.indexOf('.') + 1
        var numStr = s.substr(0, decimalLength + posiciones)
        return Number(numStr)
    }else{

        return "";

    }

        
    });
    
//endregios filtros personalizados



//region Component grafico

Vue.component('vm-grafico',{
    // options
    template: '#aesgen-graph',

    data: function () {

        return {
            
        }
    },

    props: ['lble','lblr','esperado','real','tipo'],

 
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
    },


})


//endregion Component

