$(function() {
    // Handler for .ready() called.
  
    selector.bind();
  
    // 1 SI  Y 2 ES NO
  });
  

var selector = {





    bind: function(){

        $( "#category" ).on(
        'change', function(){
            
            selector.submit();

        });




    },


    refresh: function(){



    },

    submit: function(){

        $( "#form_selector" ).submit();


    }



}




var app = new Vue({
    el: '#app',
    data: {
      
        title: 'Costos',

        nombre: 'EFOFO(%)',
        real:     '23%',
        esperado:  '34%',
        

        grafico : [
            { description : "Go to the store ", completed : true },
            { description : "Leave the store" , completed : false }
           ] 




    }
})
