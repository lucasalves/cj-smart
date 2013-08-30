
(function($){    
    var Ocorrencia = function (){
        var self = this;

        this.ocorrencia;
   

        this.add = function(matricula_id){
            $.get(ajaxurl + 'ocorrencia/add',
            {
                aula_id: $("#PresencaAulaId").val(),
                matricula_id: matricula_id
            }, function(response){
                var html = $(response).find("#corpo").html();
                App.Modal.add(html, true, function(){
                    
                    });                    
            });
        }
        
        this.listeners = function (){
            $('body').on('click', '#OcorrenciaAddForm #Inserir', function(e){
                e.preventDefault();
            
                var data = {};
                var vals = $("#OcorrenciaAddForm input, select, textarea");
                

                for (var i = 0; i < vals.length; i++) {
                    if(vals[i].name){
                        data[vals[i].name] = vals[i].value;
                
                    }
                };

                $.post(ajaxurl + 'ocorrencia/add_ajax',data, function(response){
                    if(response.status){
                        App.Modal.close(); 
                        $('.nav-tabs a[href=#ocorrencias]').tab('show');
                       $("#PresencaAulaId").change();
                    }
                }, 'json');                       
            });
                    
              
        };
        this.listeners();
    };

    $(document).ready(function(){
        $('body').on('click', '.NovaOcorrencia', function(e){
            // Instancia de Matricula
            objOcorrencia = new Ocorrencia();
            objOcorrencia.add($(this).attr('name'));
            
        });
    });

})(jQuery);