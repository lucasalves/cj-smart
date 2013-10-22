var Aula = function(){
	var self = this;

	this.is_valid = false;

	this.isValid = function(data){
		App.Request.post('aula/is_valid', data, $('.aula'), function(response){
			self.is_valid = response.status;

			console.log(self.is_valid);
			if(response.status){
				$('.aula-form #UsuarioAddForm').submit();
			}else{
				 App.Notify.errors(response.errors, $('.aula-form'));
				 setTimeout(function(){
				 	App.Notify.clear();
				 }, 5000);
			}

		}, 'json');

	};

	//AddListenerEvent
	(function(){
		$('body').on('submit', '.aula-form #UsuarioAddForm', function(e){			
			if(!self.is_valid){
				e.preventDefault();
				self.isValid($(".aula-form #UsuarioAddForm").serialize());
			}

		});
	}());
};

$(document).ready(function(){
	if($('#calendar-aula').length){
		var aul = new Aula;
	}
});