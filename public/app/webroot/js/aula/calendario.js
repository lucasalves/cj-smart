(function(){
	var Aula = function(){
		this.controller = 'aula';

		this.events = "aula/get/";

		this.updateDate = function(event, delta) {
			$.post('aula/update_date', {id: event.id, delta: delta});
		};

		this.create = function(date){
			$.get('aula/create', {date: date}, function(response){
				console.log(response);
			});
		};

		this.initialize = function(){
			var self = this;
			$('#calendar').fullCalendar({

				editable: true,

				events: this.events,

				eventDrop: this.updateDate,

				dayClick: this.create
			});
		};
	};

	$(document).ready(function() {
		var calendar = new Aula;
		calendar.initialize();
	});
})();