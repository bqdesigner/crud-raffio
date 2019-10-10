function outSideClick(element, events, callback) {
    const html = document.documentElement;
    const outside = 'data-outside';

    // Verificando se o elemento clicado tem o atributo data-outside, e caso tiver, não disparar o evento do clique
    if (!element.hasAttribute(outside)) {

        events.forEach(userEvent => {
            setTimeout(() => {
                html.addEventListener(userEvent, handleOutsideClick);
            }); 
        });

        element.setAttribute(outside, '');
    }

    // Função que dispara ao clicar fora do menu, impedindo diversas ações em EventListeners
    function handleOutsideClick(event) {
        if (!element.contains(event.target)) {
            element.removeAttribute(outside);
            events.forEach(userEvent => {
                html.removeEventListener(userEvent, handleOutsideClick);
            });
            callback();
        }
    }
}

function initModal() {
    // Pegando os botões que serão usados na interação do Modal
    const botaoAbrir = document.querySelector('[data-modal="abrir"]');
    const botaoFechar = document.querySelector('[data-modal="fechar"]');
    const containerModal = document.querySelector('[data-modal="container"]');

    // Verificando a existência dos elementos selecionados
    if (botaoAbrir && botaoFechar && containerModal) {
        function toggleModal(event){
            event.preventDefault();
            containerModal.classList.toggle('ativo');
        }

        function clicarForaModal(event) {
            if (event.target === this)
                toggleModal(event)
        }

        // Passando as funções para os botões
        botaoAbrir.addEventListener('click', toggleModal);
        botaoFechar.addEventListener('click', toggleModal);
        containerModal.addEventListener('click', clicarForaModal);
    }
}

window.onload = initModal();