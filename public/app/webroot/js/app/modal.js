App.Modal = {
	html: null,

	listeners: function(){
		$('#modal-default').on('hidden', function () {
			$('#modal-default').off();
			$('#modal-default').remove();
		});
	},

	request: function(callback){
		var self = this;

		var url = ajaxurl + 'utility/modal';

		if(!self.html){
			$.get(url, function(html){
				self.html = html;
				callback(html);
			})
		}else{
			callback(self.html);
		}
	},

	add: function(html, open, after){
		var self = this;
		
		this.request(function(modal){
			if(!$('#modal-default .modal-body').length){
				$('body').append(modal);				
			}

			$('#modal-default .modal-body').html(html);
			if(after){
				after();
			}
			if(open){
				self.open();
				self.listeners();
			}
		});		
	},

	open: function(){
		$('#modal-default').modal();
		return this;
	},

	close: function(){
		$('#modal-default').modal('hide');
		return this;
	}
};