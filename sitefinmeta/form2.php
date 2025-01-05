<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form2.css">
    <title>Questionário de Metas Financeiras - FinMeta</title>
</head>
<body>

     <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
     <?php include '../Basis/Main.php'; ?>
    <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->

    <h1>Questionário de Metas Financeiras</h1>
    <p>Seja Verdadeiro em suas respostas!</p>
    <br>
    
     <form action="form3.php" method="post">
        <!-- 1 -->
        <fieldset>
            <legend>1. Quais são suas principais metas financeiras no curto prazo (até 1 ano)?</legend>
            <label><input type="checkbox" name="metas_curto_prazo" value="pagar_dividas"> Pagar dívidas</label><br>
            <label><input type="checkbox" name="metas_curto_prazo" value="fundo_emergencia"> Criar um fundo de emergência</label><br>
            <label><input type="checkbox" name="metas_curto_prazo" value="viagem"> Juntar para uma viagem</label><br>
            <label><input type="checkbox" name="metas_curto_prazo" value="eletronico"> Comprar um novo dispositivo eletrônico (celular, laptop, etc.)</label><br>
            <label><input type="checkbox" name="metas_curto_prazo" value="cursos"> Investir em cursos de capacitação</label><br>
            <label><input type="checkbox" name="metas_curto_prazo" value="outro"> Outro: <input type="text" name="metas_curto_prazo_outro" placeholder="Especifique"></label>
        </fieldset>

        <br>

        <!--- 2 -->
        <fieldset>
            <legend>2. Quais são suas metas financeiras no médio prazo (1 a 5 anos)?</legend>
            <label><input type="checkbox" name="metas_medio_prazo" value="carro"> Comprar um carro</label><br>
            <label><input type="checkbox" name="metas_medio_prazo" value="fundo_emergencia"> Aumentar o fundo de emergência</label><br>
            <label><input type="checkbox" name="metas_medio_prazo" value="investimentos"> Investir em renda fixa/variável</label><br>
            <label><input type="checkbox" name="metas_medio_prazo" value="pos_graduacao"> Economizar para uma pós-graduação</label><br>
            <label><input type="checkbox" name="metas_medio_prazo" value="negocio"> Abrir um negócio</label><br>
            <label><input type="checkbox" name="metas_medio_prazo" value="outro"> Outro: <input type="text" name="metas_medio_prazo_outro" placeholder="Especifique"></label>
        </fieldset>

        <br>

        <!--  3 -->
        <fieldset>
            <legend>3. Quais são suas metas financeiras no longo prazo (acima de 5 anos)?</legend>
            <label><input type="checkbox" name="metas_longo_prazo" value="casa_apartamento"> Comprar uma casa ou apartamento</label><br>
            <label><input type="checkbox" name="metas_longo_prazo" value="aposentadoria"> Aposentadoria</label><br>
            <label><input type="checkbox" name="metas_longo_prazo" value="educacao_filhos"> Garantir educação para filhos</label><br>
            <label><input type="checkbox" name="metas_longo_prazo" value="grande_viagem"> Fazer uma grande viagem</label><br>
            <label><input type="checkbox" name="metas_longo_prazo" value="patrimonio"> Acumular um patrimônio relevante</label><br>
            <label><input type="checkbox" name="metas_longo_prazo" value="outro"> Outro: <input type="text" name="metas_longo_prazo_outro" placeholder="Especifique"></label>
        </fieldset>

        <br>

        <!--  4 -->
        <fieldset>
            <legend>4. Qual a principal dificuldade que você enfrenta para alcançar suas metas financeiras?</legend>
            <label><input type="radio" name="dificuldade" value="falta_planejamento" required> Falta de planejamento financeiro</label><br>
            <label><input type="radio" name="dificuldade" value="gastos_inesperados"> Gastos inesperados</label><br>
            <label><input type="radio" name="dificuldade" value="dificuldade_economizar"> Dificuldade em economizar</label><br>
            <label><input type="radio" name="dificuldade" value="falta_conhecimento"> Falta de conhecimento sobre investimentos</label><br>
            <label><input type="radio" name="dificuldade" value="outro"> Outro: <input type="text" name="dificuldade_outro" placeholder="Especifique"></label>
        </fieldset>

        <br>

        <!--  5 -->
        <fieldset>
            <legend>5. Com que frequência você revisa ou ajusta suas metas financeiras?</legend>
            <label><input type="radio" name="frequencia_revisao" value="semanal" required> Semanalmente</label><br>
            <label><input type="radio" name="frequencia_revisao" value="mensal"> Mensalmente</label><br>
            <label><input type="radio" name="frequencia_revisao" value="trimestral"> A cada trimestre</label><br>
            <label><input type="radio" name="frequencia_revisao" value="semestral"> A cada semestre</label><br>
            <label><input type="radio" name="frequencia_revisao" value="raramente"> Raramente</label><br>
            <label><input type="radio" name="frequencia_revisao" value="nunca"> Nunca</label>
        </fieldset>

        <br>

        <!--  6 -->
        <fieldset>
            <legend>6. Você já tem algum tipo de investimento financeiro ativo?</legend>
            <label><input type="radio" name="investimentos_ativos" value="sim" required> Sim</label><br>
            <label><input type="radio" name="investimentos_ativos" value="nao"> Não</label>
        </fieldset>

        <br>

        <!-- 7 -->
        <fieldset>
            <legend>7. Quais ferramentas você utiliza para controlar suas finanças?</legend>
            <label><input type="checkbox" name="ferramentas_financas" value="planilha_excel"> Planilha de Excel/Google Sheets</label><br>
            <label><input type="checkbox" name="ferramentas_financas" value="aplicativo_financeiro"> Aplicativo de controle financeiro</label><br>
            <label><input type="checkbox" name="ferramentas_financas" value="anotacoes_papel"> Anotações em papel</label><br>
            <label><input type="checkbox" name="ferramentas_financas" value="consultoria_profissional"> Consultoria com um profissional financeiro</label><br>
            <label><input type="checkbox" name="ferramentas_financas" value="nenhuma"> Não utilizo nenhuma ferramenta</label><br>
            <label><input type="checkbox" name="ferramentas_financas" value="outro"> Outro: <input type="text" name="ferramentas_outro" placeholder="Especifique"></label>
        </fieldset>

        <br>

        <input type="submit" name="form2pform3" value="Enviar Respostas">
    </form>

</body>
</html>