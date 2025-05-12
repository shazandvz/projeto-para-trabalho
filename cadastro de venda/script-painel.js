// Espera o carregamento completo da página
document.addEventListener('DOMContentLoaded', function() {

    // Função para exibir alertas no painel
    function exibirAlerta(mensagem, tipo) {
        let alerta = document.createElement('div');
        alerta.classList.add('alerta');
        alerta.classList.add(tipo); // 'sucesso' ou 'erro'
        alerta.innerText = mensagem;
        document.body.appendChild(alerta);
        
        // Remove o alerta após 3 segundos
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }

    // Função para mostrar/ocultar o menu lateral
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    if (menuToggle && menu) {
        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('aberto');
        });
    }

    // Validação simples de formulário de cadastro de vendas
    const formVenda = document.querySelector('#form-venda');
    if (formVenda) {
        formVenda.addEventListener('submit', function(event) {
            const quantidade = document.querySelector('#quantidade');
            if (quantidade && quantidade.value <= 0) {
                event.preventDefault();
                exibirAlerta('A quantidade deve ser maior que 0', 'erro');
            }
        });
    }

    // Função para mostrar informações adicionais ao passar o mouse sobre produtos
    const produtos = document.querySelectorAll('.produto');
    produtos.forEach(produto => {
        produto.addEventListener('mouseover', function() {
            const preco = produto.querySelector('.preco');
            if (preco) {
                preco.style.display = 'block';
            }
        });

        produto.addEventListener('mouseout', function() {
            const preco = produto.querySelector('.preco');
            if (preco) {
                preco.style.display = 'none';
            }
        });
    });

    // Exemplo de função para redirecionamento com confirmação
    const btnLogout = document.querySelector('#logout');
    if (btnLogout) {
        btnLogout.addEventListener('click', function(event) {
            const confirmar = confirm('Você tem certeza que deseja sair?');
            if (!confirmar) {
                event.preventDefault();
            }
        });
    }

});
