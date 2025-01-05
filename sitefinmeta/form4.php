<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form4.css">
    <title>Questionário de Gastos Não Essenciais</title>
    
</head>
<body>

    <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
    <?php include '../Basis/Main.php';
     ?>
    <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->
     
    <h1>Questionário sobre Gastos Não Essenciais</h1>
    <p>Seja Verdadeiro em suas respostas!</p>
    <br>

    <form action="login.php" method="post">
        <fieldset>
            <legend>Gastos com Lazer</legend>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="restaurantes"> Restaurantes e bares</label> 
            <input type="text" name="valor_restaurantes" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="cinema_teatro"> Cinema e teatro</label> 
            <input type="text" name="valor_cinema_teatro" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="viagens"> Viagens</label> 
            <input type="text" name="valor_viagens" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="eventos"> Eventos e shows</label> 
            <input type="text" name="valor_eventos" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="outros_lazer"> Outros gastos com lazer</label> 
            <input type="text" name="valor_outros_lazer" placeholder="Especifique e insira o valor"><br>
        </fieldset>

        <br>

        <fieldset>
            <legend>Gastos com Compras</legend>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="roupas"> Roupas e acessórios</label> 
            <input type="text" name="valor_roupas" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="eletronicos"> Eletrônicos</label> 
            <input type="text" name="valor_eletronicos" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="decoracao"> Bebidas, Cigarro, etc</label> 
            <input type="text" name="valor_decoracao" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="outros_compras"> Outros gastos com compras</label> 
            <input type="text" name="valor_outros_compras" placeholder="Especifique e insira o valor"><br>
        </fieldset>

        <br>

        <fieldset>
            <legend>Gastos com Assinaturas</legend>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="streaming"> Serviços de streaming (Netflix, Spotify, etc.)</label> 
            <input type="text" name="valor_streaming" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="assinaturas_revistas"> Assinaturas de revistas ou jornais</label> 
            <input type="text" name="valor_assinaturas_revistas" placeholder="Valor em R$"><br>

            <label><input type="checkbox" name="gastos_nao_essenciais" value="outros_assinaturas"> Outros gastos com assinaturas</label> 
            <input type="text" name="valor_outros_assinaturas" placeholder="Especifique e insira o valor"><br>
        </fieldset>

        <br>

        <input type="submit" name="form4" id="form4" value="Enviar">
    </form>
</body>
</html> 