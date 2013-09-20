var Usuario = function(){
	var self = this;	

	this.Grupo = {
		Grupo: new GrupoUsuario(),

		diplayFormGrupo: function(){
	        this.Grupo.form(function(response){
	            var html = $(response).find(".form").html();
	            App.Modal.add(html, true, function(){
	                $("GrupoUsuarioNome").focus();
	            });
	        });
		},

		create: function(inputs){
			 var data = {};

            for (var i = 0; i < inputs.length; i++) {
                if(inputs[i].name && inputs[i].value !== ''){
                    data[inputs[i].name] = inputs[i].value;
                }
            }

            this.Grupo.add($("#grupo-usuario-create").serializeArray(), $('.modal-body'), function(data){
            	if(response.status){                    
                    self.Grupo.updateSelecte(data.Grupo);
                }else{
                    App.Notify.errors(response.errors, $('.modal-body'));
                }
            });
		},

		updateSelecte: function(data){
			console.log(data);
		}
	};

	//AddListenerEvent
	(function(){
		$(document).ready(function(){
			$('.usuarioform .add-group').on('click', function(){
				self.Grupo.diplayFormGrupo();
			});

			$("body").on('submit', '#grupo-usuario-create', function(e){
				e.preventDefault();
				self.Grupo.create($("#grupo-usuario-create input"));
			});
		});


	}());
};

$(document).ready(function(){
    if($('.usuarioform').length){
        new Usuario;
    }
});