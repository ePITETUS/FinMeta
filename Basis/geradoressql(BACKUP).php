<?php

function select_sql($tabelas,$colunas,$nmcolunas,$posicao_colunas=null,$relacionamento=null,$posicao_param=null,$colunas_param=null,$parametro=null){

    // TABELAS QUE SERÃO USADAS NA CONSULTA
    // A PRIMEIRA SEMPRE É A TABELA CONSULTA AS OUTRAS SÃO AS RELACIONADAS
    //   $tabelas=array(
    //   'pessoa',
    //   'usuariotitular',
    //   'tipoacesso',
    //   'nivelrelacionamento',
    // );
    
    // // COLUNAS NA ORDEM QUE SE DESEJA EXIBIR
    // $colunas=array(
    //   'nmPessoa',
    //   'dscRelacionamento',
    //   'nmTipoAcesso',
    //   'Email',
    //   'CPF',
    //   'LoginAcesso',
    // );
    
    // // NOME PARA QUE SE DESEJA EXIBIR NA ORDEM DAS COLUNAS  
    // $nmcolunas=array(
    //   'Nome Dependente',
    //   'Nível Relacionamento',
    //   'Tipo de Acesso',
    //   'E-mail',
    //   'CPF Usuário',
    //   'Login Usuário',
    // );
    
    // // INFORMAÇÃO A POSIÇÃO DA TABELA  NA ARRAY TABELAS PARA CADA COLUNA
    // // 0 SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA
    // // 1, 2, 3, ... SIGNIFICA QUE A COLUNA É DA TABELA CONSULTADA E...
    // $posicao_colunas=array(
    //   0,
    //   3,
    //   2,
    //   0,
    //   0,
    //   0,
    // );

    // // SÃO OS TIPOS DE RELACIONAMENTO (SÃO INFORMADAS NA MESMA ORDEM DAS TABELAS)
    // //  0 = INNER JOIN
    // //  1 = LEFT JOIN
    // //  2 = RIGHT JOIN
    // $relacionamento=array(
    //   0,
    //   0,
    //   1,
    // );
    
    // // INFORMAÇÃO A POSIÇÃO DA TABELA  NA ARRAY TABELAS PARA CADA PARÂMETRO
    // // É INFORMADO NA MESMA ORDEM DA $colunas_param E DA $parametro
    // $posicao_param=array(
    //   0,
    //   0,
    // );
    
    // // COLUNAS QUE SERÃO CONSULTADAS COM OS PARÂMETROS
    // $colunas_param=array(
    //   "UsuarioTitular_idUsuarioTitular",
    //   "fAtivo",
    // );
    
    // // PARÂMETROS
    // $parametro=array(
    //   $_SESSION['idusuariotitular'],
    //   1,
    // );


    // COMEÇA A MONTAR O SLQ
    $sql= "SELECT  ";
    for($i=0;$i<count($colunas);$i++){
      // VALIDA SE É TABELA ESTRANGEIRA
      if($posicao_colunas!==null && $posicao_colunas[$i]!==0){// CASO SEJA ESCREVE COM UMA SINTAXE
        
        $sql= $sql.$tabelas[$posicao_colunas[$i]].".".$colunas[$i]." AS ".$nmcolunas[$i];

      }else{// CASO NÃO SEJA ESCREVE COM OUTRA
        
        // VALIDA SE É A ÚLTIMA LINHA OU NÃO
        $sql= $sql.$tabelas[$posicao_colunas[$i]].".".$colunas[$i]." AS ".$nmcolunas[$i];
      }
      if($i<(count($colunas)-1)){
        $sql= $sql.', ';
      }
    }
  
    
    // REINICIA CONTADOR PARA CASO SEJA TABELA ESTRANGEIRA
    $i2=0;
    for($i=0;$i<count($tabelas);$i++){
      // SE FOR A PRIMEIRA TABELA ESCREVE DE UMA MANEIRA
      if($i==0){
        $sql= $sql." FROM ".$tabelas[$i]." ";
      }elseif($relacionamento!==null){

        if($relacionamento[$i2]==0){
          $sql= $sql." INNER JOIN ".$tabelas[$i]." ON ".$tabelas[$i].".id".$tabelas[$i]." = ".$tabelas[0].".".$tabelas[$i]."_id".$tabelas[$i];
        }elseif($relacionamento[$i2]==1){
          $sql= $sql." LEFT JOIN ".$tabelas[$i]." ON ".$tabelas[$i].".id".$tabelas[$i]." = ".$tabelas[0].".".$tabelas[$i]."_id".$tabelas[$i]." ";
        }elseif($relacionamento[$i2]==2){
          $sql= $sql." RIGHT JOIN ".$tabelas[$i]." ON ".$tabelas[$i].".id".$tabelas[$i]." = ".$tabelas[0].".".$tabelas[$i]."_id".$tabelas[$i]." ";
        } 
        $i2++;
      }        
    }

    $sql=$sql." WHERE  ";
    for($i=0;$i<count($parametro);$i++){
      $sql=$sql.$tabelas[$posicao_param[$i]].".".$colunas_param[$i]." = ".$parametro[$i];
      if($i<(count($parametro)-1)){
        $sql= $sql.'  AND ';
      }
    }
    return $sql;
}

