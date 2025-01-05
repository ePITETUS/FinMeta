<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário de Gastos Fixos - FinMeta</title>
    <link rel="stylesheet" href="form3.css">
</head>
<body>

    <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
    <?php include '../Basis/Main.php'; ?>
    <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->
     
    <h1>Questionário de Gastos Fixos</h1>
    <p>Seja Verdadeiro em suas respostas!</p>
    <br>

    
    <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
    <!-- <form> -->
    <form action='form4.php' method="post">
    <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->

        <fieldset>
            <legend>1. Quais são seus gastos fixos ?</legend>
            <label><input type="checkbox" name="gastos" value="aluguel"> Aluguel ou prestação da casa</label> 
            <input type="text" name="aluguel_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="condominio"> Condomínio</label> 
            <input type="text" name="condominio_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="agua">Conta de Água</label> 
            <input type="text" name="agua_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="energia"> Energia elétrica</label> 
            <input type="text" name="energia_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="internet"> Internet</label> 
            <input type="text" name="internet_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="telefone"> Telefone</label> 
            <input type="text" name="telefone_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="transporte"> Transporte</label> 
            <input type="text" name="transporte_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="alimentacao"> Alimentação</label> 
            <input type="text" name="alimentacao_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="escola"> Mensalidade escolar ou faculdade</label> 
            <input type="text" name="escola_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="academia"> Academia</label> 
            <input type="text" name="academia_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="plano_saude"> Plano de saúde</label> 
            <input type="text" name="plano_saude_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="seguro_carro"> Seguro do carro</label> 
            <input type="text" name="seguro_carro_valor" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos" value="outros"> Outros:</label> 
            <input type="text" name="outros_valor" placeholder="Especifique e insira o valor"><br>
        </fieldset>

        <br>

        <!-- INICIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
        <!-- <input type="submit" value="Enviar"> -->
        <input type="submit" name="form3pform4" value="Enviar">
    <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->

    </form>

</body>
</html>