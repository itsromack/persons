$(document).ready(function(){
	$( "#birthdate" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$( "#edit-birthdate" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});

	$('.delete-person').click(function(){
		var id = $(this).data('id');
		$('#delete-person').data('id', id);
	});

	$('#delete-person').click(function(){
		var id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/romack/delete.php',
			data: {
				id: id
			},
			method: 'POST',
			success: function(response) {
				setTimeout(100);
			}
		});
		$('#confirmDeleteModal').modal('hide');
		window.location.reload();
	});

	$('#create-person').click(function(){
		$.ajax({
			url: 'http://localhost/romack/add.php',
			data: {
				firstName: $('#firstName').val(),
				lastName: $('#lastName').val(),
				birthdate: $('#birthdate').val(),
				gender: ($('#gender-M').prop('checked')) ? 'M' : 'F',
				homeAddress: $('#homeAddress').val(),
			},
			method: 'POST',
			success: function(response) {
				setTimeout(100);
			}
		});
		$('#addPersonModal').modal('hide');
		window.location.reload();
	});

	$('.add-person').click(function(){
		$('#firstName').val('');
		$('#lastName').val('');
		$('#birthdate').val('');
		$('#gender-M').prop('checked', true);
		$('#homeAddress').val('');
	});

	$('.edit-person').click(function(){
		var id = $(this).data('id');
		$('#save-changes-person').data('id', id);
		$.ajax({
			url: 'http://localhost/romack/get.php',
			data: {
				id: id
			},
			dataType: 'JSON',
			method: 'POST',
			success: function(response) {
				if (response.status) {
					$('#edit-firstName').val(response.person.firstName);
					$('#edit-lastName').val(response.person.lastName);
					$('#edit-birthdate').val(response.person.birthdate);
					if (response.person.gender == 'Male') {
						$('#edit-gender-M').prop('checked', true);
					} else if (response.person.gender == 'Female') {
						$('#edit-gender-F').prop('checked', true);
					}
					$('#edit-homeAddress').val(response.person.homeAddress);
				}
			},
			error: function(error) {
				console.log(error);
			}
		});
		$('#confirmDeleteModal').modal('hide');
	});

	$('#save-changes-person').click(function(){
		$.ajax({
			url: 'http://localhost/romack/update.php',
			data: {
				id: $('#save-changes-person').data('id'),
				firstName: $('#edit-firstName').val(),
				lastName: $('#edit-lastName').val(),
				birthdate: $('#edit-birthdate').val(),
				gender: ($('#edit-gender-M').prop('checked')) ? 'M' : 'F',
				homeAddress: $('#edit-homeAddress').val(),
			},
			method: 'POST',
			success: function(response) {
				if (response.status) {
					setTimeout(100);
				}
			}
		});
		$('#editPersonModal').modal('hide');
		window.location.reload();
	});
});
