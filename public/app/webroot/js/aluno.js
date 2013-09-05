var Aluno = function(){
	this.viewOrAdd = function(where, addListerEvent){
		App.Request.get('aluno/view_or_add', $('.aluno'), addListerEvent);		
	};
};