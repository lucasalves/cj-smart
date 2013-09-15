var Matricula = function(){
    var self = this;
    
    this.add = function(){

    };

    this.edit = function(){

    };

    this.submitButton = {
        display: function(){
            $("#botoes button").fadeIn();
        },
        hidden: function(){
            $("#botoes button").fadeOut();
        }
    };

    this.setHiddenData = function(aluno){
        $("#MatriculaAlunoId").val(aluno.id);
    };

    this.Aluno = {
        Aluno: new Aluno(),

        add: function(inputs){
            var data = {};

            for (var i = 0; i < inputs.length; i++) {
                if(inputs[i].name){
                    data[inputs[i].name] = inputs[i].value;
                }
            }

            var aluno = this;
            this.Aluno.add(data, function(response){
                if(response.status){
                    $(".matricula .find-aluno").trigger('click');
                    self.setHiddenData(response.Aluno);
                    self.submitButton.display();
                }else{
                    App.Notify.errors(response.errors, $('.aluno'));
                }
            });
        },

        find: function(rg){
            var aluno = this;
            this.Aluno.viewOrAdd({rg: rg}, function(html){
                aluno.content(html, function(){
                    if($("#AlunoAddForm").find().length){
                        $("#AlunoNome").focus();                        
                    }else{                       
                        self.setHiddenData({
                            id: parseInt($('.aluno dd:first').html())
                        });
                        self.submitButton.display();
                    }

                    $("html, body").animate({scrollTop:  270}, 1000);
                    $(".aluno .btn-group a").remove();
                    $(".error-message").remove();
                });
            });
        },

        content: function(html, addListernerEvent){    
            var html = $(html).find(".aluno").hide().html();
            $(".matricula .aluno").html(html).show('slide', {}, 300);
            addListernerEvent();
        },

        view: function(id){
            var aluno = this;
            this.Aluno.view(id, function(html){
                aluno.content(html, function(){
                    $(".aluno .btn-group a").remove();
                    self.submitButton.display();
                })
            });
        }
    };

    this.displayAlunoMatricula = function(){
        if($("#matricula #MatriculaAlunoId").val().length && $('.aluno').html().length === 0){
            this.Aluno.view($("#matricula #MatriculaAlunoId").val());
        }
    };

    //AddListersEvent
    (function(){

        $(document).ready(function(){
            self.displayAlunoMatricula();

            $(".matricula .find-aluno").on('click', function(){
                self.Aluno.find( $("#rg").val() );
            });

            $(".matricula #rg").on('keyup', function(){
                $("#AlunoAddForm #AlunoRg").val( $(this).val() );
            });

            $("body").on('keyup', '#AlunoAddForm #AlunoRg', function(){
                $(".matricula #rg").val( $(this).val() );
            });

            $("#matricula").on('submit', function(e){                
                if(!$("#matricula #MatriculaAlunoId").val().length){
                    e.preventDefault();
                    self.Aluno.find( $("#rg").val() );
                }
            });
            
            $("body").on('submit', '#AlunoAddForm', function(e){
                e.preventDefault();
                self.Aluno.add($("#AlunoAddForm input"));
            });

            $('.matricula button.matricula-create').on('click', function(){
                $("#matricula").submit();
            });
        });

    }());
};


$(document).ready(function(){
    if($('.matricula').length){
        var matricula = new Matricula;
    }
});