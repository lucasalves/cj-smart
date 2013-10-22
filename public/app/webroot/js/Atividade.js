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

		this.Local = {
			Local: new Local,
			realText: '',
			alterInput: function(){
				if($("#AtividadeLocalId").is(':visible')){
					$("#AtividadeLocalId").fadeOut(300, function(){						
						var input = document.createElement('input');
						input.type = 'text';	
						input.className = 'AtividadeLocalName';
						$("#AtividadeLocalId").before(input);
					});
				}else{
					$('.AtividadeLocalName').remove();
					$("#AtividadeLocalId").fadeIn(300);
				}
			},
			add: function(that){
				this.realText = $(that).text();
				$(that).removeClass('add-local btn-info').addClass('save-local btn-success').text('Salvar Local');
				this.alterInput();
			},
			save: function(that){
				$(that).removeClass('save-local btn-success').addClass('add-local btn-info').text(this.realText);
				if($('.AtividadeLocalName').val().length){
					this.Local.add({local: $('.AtividadeLocalName').val()}, function(local){
						if(local.status){
							var option = document.createElement('option');
							option.value = local.Local.id;
							option.innerHTML = local.Local.local;
							$('#AtividadeLocalId').append(option);
							$('#AtividadeLocalId option:last').attr('selected', true);
						}else{
							this.alterInput();
						}
					});
				}
				this.alterInput();
			}
		};

		this.on = function(){
			var self = this;

			$('body').on('click', '.atividade-view a.editar', function(e){
				e.preventDefault();
				self.edit($(this).attr('href'));
			});

			$('body').on('click', '.add-local', function(e){
				self.Local.add(this);
			});

			$('body').on('click', '.save-local', function(e){
				self.Local.save(this);
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