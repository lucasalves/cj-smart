
(function($){    
    var Presenca = function (){       
        
        
        this.carregar=function(){
            this.aulas();
            this.lista();
        }
        
        this.aulas = function(){
            $.get(ajaxurl + 'presenca/carregar_aula/', {
                turma_id: $("#TurmaId").val()
            }, function(response){
                var html = $(response).find("#corpo").html();
                $("#PresencaAulaId").html(html);
            });
        };
        
        this.lista = function(turma_id, callback){

            $.get(ajaxurl + 'presenca/lista', {
                turma_id: $("#TurmaId").val()
               ,aula_id: $("#PresencaAulaId").val()
            }, function(response){
                var html = $(response).find("#corpo").html();
                $("#ListaAlunos").html(html);
            });
        };        
         
    }
    
    $(document) .ready(function(){
        $("#TurmaId").on('change', function(e){
            objPresenca = new Presenca();
            objPresenca.carregar();
        });
    });
    
//    $(document) .ready(function(){
//        $("#PresencaAulaId").on('change', function(e){
//            objPresenca = new Presenca();
//            objPresenca.lista();
//            
//        });
//    });

})(jQuery);