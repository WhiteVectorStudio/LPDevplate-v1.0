$(function() {
	$('.status').on('click', function() {
		var $this = $(this),
			itemId = $this.attr('id'),
			deletedParent = $this.closest('tr'),
			statusChange,
			message;

		if($this.hasClass('delete')){
			statusChange = 0;
			message = "Вы уверены что хотите скрыть эту заявку?";
		}else{
			statusChange = 1;
			message = "Вы уверены что хотите показать эту заявку?";
		}

		if(confirm(message)){
			$.ajax({
				type: 'POST',
				url: 'changestatus.php',
				data: { 
					id : itemId,
					status : statusChange
				},
				success: function(data) {
					deletedParent.remove();
				}
			});
		}
	});
});