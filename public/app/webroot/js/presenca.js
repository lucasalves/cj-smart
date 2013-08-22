
(function($){    
    var Presenca = function (){       
        
        var self = this;

        this.turma_id;
        this.aula_id;
                
        this.aulas = function(){
            
            self.setTurmaId();
            
            $.get(ajaxurl + 'presenca/carregar_aula/', {
                turma_id: this.turma_id
            }, function(response){
                var html = $(response).find("#corpo").html();
                $("#PresencaAulaId").html(html);
                
                self.setAulaId();
                self.lista();
            });
            
        };
        
        this.listaOcorrencias = function(){            
            $.get(ajaxurl + 'ocorrencia/lista', {
                aula_id: this.aula_id
            }, function(response){
                var html = $(response).find("#corpo").html();
                $("#ListaOcorrencias").html(html);
            });
        };    
        
        
        this.lista = function(){            
            $.get(ajaxurl + 'presenca/lista', {
                turma_id: $("#TurmaId").val()
                ,
                aula_id: this.aula_id
            }, function(response){
                var html = $(response).find("#corpo").html();
                $("#ListaPresenca").html(html);
            });
        };     
        
        this.setAulaId = function(){           
            this.aula_id = $("#PresencaAulaId").val();
        }
        
        this.setTurmaId = function(){
            this.turma_id = $("#TurmaId").val();
        }
         
    }
    
    
    
    $(document).ready(function(){
        
        objPresenca = new Presenca();
        objPresenca.setAulaId();    
        objPresenca.lista(); 
            
        $("#TurmaId").on('change', function(e){
            objPresenca.aulas();
        });
        
        $("#PresencaAulaId").on('change', function(e){
            objPresenca.setAulaId();    
            objPresenca.lista();  
            objPresenca.listaOcorrencias();
        });
    });
    
    
})(jQuery);