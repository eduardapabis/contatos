$(function() {
	$('.modal_ajax').on('click', function(e) {
		e.preventDefault(); //nao permite acessar diretamente o adicionar.php
		$('.modal').html('Carregando...');
		$('.modal_bg').show(); //mostra modal 
		var link = $(this).attr('href'); //puxa o link do adicionar

		$.ajax({ //carrega por ajax
			url:link,
			type:'GET',
			success:function(html) {
				$('.modal').html(html);
			}
		});
	});
});