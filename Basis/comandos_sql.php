<?php

    // FUNÇÃO QUE GERA SELECTS DE FORMA DINÂMICA
    function gerador_select_sql($tabelas,$colunas,$nmcolunas,$posicao_colunas=null,$relacionamento=null,$posicao_param=null,$colunas_param=null,$parametro=null){

        // // TABELAS QUE SERÃO USADAS NA CONSULTA
        // // A PRIMEIRA SEMPRE É A TABELA CONSULTA AS OUTRAS SÃO AS RELACIONADAS
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
          // echo $i;
          if($posicao_colunas!==null && $posicao_colunas[$i]!==0){// CASO SEJA ESCREVE COM UMA SINTAXE
            
            $sql= $sql.$tabelas[$posicao_colunas[$i]].
            ".".$colunas[$i]." AS '".$nmcolunas[$i]."'";
    
          }else{// CASO NÃO SEJA ESCREVE COM OUTRA
            
            // VALIDA SE É A ÚLTIMA LINHA OU NÃO
            $sql= $sql.$tabelas[$posicao_colunas[$i]
            ].".".$colunas[$i]." AS '".$nmcolunas[$i]."'";// SE DER ERRO AQUI, MUITO PROVAVELMENTE VOCÊ ESQUECEU ALGO NA FUNÇÃO consulta_sql()
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
              $sql= $sql." INNER JOIN ".$tabelas[$i]." ON ".$tabelas[$i].".id".$tabelas[$i]." = ".$tabelas[0].".id".$tabelas[$i];
            }elseif($relacionamento[$i2]==1){
              $sql= $sql." LEFT JOIN ".$tabelas[$i]." ON ".$tabelas[$i].".id".$tabelas[$i]." = ".$tabelas[0].".id".$tabelas[$i]." ";
            }elseif($relacionamento[$i2]==2){
              $sql= $sql." RIGHT JOIN ".$tabelas[$i]." ON ".$tabelas[$i].".id".$tabelas[$i]." = ".$tabelas[0].".id".$tabelas[$i]." ";
            } 
            $i2++;
          }        
        }
    
        $sql=$sql." WHERE  ";
        if($parametro!==null){

          for($i=0;$i<(count($parametro));$i++){
            // echo $i;
            $sql=$sql.$tabelas[$posicao_param[$i]].
            ".".$colunas_param[$i]." = "
            .$parametro[$i];
            if($i<(count($parametro)-1)){
              $sql= $sql.'  AND ';
            }
            // echo $parametro[$i];
          }
          // echo $sql;
        }
        return $sql;
    }

// FUNÇÃO PARA GERAR COMANDOS INSERTS SQL
function inserir($tabela, $dados) {
    // Extrai as colunas e valores do array $dados
    $colunas = implode(", ", array_keys($dados));
    $valores = implode(", ", array_map(function($valor) {
        // Garante que cada valor seja entre aspas simples, exceto para valores numéricos
        return is_numeric($valor) ? $valor : "'" . addslashes($valor) . "'";
    }, array_values($dados)));

    // Monta o comando SQL
    $sql = "INSERT INTO $tabela ($colunas) VALUES ($valores);";

    return $sql;
}

// Exemplo de uso:
// $dados = [
//     "nome" => "João",
//     "email" => "joao@example.com",
//     "idade" => 28,
//     "cidade" => "São Paulo"
// ];

// $tabela = "usuarios";
// $sqlInsert = gerarInsertSQL($tabela, $dados);
// echo $sqlInsert;

function gerador_update_sql($tabela, $dados, $condicoes = null) {
  // Início do comando SQL
  $sql = "UPDATE $tabela SET ";
  
  // Adicionar as colunas e valores
  $set = [];
  foreach ($dados as $coluna => $valor) {
      // Sanitizar valor para prevenir problemas de segurança
      $valor = is_numeric($valor) ? $valor : "'".addslashes($valor)."'";
      $set[] = "$coluna = $valor";
  }
  $sql .= implode(", ", $set);
  
  // Adicionar as condições, se existirem
  if ($condicoes) {
      $sql .= " WHERE " . $condicoes;
  }
  
  return $sql . ";";
}

// // Exemplo de uso
// $dados = [
//   "coluna1" => "dado1",
//   "coluna2" => "dado2",
//   "coluna3" => "dado3",
// ];

// $tabela = "tabela";
// $condicoes = "id = 1"; // Condição opcional

// $sqlUpdate = gerarUpdateSQL($tabela, $dados, $condicoes);
// echo $sqlUpdate;

?>
