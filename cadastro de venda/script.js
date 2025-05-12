document.addEventListener('DOMContentLoaded', function() {

    // Função para preencher automaticamente os campos de preço total de vendas
    const quantidadeInput = document.querySelector('#quantidade');
    const precoInput = document.querySelector('#preco');
    const totalInput = document.querySelector('#total');

    if (quantidadeInput && precoInput && totalInput) {
        quantidadeInput.addEventListener('input', function() {
            let quantidade = parseFloat(quantidadeInput.value);
            let preco = parseFloat(precoInput.value);
            if (!isNaN(quantidade) && !isNaN(preco)) {
                totalInput.value = (quantidade * preco).toFixed(2); // Calcula o valor total
            }
        });
    }

    // Função para preencher o select de produtos com dados do banco (simulação)
    const selectProduto = document.querySelector('#produto');
    if (selectProduto) {
        // Simulação de dados de produtos, substitua com dados reais do seu banco
        const produtos = [
            { id: 1, nome: 'Produto A', preco: 10.00 },
            { id: 2, nome: 'Produto B', preco: 20.00 },
            { id: 3, nome: 'Produto C', preco: 30.00 }
        ];

        produtos.forEach(produto => {
            const option = document.createElement('option');
            option.value = produto.id;
            option.textContent = `${produto.nome} - R$ ${produto.preco.toFixed(2)}`;
            selectProduto.appendChild(option);
        });

        // Atualiza o preço do produto ao selecionar no select
        selectProduto.addEventListener('change', function() {
            const produtoSelecionado = produtos.find(produto => produto.id == selectProduto.value);
            if (produtoSelecionado) {
                precoInput.value = produtoSelecionado.preco.toFixed(2); // Atualiza o preço
                totalInput.value = (parseFloat(quantidadeInput.value) * produtoSelecionado.preco).toFixed(2); // Atualiza o total
            }
        });
    }

    // Função para enviar dados via AJAX para salvar uma venda
    const formVenda = document.querySelector('#form-venda');
    if (formVenda) {
        formVenda.addEventListener('submit', function(event) {
            event.preventDefault();  // Previne o envio normal do formulário

            const formData = new FormData(formVenda);

            fetch('salvar_venda.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.sucesso) {
                    alert('Venda realizada com sucesso!');
                    formVenda.reset(); // Reseta o formulário
                } else {
                    alert('Erro ao realizar a venda.');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Ocorreu um erro. Tente novamente.');
            });
        });
    }

    // Função para alterar o estilo da tabela de produtos, por exemplo, alternando a cor das linhas
    const tabelaProdutos = document.querySelector('#tabela-produtos');
    if (tabelaProdutos) {
        const linhas = tabelaProdutos.querySelectorAll('tr');
        linhas.forEach((linha, index) => {
            if (index % 2 == 0) {
                linha.style.backgroundColor = '#f2f2f2'; // Linhas pares com fundo claro
            }
            linha.addEventListener('mouseover', function() {
                linha.style.backgroundColor = '#ddd'; // Muda a cor quando o mouse passa
            });
            linha.addEventListener('mouseout', function() {
                if (index % 2 == 0) {
                    linha.style.backgroundColor = '#f2f2f2'; // Restaura a cor de fundo
                } else {
                    linha.style.backgroundColor = '#fff'; // Restaura a cor de fundo
                }
            });
        });
    }

    // Função para confirmar a exclusão de um item (exemplo de segurança)
    const btnExcluir = document.querySelectorAll('.btn-excluir');
    btnExcluir.forEach(btn => {
        btn.addEventListener('click', function(event) {
            const confirmar = confirm('Tem certeza de que deseja excluir este item?');
            if (!confirmar) {
                event.preventDefault(); // Impede a ação se o usuário cancelar
            }
        });
    });

});
