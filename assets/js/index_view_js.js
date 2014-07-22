$(document).ready(function(){
	$(document).on('submit', '#create_note_form', function(){
		$.post($(this).attr('action'),
			$(this).serialize(),
			function(data){
				$('.error').remove();
				if(data.createflag == false) {
					$('#create_note_form').prepend(data.errors);
				} else {
					$('#notes_wrapper').append(display_ajax_note(data.note_id, data.title, data.description));
				}
			}, 'json');
		this.reset();
		return false;
	})

	$(document).on('submit', '.noteWrapper', function(){
		$.post($(this).attr('action'),
			$(this).serialize(),
			function(data){
				$('.error').remove();
				if(data.updateflag == false) {
					$('#update_errors').prepend(data.errors);
				} 
			}, 'json');
		return false;
	})

	$(document).on('click', '.title', function(){
		$(this).removeAttr('readonly');
		$(this).attr('id', 'update');
	})

	$(document).on('focusout', '#update', function(){
		$(this).parent().submit();
		$(this).removeAttr('id');
		if(!$(this).val()) {
			$(this).attr('placeholder', 'Please add a Title');
		} else {
			$(this).removeAttr('placeholder');
			$(this).attr('readonly', 'readonly');
		}
	})

	$(document).on('click', '.description', function(){
		$(this).removeAttr('readonly');
		$(this).attr('id', 'updateDesc');
	})

	$(document).on('focusout', '#updateDesc', function(){
		$(this).parent().submit();
		$(this).removeAttr('id');
		if(!$(this).val()) {
			$(this).attr('placeholder', 'add a note description');
		} else {
			$(this).removeAttr('placeholder');
			$(this).attr('readonly', 'readonly');
		}
	})

	$(document).on('click', '.delete_button', function(){
		var temp = $(this);
		$.get($(this).attr('href'),
			function(data){
				temp.parent().parent().parent().remove();
			})
		return false;
	})

	function display_ajax_note(id, title, description) {
		var content = '';
		var text = '';
		if(description != null) {
			var text = "<textarea class='col-sm-10 description' noteId='"+id+"' name='description' readonly>"+description+"</textarea>";
		} else {
			var text = "<textarea class='col-sm-10 description' noteId='"+id+"' name='description' placeholder='add a note description'></textarea>";
		};
		content += "<div class='row'>"+
			"<div class='col-sm-12'>"+
				"<form class='noteWrapper' role='form' action='/notes/process_update' method='post'>"+
					"<div class='row'>"+
						"<div class='col-sm-10'>"+
							"<div class='form-group'>"+
								"<input type='hidden' name='note_id' value='"+id+"'>"+
								"<input class='title' name='title' value='"+title+"' readonly>"+
							"</div>"+
						"</div>"+
						"<div class='col-sm-2'>"+
							"<a class='delete_button' href='/notes/delete_note/"+id+"'>delete</a>"+
						"</div>"+
					"</div>"+
					"<div class='row'>"+
						"<div class='col-sm-12'>"+
							"<div class='form-group'>"+
								text+
							"</div>"+
						"</div>"+
					"</div>"+
				"</form>"+
			"</div>"+
		"</div>"
		return content;
	};
})