//////////////////////////////////////////////////////


function gerarSelectSQL($tabela, $colunas = [], $condicoes = [], $joins = [], $groupBy = [], $orderBy = [], $limit = null) {
    $sql = "SELECT ";

    // Adicionar colunas com alias e agregações, se fornecido
    $colunasComAlias = [];
    foreach ($colunas as $coluna => $aliasOuAgregacao) {
        if (is_array($aliasOuAgregacao)) {
            // Se for array, o valor pode ter uma agregação e um alias
            $agregacao = $aliasOuAgregacao['agregacao'] ?? null;
            $alias = $aliasOuAgregacao['alias'] ?? null;
            
            if ($agregacao) {
                // Se houver agregação, aplicamos ao nome da coluna
                $colunasComAlias[] = "$agregacao($coluna)" . ($alias ? " AS $alias" : "");
            } else {
                // Caso contrário, apenas usamos a coluna com alias
                $colunasComAlias[] = "$coluna AS $alias";
            }
        } else {
            // Se não for array, apenas consideramos a coluna com alias simples
            $colunasComAlias[] = "$coluna AS $aliasOuAgregacao";
        }
    }
    $sql .= implode(", ", $colunasComAlias);

    // Tabela principal
    $sql .= " FROM $tabela";

    // Adicionar joins, se houver
    foreach ($joins as $join) {
        $tipo = strtoupper($join['tipo']);
        $sql .= " $tipo JOIN " . $join['tabela'] . " ON " . $join['condicao'];
    }

    // // Adicionar condições (WHERE)
    // if (!empty($condicoes)) {
    //     $sql .= " WHERE " . implode(" AND ", $condicoes);
    // }

    // Condições WHERE
    if (!empty($condicoes)) {
        $whereParts = [];
        foreach ($condicoes as $campo => $valor) {
            // Escapar valores e verificar se é um valor específico ou um array de condições
            if (is_array($valor)) {
                $whereParts[] = "$campo IN ('" . implode("', '", array_map('addslashes', $valor)) . "')";
            } else {
                $whereParts[] = "$campo = '" . addslashes($valor) . "'";
            }
        }
        $sql .= " WHERE " . implode(" AND ", $whereParts);
    }

    // Adicionar cláusulas GROUP BY, se houver
    if (!empty($groupBy)) {
        $sql .= " GROUP BY " . implode(", ", $groupBy);
    }

    // Adicionar cláusulas ORDER BY, se houver
    if (!empty($orderBy)) {
        $sql .= " ORDER BY " . implode(", ", $orderBy);
    }

    // Adicionar limite, se houver
    if (!empty($limit)) {
        $sql .= " LIMIT $limit";
    }

    return $sql;
}



// Usando a Função com Aliases(Apelidos)

// $sql = gerarSelectSQL(
//     'vendas', // Tabela principal
//     [
//         'vendas.idVenda' => 'ID da Venda', // Alias simples
//         'clientes.nome' => 'Nome do Cliente', // Alias simples
//         'produtos.nome' => 'Nome do Produto', // Alias simples
//         'vendas.valor' => ['agregacao' => 'SUM', 'alias' => 'Valor Total'], // Usando SUM com alias
//         'vendas.quantidade' => ['agregacao' => 'COUNT', 'alias' => 'Total de Vendas'] // Usando COUNT com alias
//     ],
//     [], // Condições (WHERE)
//     [
//         [
//             'tipo' => 'inner', 
//             'tabela' => 'clientes', 
//             'condicao' => 'vendas.idCliente = clientes.idCliente'
//         ],
//         [
//             'tipo' => 'left', 
//             'tabela' => 'produtos', 
//             'condicao' => 'vendas.idProduto = produtos.idProduto'
//         ]
//     ],
//     ['vendas.idVenda'], // GROUP BY
//     ['vendas.idVenda DESC'], // ORDER BY
//     10 // LIMIT
// );



// Resultado da Consulta SQL

// "SELECT vendas.idVenda AS 'ID da Venda', clientes.nome AS 'Nome do Cliente', produtos.nome AS 'Nome do Produto', SUM(vendas.valor) AS 'Valor Total', COUNT(vendas.quantidade) AS 'Total de Vendas'
// FROM vendas
// INNER JOIN clientes ON vendas.idCliente = clientes.idCliente
// LEFT JOIN produtos ON vendas.idProduto = produtos.idProduto
// GROUP BY vendas.idVenda
// ORDER BY vendas.idVenda DESC
// LIMIT 10;";

?>