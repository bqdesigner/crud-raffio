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

const allMsgErro = document.querySelectorAll('#msgErro');

// Validando nome
const inputNome = document.getElementById('nome').onblur = function() {
	const expression = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
	const regex = new RegExp(expression);
	const inputNomeValue = this.value;
	if (!inputNomeValue.match(regex) || inputNomeValue < 3) { 
		allMsgErro[0].innerText = "Nome inválido. Insira um novo nome.";
		allMsgErro[0].classList.add('msgErro');
		this.classList.add('border-erro');
        return false;
    } else {
		allMsgErro[0].innerText = "";
		allMsgErro[0].classList.remove('msgErro');
		this.classList.remove('border-erro');
		return true;
	}
}

// Validando usuário
const inputUsuario = document.getElementById('novo-usuario').onblur = function() {
    if (this.value.length <= 5 || this.value == '') {
        allMsgErro[1].innerText = "Nome de usuário muito curto. Mínimo 5 caracteres";
		allMsgErro[1].classList.add('msgErro');
		this.classList.add('border-erro');
        return false;
    } 
    else
		allMsgErro[1].innerText = "";
		allMsgErro[1].classList.remove('msgErro');
		this.classList.remove('border-erro');
		return true;
}

 // Validando email
const inputEmail = document.getElementById('novo-email').onblur = function() {
    const expression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const regex = new RegExp(expression);
    const inputEmailValue = this.value;
    if (!inputEmailValue.match(regex)) { 
		allMsgErro[2].innerText = "E-mail inválido. Insira um novo e-mail.";
		allMsgErro[2].classList.add('msgErro');
		this.classList.add('border-erro');
        return false;
    } else {
		allMsgErro[2].innerText = "";
		allMsgErro[2].classList.remove('msgErro');
		this.classList.remove('border-erro');
		return true;
	}
};

// Validando senha
const inputSenha = document.getElementById('nova-senha').onblur = function() {
    if (this.value == '') {
        allMsgErro[3].innerText = "Campo vazio. Informe uma senha.";
		allMsgErro[3].classList.add('msgErro');
		this.classList.add('border-erro');
        return false;
    } 
    else
		allMsgErro[3].innerText = "";
		allMsgErro[3].classList.remove('msgErro');
		this.classList.remove('border-erro');
		return true;
}