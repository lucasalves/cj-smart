var Materia = function(){
	this.isPageStates = function(){
		return ($(".turma").length && $(".turma").data('page') === 'stats');
	};

	this.getMatriculaInTurma = function(addListerEvent, id){		
		App.Request.get('materia/get_materia_by_turma/' + id, {}, $('#AulaTurmaId'), addListerEvent, 'html');
	};

	this.changeMateriaInAula = function(materias){
		$('#AulaMateriaId').html( $.trim(materias) );
	};

	this.addListerEventInAula = function(){
		var self = this;

		$('body').on('change', '#AulaTurmaId', function(){
		 	self.getMatriculaInTurma(self.changeMateriaInAula, $('#AulaTurmaId option:selected').val() );
		});
	};

	this.isPageAula = function(){
		return $('#calendar-aula').length;
	};
};


$(document).ready(function(){
	var materia = new Materia();

	if(materia.isPageAula()){
		materia.addListerEventInAula();
	}
});