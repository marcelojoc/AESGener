
//region filtros personalizados
    // filtro para truncar decimales
    Vue.filter('truncar', function(value) {

        if(value != "" && value != null){
            
            posiciones = 2
            var s = value.toString()
            var l = s.length;
            var decimalLength = s.indexOf('.') + 1
            var numStr = s.substr(0, decimalLength + posiciones)
            return Number(numStr)
        }else{

            return "";

        }

    });

    //filtro simplificado para quitar los decimales de valores grandes
    Vue.filter('sindec', function (value)  {

        if(value != ""){
            
            var result= Math.trunc(parseFloat(value))

            return result;

        }else{

            return "";

        }
        
    });

    
//endregion filtros personalizados


//region Component grafico

Vue.component('vm-grafico',{
    // options
    template: '#aesgen-graph',

    data: function () {

        return {

            
           
        }
    },




    props: ['lble','lblr','esperado','real'],
 
    computed: {
        
        getColor: function () {
        
        var color="";
        var esperado = parseFloat(this.esperado);
        var real = parseFloat(this.real);

        // console.log(esperado +"esperado");

        // console.log(real  +"real");
            if(real >= esperado){

                color= '#2ecc71';

            }else{

                color= '#E74C3C';
            }

        return color;

        }
    },

})


//endregion Component


//region Component semaforizacion

Vue.component('vm-semaforizado',{
    // options
    template: '#aesgen-semaf',

    data: function () {

        return {
            // esto es solo de prueba
            leyenda:""
            
        }
    },

    props: ['lbl','esperado','real', 'tipo'],
    

    computed: {
        
        getColorPoint: function () {
        
        var css="";
        var esperado = parseFloat(this.esperado);
        var real = parseFloat(this.real);

        var isTrueSet = (this.tipo === 'true'); // aqui valido si lo que viene en el atributo tipo es verdadero o false
            //este atributo cambia en la forma que se grafica

        if(isTrueSet){  // si el real es mayor que el esperado queda verde

            if(real >= esperado){

                //uso normal

                css= "#2ecc71";
                this.leyenda=" Valor actual superior al esperado";

            }else{
                css = "#E74C3C";
                this.leyenda=" Valor actual Inferior al esperado";
            }

        }else{
            if(real >= esperado){ // si el real es mayor que el esperado queda rojo

            //uso alternativo

                css= "#E74C3C";
                this.leyenda=" Valor actual Superior  al esperado";

            }else{
                css = "#2ecc71";
                this.leyenda=" Valor actual Inferior al esperado";
            }
        }

        return css;

        }
    },


})


//endregion Component

