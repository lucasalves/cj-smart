// Salvar
function salvar(form, id){
    if( validar() == true ){
        var params = $("form#" + form).serialize();
        
        var sucesso = true;
        
        $.ajax({
            type: "POST",
            url: "aplicativo/" + form + "/executa.php?acao=salvar",
            data: params,
            dataType: "json", //Tipo de Retorno
            success: function(json){
                enviaMensagem(" " + json.erro);
                sucesso = false;
                return false;
            },
            complete: function(){
                if(sucesso){
                    $('div#corpo').load("aplicativo/" + form + "/formulario.php?id=" + id);
                    enviaMensagem("Alterado com Sucesso!!");
                }
            }            
        });
    }
}
// Inserir
function inserir(form){
    if( validar() == true ){
        var params = $("form#" + form).serialize();
        
        var sucesso = true;
        
        $.ajax({
            type: "POST",
            url: "aplicativo/" + form + "/executa.php?acao=inserir",
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
    }
}


// Excluir
function excluir(form){
    var params = $("form#" + form).serialize();
    
    var sucesso = true;
           
    $.ajax({
        type: "POST",
        url: "aplicativo/" + form + "/executa.php?acao=excluir",
        data: params,
        dataType: "json", //Tipo de Retorno
        success: function(json){
            enviaMensagem(" " + json.erro);
            sucesso = false;
            return false;
        },
        complete: function(){
            if(sucesso){
                enviaMensagem("Excluído com Sucesso!!")
                voltar(form);
            }
        }
    });
}






// Fecha a Mensagem
$(document).ready(function(){
    $("#mensagem .close").click(function(){
        exibeMensagem(0);
    });
});

// Voltar para index da pasta
function voltar(form){
    $('div#corpo').load("aplicativo/" + form + "/index.php");
    exibeMensagem(0);
}

// Exibe a mensagem
function exibeMensagem(status){
    if(status == 1){
        $("#mensagem").fadeIn('low');    
    }else{
        $("#mensagem").fadeOut('low');    
    }
}

// Envia a mensagem
function enviaMensagem(msg){
    exibeMensagem(1);
    $("#mensagem .conteudo").html(msg);   
}

// Funcao de Validação
function validar(){
    if(validaNotNull() == false){
        return false;    
    }
    return true;
}
    
function validaNotNull(){
        
    itens = $(".inputRequired");
        
    var count = 0;
    var campos = "";
    var msg = "";
        
    itens.each(function () {
            
        if( $(this).val() == ""){
            count++;             
            label = $(this).parent().find("label").html();
            campos = campos + label + "<br  />";
        }
            
    });
        
    msg = "Preencher os Campos Obrigatórios";
    msg = msg + " (" + count + ")";
    msg = msg +  "<br /><br />" + campos;
    
    if(count > 0){
        enviaMensagem(msg);
        return false;
    }
    
    return true;
   
}


$(document).on("mouseover",".btn_auditoria",function(){
    id = $(this).val();
    regiao = "#audit_"+ id;
    
    // Recupera a posicao
    var position = $(this).position();
    topo = ( position.top + 40) + 'px';
    
    var tamanho = $(regiao).width();
    esquerda = ( position.left - tamanho ) + 'px';

    $(regiao).css('top',topo);
    $(regiao).css('left',esquerda);
    $(regiao).fadeIn('slow');
});
    
$(document).on("mouseleave",".btn_auditoria",function(){
    id = $(this).val()
        
    regiao = "#audit_"+ id;
    $(regiao).fadeOut('fast');
});
    

