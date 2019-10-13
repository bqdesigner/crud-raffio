 // Ajax ao cadastrar
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
			else {
				$('.msg-success').removeAttr("style");
				$('#entrar-btn').click();
				$('#usuario').val($('#novo-usuario').val()); 
				$('#senha').focus();
				$(':input', '#formContatoCadastrar').not(':button, :submit, :reset, :hidden').val('');
			}
		}
	});
	return false;
 }

  // Ajax ao logar
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

 // Validando email
const inputEmail = document.getElementById('novo-email').onblur = function() {
    const expression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const regex = new RegExp(expression);
    const inputEmailValue = document.getElementById('novo-email').value;
    if (!inputEmailValue.match(regex)) { 
		document.querySelector('.msgErro').innerText = "Erro";
		document.getElementById('novo-email').classList.add('border-erro');
        return false;
    } else {
		document.querySelector('.msgErro').innerText = "";
		document.getElementById('novo-email').classList.remove('border-erro');
		return true;
	}
};