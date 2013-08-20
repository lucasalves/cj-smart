
(function($){    
    var Curso = function (){
        var self = this;

        this.curso;
   
        this.addMateria = function(){
            $.get(ajaxurl + 'materia/add', function(response){
                var html = $(response).find("#corpo").html();
                App.Modal.add(html, true, function(){
                    
                    });                    
            });
        }
        
        this.listeners = function (){
            $('body').on('click', '#MateriaAddForm #Inserir', function(e){
                e.preventDefault();
            
                var data = {};
                var vals = $("#MateriaAddForm input");

                for (var i = 0; i < vals.length; i++) {
                    if(vals[i].name){
                        data[vals[i].name] = vals[i].value;
                    }
                };

                $.post(ajaxurl + 'materia/add_ajax',data, function(response){
                    if(response.status){
                        location.href=location.href;
                        App.Modal.close();             
                    }
                }, 'json');                       
            });
                    
              
        };
        this.listeners();
    };

    $(document) .ready(function(){
        $("#NovaMateria").on('click', function(e){
            // Instancia de Matricula
            objCurso = new Curso();
            objCurso.addMateria();
        });
    });

})(jQuery);