/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Janela(){
    
     
    $(document).on("click",".janela",function(){
        var caminho = $(this).attr('title');
        window.open(caminho, "DownPdf", "width=600,height=600");
    })
    
    this.botaoJanela = function(caminho){
        return "<a href='#' title='"+caminho+"' role='button' data-toggle='modal'  class='btn btn-danger btn-large janela'>Cadastrar Novo Aluno</a>";
    }
}
    
        