// Função JQuery para rodar o código ao iniciar o documento
$('document').ready(function(){
	// Pega a ID do botão e chamada essa função anônima
	$("#enviar").click(function(){
		// Pega os dados do formulário e transforma em JSON (estrutura de objeto)
		var data = $("#formContato").serialize();
		$.ajax({
			type : 'POST',
			// Arquivo onde a ação de validação dos campos acontece
			url  : 'actions/action.php',
			data : data,
			dataType: 'json',
			// Antes de enviar os dados, altera o texto do botão para Validando...
			beforeSend: function()
			{	
				$("#enviar").html('Entrando');
			},
			// Caso a validação dê certo, realiza a ação do if
			success :  function(response){						
				if(response == 1){	
                    alert("Entrou");
                    $("#enviar").html('Entrou');
				}
				// Caso a validação dê errado, exibe esse alerta
				else{			
                    alert("Login / senha inválidos");
				}
		    }
		});
	});
 
});