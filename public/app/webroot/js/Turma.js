var Turma = function(){
	this.graph = {
		GRAPH:   {}
	};

	this.isPageStates = function(){
		return ($(".turma").length && $(".turma").data('page') === 'stats');
	};

	this.getStats = function(addListerEvent){
		var id = location.href.split(/\//).pop();
		App.Request.get('turma/stats_ajax/' + id, {}, $('stats-turma'), addListerEvent, 'json');
	};

	this.loadStats = function(){
		var self = this;
		this.getStats(function(data){

			self.graph.GRAPH = new Charts.column('stats-turma', {
				series: data,
				tooltip: {
	                formatter: function() {                    
                        s = 'Media de: ' + parseFloat(Number(this.y).toFixed(1));

	                    return s;
	                }
	            }
			});
		});
	};
};


$(document).ready(function(){
	var turma = new Turma();

	if(turma.isPageStates()){
		turma.loadStats();
	}
});