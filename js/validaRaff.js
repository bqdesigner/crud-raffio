// Inserindo o caminho da imagem dentro uma label
const btnUpload = document.getElementById('imagem_proj');
function exibeNome(e) {
    const spanImage = document.querySelector('.nome-imagem');
    const nameImage = e.target.files[0].name;
    spanImage.innerText = nameImage;
    // console.log();
}   
btnUpload.addEventListener('change', exibeNome);

// Validando o envio do Raff
// document.getElementById('desc_proj').onblur = function() {
//     // e.preventDefault();
//     const desc = document.getElementById('desc_proj');
//     if (desc.length < 2) {
//         alert("Ideia curta.");
//     }
// }