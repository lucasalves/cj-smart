var Usuario = function(){
	var self = this;

	this.Grupo = new GrupoUsuario();

	this.diplayFormGrupo = function(){
        this.Grupo.form(function(response){
            var html = $(response).find(".form").html();
            App.Modal.add(html, true, function(){
                
            });
        });
	};

	//AddListenerEvent
	(function(){
		$(document).ready(function(){
			$('.usuarioform .add-group').on('click', function(){
				self.diplayFormGrupo();
			});
		});
	}());
};

$(document).ready(function(){
    if($('.usuarioform').length){
        new Usuario;
    }
});