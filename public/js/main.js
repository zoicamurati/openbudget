$(function() {

	$('select[multiple].active.1col').multiselect({
	  columns: 1,
	  placeholder: 'Zgjidh Kategory',
	  search: true,
	  searchOptions: {
	      'default': 'Kerko Kategory'
	  },
	  selectAll: true
	});

});
$(function() {

	$('select[multiple].active.2col').multiselect({
	  columns: 1,
	  placeholder: 'Zgjidh Institucion',
	  search: true,
	  searchOptions: {
	      'default': 'Kerko Institucion'
	  },
	  selectAll: true
	});

});
