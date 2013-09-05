App.Request = {
	options: {
		type: 'get',
		url: ajaxurl,
		dataType: 'html'
	},

	get: function(url, sel, addListenerEvent, dataType){
		var options 	 = this.options;
		options.success  = addListenerEvent;
		options.url  	 += url;
		options.type  	 += 'get';
		options.dataType = dataType || 'html';
		options.beforeSend = function(sel){
				App.AjaxLoad.show(sel);
		};
		options.complete = function(sel){
			App.AjaxLoad.hide(sel);
		};

		this.exec(options);
	},

	post: function(url, data, sel, addListenerEvent, dataType){
		var options 	 = this.options;
		options.success  = addListenerEvent;
		options.url  	 += url;
		options.type  	 += 'post';
		options.dataType = dataType || 'html';
		options.data 	 = data;
		options.beforeSend = function(sel){
				App.AjaxLoad.show(sel);
		};
		options.complete = function(sel){
			App.AjaxLoad.hide(sel);
		};

		this.exec(options);
	},

	exec: function(options){
		$.ajax(options);
	}
};