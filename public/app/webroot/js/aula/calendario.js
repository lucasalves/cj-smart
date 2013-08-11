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

		this.view = function(event){
			$.get(ajaxurl + 'aula/view/' + event.id, function(response){
				var html = $(response).find(".aula-view");
				App.Modal.add(html, true);
			});	
		};

		this.edit = function(url){
			$.get(url, function(response){
				var html = $(response).find(".aula-form");
				App.Modal.add(html, true);
			});	
		};

		this.initialize = function(){
			this.on();

			var self = this;
			$('#calendar').fullCalendar({

				editable: true,

				events: this.events,

				eventDrop: this.updateDate,

				dayClick: this.form,

				eventClick: this.view
			});
		};

		this.on = function(){
			var self = this;

			$('body').on('click', '.aula-view a.editar', function(e){
				e.preventDefault();
				self.edit($(this).attr('href'));
			});
		};
	};

	$(document).ready(function() {
		var calendar = new Aula;
		calendar.initialize();
	});
})();