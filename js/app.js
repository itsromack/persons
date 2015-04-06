$(document).ready(function(){
	$('.edit-person').click(function(){
		var id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/romack/ajax/delete.php',
			data: {
				id: id
			},
			method: 'POST',
			success: function(response) {
				if (response.status == 'success') {
					console.log('deleted');
				} else {
					console.log('unable to delete person');
				}
			}
		});
	});
});