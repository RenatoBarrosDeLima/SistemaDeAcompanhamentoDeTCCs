$(document).ready(function(){
	comeca();
})

	var timerI = null;
	var timerR = false;

	function para(){
		if(timerR)
			clearTimeout(timerI);
			timerR = false;
	}

	function comeca(){
		para();
		lista();
	}

	function lista(){
		$.ajax({
			url:"paginas/sys/lista.php",
			success: function(textStatus){
				$("#lista").html(textStatus); //Mostra o resultado da página lista.php
			}
		})
		timerI = setTimeout("lista()", 3000); //Tempo de espera para atualizar novamente
		timerR = true;
	}