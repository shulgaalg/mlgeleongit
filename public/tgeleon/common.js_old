$(document).ready(function() {

	$("form").submit(function() {
		$.ajax({
			type: "POST",
			url: "/rest.php",
			data: $(this).serialize()
		}).done(function() {
		    $('form').get(0).reset();
		    $('form').get(1).reset();
		    $('form').get(2).reset();
		    $('form').get(3).reset();
		    $('form').get(4).reset();
		    $('form').get(5).reset();
		    
			alert("Спасибо за заявку!");
		});
		return false;
	});

});
