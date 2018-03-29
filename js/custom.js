jQuery(document).ready(function($){


	$('.close_modal, .overlay').click(function (){
		$('.popup, .popup2, .overlay').css({'opacity':'0', 'visibility':'hidden'});
		$('.popup > .fofm textarea').val('');
	
	});

	$('.open_modal').click(function (e){
		e.preventDefault();
		$('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
	});

	$(".fofm").submit(function() {
			var str = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "save_data.php",
			data: str,
			success: function(msg) {
				if(msg == 'ok') {
					$('.popup2, .overlay').css('opacity','1');
					$('.popup2, .overlay').css('visibility','visible');
					$('.popup').css({'opacity':'0','visibility':'hidden'});
				}
				else {
					$('.popup2 .window').html('<h5>Ошибка</h5><p>Сообщение не отправлено, убедитесь в правильности заполнение полей</p>');
					$('.popup2, .overlay').css('opacity','1');
					$('.popup2, .overlay').css('visibility','visible');
					$('.popup').css({'opacity':'0','visibility':'hidden'});
				}
			}
		});
		return false;
	});
	$('#btnexit').click(function(){
        $.post(
            "exit.php", 
            { myActionName: "Выполнить" } 
        );
    });
});