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

    this.setHiddenData = function(aluno, addListersEvent){
        $("#MatriculaAlunoId").val(aluno.id);
        if(addListersEvent){
            addListersEvent();
        }
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
                     self.setHiddenData(response.Aluno, function(){
                        $(".matricula .find-aluno").trigger('click');    
                     });
                    
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
                    if($(html).find("#AlunoAddForm").length){
                        $("#AlunoNome").focus();
                        aluno.btnEdit.remove();                
                    }else{                   
                        self.setHiddenData({
                            id: parseInt($('.aluno dd:first').html())
                        });
                        self.submitButton.display();
                        aluno.btnEdit.add();
                    }

                    $("html, body").animate({scrollTop:  270}, 1000);
                    $(".aluno .btn-group a").remove();
                    $(".error-message").remove();                    
                });
            });
        },

        btnEdit: {
            add: function(){
                $('.aluno .btn-group').append('<buton class="edit btn">Editar</buton>');
            },
            remove: function(){
                $('.aluno .btn-group .edit').remove();
            }
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
                    aluno.btnEdit.add();
                })
            });
        },

        edit: function(id){
            var aluno = this;
            this.Aluno.edit(id, function(html){
                aluno.content(html, function(){})
                self.submitButton.hidden();
                $(".aluno .btn-group a").remove();
            });
        }
    };

    this.displayAlunoMatricula = function(){
        if($("#matricula #MatriculaAlunoId").val() && $('.aluno').html().length === 0){
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
            
            $("body").on('submit', '#AlunoAddForm, #AlunoEditForm', function(e){
                e.preventDefault();
                self.Aluno.add($("#AlunoAddForm input, #AlunoEditForm input"));
            });

            $('.matricula button.matricula-create').on('click', function(){
                $("#matricula").submit();
            });

             $("body").on('click', '.aluno .edit', function(e){                
                self.Aluno.edit(parseInt($('.aluno dd:first').html()));
            });
        });

    }());
};


$(document).ready(function(){
    if($('.matricula').length){
        var matricula = new Matricula;
    }
});