<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário de Renda Mensal</title>
    <link rel="stylesheet" href="form1.css">
    <script>
        function handleFormChoice() {
            const form = document.getElementById('rendaForm');
            const novoCadastro = document.getElementById('novoCadastro');
            const atualizacao = document.getElementById('atualizacao');

            if (atualizacao.checked) {
                // Reiniciar o formulário
                form.reset();
                alert('Formulário reiniciado para atualização.');
            }
        }
        </script>
</head>
<body>

    <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
    <?php include '../Basis/Main.php'; ?>
    <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->

    <!--Fazer o usuario prencher todos os campos, obrigatoriamente-->
    <h1>Questionário sobre sua Renda Mensal</h1>
    <p>Seja Verdadeiro em suas respostas!</p>
    <br>
    <div class="Container" id="Container">
        <div class="form-container renda-mensal">
            
            <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
            <!-- <form id="rendaForm" onsubmit="return handleFormChoice();"> -->

            <form id="rendaForm" action='form2.php' method="post">
            <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->


            <!-- 0. Escolha do Tipo de Cadastro -->
            <fieldset>
                <legend>Escolha o tipo de cadastro</legend>
                <label>
                    <input type="radio" name="tipo_cadastro" id="novoCadastro" value="novo" checked>
                    Novo Cadastro
                </label><br>
                <label>
                    <input type="radio" name="tipo_cadastro" id="atualizacao" value="atualizacao">
                    Atualização
                </label><br>
            </fieldset>
            
            <br>

            <!-- 1. Renda Principal -->
            <fieldset>
                <legend>1. Renda Principal</legend>
                <label><input type="checkbox" name="renda_principal" value="salario_fixo"> Salário fixo de emprego formal:</label> 
                <input type="text" name="salario_fixo_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_principal" value="salario_variavel"> Salário variável (comissões, bônus):</label> 
                <input type="text" name="salario_variavel_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_principal" value="autonomo"> Renda de trabalho autônomo ou freelancer:</label> 
                <input type="text" name="autonomo_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_principal" value="aposentadoria"> Renda de aposentadoria/pensão:</label> 
                <input type="text" name="aposentadoria_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_principal" value="outros"> Outros:</label> 
                <input type="text" name="outros_valor" placeholder="Especifique e insira o valor"><br>
            </fieldset>

            <br>

            <!-- 2. Renda Secundária -->
            <fieldset>
                
                <legend>2. Renda Secundária</legend>
                <label><input type="checkbox" name="renda_secundaria" value="aluguel"> Não possuo renda secundária</label> 
                <br>

                <label><input type="checkbox" name="renda_secundaria" value="aluguel"> Aluguel de imóveis:</label> 
                <input type="text" name="aluguel_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_secundaria" value="investimentos"> Renda de investimentos (dividendos, juros):</label> 
                <input type="text" name="investimentos_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_secundaria" value="extra"> Trabalho extra ou bicos:</label> 
                <input type="text" name="extra_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_secundaria" value="pensao"> Pensão alimentícia ou auxílio governamental:</label> 
                <input type="text" name="pensao_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="renda_secundaria" value="outros_secundaria"> Outros:</label> 
                <input type="text" name="outros_secundaria_valor" placeholder="Especifique e insira o valor"><br>
            </fieldset>

            <br>

            <!-- 3. Frequência da Renda -->
            <fieldset>
                <legend>3. Frequência da Renda</legend>
                <label><input type="checkbox" name="frequencia_renda" value="mensal"> Mensalmente</label><br>
                <label><input type="checkbox" name="frequencia_renda" value="quinzenal"> Quinzenalmente</label><br>
                <label><input type="checkbox" name="frequencia_renda" value="semanal"> Semanalmente</label><br>
                <label><input type="checkbox" name="frequencia_renda" value="diario"> Diariamente</label><br>
                <label><input type="checkbox" name="frequencia_renda" value="outras"> Outras:</label> 
                <input type="text" name="frequencia_renda_outras" placeholder="Especifique"><br>
            </fieldset>

            <br>

            <!-- 4. Impostos e Descontos -->
            <fieldset>
                <legend>4. Impostos e Descontos</legend>
                <label><input type="checkbox" name="descontos" value="inss"> INSS:</label> 
                <input type="text" name="inss_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="descontos" value="fgts"> FGTS:</label> 
                <input type="text" name="fgts_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="descontos" value="ir"> Imposto de Renda:</label> 
                <input type="text" name="ir_valor" placeholder="R$"><br>

                <label><input type="checkbox" name="descontos" value="outros"> Outros:</label> 
                <input type="text" name="outros_descontos_valor" placeholder="Especifique e insira o valor"><br>
            </fieldset>

            <br>

            <!-- 5. Total de Renda Mensal -->
             <!-- Este campo tem que ser calculado pela logica do PHP-->
            <fieldset>
                <legend>5. Total de Renda Mensal</legend>
                <label>Total de Renda Bruta:</label>
                <input type="text" name="renda_bruta" placeholder="R$"><br>

                <label>Total de Descontos:</label>
                <input type="text" name="total_descontos" placeholder="R$"><br>

                <label>Total de Renda Líquida (Renda Bruta - Descontos):</label>
                <input type="text" name="renda_liquida" placeholder="R$"><br>
            </fieldset>

            <br>

            <input type="submit" name="form1pform2" value="Enviar">
        </form>
    </div>
    </div>
</body>
</html>
