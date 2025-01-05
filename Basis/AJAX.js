// Função para lidar com o envio do formulário de cadastro
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Evita o recarregamento da página

    var formData = new FormData(this);  // Coleta os dados do formulário
    // Envia os dados via AJAX (usando fetch)
    fetch('Main.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Exibe a resposta do servidor
        document.getElementById('resultadoCadastro').innerHTML = data;
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});

// Função para lidar com o envio do formulário de login
document.getElementById('formLogin').addEventListener('submit', function(event) {
    event.preventDefault();  // Evita o recarregamento da página

    var formData = new FormData(this);  // Coleta os dados do formulário

    // Envia os dados via AJAX
    fetch('Main.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Exibe a resposta do servidor
        document.getElementById('resultadoLogin').innerHTML = data;
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});

// Função para fazer requisição GET e atualizar o gráfico de pizza
function atualizarGraficoViaGet() {
    fetch('Main.php?acao=obterDadosGrafico')  // Exemplo de requisição GET com parâmetro
    .then(response => response.json())  // Assumindo que os dados estão em JSON
    .then(dados => {
        // Supondo que 'dados' seja um array de porcentagens como [25, 25, 25, 25]
        atualizarGrafico(dados);
    })
    .catch(error => {
        console.error('Erro ao obter dados do gráfico:', error);
    });
}

// // Função que atualiza dinamicamente o gráfico de pizza
// function atualizarGrafico(dados) {
//     const porcentagem1 = dados[0];
//     const porcentagem2 = dados[1];
//     const porcentagem3 = dados[2];
//     const porcentagem4 = dados[3];
//     // Pode adicionar mais se for necessário

//     // Cria o gradiente com base nas porcentagens obtidas
//     const gradiente = `conic-gradient(
//         #f00 0% ${porcentagem1}%,
//         #0f0 ${porcentagem1}% ${porcentagem1 + porcentagem2}%,
//         #00f ${porcentagem1 + porcentagem2}% ${porcentagem1 + porcentagem2 + porcentagem3}%,
//         #ff0 ${porcentagem1 + porcentagem2 + porcentagem3}% 100%
//     )`;

//     document.querySelector('.pie-chart').style.background = gradiente;
// }

// Chama a função para buscar os dados e atualizar o gráfico assim que a página carrega
document.addEventListener('DOMContentLoaded', function() {
    atualizarGraficoViaGet();  // Chama a função para fazer a requisição e atualizar o gráfico
});

// Função que atualiza dinamicamente a tabela
function atualizarTabela(dados) {
    const categorias = ['Gastos', 'Renda', 'Reserva', 'Saldos'];  // Nome das categorias
    const tabelaBody = document.querySelector('#tabelaDados tbody');
    tabelaBody.innerHTML = '';  // Limpa o conteúdo da tabela

    // Preenche a tabela com os dados
    dados.forEach((valor, index) => {
        const linha = document.createElement('tr');
        const colunaCategoria = document.createElement('td');
        const colunaValor = document.createElement('td');
        
        colunaCategoria.textContent = categorias[index];
        colunaValor.textContent = valor + '%';
        
        linha.appendChild(colunaCategoria);
        linha.appendChild(colunaValor);
        tabelaBody.appendChild(linha);
    });
}