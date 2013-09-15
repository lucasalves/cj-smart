App.Notify = {
	prepend: function(html, $in){
		$($in).prepend(html);
	},

	errors: function(mensagens, $in) {
		if ($.isArray(mensagens)){
			for (var i = mensagens.length - 1; i >= 0; i--) {
				this.prepend(
					this.toHtml(mensagens[i], 'error'),
					$in
				);
			}
		}else{
			this.errors([mensagens], $in);
		}
	},

	toHtml: function(text, type){
		var html = '<div class="alert alert-' + type + '">';
				html += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				html += text;
			html += '</div>';

		return html
	},

	clear: function(type){
		var selector = type || 'alert';
		selector = '.' + selector;
		
		$(selector).fadeOut(300, function(){
			$(selector).remove();
		});
	}
}