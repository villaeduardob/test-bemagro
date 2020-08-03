$(document).ready(function() {

	if (document.getElementById('formLogin') !== null) 
	{
		var formName = $('#formLogin');

		// validação formulário
		formName.validate({
			ignore: '',
			rules: {
				email: {
					required:	true,
					email:		true
				},
				password:		'required'
			},
			messages: {
				email: {
					required:	'O campo e-mail é obrigatório',
					email:		'E-mail informado inválido',
				},
				password:		'O campo senha é obrigatório'
			},
			showErrors: function(errorMap, errorList) {
				if (errorList.length) {
					$('div#message').removeClass().addClass('alert alert-danger').html(errorList[0].message).show();
				}
			},
			submitHandler: function(form) {

				$('button#btnForm').prop('disabled', true);

				var action = formName.attr('action');
				$.ajax({
					type:		'POST',
					dataType:	'json',
					url:		action,
					data:		formName.serialize(),
					success: function(data, textStatus, xhr) {

						formName[0].reset();

						$('div#message').removeClass().addClass('alert alert-success').html(xhr.responseJSON.message).show();
						setTimeout(function(){
							$('div#message').html('').hide();
							window.location = xhr.responseJSON.redirect;
						}, 1800);

					},
					error: function(xhr, textStatus) {

						$('div#message').removeClass().addClass('alert alert-danger').html(xhr.responseJSON.message).show();
						setTimeout(function(){ $('div#message').html('').hide(); }, 3000);

						$('button#btnForm').prop('disabled', false);

					}
				});

				return false;

			}
		});
	}


	if (document.getElementById('createForm') !== null) 
	{
		var formName = $('#createForm');

		// validação formulário
		formName.validate({
			ignore: '',
			rules: {
				email: {
					required:	true,
					email:		true
				},
				username:		'required',
				password:		'required',
			},
			messages: {
				email: {
					required:	'O campo e-mail é obrigatório',
					email:		'E-mail informado inválido',
				},
				username:		'O campo usuário é obrigatório',
				password:		'O campo senha é obrigatório',
			},
			showErrors: function(errorMap, errorList) {
				if (errorList.length) {
					$('div#message').removeClass().addClass('alert alert-danger').html(errorList[0].message).show();
				}
			},
			submitHandler: function(form) {

				$('button#btnForm').prop('disabled', true);

				var action = formName.attr('action');
				$.ajax({
					type:		'POST',
					dataType:	'json',
					url:		action,
					data:		formName.serialize(),
					success: function(data, textStatus, xhr) {

						formName[0].reset();

						$('div#message').removeClass().addClass('alert alert-success').html(xhr.responseJSON.message).show();
						setTimeout(function(){
							$('div#message').html('').hide();
							window.location = xhr.responseJSON.redirect;
						}, 1800);

					},
					error: function(xhr, textStatus) {

						$('div#message').removeClass().addClass('alert alert-danger').html(xhr.responseJSON.message).show();
						setTimeout(function(){ $('div#message').html('').hide(); }, 3000);

						$('button#btnForm').prop('disabled', false);

					}
				});

				return false;

			}
		});
	}


	if (document.getElementById('editForm') !== null) 
	{
		var formName = $('#editForm');

		// validação formulário
		formName.validate({
			ignore: '',
			rules: {
				email: {
					required:	true,
					email:		true
				},
				username:		'required',
				password:		'required',
			},
			messages: {
				email: {
					required:	'O campo e-mail é obrigatório',
					email:		'E-mail informado inválido',
				},
				username:		'O campo usuário é obrigatório',
				password:		'O campo senha é obrigatório',
			},
			showErrors: function(errorMap, errorList) {
				if (errorList.length) {
					$('div#message').removeClass().addClass('alert alert-danger').html(errorList[0].message).show();
				}
			},
			submitHandler: function(form) {

				$('button#btnForm').prop('disabled', true);

				var action = formName.attr('action');
				$.ajax({
					type:		'POST',
					dataType:	'json',
					url:		action,
					data:		formName.serialize(),
					success: function(data, textStatus, xhr) {

						formName[0].reset();

						$('div#message').removeClass().addClass('alert alert-success').html(xhr.responseJSON.message).show();
						setTimeout(function(){
							$('div#message').html('').hide();
							window.location = xhr.responseJSON.redirect;
						}, 1800);

					},
					error: function(xhr, textStatus) {

						$('div#message').removeClass().addClass('alert alert-danger').html(xhr.responseJSON.message).show();
						setTimeout(function(){ $('div#message').html('').hide(); }, 3000);

						$('button#btnForm').prop('disabled', false);

					}
				});

				return false;

			}
		});
	}

});