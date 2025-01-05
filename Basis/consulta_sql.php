<?php
 // FUNCTION QUE RETORNA A TELA QUE ESTÁ CONSULTANDO A FUNÇÃO
 function consulta_sql($tela_consulta,$col=[]){

    $diferente=0;
    // SWITCH CASE PARA TORNAR DINÂMICA A CRIAÇÃO DO BOTÃO
    switch ($tela_consulta) {
      case 'atualiza_2_Forma_de_Pagamento/Recebimento':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idFormaPagamento` AS 'identificacao_modal_form_selec',
              a.`dscFormaPagamento` AS 'descricao_modal_form_selec'
              FROM `formapagamento`AS a
              LEFT JOIN (
                SELECT * FROM movimentacao where idmovimentacao = 'chaveprimaria'
                ) AS b ON a.idFormaPagamento = b.idFormaPagamento
              WHERE b.idFormaPagamento IS NULL;");

          break;
      case 'atualiza_2_Forma_de_Pagamento/Recebimento_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idFormaPagamento` AS 'identificacao_modal_form_selec',
              a.`dscFormaPagamento` AS 'descricao_modal_form_selec'
              FROM `formapagamento`AS a
              INNER JOIN movimentacao AS b ON a.idFormaPagamento = b.idFormaPagamento
              WHERE b.idmovimentacao = 'chaveprimaria'");

          break;
      case 'adiciona_2_Forma_de_Recebimento':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
        `idFormaPagamento` AS 'identificacao_modal_form_selec',
        `dscFormaPagamento` AS 'descricao_modal_form_selec'
        FROM `formapagamento`
        WHERE 
        formapagamento.idCartao IS NULL
        AND formapagamento.idUsuarioTitular= $idusuariotitular 
        AND formapagamento.fAtivo =1
        OR formapagamento.idUsuarioTitular= $idusuariotitular 
        AND formapagamento.fAtivo =1");

          break;
      case 'adiciona_2_Forma_de_Pagamento':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idFormaPagamento` AS 'identificacao_modal_form_selec',
              `dscFormaPagamento` AS 'descricao_modal_form_selec'
              FROM `formapagamento`
              WHERE 
              formapagamento.idUsuarioTitular= $idusuariotitular 
              AND formapagamento.fAtivo =1");

          break;
      case 'atualiza_2_Orçamento_Afetado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idPlanejamento` AS 'identificacao_modal_form_selec',
              a.`nmPlanejamento` AS 'descricao_modal_form_selec'
              FROM `planejamento` AS a
              LEFT JOIN (
                SELECT * FROM movimentacao where idmovimentacao = 'chaveprimaria'
                ) AS b ON a.idPlanejamento = b.idPlanejamento
              WHERE b.idPlanejamento IS NULL;");

          break;
      case 'atualiza_2_Orçamento_Afetado_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idPlanejamento` AS 'identificacao_modal_form_selec',
              a.`nmPlanejamento` AS 'descricao_modal_form_selec'
              FROM `planejamento` AS a
              INNER JOIN movimentacao AS b ON a.idPlanejamento = b.idPlanejamento
              WHERE b.idmovimentacao = 'chaveprimaria';");

          break;
      case 'adiciona_2_Orçamento_Afetado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idPlanejamento` AS 'identificacao_modal_form_selec',
              `nmPlanejamento` AS 'descricao_modal_form_selec'
              FROM `planejamento` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1");

          break;
      case 'atualiza_2_TipoObrigacao':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idTipoObrigacao` AS 'identificacao_modal_form_selec',
              a.`nmTipoObrigacao` AS 'descricao_modal_form_selec'
              FROM `tipoobrigacao` AS a
              LEFT JOIN (
                SELECT * FROM movimentacao where idmovimentacao = 'chaveprimaria'
                ) AS b ON a.idTipoObrigacao = b.idTipoObrigacao
              WHERE b.idTipoObrigacao IS NULL;");

          break;
      case 'atualiza_2_TipoObrigacao_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idTipoObrigacao` AS 'identificacao_modal_form_selec',
              a.`nmTipoObrigacao` AS 'descricao_modal_form_selec'
              FROM `tipoobrigacao` AS a
              INNER JOIN movimentacao AS b ON a.idTipoObrigacao = b.idTipoObrigacao
              WHERE b.idmovimentacao = 'chaveprimaria';");

          break;
      case 'adiciona_2_entrada_Tipo_Ocorrência':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idTipoObrigacao` AS 'identificacao_modal_form_selec',
              `nmTipoObrigacao` AS 'descricao_modal_form_selec'
              FROM `tipoobrigacao` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1 AND idCaraterMovimentacao=1;");

          break;
      case 'adiciona_2_saída_Tipo_Ocorrência':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idTipoObrigacao` AS 'identificacao_modal_form_selec',
              `nmTipoObrigacao` AS 'descricao_modal_form_selec'
              FROM `tipoobrigacao` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1 AND idCaraterMovimentacao=2;");

          break;
      case 'adiciona_2_saída_Tipo_Gasto':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idTipoGasto` AS 'identificacao_modal_form_selec',
              `nmTipoGasto` AS 'descricao_modal_form_selec'
              FROM `tipogasto` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1;");

          break;
      case 'atualiza_2_TipoGasto':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idTipoGasto` AS 'identificacao_modal_form_selec',
              a.`nmTipoGasto` AS 'descricao_modal_form_selec'
              FROM `tipogasto` AS a
             LEFT JOIN (
                SELECT * FROM movimentacao where idmovimentacao = 'chaveprimaria'
                ) AS b ON a.idTipoGasto = b.idTipoGasto
              WHERE b.idTipoGasto IS NULL;");

          break;
      case 'atualiza_2_TipoGasto_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idTipoGasto` AS 'identificacao_modal_form_selec',
              a.`nmTipoGasto` AS 'descricao_modal_form_selec'
              FROM `tipogasto` AS a
             INNER JOIN movimentacao AS b ON a.idTipoGasto = b.idTipoGasto
              WHERE b.idmovimentacao = 'chaveprimaria';");

          break;
      case 'atualiza_2_Conta_Movimentada':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              co.idConta AS 'identificacao_modal_form_selec',
              co.nmConta AS 'descricao_modal_form_selec'
              FROM conta AS co
              LEFT JOIN (
                SELECT * FROM movimentacao where idmovimentacao = 'chaveprimaria'
                ) AS c ON co.idConta = c.idConta
              WHERE c.idConta IS NULL;");

          break;
      case 'atualiza_2_Conta_Movimentada_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              co.idConta AS 'identificacao_modal_form_selec',
              co.nmConta AS 'descricao_modal_form_selec'
              FROM conta AS co
              INNER JOIN movimentacao AS c ON co.idConta = c.idConta
              WHERE c.idmovimentacao = 'chaveprimaria';");

          break;
      case 'adiciona_2_Conta_Movimentada':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idConta` AS 'identificacao_modal_form_selec',
              `nmConta` AS 'descricao_modal_form_selec'
              FROM `conta` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1;");

          break;
      case 'atualiza_2_Usuário_Resposável':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.idPessoa AS 'identificacao_modal_form_selec',
              a.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS a
              LEFT JOIN (
                SELECT * FROM movimentacao where idmovimentacao = 'chaveprimaria'
                ) AS b ON a.idPessoa = b.idPessoa
              WHERE b.idPessoa IS NULL;");

          break;
      case 'atualiza_2_Usuário_Resposável_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.idPessoa AS 'identificacao_modal_form_selec',
              a.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS a
              INNER JOIN movimentacao AS b ON a.idPessoa = b.idPessoa
              WHERE b.idmovimentacao = 'chaveprimaria';");

          break;
      case 'adiciona_2_Usuário_Resposável':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idPessoa` AS 'identificacao_modal_form_selec',
              `nmPessoa` AS 'descricao_modal_form_selec'
              FROM `pessoa` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1");

          break;
      case 'atualiza_2_Natureza_Movimentação':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idCaraterMovimentacao` AS 'identificacao_modal_form_selec',
              a.`dscCaraterMovimentacao` AS 'descricao_modal_form_selec'
              FROM `caratermovimentacao` AS a
              LEFT JOIN (
                SELECT * FROM movimentacao where idmovimentacao = 'chaveprimaria'
                ) AS b ON a.idCaraterMovimentacao = b.idCaraterMovimentacao
              WHERE b.idCaraterMovimentacao IS NULL;");

          break;
      case 'atualiza_2_Natureza_Movimentação_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idCaraterMovimentacao` AS 'identificacao_modal_form_selec',
              a.`dscCaraterMovimentacao` AS 'descricao_modal_form_selec'
              FROM `caratermovimentacao` AS a
              INNER JOIN movimentacao AS b ON a.idCaraterMovimentacao = b.idCaraterMovimentacao
              WHERE b.idmovimentacao = 'chaveprimaria';");

          break;
      case 'adiciona_2_Natureza_Movimentação':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idCaraterMovimentacao` AS 'identificacao_modal_form_selec',
              `dscCaraterMovimentacao` AS 'descricao_modal_form_selec'
              FROM `caratermovimentacao` 
              WHERE fAtivo =1;");

          break;
      case 'atualiza_3_Resultado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              ps.idPlanejamentoStatus AS 'identificacao_modal_form_selec',
              ps.dscPlanejamentoStatus AS 'descricao_modal_form_selec'
              FROM planejamentostatus ps
              LEFT JOIN (
                SELECT * FROM planejamento where idPlanejamento = 'chaveprimaria'
                ) AS p ON ps.idPlanejamentoStatus = p.idPlanejamentoStatus
              WHERE p.idPlanejamentoStatus IS NULL;");

          break;
      case 'atualiza_3_Resultado_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              ps.idPlanejamentoStatus AS 'identificacao_modal_form_selec',
              ps.dscPlanejamentoStatus AS 'descricao_modal_form_selec'
              FROM planejamentostatus ps
              INNER JOIN planejamento AS p ON ps.idPlanejamentoStatus = p.idPlanejamentoStatus
              WHERE p.idPlanejamento = 'chaveprimaria';");

          break;
      case 'adiciona_3_Resultado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idPlanejamentoStatus` AS 'identificacao_modal_form_selec',
              `dscPlanejamentoStatus` AS 'descricao_modal_form_selec'
              FROM `planejamentostatus` ");

          break;
      case 'atualiza_4_Status_Objetivo':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              os.idObjetivoStatus AS 'identificacao_modal_form_selec',
              os.dscObjetivoStatus AS 'descricao_modal_form_selec'
              FROM objetivostatus os
              LEFT JOIN (
                SELECT * FROM objetivo where idObjetivo = 'chaveprimaria'
                ) AS o ON os.idObjetivoStatus = o.idObjetivoStatus
              WHERE o.idObjetivoStatus IS NULL;");

          break;
      case 'atualiza_4_Status_Objetivo_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              os.idObjetivoStatus AS 'identificacao_modal_form_selec',
              os.dscObjetivoStatus AS 'descricao_modal_form_selec'
              FROM objetivostatus os
              INNER JOIN  objetivo AS o ON os.idObjetivoStatus = o.idObjetivoStatus
              WHERE o.idObjetivo = 'chaveprimaria';");

          break;
      case 'adiciona_4_Status_Objetivo':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idObjetivoStatus` AS 'identificacao_modal_form_selec',
              `dscObjetivoStatus` AS 'descricao_modal_form_selec'
              FROM `objetivostatus`");

          break;
      case 'atualiza_5_Tipo_de_Contas':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              tc.idTipoConta AS 'identificacao_modal_form_selec',
              tc.dscTipoConta AS 'descricao_modal_form_selec'
              FROM tipoconta AS tc
              LEFT JOIN (
                SELECT * FROM conta where idConta = 'chaveprimaria'
                ) AS c ON tc.idTipoConta = c.idTipoConta
              WHERE c.idTipoConta IS NULL;");

          break;
      case 'atualiza_5_Tipo_de_Contas_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              tc.idTipoConta AS 'identificacao_modal_form_selec',
              tc.dscTipoConta AS 'descricao_modal_form_selec'
              FROM tipoconta AS tc
              INNER JOIN conta AS c ON tc.idTipoConta = c.idTipoConta 
              WHERE c.idConta = 'chaveprimaria'");

          break;
      case 'adiciona_5_Tipo_de_Contas':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idTipoConta` AS 'identificacao_modal_form_selec',
              `dscTipoConta` AS 'descricao_modal_form_selec'
              FROM `tipoconta` 
              WHERE fAtivo =1;");

          break;
      case 'atualiza_6_Tipo_do_Cartão':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              tc.idTipoCartao AS 'identificacao_modal_form_selec',
              tc.dscTipoCartao AS 'descricao_modal_form_selec'
              FROM tipocartao AS tc
              LEFT JOIN (
                SELECT * FROM cartao where idCartao = 'chaveprimaria'
                ) AS c ON tc.idTipoCartao = c.idTipoCartao
              WHERE c.idTipoCartao IS NULL;");

          break;
      case 'atualiza_6_Tipo_do_Cartão_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              tc.idTipoCartao AS 'identificacao_modal_form_selec',
              tc.dscTipoCartao AS 'descricao_modal_form_selec'
              FROM tipocartao AS tc
              INNER JOIN cartao AS c ON tc.idTipoCartao = c.idTipoCartao
              WHERE c.idCartao = 'chaveprimaria';");

          break;
      case 'adiciona_6_Tipo_do_Cartão':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idTipoCartao` AS 'identificacao_modal_form_selec',
              `dscTipoCartao` AS 'descricao_modal_form_selec'
              FROM `tipocartao` 
              WHERE fAtivo =1;");

          break;
      case 'atualiza_6_Status_Cartão':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              cs.idcartaoStatus AS 'identificacao_modal_form_selec',
              cs.dsccartaoStatus AS 'descricao_modal_form_selec'
              FROM cartaostatus AS cs
              LEFT JOIN (
                SELECT * FROM cartao where idCartao = 'chaveprimaria'
                ) AS c ON cs.idcartaoStatus = c.idcartaoStatus
              WHERE c.idcartaoStatus IS NULL;");

          break;
      case 'atualiza_6_Status_Cartão_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              cs.idcartaoStatus AS 'identificacao_modal_form_selec',
              cs.dsccartaoStatus AS 'descricao_modal_form_selec'
              FROM cartaostatus AS cs
              INNER JOIN cartao AS c ON cs.idcartaoStatus = c.idcartaoStatus
              WHERE c. idCartao = 'chaveprimaria';");

          break;
      case 'adiciona_6_Status_Cartão':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idcartaoStatus` AS 'identificacao_modal_form_selec',
              `dsccartaoStatus` AS 'descricao_modal_form_selec'
              FROM `cartaostatus` 
              WHERE fAtivo =1;");

          break;
      case 'atualiza_6_Conta_Relacionada':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              co.idConta AS 'identificacao_modal_form_selec',
              co.nmConta AS 'descricao_modal_form_selec'
              FROM conta AS co
              LEFT JOIN (
                SELECT * FROM cartao where idCartao = 'chaveprimaria'
                ) AS c ON co.idConta = c.idConta
              WHERE c.idConta IS NULL;");

          break;
      case 'atualiza_6_Conta_Relacionada_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              co.idConta AS 'identificacao_modal_form_selec',
              co.nmConta AS 'descricao_modal_form_selec'
              FROM conta AS co
              INNER JOIN cartao AS c ON co.idConta = c.idConta
              WHERE c.idCartao = 'chaveprimaria';");

          break;
      case 'adiciona_6_Conta_Relacionada':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idConta` AS 'identificacao_modal_form_selec',
              `nmConta` AS 'descricao_modal_form_selec'
              FROM `conta` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1;");

          break;
      case 'adiciona_7_Status_Fatura':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idfaturastatus` AS 'identificacao_modal_form_selec',
              `dscfaturastatus` AS 'descricao_modal_form_selec'
              FROM `faturastatus` 
              WHERE fAtivo =1;");

          break;
      case 'atualiza_9_Status_Empréstimo':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              es.idemprestimosituacao AS 'identificacao_modal_form_selec',
              es.dscEmprestimoSituacao AS 'descricao_modal_form_selec'
              FROM emprestimosituacao AS es
              LEFT JOIN (
                SELECT * FROM emprestimo where idEmprestimo = 'chaveprimaria'
                ) AS e ON es.idemprestimosituacao = e.idemprestimosituacao
              WHERE e.idemprestimosituacao IS NULL;");

          break;
      case 'atualiza_9_Status_Empréstimo_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              es.idemprestimosituacao AS 'identificacao_modal_form_selec',
              es.dscEmprestimoSituacao AS 'descricao_modal_form_selec'
              FROM emprestimosituacao AS es
              INNER JOIN emprestimo AS e ON es.idemprestimosituacao = e.idemprestimosituacao
              WHERE e.idEmprestimo = 'chaveprimaria';");

          break;
      case 'adiciona_9_Status_Empréstimo':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idemprestimosituacao` AS 'identificacao_modal_form_selec',
              `dscEmprestimoSituacao` AS 'descricao_modal_form_selec'
              FROM `emprestimosituacao`;");

          break;
      case 'atualiza_9_Aplicação_Juros':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              jp.idJurosPeriodicidade AS 'identificacao_modal_form_selec',
              jp.nmJurosPeriodicidade AS 'descricao_modal_form_selec'
              FROM jurosperiodicidade AS jp
              LEFT JOIN (
                SELECT * FROM emprestimo where idEmprestimo = 'chaveprimaria'
                ) AS e ON jp.idJurosPeriodicidade = e.idJurosPeriodicidade
              WHERE e.idJurosPeriodicidade IS NULL;");

          break;
      case 'atualiza_9_Aplicação_Juros_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              jp.idJurosPeriodicidade AS 'identificacao_modal_form_selec',
              jp.nmJurosPeriodicidade AS 'descricao_modal_form_selec'
              FROM jurosperiodicidade AS jp
              INNER JOIN emprestimo AS e ON jp.idJurosPeriodicidade = e.idJurosPeriodicidade
              WHERE e.idEmprestimo = 'chaveprimaria';");

          break;
      case 'adiciona_9_Aplicação_Juros':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idJurosPeriodicidade` AS 'identificacao_modal_form_selec',
              `nmJurosPeriodicidade` AS 'descricao_modal_form_selec'
              FROM `jurosperiodicidade` 
              WHERE 
              fAtivo =1;");

          break;
      case 'atualiza_9_Usuário':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              p.idPessoa AS 'identificacao_modal_form_selec',
              p.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS p 
              LEFT JOIN (
                SELECT * FROM emprestimo where idEmprestimo = 'chaveprimaria'
                ) AS e ON p.idPessoa = e.idPessoa
              WHERE e.idPessoa IS NULL;");

          break;
      case 'atualiza_9_Usuário_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              p.idPessoa AS 'identificacao_modal_form_selec',
              p.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS p 
              INNER JOIN emprestimo AS e ON p.idPessoa = e.idPessoa
              WHERE e.idEmprestimo = 'chaveprimaria';");

          break;
      case 'adiciona_9_Usuário':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idPessoa` AS 'identificacao_modal_form_selec',
              `nmPessoa` AS 'descricao_modal_form_selec'
              FROM `pessoa` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1");

          break;
      case 'atualiza_10_Usuário':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              p.idPessoa AS 'identificacao_modal_form_selec',
              p.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS p 
              LEFT JOIN (
                SELECT * FROM receita where idreceita = 'chaveprimaria'
                ) AS e ON p.idPessoa = e.idPessoa
              WHERE e.idPessoa IS NULL;");

          break;
      case 'atualiza_10_Usuário_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              p.idPessoa AS 'identificacao_modal_form_selec',
              p.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS p 
              INNER JOIN receita AS e ON p.idPessoa = e.idPessoa
              WHERE e.idreceita = 'chaveprimaria';");

          break;
      case 'adiciona_10_Usuário':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idPessoa` AS 'identificacao_modal_form_selec',
              `nmPessoa` AS 'descricao_modal_form_selec'
              FROM `pessoa` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1");

          break;
      case 'atualiza_11_Usuário':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              p.idPessoa AS 'identificacao_modal_form_selec',
              p.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS p 
              LEFT JOIN (
                SELECT * FROM ativo where idativo = 'chaveprimaria'
                ) AS e ON p.idPessoa = e.idPessoa
              WHERE e.idPessoa IS NULL;");

          break;
      case 'atualiza_11_Usuário_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              p.idPessoa AS 'identificacao_modal_form_selec',
              p.nmPessoa AS 'descricao_modal_form_selec'
              FROM pessoa AS p 
              INNER JOIN ativo AS e ON p.idPessoa = e.idPessoa
              WHERE e.idativo = 'chaveprimaria';");

          break;
      case 'adiciona_11_Usuário':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idPessoa` AS 'identificacao_modal_form_selec',
              `nmPessoa` AS 'descricao_modal_form_selec'
              FROM `pessoa` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1");

          break;
      case 'atualiza_11_Tipo_Ativo':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              tp.idTipoAtivo AS 'identificacao_modal_form_selec',
              tp.nmTipoAtivo AS 'descricao_modal_form_selec'
              FROM tipoativo AS tp
              LEFT JOIN (
                SELECT * FROM ativo where idativo = 'chaveprimaria'
                ) AS e ON tp.idTipoAtivo = e.idTipoAtivo
              WHERE e.idTipoAtivo IS NULL;");

          break;
      case 'atualiza_11_Tipo_Ativo_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              tp.idTipoAtivo AS 'identificacao_modal_form_selec',
              tp.nmTipoAtivo AS 'descricao_modal_form_selec'
              FROM tipoativo AS tp
              LEFT JOIN ativo AS e ON tp.idTipoAtivo = e.idTipoAtivo
              WHERE e.idativo = 'chaveprimaria'");

          break;
      case 'adiciona_11_Tipo_Ativo':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idTipoAtivo` AS 'identificacao_modal_form_selec',
              `nmTipoAtivo` AS 'descricao_modal_form_selec'
              FROM `tipoativo`");

          break;
      case 'atualiza_13_Natureza_Movimentação':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              a.`idCaraterMovimentacao` AS 'identificacao_modal_form_selec',
              a.`dscCaraterMovimentacao` AS 'descricao_modal_form_selec'
              FROM `caratermovimentacao` AS a
              LEFT JOIN (
                SELECT * FROM tipoobrigacao where idtipoobrigacao = 'chaveprimaria'
                ) AS e ON a.idCaraterMovimentacao = e.idCaraterMovimentacao
              WHERE e.idCaraterMovimentacao IS NULL;");

          break;
      case 'atualiza_13_Natureza_Movimentação_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              cm.`idCaraterMovimentacao` AS 'identificacao_modal_form_selec',
              cm.`dscCaraterMovimentacao` AS 'descricao_modal_form_selec'
              FROM `caratermovimentacao` AS cm
              INNER JOIN tipoobrigacao AS e ON cm.idCaraterMovimentacao = e.idCaraterMovimentacao
              WHERE e.idtipoobrigacao = 'chaveprimaria';");

          break;
      case 'adiciona_13_Natureza_Movimentação':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idCaraterMovimentacao` AS 'identificacao_modal_form_selec',
              `dscCaraterMovimentacao` AS 'descricao_modal_form_selec'
              FROM `caratermovimentacao` 
              WHERE fAtivo =1;");

          break;
      case 'atualiza_18_Nível_Relacionamento':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              nr.idNivelRelacionamento AS 'identificacao_modal_form_selec',
              nr.dscRelacionamento AS 'descricao_modal_form_selec'
              FROM nivelrelacionamento AS nr
              LEFT JOIN (
                SELECT * FROM pessoa where idpessoa = 'chaveprimaria'
                ) AS e ON nr.idNivelRelacionamento = e.idNivelRelacionamento
              WHERE e.idNivelRelacionamento IS NULL;");

          break;
      case 'atualiza_18_Nível_Relacionamento_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              nr.idNivelRelacionamento AS 'identificacao_modal_form_selec',
              nr.dscRelacionamento AS 'descricao_modal_form_selec'
              FROM nivelrelacionamento AS nr
              INNER JOIN pessoa AS e ON nr.idNivelRelacionamento = e.idNivelRelacionamento
              WHERE e.idpessoa = 'chaveprimaria';");

          break;
      case 'adiciona_18_Nível_Relacionamento':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        // 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO AS KEYS DA ARRAY GERADA AO EXECUTAR O SELECT(SQL) QUE SERÃO USADAS NO SELECT(FORM HTML) DA MODAL
        $sql=("SELECT
              `idNivelRelacionamento` AS 'identificacao_modal_form_selec',
              `dscRelacionamento` AS 'descricao_modal_form_selec'
              FROM `nivelrelacionamento` 
              WHERE 
              `idUsuarioTitular`= $idusuariotitular AND fAtivo =1
              OR `idUsuarioTitular`= 0 AND fAtivo =1
              OR `idUsuarioTitular` IS NULL AND fAtivo =1;");

          break;
      case 'atualiza_18_Tipo_de_Acesso':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        
        $sql=("SELECT
              ta.`idTipoAcesso` AS 'identificacao_modal_form_selec',
              ta.`nmTipoAcesso` AS 'descricao_modal_form_selec'
              FROM `tipoacesso` AS ta
              LEFT JOIN (
                SELECT * FROM pessoa where idpessoa = 'chaveprimaria'
                ) AS e ON ta.idTipoAcesso = e.idTipoAcesso
              WHERE e.idTipoAcesso IS NULL;");

          break;
      case 'atualiza_18_Tipo_de_Acesso_selecionado':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        
        $sql=("SELECT
              ta.`idTipoAcesso` AS 'identificacao_modal_form_selec',
              ta.`nmTipoAcesso` AS 'descricao_modal_form_selec'
              FROM `tipoacesso` AS ta
              INNER JOIN pessoa AS e ON ta.idTipoAcesso = e.idTipoAcesso
              WHERE e.idpessoa = 'chaveprimaria';");

          break;
      case 'adiciona_18_Tipo_de_Acesso':// A VARIÁVEL adiciona_14 NESSA SITUAÇÃO DEVE SER FORMADA PELA VARIÁVEL $operação,$tela E $campoId INFORMADA NA funcition modal_cadastro(SIM TEM QUE TROCAR ESSE NOME)
        // Home;
        $idusuariotitular=$_SESSION['idusuariotitular'];
        
        $sql=("SELECT
              `idTipoAcesso` AS 'identificacao_modal_form_selec',
              `nmTipoAcesso` AS 'descricao_modal_form_selec'
              FROM `tipoacesso` 
              ");

          break;
      case 1:
        
          // Home;
          echo "Home";
          break;
      case 2:
        $col2 = array_keys($col) ;
          // Movimentações
        $idusuariotitular=$_SESSION['idusuariotitular'];
        $diferente=1;
        $sql=(
        "SELECT 
            m.idMovimentacao AS 'indentificacao_botao_modal',
            c.dscCaraterMovimentacao AS 'Natureza Movimentação',
            p.nmPessoa AS 'Usuário Resposável',
            co.nmConta AS 'Conta Movimentada',
              CASE 
                WHEN m.idTipoObrigacao IS NOT NULL THEN CONCAT('Ocorrência - ',o.nmTipoObrigacao)
                WHEN m.idTipoGasto IS NOT NULL THEN CONCAT('Gasto - ',g.nmTipoGasto)
                WHEN m.idAtivo IS NOT NULL THEN CONCAT('Ativo - ',a.nmAtivo)
                WHEN m.idReceita IS NOT NULL THEN CONCAT('Receita - ',r.nmReceita)
                WHEN m.idEmprestimo IS NOT NULL THEN CONCAT('Empréstimo - ',e.nmEmprestimo)
                WHEN m.idObjetivo IS NOT NULL THEN CONCAT('Objetivos - ',ob.nmObjetivo)
                WHEN m.idDespesaFixa IS NOT NULL THEN CONCAT('Despesas Fixas - ',df.nmDespesaFixa)
          END AS 'Origem Movimentação',
          pl.nmPlanejamento AS 'Plenejamento Afetado',
          f.dscFormaPagamento AS 'Forma de Pagamento/Recebimento',
          m.vlrMovimentacao AS 'Valor Movimentação(R$)',
          DATE_FORMAT(m.dthMovimentacao,'%d/%m/%Y') AS 'Data Movimentação'
        FROM movimentacao m
        INNER JOIN caratermovimentacao c ON m.idCaraterMovimentacao = c.idCaraterMovimentacao 
        INNER JOIN pessoa p ON m.idPessoa = p.idPessoa
        INNER JOIN conta co ON m.idconta = co.idconta
        INNER JOIN formapagamento f ON m.idFormaPagamento = f.idFormaPagamento
        LEFT JOIN tipogasto g ON m.idTipoGasto = g.idTipoGasto
        LEFT JOIN tipoobrigacao o ON m.idtipoobrigacao = o.idtipoobrigacao
        LEFT JOIN ativo a ON m.idAtivo = a.idAtivo
        LEFT JOIN receita r ON m.idReceita = r.idReceita
        LEFT JOIN emprestimo e ON m.idEmprestimo = e.idEmprestimo
        LEFT JOIN objetivo ob ON m.idObjetivo = ob.idObjetivo
        LEFT JOIN despesafixa df ON m.idDespesaFixa = df.idDespesaFixa
        INNER JOIN planejamento pl ON m.idPlanejamento = pl.idPlanejamento
        WHERE m.idUsuarioTitular = $idusuariotitular AND m.fAtivo = 1
        ORDER BY 1 DESC;"
        );

        // Arrumar SQL PARA TRAZER OS NOMES DAS INFORMAÇÕES DOS CASES;

        // echo $sql;

          break;
      case 3:
        $col2 = array_keys($col) ;
          // Orçamento/Planejamento        

        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array(
          'planejamento'
          ,'planejamentostatus'
        );
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
          'idPlanejamento',
          'nmPlanejamento',
          'dscPlanejamento',
          'vlrPlanejamento',
          'mesPlanejamento',
          'dscPlanejamentoStatus'
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          'Nome Orçamento',
          'Descrição',
          'Economia Esperada(R$)',
          'Mês Referente',
          'Resultado'
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,0,0,0,1);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        // *****DEVE SER INFORMADO UM $relacionamento PARA CADA TABELA ESTRANGEIRA
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);
        
          break;
      case 4:
        $col2 = array_keys($col) ;
          // Objetivos/Metas        
         // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array(
          'objetivo'
          ,'objetivostatus'
        );
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
          'idObjetivo',
          'nmObjetivo',
          'dscObjetivo',
          'vlrObjetivo',
          'dthPrevisao',
          'dscObjetivoStatus'
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          'Nome Objetivo',
          'Descrição',
          'Valor ',
          'Previsão p/ Alcançar',
          'Status Objetivo'
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,0,0,0,1);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        // *****DEVE SER INFORMADO UM $relacionamento PARA CADA TABELA ESTRANGEIRA
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);
          
          break;
      case 5:
        $col2 = array_keys($col) ;
          // Contas
        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array(
          'conta',
          'tipoconta'
        );
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
          'idConta',
          'nmConta',
          'dscConta',
          'dscTipoConta'
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          'Nome Conta',
          'Descrição-Conta',
          'Tipo-Conta'
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,0,1);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        // *****DEVE SER INFORMADO UM $relacionamento PARA CADA TABELA ESTRANGEIRA
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);
          
          break;
      case 6:
        $col2 = array_keys($col) ;
          // Cartões        
        
        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array(
          "cartao",
          "cartaostatus",
          "conta",
          "tipocartao"
        );
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
          "idcartao",
          "nmCartao",
          "dscCartao",
          "dscTipoCartao",
          "nmConta",
          "dsccartaoStatus",
          "diaVencimentoFatura"
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          'Nome Cartão',
          'Descrição Cartão',
          'Tipo do Cartão',
          'Conta Relacionada',
          'Status Cartão',
          'Dia de Vencimento da Fatura'
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,0,3,2,1,0);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        // *****DEVE SER INFORMADO UM $relacionamento PARA CADA TABELA ESTRANGEIRA
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0,0,0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);

          
          break;
      case 7:
        $col2 = array_keys($col) ;
          // Faturas de Cartões;
          // echo "Faturas de Cartões";

          // Movimentações
        $idusuariotitular=$_SESSION['idusuariotitular'];
        $diferente=1;

        

        // $sql=("SELECT
        //     fatura.idfatura AS 'indentificacao_botao_modal',
        //     cartao.nmCartao AS 'Cartão Referente',
        //     MONTH(fatura.mesreferencia) AS 'Mês Referente',
        //     SUM(valorfatura.vlrmovimentacaofatura) AS 'Valor Da Fatura',
        //     CONCAT(cartao.diaVencimentoFatura, '/', DATE_FORMAT(DATE_ADD(fatura.mesreferencia, INTERVAL 1 MONTH), '%m/%Y')) AS 'Data de vencimento',
        //     faturastatus.dscFaturaStatus AS 'Status Fatura'
        // FROM 
        //     fatura
        // INNER JOIN 
        //     cartao ON fatura.idcartao = cartao.idcartao
        // INNER JOIN 
        //     faturastatus ON fatura.idFaturaStatus = faturastatus.idFaturaStatus
        // INNER JOIN 
        //   movimentacao ON fatura.idFatura = movimentacao.idFatura
        // INNER JOIN 
        //   (SELECT
        //       movimentacao.idCaraterMovimentacao,
        //         movimentacao.idFatura,
        //         CASE
        //           WHEN movimentacao.idCaraterMovimentacao = '1' THEN -1 * movimentacao.vlrMovimentacao
        //           ELSE 1 * movimentacao.vlrMovimentacao
        //         END AS vlrmovimentacaofatura
        //     FROM 
        //       movimentacao
        //     WHERE 
        //       movimentacao.idFatura IS NOT NULL 
        //       AND movimentacao.idUsuarioTitular = $idusuariotitular
        //     ) AS valorfatura ON fatura.idFatura = valorfatura.idFatura
        // WHERE 
        // cartao.fAtivo = 1;");
        
        
        $sql=("SELECT
            fatura.idfatura AS 'indentificacao_botao_modal',
            cartao.nmCartao AS 'Cartão Referente',
            MONTH(fatura.mesreferencia) AS 'Mês Referente',
            CONCAT(cartao.diaVencimentoFatura, '/', DATE_FORMAT(DATE_ADD(fatura.mesreferencia, INTERVAL 1 MONTH), '%m/%Y')) AS 'Data de vencimento',
            faturastatus.dscFaturaStatus AS 'Status Fatura'
        FROM 
            fatura
        INNER JOIN 
            cartao ON fatura.idcartao = cartao.idcartao
        INNER JOIN 
            faturastatus ON fatura.idFaturaStatus = faturastatus.idFaturaStatus
        WHERE 
        cartao.fAtivo = 1 AND cartao.idUsuarioTitular = $idusuariotitular;");
          break;
      case 8:
        $col2 = array_keys($col) ;
        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array(
          "despesafixa"
        );
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
          "idDespesaFixa",
          "nmDespesaFixa",
          "dscDespesaFixa",
          "diaDespesa",
          "mesDespesa"
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          'Nome Despesas',
          'Descrição-Despesas',
          'Dia de Ocorrência',
          'Mês de Ocorrência'
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,0,0,0);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        // *****DEVE SER INFORMADO UM $relacionamento PARA CADA TABELA ESTRANGEIRA
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array();

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);

          break;
      case 9:
        $col2 = array_keys($col) ;
          // Empréstimos        
       
        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array(
          "emprestimo",
          "pessoa",
          "jurosperiodicidade",
          "emprestimosituacao"
        );
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
          "idEmprestimo",
          "nmEmprestimo",
          "dscEmprestimo",
          "nmPessoa",
          "vlrEmprestimo",
          "VezesPagamento",
          "Juros",
          "nmJurosPeriodicidade",
          "dscEmprestimoSituacao"
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          'Empréstimos',
          'Descrição Empréstimo',
          'Usuário',
          'Valor Emprestado',
          'Parcelas Pagamento',
          'Juros(%)',
          'Aplicação Juros',
          'Status Empréstimo'
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,0,1,0,0,0,2,3);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        // *****DEVE SER INFORMADO UM $relacionamento PARA CADA TABELA ESTRANGEIRA
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0,0,0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(1,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);
          
          break;
      case 10:
        $col2 = array_keys($col) ;
          // Receitas/Fontes de Rendas        

        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array(
          "receita",
          "pessoa"
        );
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
          "idReceita",
          "nmReceita",
          "nmPessoa",
          "dscReceita",
          "vlrReceita",
          "dthReceita"
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          'Receitas ou Fontes de Renda',
          'Usuário',
          'Descrição Receitas/Fontes de Renda',
          'Valor(R$)',
          'Dia de Pagamento'
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,1,0,0,0);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        // *****DEVE SER INFORMADO UM $relacionamento PARA CADA TABELA ESTRANGEIRA
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(1,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);

          break;
      case 11:
        $col2 = array_keys($col) ;

        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array("ativo","pessoa","tipoativo");
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array(
        "idAtivo",
        "nmAtivo",
        "dscAtivo",
        "nmTipoAtivo",
        "nmPessoa",
        "Rendimento",
        "dthAquisicao"
        );
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array(
          'indentificacao_botao_modal',
          "Nome Ativo",
          "Descrição Ativo",
          "Tipo Ativo",
          "Usuário",
          "Rendimento(%)",
          "Data Aquisição"
        );
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,0,2,1,0,0);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0,0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_param E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(1,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);
      
          
          break;
      case 12:
        
          // Calendário;
          echo "Calendário";
          break;
      case 13:
        $col2 = array_keys($col) ;

        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array('tipoobrigacao','caratermovimentacao');
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array('idTipoObrigacao','nmTipoObrigacao','dscCaraterMovimentacao');
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array('indentificacao_botao_modal','Tipos de Obrigação','Natureza Movimentação');
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,1);
        
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0);

        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_para E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);
      
          break;
      case 14:
        $col2 = array_keys($col) ;

        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array('tipogasto');
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array('idtipogasto','nmTipoGasto');
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array('indentificacao_botao_modal','Descrição do Tipo de Gasto');
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM CADA COLUNA NA ARRAY $colunas
        // 0 PARA A TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0);
    
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS RELACIONADAS INFORMADAS EM $tabelas)
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array();
        
        // SÃO AS POSIÇÕES DAS TABELAS NA ARRAY $tabelas PARA CONCATENAR COM AS COLUNAS DA ARRAY $colunas_param QUE SERÃO USADAS COMO PARÂMENTOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $posicao_para PARA CADA $colunas_param E PARA CADA $parametro
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        // COLUNAS QUE SERÃO USADAS COM OS PARÂMETROS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UMA $colunas_param PARA CADA $posicao_para E PARA CADA $parametro
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // PARÂMETROS QUE SERÃO USADOS NA CLÁUSULA WHERE
        // *****DEVE SER INFORMADO UM $parametro PARA CADA $posicao_para E PARA CADA $colunas_param
        $parametro=array($_SESSION['idusuariotitular'],1,);
      
        


          break;
      case 15:
        
          // Relatórios
          echo "Relatórios";
          break;
      case 16:
        
          // Configurações
          echo "Configurações";
          break;
      case 17:
        
          // Perfil
          echo "Perfil";
          break;
      case 18:
        $col2 = array_keys($col) ;
      
        // TABELAS QUE SERÃO USADAS NA CONSULTA
        // A PRIMEIRA SEMPRE É A TABELA CONSULTADA AS OUTRAS SÃO AS RELACIONADAS
        $tabelas=array('pessoa','usuariotitular','tipoacesso','nivelrelacionamento',);
        
        // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
        $colunas=array('idPessoa','nmPessoa','dscRelacionamento','nmTipoAcesso','Email','CPF','LoginAcesso','Senha');
        
        // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
        $nmcolunas=array('indentificacao_botao_modal','Nome Usuário','Nível Relacionamento','Tipo de Acesso','E-mail','CPF Usuário','Login Usuário','Senha');
        
        // INFORMAÇÃO A POSIÇÃO DA TABELA  NA ARRAY TABELAS PARA CADA COLUNA
        // 0 SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA
        // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
        $posicao_colunas=array(0,0,3,2,0,0,0,0);
    
        // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS)
        //  0 = INNER JOIN
        //  1 = LEFT JOIN
        //  2 = RIGHT JOIN
        $relacionamento=array(0,0,1,0);
        
        // INFORMAÇÃO A POSIÇÃO DA TABELA  NA ARRAY TABELAS PARA CADA PARÂMETRO
        // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
        $posicao_param=array(0,0);
        
        // COLUNAS QUE SERÃO CONSULTADAS COM OS PARÂMETROS
        $colunas_param=array("idUsuarioTitular","fAtivo",);
        
        // PARÂMETROS
        $parametro=array($_SESSION['idusuariotitular'],1,);
      
        break;
        
      }
      if($tela_consulta>=1 && $tela_consulta<=18){

        if($diferente!==1){
          $sql=gerador_select_sql($tabelas,$colunas,$nmcolunas,$posicao_colunas,$relacionamento,$posicao_param,$colunas_param,$parametro);
        }
        // FUNCTION QUE CRIA TABELA AUTOMÁTICAMENTE ***PRECISA COLOCAR UMA VARIÁVEL DO TIMPO string COM A CONSULTA SQL E OUTRA COM A ARRAY COM OS NOMES QUE SERÃO DADOS ÁS COLUNAS
        tabela($sql,$col2,$tela_consulta);

      }else{
        return $sql;
      }
}

function insert_sql($tela_consulta){

 // Altere este valor para testar diferentes cases
 array_pop($_POST);// ELE REMOVE O PARÂMETRO DO BOTÃO QUE ESTÁ GRAVADO NO $_POST
  switch ($tela_consulta) {
    case '02_ocorrencia_entrada':
      // Orçamento Mensal

      $tabela = "movimentacao";
      $col_inserts=[
        'idPessoa',
        'idConta',
        'idTipoObrigacao',
        'idPlanejamento',
        'idFormaPagamento',
        'vlrMovimentacao',
        'dthMovimentacao'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['dthRegistro']='CURRENT_TIMESTAMP()';
      $dados['idCaraterMovimentacao']=1;
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case '02_ocorrencia_saida':
      // Orçamento Mensal

      $tabela = "movimentacao";
      $col_inserts=[
        'idPessoa',
        'idConta',
        'idTipoObrigacao',
        'idPlanejamento',
        'idFormaPagamento',
        'vlrMovimentacao',
        'dthMovimentacao'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['dthRegistro']='CURRENT_TIMESTAMP()';
      $dados['idCaraterMovimentacao']=2;
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case '02_gasto_saida':
      // Orçamento Mensal

      $tabela = "movimentacao";
      $col_inserts=[
        'idPessoa',
        'idConta',
        'idTipoGasto',
        'idPlanejamento',
        'idFormaPagamento',
        'vlrMovimentacao',
        'dthMovimentacao'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['dthRegistro']='CURRENT_TIMESTAMP()';
      $dados['idCaraterMovimentacao']=2;
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case 1:
        echo "Este é o case 1";
        break;
    case 2:
      // Orçamento Mensal

      $tabela = "movimentacao";
      $col_inserts=[
        'idMovimentacao',
        'idPessoa',
        'idConta',
        'mesPlanejamento',
        'idPlanejamentoStatus'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case 3:
      // Orçamento Mensal

      $tabela = "planejamento";
      $col_inserts=[
        'nmPlanejamento',
        'dscPlanejamento',
        'vlrPlanejamento',
        'mesPlanejamento',
        'idPlanejamentoStatus'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case 4:
        // Objetivos/Metas

      $tabela = "objetivo";
      $col_inserts=[
        'nmObjetivo',
        'dscObjetivo',
        'vlrObjetivo',
        'dthPrevisao',
        'idObjetivoStatus'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case 5:
        // Contas

      $tabela = "conta";
      $col_inserts=[
        'nmConta',
        'dscConta',
        'idTipoConta'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case 6:
      // Cartões de Crédito

      $tabela = "cartao";
      $col_inserts=[
        'nmCartao',
        'dscCartao',
        'idTipoCartao',
        'idConta',
        'idCartaoStatus',
        'diaVencimentoFatura'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        break;
    case 7:
      // Despesas Fixas
        

      //  REVER A ESTRUTURA DE FATURA E A LÓGICA QUE SERÁ USADA, SE REALMENTE SERÁ CADASTRADA OU SE SERÁ GERADA A PARTIR DAS MOVIMENTAÇÕES EM QUE O CARTÃO É INFORMADO


      // $tabela = "fatura";
      // $col_inserts=[
      //   'idcartao',
      //   'mesreferencia',
      //   'diaDespesa',
      //   'mesDespesa'
      // ];

      // // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      // $i=0;
      // foreach($_POST as $valor){
      //   $dados[$col_inserts[$i]]=$valor;
      //   $i++;
      // }
      
      // $dados['fAtivo']=1;
      // $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    case 8:
      // Despesas Fixas
        
      $tabela = "despesafixa";
      $col_inserts=[
        'nmDespesaFixa',
        'dscDespesaFixa',
        'diaDespesa',
        'mesDespesa'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    case 9:
      // Fontes de Renda
        
      $tabela = "emprestimo";
      $col_inserts=[
        'nmEmprestimo',
        'dscEmprestimo',
        'idPessoa',
        'vlrEmprestimo',
        'VezesPagamento',
        'Juros',
        'idJurosPeriodicidade',
        'idEmprestimoSituacao'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      // $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    case 10:
        // Fontes de Renda
        
      $tabela = "receita";
      $col_inserts=[
        'nmReceita',
        'idPessoa',
        'dscReceita',
        'vlrReceita',
        'dthReceita'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      // $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    case 11:
      // Ativos
        
      $tabela = "ativo";
      $col_inserts=[
        'nmAtivo',
        'dscAtivo',
        'idTipoAtivo',
        'idPessoa',
        'Rendimento',
        'dthAquisicao'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }
      
      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    case 12:
        echo "Este é o case 12";
        break;
    case 13:
        // Tipos de Obrigações
        
      $tabela = "tipoobrigacao";
      $col_inserts=[
        'nmTipoObrigacao',
        'idCaraterMovimentacao'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }

      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    case 14:
      // Tipos de Gastos
        
      $tabela = "tipogasto";
      $col_inserts=[
        'nmTipoGasto'
      ];

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }

      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    case 15:
        echo "Este é o case 15";
        break;
    case 16:
        echo "Este é o case 16";
        break;
    case 17:
        echo "Este é o case 17";
        break;
    case 18:
      // Usuários
        
      $tabela = "pessoa";
      $col_inserts=[
        'nmPessoa',
        'idNivelRelacionamento',
        'idTipoacesso',
        'CPF',
        'LoginAcesso',
        'Senha',
      ];
      $_POST['Senha']=base64_encode($_POST['Senha']);

      // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
      $i=0;
      foreach($_POST as $valor){
        $dados[$col_inserts[$i]]=$valor;
        $i++;
      }

      $dados['fAtivo']=1;
      $dados['idusuariotitular']=$_SESSION['idusuariotitular'];

        break;
    // default:
    //     echo "Número fora do intervalo de 1 a 18";
    //     break;
  }
  // var_dump($_POST);
  // var_dump($dados);
  return inserir($tabela, $dados);
  

}

function update_sql($tela){

  $condicoes=base64_decode(base64_decode(base64_decode(base64_decode($_GET['id']))));
  switch ($tela) {
      case 1:
          echo "Este é o case 1";
          break;
      case "02_inativa":
        
        $tabela = "movimentacao";
        $condicoes = "idMovimentacao = ".$condicoes;
        $dados['fAtivo']=0;

          break;
      case "02_Obrigacao":
        
        $tabela = "movimentacao";
        $condicoes = "idMovimentacao = ".$condicoes;
        $col_inserts=[
          'idCaraterMovimentacao',
          'idPessoa',
          'idConta',
          'idTipoObrigacao',
          'idPlanejamento',
          'idFormaPagamento',
          'vlrMovimentacao',
          'dthMovimentacao'
        ];
        
        unset($_POST['obrigacao']);
        array_pop($_POST);
        
        // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
        $i=0;
        echo count($_POST);
        foreach($_POST as $valor){
          $dados[$col_inserts[$i]]=$valor;
          $i++;
        }
        
        $dados['fAtivo']=1;
        $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        
          break;
      case "02_Gasto":
        
        $tabela = "movimentacao";
        $condicoes = "idMovimentacao = ".$condicoes;
        $col_inserts=[
          'idCaraterMovimentacao',
          'idPessoa',
          'idConta',
          'idTipoGasto',
          'idPlanejamento',
          'idFormaPagamento',
          'vlrMovimentacao',
          'dthMovimentacao'
        ];
        
        unset($_POST['gasto']);
        array_pop($_POST);
        
        // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
        $i=0;
        echo count($_POST);
        foreach($_POST as $valor){
          $dados[$col_inserts[$i]]=$valor;
          $i++;
        }
        
        $dados['fAtivo']=1;
        $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
        
          break;
      case 3:
        $tabela = "planejamento";
        $condicoes = "idplanejamento = ".$condicoes;
        $col_inserts=[
          'nmPlanejamento',
          'dscPlanejamento',
          'vlrPlanejamento',
          'mesPlanejamento',
          'idPlanejamentoStatus'
        ];
        
        array_pop($_POST);
        
        // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
        $i=0;
        echo count($_POST);
        foreach($_POST as $valor){
          $dados[$col_inserts[$i]]=$valor;
          $i++;
        }
        
        $dados['fAtivo']=1;
        $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
          break;
      case 4:
        $tabela = "objetivo";
        $condicoes = "idobjetivo = ".$condicoes;
        $col_inserts=[
          'nmObjetivo',
          'dscObjetivo',
          'vlrObjetivo',
          'dthPrevisao',
          'idObjetivoStatus'
        ];
        
        array_pop($_POST);
        
        // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
        $i=0;
        echo count($_POST);
        foreach($_POST as $valor){
          $dados[$col_inserts[$i]]=$valor;
          $i++;
        }
        
        $dados['fAtivo']=1;
        $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
          break;
      case 5:
        $tabela = "conta";
        $condicoes = "idconta = ".$condicoes;
        $col_inserts=[
          'nmConta',
          'dscConta',
          'idTipoConta'
        ];
        
        array_pop($_POST);
        
        // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
        $i=0;
        echo count($_POST);
        foreach($_POST as $valor){
          $dados[$col_inserts[$i]]=$valor;
          $i++;
        }
        
        $dados['fAtivo']=1;
        $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
          break;
      case 6:
        $tabela = "cartao";
        $condicoes = "idcartao = ".$condicoes;
        $col_inserts=[
          'nmCartao',
          'dscCartao',
          'idTipoCartao',
          'idConta',
          'idCartaoStatus',
          'diaVencimentoFatura'
        ];
        
        array_pop($_POST);
        
        // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
        $i=0;
        echo count($_POST);
        foreach($_POST as $valor){
          $dados[$col_inserts[$i]]=$valor;
          $i++;
        }
        
        $dados['fAtivo']=1;
        $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
          break;
      case 7:
          echo "Este é o case 7";
          break;
      case 8:
        $tabela = "despesafixa";
        $condicoes = "iddespesafixa = ".$condicoes;
        $col_inserts=[
          'nmDespesaFixa',
          'dscDespesaFixa',
          'diaDespesa',
          'mesDespesa'
        ];
        
        array_pop($_POST);
        
        // ESQUEMA PARA COLOCAR OS VALORES DA ARRAY $col_inserts E OS VALORES DA ARRAY $_POST COMO 'CHAVES' E 'VALORES' DA ARRAY $dados RESPECTIVAMENTE
        $i=0;
        echo count($_POST);
        foreach($_POST as $valor){
          $dados[$col_inserts[$i]]=$valor;
          $i++;
        }
        
        $dados['fAtivo']=1;
        $dados['idusuariotitular']=$_SESSION['idusuariotitular'];
          break;
      case 9:
          echo "Este é o case 9";
          break;
      case 10:
          echo "Este é o case 10";
          break;
      case 11:
          echo "Este é o case 11";
          break;
      case 12:
          echo "Este é o case 12";
          break;
      case 13:
          echo "Este é o case 13";
          break;
      case 14:
          echo "Este é o case 14";
          break;
      case 15:
          echo "Este é o case 15";
          break;
      case 16:
          echo "Este é o case 16";
          break;
      case 17:
          echo "Este é o case 17";
          break;
      case 18:
          echo "Este é o case 18";
          break;
      default:
          echo "Número fora do intervalo de 1 a 18";
          break;
  }

  return gerador_update_sql($tabela,$dados,$condicoes);

}
?>
