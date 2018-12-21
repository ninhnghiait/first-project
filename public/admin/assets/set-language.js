$('#set-language').change(function() {
	$.ajax({
		url: '/admin/set-language',
		type: 'GET',
		data: {
			lang: $(this).val()
		}
	}).done(function() {
		window.location.reload();
	});
	return false;
});