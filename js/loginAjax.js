 function submitForm()
 {
	var data = $("#formContatoCadastrar").serialize();
	console.log(data);
	$.ajax({
		type : 'POST',
		url  : './actions/cadastrar.php',
		data : data,
		beforeSend: function()
		{
		console.log("Sending...")
		},
		success :  function(data)
		{
			console.log(data);
			data = JSON.parse(data);
			if(data.error){
			$('.msg-attention').removeAttr("style");
			}
			else
			{
			$('.msg-success').removeAttr("style");
			$('#entrar-btn').click();
			$('#usuario').val($('#novo-usuario').val()); 
			$('#senha').focus();
			}
		}
	});
	return false;
 }

 function validForm() {
	var data = $("#formContatoLogin").serialize();

	$.ajax({
		type : 'POST',
		url  : './actions/valid-login.php',
		data : data,
		beforeSend: function()
		{
		   console.log("Sending...")
		},
		success :  function(data)
		{
			console.log(data);
			data = JSON.parse(data);
			if(data.error){
			   $('.msg-danger').removeAttr("style");
			}else{
				window.location.href = data.redirect
			}
		}
	});
	return false;
 }