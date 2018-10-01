$(document).ready(function(){

	$('body, html').on('click', '.checkall', function(e){
		var table = $(e.target).closest('table');
		$('td input:checkbox',table).prop('checked',this.checked);
	})

});