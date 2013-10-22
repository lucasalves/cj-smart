var Local = function(){
	this.add = function(data, addListerEvent){
		App.Request.post('local/add_ajax', data, $('.local'), addListerEvent, 'json');
	};
};