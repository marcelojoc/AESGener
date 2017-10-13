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