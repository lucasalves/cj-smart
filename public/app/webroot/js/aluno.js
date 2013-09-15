var Aluno = function(){
	this.viewOrAdd = function(where, addListerEvent){
		App.Request.get('aluno/view_or_add', where, $('.aluno'), addListerEvent);		
	};

	this.add = function(data, addListerEvent){
		App.Request.post('aluno/add_ajax', data, $('.aluno'), addListerEvent, 'json');
	};

	this.view = function(id, addListerEvent){
		App.Request.get('aluno/view/' + id, {}, $('.aluno'), addListerEvent);		
	};

	this.edit = function(id, addListerEvent){
		App.Request.get('aluno/edit/' + id, {}, $('.aluno'), addListerEvent);		
	};
};