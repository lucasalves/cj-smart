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

	this.isPageView = function(){
		return ($(".aluno").length && $(".aluno").data('page') === 'view');
	};

	this.graph = {
		GRAPH:   {}
	};

	this.getStats = function(addListerEvent){
		var id = location.href.split(/\//).pop();
		App.Request.get('aluno/stats/' + id, {}, $('stats-aluno'), addListerEvent, 'json');
	};

	this.loadStats = function(){
		var self = this;
		this.getStats(function(data){
			var series = [];
			var i = 0;

			for (i = 0; i < data.matriculas.length; i++) {
				data.matriculas[i].type = 'spline';
				series.push(data.matriculas[i]);
			};

			series.push({
                type: 'pie',
                name: 'Media por Materia',
                data: data.materias,
                center: [100, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
	       	});
			console.log(series);
			self.graph.GRAPH = new Charts.custom('stats-aluno', {
				series: series,
				tooltip: {
	                formatter: function() {
	                    var s;
	                    if (this.point.name) { // the pie chart
	                        s = 'Media em '+
	                            this.point.name +': '+ this.y;
	                    } else {
	                        s = 'Evolução por nota'+
	                            ': '+ this.y;
	                    }
	                    return s;
	                }
	            }
			});
		});
	};
};


$(document).ready(function(){
	var aluno = new Aluno();

	if(aluno.isPageView()){
		aluno.loadStats();
	}
});