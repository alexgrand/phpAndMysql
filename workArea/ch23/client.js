
$(function () {
	pollServer();
	$('button').click(function () {
		$(this).toggleClass('active');
	});
});

var html = document.querySelector('html');

var pollServer = function () {
	$.get('chat.php',function (result) {
		if (!result.success) {
			console.log('Error polling server for new messages!');
			return;
		}

		$.each(result.messages,function (idx) {
			var chatBubble;

			if (this.sent_by == 'self') {
				chatBubble = $('<div class="row bubble-sent pull-right">'+this.message+'</div><div class="clearfix"</div>');
			} else {
				chatBubble = $('<div class="row bubble-recv">'+this.message+'</div><div class="clearfix"></div>');
			};

			$('#chatPanel').append(chatBubble);
		});
		setTimeout(pollServer,1000);
	});
}

var sendServer = function () {
	var message = $('#chatMessage').val();

	$.post('chat.php', {
		'message' : message
	}, function (result) {
		$('#sendMessageBtn').toggleClass('active');

		if (!result.success) {
			alert('There was an error sending your message');
		} else {
			console.log('Message sent!');
			$('#chatMessage').val('');
		}
	});
}

$('#sendMessageBtn').on('click',function (e) {
	e.preventDefault();
	sendServer();
});

 html.addEventListener('keydown', function (e) {
 	if (e.key === 'Enter') {
 		sendServer();
 	}
 });