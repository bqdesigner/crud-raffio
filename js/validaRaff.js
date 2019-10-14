// Pegando todas as divs de erro
const allMsgErro = document.querySelectorAll('#msgErro');


// Inserindo o caminho da imagem dentro uma label
const btnUpload = document.getElementById('imagem_proj');
function exibeNome(e) {
    const spanImage = document.querySelector('.nome-imagem');
    const nameImage = e.target.files[0].name;
    spanImage.innerText = nameImage;
}   
btnUpload.addEventListener('change', exibeNome);

// Validando a descrição ideia Raff
const desc = document.getElementById('desc_proj').onblur = function() {
    if (this.value.length <= 3 || this.value == '') {
        allMsgErro[1].innerText = "Descrição inválida ou muito curta.";
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

// Validando campo referência
const inputRef = document.getElementById('ref_proj');
inputRef.onblur = function() {
    const expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
    const regex = new RegExp(expression);
    const inputRefValue = this.value;
    if (!inputRefValue.match(regex)) { 
		allMsgErro[2].innerText = "Link inválido. Insira uma nova URL.";
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

// Validando email
const inputEmail = document.getElementById('email_proj');
inputEmail.onblur = function() {
    const expression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const regex = new RegExp(expression);
    const inputEmailValue = this.value;
    if (!inputEmailValue.match(regex)) { 
		allMsgErro[4].innerText = "E-mail inválido. Insira um novo e-mail.";
		allMsgErro[4].classList.add('msgErro');
		this.classList.add('border-erro');
        return false;
    } else {
		allMsgErro[4].innerText = "";
		allMsgErro[4].classList.remove('msgErro');
		this.classList.remove('border-erro');
		return true;
	}
};


// function validaEmail(inputEmail) {
//     const expression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     const regex = new RegExp(expression);
//     const inputEmailValue = document.getElementById(inputEmail).value;
//     if (!inputEmailValue.match(regex)) {
//         alert("E-mail inválido");
//         return false;
//     }
//     return true;
// };

// const input = document.getElementById('email_proj');
// input.addEventListener('blur', validaEmail(input));
