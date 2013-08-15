
(function($){    
    var Matricula = function (){
        var self = this;

        this.aluno;
           
        this.verifica = function(){
            var self = this;
            $.ajax({
                dataType: "json",
                 url: ajaxurl + "matricula/verifica",
                 data:{
                     rg: $("#rg").val()
                 },
                 success: function(resp){
                    if(typeof resp.Aluno !== "undefined"){
                        self.aluno = resp.Aluno;
                        self.exibeBotao(1);
                    }else{
                        self.exibeBotao(2);
                    }
                 }
            });        
        };
         
        this.exibeBotao = function(status){
            if(status == 1){
                $("#MatriculaAlunoId").val(this.aluno.id);
                var html = 
                    
                "<dt>Nome:</dt>"+
                "<dd>"+this.aluno.nome+"</dd>"+
                    
                "<dt>Rg:</dt>"+
                "<dd>"+this.aluno.rg+"</dd>"+

                "<dt>CPF:</dt>"+
                "<dd>"+this.aluno.cpf+"</dd>"+

                "<dt>Logradouro:</dt>"+
                "<dd>"+this.aluno.logradouro+"</dd>"+
            
                "<dt>CEP:</dt>"+
                "<dd>"+this.aluno.cep+"</dd>"+
            
                "<dt>Responsável:</dt>"+
                "<dd>"+this.aluno.responsavel+"</dd>"+
                "<br>"+
                
                "<input type='submit' class='btn btn-large  btn-success' value='Matricular' />"
            ;
                
            }else if(status == 2){      
                $.get(ajaxurl + 'aluno/add', {rg: $("#rg").val()}, function(response){
                    var html = $(response).find("#corpo").html();
                    App.Modal.add(html, true);
                });
            }
            
            $("#botoes").html(html);
        };

        $('body').on('click', '#UsuarioAddForm #Inserir', function(e){
            e.preventDefault();
            
            var data = {};
            var vals = $("#UsuarioAddForm input");

            for (var i = 0; i < vals.length; i++) {
                if(vals[i].name){
                    data[vals[i].name] = vals[i].value;
                }
            };

            self.addAluno(data, function(save){

            });
        });

        this.addAluno = function(data, callback){
            var self = this;
            var url = ajaxurl + 'aluno/add_ajax';

            $.post(url, data, function(result){
                if(result.status){
                    self.aluno = result.Aluno;
                    App.Modal.close();
                    self.exibeBotao(1);                    
                }
            }, 'json');
        };
    };

    $(document) .ready(function(){
        $("#matricula #rg").on('change', function(e){
            // Instancia de Matricula
            objMatricula = new Matricula();
            objMatricula.verifica();
        });
    });

})(jQuery);