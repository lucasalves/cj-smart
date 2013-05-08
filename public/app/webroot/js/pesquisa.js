/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Pesquisa(){
    
    var campoQtdLinhas;
    
    var qtdLinhas;
    var linhaInicial;
    var valorPesquisa;
    var tipoRelatorio;
    var colunaOrder;
    var sentidoOrder;
    var diretorio;
      
      
    this.setValorPesquisa = function(valor){
        
        // Faz o tratamento dos espaços vazios
        total = valor.split(" ");
        
        for(i=0; i<=total.length; i++){
            valor = valor.replace(" ",'%20');
        }
        
        this.valorPesquisa = valor;
        
    }
    
    this.setTipoRelatorio = function(tipo){
        this.tipoRelatorio = tipo;
    }
    
    this.setLinhaInicial = function(linha){
        this.linhaInicial = linha;
    }
    
    this.setDiretorio = function(dir){
        this.diretorio = dir;
    }
        
    this.setQtdLinhas = function(linha){
        this.qtdLinhas = linha;
    }
    
    this.setColunaOrder= function(coluna){
        this.colunaOrder = coluna;
        
        if( this.sentidoOrder == "ASC" ){
            this.sentidoOrder = "DESC";
        }else{
            this.sentidoOrder = "ASC";
        }
    }
     
    this.itensChecados=function(itens){
        colunas = "";
            
        contador = 0;
        itens.each(function () {
                
            if (this.checked) {
                    
                if(contador > 0){
                    colunas = colunas +","+ this.value;
                }else{
                    colunas = this.value;    
                }
                contador++;
            }
                
        });
            
        return colunas;
    }
        
    this.colunasExibicao=function(){

        return this.itensChecados($('#checkExibicao input[type=checkbox]'));
    }

    this.colunasAgrupar=function(){

        return this.itensChecados($('#checkAgrupar input[type=checkbox]'));
    }
    
    
    this.pesquisar=function(){
        
        // Valor pesquisado
        params = "valorPesquisa=" + this.valorPesquisa + "";
            
        // Total de Linhas a Exibir
        params = params + "&qtdLinhas=" + this.qtdLinhas;
            
        // Colunas Exibicao
        params = params + "&colunasExibicao=" + this.colunasExibicao();
            
        // Colunas Agrupar
        params = params + "&colunasAgrupar=" + this.colunasAgrupar();
        
        // Coluna Ordem
        params = params + "&colunaOrder=" + this.colunaOrder;
        
        // Sentido Ordem
        params = params + "&sentidoOrder=" + this.sentidoOrder;
        
        // Tipo Relatorio
        params = params + "&tipoRelatorio=" + this.tipoRelatorio;
            
        // Tipo Relatorio
        params = params + "&linhaInicial=" + this.linhaInicial;
            
        //Relatório da Tela Html
        if(this.tipoRelatorio == 'html'){
            $('div#mainRelatorio').html('<img src="template/img/carregando.gif" />');
            $('div#mainRelatorio').load("aplicativo/" + this.diretorio +"/relatorio_interativo.php?" + params );
            
        }else{
            //Relatorio Excel ou PDF
            window.open("aplicativo/" +this.diretorio + "/relatorio_interativo.php?" + params , "DownPdf", "width=600,height=600");    
            
            //Seta novamente o html como default após gerar o pdf ou excel
            this.setTipoRelatorio('html');
        }            
    }
    
    this.carregarFormulario = function(id){
        if(id == null){
            $('div#corpo').load("aplicativo/" + this.diretorio +"/formulario.php?session="+Math.floor(Math.random() * 10000000));
        }else{
            $('div#corpo').load("aplicativo/" + this.diretorio + "/formulario.php?id="+id+"&session="+Math.floor(Math.random() * 10000000));
        }
    
    }

        
    this.paginar=function(linha){
        this.setLinhaInicial(linha);
        this.pesquisar();
    }
    
    this.ordenar=function(coluna){
        this.setColunaOrder(coluna);
        this.pesquisar();
    }
    
    this.exibeColunasOpcoes=function(botao){
        var x = $(".opcoesColunas");
        
        var left = botao.offset().left;
        var top  = botao.offset().top;
        
        x.css('top',top + 30);
        x.css('left',left);
        
        // Exibe
        var status = x.css('display');
        
        if(status == 'none'){
            x.css('display','block');
        }else{
            x.css('display','none');
        }
    }
    
    this.acaoTabular=function(){
        //if( validar() == true ){
        var form = this.diretorio;
        var params = $("form#" + form).serialize();
               
        var sucesso = true;
        
        $.ajax({
            type: "POST",
            url: "aplicativo/" + form + "/executa.php?acao=tabular",
            data: params,
            dataType: "json", //Tipo de Retorno
            success: function(json){
                enviaMensagem(" " + json.erro);
                sucesso = false;
                return false;
            },
            complete: function(){
                if(sucesso){
                    enviaMensagem("Inserido com Sucesso");
                    voltar(form);
                }
            }
        });
    // }
    }
    
}
    
