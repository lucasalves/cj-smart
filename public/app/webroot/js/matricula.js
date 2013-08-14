/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Matricula(){
    this.aluno;
   
    this.validar = function(result, data){        
        if(result){
            this.aluno = data;
            this.exibeBotao(1);
        }else{
            this.exibeBotao(2);
        }        
    }
    
    this.verifica = function(){
        var self = this;
        $.ajax({
            dataType: "json",
             url: ajaxurl + "matricula/verifica",
             data:{
                 rg: $("#rg").val()
             },
             success: function(resp){
              
                self.validar((typeof resp.Aluno !== "undefined"), resp.Aluno);              
             }
        });        
    }
     
    this.exibeBotao = function(status){
        if(status == 1){
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
            objJanela = new Janela();
            html = objJanela.botaoJanela("/cj-smart/public/aluno/add/"+this.aluno.rg);
        }
        
        $("#botoes").html(html);
    }
 
}
    
        