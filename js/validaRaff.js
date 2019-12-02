// Pegando todas as divs de erro
const allMsgErro = document.querySelectorAll('#msgErro');

// Validando nome do projeto
document.getElementById('nome_raff_proj').onblur = function() {
    if (this.value.length <= 3 || this.value == '') {
        allMsgErro[0].innerText = "Nome do Raff inválido ou curto. ";
		allMsgErro[0].classList.add('msgErro');
        this.classList.add('border-erro');
        steps[0] = 0;
        progress();
        return false;
    } 
    else
        allMsgErro[0].innerText = "";
        allMsgErro[0].classList.remove('msgErro');
        this.classList.remove('border-erro');  
        steps[0] = 1;
        progress();
        return true;
}

// Validando a descrição ideia Raff
document.getElementById('desc_proj').onblur = function() {
    if (this.value.length <= 3 || this.value == '') {
        allMsgErro[1].innerText = "Descrição inválida ou muito curta.";
		allMsgErro[1].classList.add('msgErro');
        this.classList.add('border-erro');
        steps[2] = 0;
        progress();
        return false;
    } 
    else
        allMsgErro[1].innerText = "";
        allMsgErro[1].classList.remove('msgErro');
        this.classList.remove('border-erro');  
        steps[2] = 1;
        progress();
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
        steps[3] = 0;
        progress();
        return false;
    } else {
		allMsgErro[2].innerText = "";
		allMsgErro[2].classList.remove('msgErro');
        this.classList.remove('border-erro'); 
        steps[3] = 1;
        progress();
		return true;
	}
};


// Inserindo o caminho da imagem dentro uma label
// const btnUpload = document.getElementById('imagem_proj');
// function exibeNome(e) {
//     const spanImage = document.querySelector('.nome-imagem');
//     const nameImage = e.target.files[0].name;
//     spanImage.innerText = nameImage;
// }   
// btnUpload.addEventListener('change', exibeNome);
const file = document.getElementById('imagem_proj').addEventListener('change', function() {
    var cURL = window.URL || window.webkitURL;
    var imgURL = cURL.createObjectURL(this.files[0]);
    var previewImage = document.getElementById('preview-image');
    if (imgURL == '') {
        previewImage.style.display = "none";
        console.log('sem imagem');
        steps[4] = 0;
        progress();
    }
    else {
        previewImage.innerHTML = '<img src="'+ imgURL +'" />';
        console.log('com imagem');
        steps[4] = 1;
        progress();
    }
})

// Validando considerações do Raff
document.getElementById('desc_consideracao_proj').onblur = function() {
    if (this.value.length <= 3 || this.value == '') {
        allMsgErro[3].innerText = "Consideração inválida ou muito curta.";
		allMsgErro[3].classList.add('msgErro');
        this.classList.add('border-erro');
        steps[5] = 0;
        progress();
        return false;
    } 
    else
        allMsgErro[3].innerText = "";
        allMsgErro[3].classList.remove('msgErro');
        this.classList.remove('border-erro');  
        steps[5] = 1;
        progress();
        return true;
}

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
        steps[6] = 0;
        progress();
        return false;
    } else {
		allMsgErro[4].innerText = "";
		allMsgErro[4].classList.remove('msgErro');
        this.classList.remove('border-erro');
        steps[6] = 1;
        progress();
		return true;
	}
};

const inputCateg = document.getElementById('categ_proj');
    inputCateg.onchange = function(){
        if(inputCateg.value == ""){
            steps[1] = 0;
        }else{
            steps[1] = 1;
        }
        
        progress();
    }

// Barra progresso
let steps = [0, 0, 0, 0, 0, 0, 0];
function progress() {
    let i = 0;
    steps.forEach((step)=>  {
        if (step) i++;
    });
    $(".update-raff").animate({width: i*14.28+"%"}, 650);
}