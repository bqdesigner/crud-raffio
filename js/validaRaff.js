// Validando o envio do Raff
const desc = document.getElementById('desc_proj').onblur = function() {
    if (this.value.length <= 3 || this.value == '') {
        alert("Ideia curta.");
        this.classList.add('border-erro');
    } 
    else
        this.classList.remove('border-erro');
}

// Inserindo o caminho da imagem dentro uma label
const btnUpload = document.getElementById('imagem_proj');
function exibeNome(e) {
    const spanImage = document.querySelector('.nome-imagem');
    const nameImage = e.target.files[0].name;
    spanImage.innerText = nameImage;
}   
btnUpload.addEventListener('change', exibeNome);

// Validando campo referência
const inputRef = document.getElementById('ref_proj').onblur = function() {
    const expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
    const regex = new RegExp(expression);
    const inputRefValue = document.getElementById('ref_proj').value;
    if (!inputRefValue.match(regex)) {
        alert("Referência inválida");
        return false;
    }
};

// Validando email
const inputEmail = document.getElementById('email_proj').onblur = function() {
    const expression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const regex = new RegExp(expression);
    const inputEmailValue = document.getElementById('email_proj').value;
    if (!inputEmailValue.match(regex)) {
        alert("E-mail inválido");
        return false;
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
