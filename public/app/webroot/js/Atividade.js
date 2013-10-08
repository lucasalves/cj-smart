(function(){
	var Atividade = function(){
		
		this.events = ajaxurl + "atividade/get/";

		this.updateDate = function(event, delta) {
			$.post(ajaxurl + 'atividade/update_date', {id: event.id, delta: delta});
		};

		this.form = function(date){
			$.get(ajaxurl + 'atividade/add', {date: date}, function(response){
				var html = $(response).find(".atividade-form");
				App.Modal.add(html, true);
			});			
		};

		this.view = function(event){
			$.get(ajaxurl + 'atividade/view/' + event.id, function(response){
				var html = $(response).find(".atividade-view");
				App.Modal.add(html, true);
			});	
		};

		this.edit = function(url){
			$.get(url, function(response){
				var html = $(response).find(".atividade-form");
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

			$('body').on('click', '.atividade-view a.editar', function(e){
				e.preventDefault();
				self.edit($(this).attr('href'));
			});
		};
	};

	$(document).ready(function() {
		if($('#calendar-atividade').length){
			var calendar = new Atividade;
			calendar.initialize();
		}
	});
})();