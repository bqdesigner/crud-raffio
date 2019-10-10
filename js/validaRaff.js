// Validando o envio do Raff
const desc = document.getElementById('desc_proj').onblur = function() {
    // e.preventDefault();
    if (this.value.length <= 3 || this.value == '') 
        alert("Ideia curta.");
}

// Inserindo o caminho da imagem dentro uma label
const btnUpload = document.getElementById('imagem_proj');
function exibeNome(e) {
    const spanImage = document.querySelector('.nome-imagem');
    const nameImage = e.target.files[0].name;
    spanImage.innerText = nameImage;
    // console.log();
}   
btnUpload.addEventListener('change', exibeNome);

