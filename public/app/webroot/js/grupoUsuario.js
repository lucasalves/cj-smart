var GrupoUsuario = function(){
	this.add = function(data, addListerEvent){
		App.Request.post('grupousuario/add_ajax', data, $('.grupo-usuario'), addListerEvent, 'json');
	};

	this.form = function(addListerEvent){
		App.Request.get('GrupoUsuario/form', {}, $('.grupo-usuario'), addListerEvent);
	};
};