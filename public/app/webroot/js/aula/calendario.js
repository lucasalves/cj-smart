(function(){
	var Aula = function(){
		
		this.events = ajaxurl + "aula/get/";

		this.updateDate = function(event, delta) {
			$.post(ajaxurl + 'aula/update_date', {id: event.id, delta: delta});
		};

		this.form = function(date){
			$.get(ajaxurl + 'aula/add', {date: date}, function(response){
				var html = $(response).find(".aula-form");
				App.Modal.add(html, true);
			});			
		};

		this.initialize = function(){
			var self = this;
			$('#calendar').fullCalendar({

				editable: true,

				events: this.events,

				eventDrop: this.updateDate,

				dayClick: this.form
			});
		};
	};

	$(document).ready(function() {
		var calendar = new Aula;
		calendar.initialize();
	});
})();