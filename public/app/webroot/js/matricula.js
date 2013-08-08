/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Matricula(){
    
    var aluno_id;
    var nome;
    var rg;
    var cpf;
    var logradouro;
    var cep;
    var responsavel;
   
    this.validar = function(){
        
        if(this.verifica()){
            this.exibeBotao(1);
        }else{
            this.exibeBotao(2);
        }
        
    }
    
    this.verifica = function(){
        
        //this.aluno_id = 1;
        this.nome = "Bruno";
        this.rg = "47.452.922-8";
        this.cpf = "228.034.238.39";
        this.logradouro = "Rua Paulo Orozimbo, 379";
        this.cep = "01535000";
        this.responsavel = "Maria das Merces";
        
        if(this.aluno_id){
            return true;
        }else{
            return false;
        }
        
        
    }
     
    this.exibeBotao = function(status){
        if(status == 1){
            var html = 
                
            "<dt>Nome:</dt>"+
            "<dd>"+this.nome+"</dd>"+
                
            "<dt>Rg:</dt>"+
            "<dd>"+this.rg+"</dd>"+

            "<dt>CPF:</dt>"+
            "<dd>"+this.cpf+"</dd>"+

            "<dt>Logradouro:</dt>"+
            "<dd>"+this.logradouro+"</dd>"+
        
            "<dt>CEP:</dt>"+
            "<dd>"+this.cep+"</dd>"+
        
            "<dt>Responsável:</dt>"+
            "<dd>"+this.responsavel+"</dd>"+
            "<br>"+
            
            "<input type='submit' class='btn btn-large  btn-success' value='Matricular' />"
        ;
            
        }else if(status == 2){
            objJanela = new Janela();
            html = objJanela.botaoJanela("/cj-smart/public/aluno/add/"+this.rg);
        }
        
        $("#botoes").html(html);
    }
 
}
    
        