<?php

include "config.php";
include 'comandos_sql.php';
include 'consulta_sql.php';


// SAI DA SEÇÃO
if(isset($_GET['sair'])){
  session_start();
  session_destroy();
  header("location: ../sitefinmeta/login.php");
};

// FUNCTION PARA VALIDAR CPF
function valida_cpf($cpf){
  // Valida se o CPF tem todos os caracteres
  if (strlen($cpf)!=11){
    return 'CPF com tamanho inválido';
  }

  // Cálculo de CPF
  // $qntd é a quantidade de carcacteres do CPF que serão validados
  // $valid é o resultado do cálculo para a validação
  // $posi é a posição do carcacteres do CPF que será incluído no cálculo
  // $multi é o valor que está sendo multiplicado pelo carcacter do CPF incluído
  for($qntd = 10;$qntd<=11;$qntd++){
  
    for ($valid=0,$multi = $qntd,$posi = 0;$multi > 1 ;$multi--,$posi++){
    
      $valid += $cpf[$posi]*$multi;
    
    }
  
    $valid = ($valid*10)%11;
  
    if ($valid == $cpf[$posi]){
      // CPF inválido
      return 'CPF inválido';
    }
    }
  
    return 'CPF Válido';
}

  // VALIDAÇÃO SE A SESSÃO ESTÁ ABERTA OU NÃO
  function valida_sessao(){
    session_start();
    if(!isset($_SESSION['idpessoa'])){
      header("location:login.php");
    }
  }

  // PÓS CADASTRO
  function pos_cadastro_usuariotitular(){
    if (isset($_POST['form4'])){

      echo '<div class="container" style="background-color: #8BCA84; border-color: #ebccd1; width:450px;">
              <h2 style="margin-left: auto; margin-right: auto; margin-top: 45%; color: #0F2310;">CONTA CADASTRADA!</h2>
              <h2 style="margin-left: auto; margin-right: auto; color: #0F2310;">AGORA FAÇA O LOGIN</h2>
              <h2 style="margin-left: auto; margin-right: auto;  color: #0F2310;">COM AS INFORMAÇÕES QUE</h2>
              <h2 style="margin-left: auto; margin-right: auto; margin-bottom: 45%;  color: #0F2310;">VOCÊ ACABOU DECADASTRAR!</h2>
            </div>';
            $_POST=[];
    }
  }


  // CADASTRA NOVO USER E O ENVIA PARA O FORM 1
  function cadastro_usuariotitular(){

    if(isset($_POST['cadastro'])){
      include "config.php";

      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $cpf = $_POST['cpf'];
      $senha = base64_encode($_POST['senha']);
      $selectusuariotitular =$conn ->prepare("SELECT * FROM usuariotitular Where email = :email or CPF = :cpf;");
      $selectusuariotitular->bindValue(":email",$email);
      $selectusuariotitular->bindValue(":cpf",$cpf);
      $selectusuariotitular ->execute();
      $row=$selectusuariotitular->rowCount();
      if($row>0){
      
      echo '<div class="container" style="background-color: #f99; border-color: #ebccd1; width:450px;">
              <h2 style="margin-left: auto; margin-right: auto; margin-top: 45%; color: #420c09;">CADÁSTRO EXISTENTE!</h2>
              <h2 style="margin-left: auto; margin-right: auto; margin-bottom: 45%;  color: #420c09;">INFORME OUTRO CPF E E-MAIL!</h2>
            </div>';
            $_POST=[];
      }else{
      $insertusuariotitular = $conn ->prepare("INSERT INTO `usuariotitular` (`idUsuarioTitular`, `nmUsuario`, `dthRegistro`, `CPF`, `Senha`, `Email`) VALUES (NULL, :nome, CURRENT_TIMESTAMP(), :cpf, :senha, :email);");
      $insertusuariotitular->bindValue(":nome",$nome);
      $insertusuariotitular->bindValue(":cpf",$cpf);
      $insertusuariotitular->bindValue(":email",$email);
      $insertusuariotitular->bindValue(":senha",$senha);
      $insertusuariotitular->execute();
      
      $selectusuariotitular ->execute();
      $resultusuariotitular=$selectusuariotitular ->fetch();
      $idusuariotitular= $resultusuariotitular["idUsuarioTitular"];
      
      $insertpessoa = $conn ->prepare("INSERT INTO `pessoa` (`idPessoa`, `idTipoAcesso`, `idUsuarioTitular`, `idNivelRelacionamento`, `nmPessoa`, `dthNasc`, `dthRegistro`, `Email`, `LoginAcesso`, `Senha`, `fAtivo`) VALUES (NULL, '1', :idusuariotitular, NULL, :nome, NULL, CURRENT_TIMESTAMP(), :email, :email, :senha , b'1');");
      $insertpessoa->bindValue(":idusuariotitular",$idusuariotitular);
      $insertpessoa->bindValue(":nome",$nome);
      $insertpessoa->bindValue(":cpf",$cpf);
      $insertpessoa->bindValue(":email",$email);
      $insertpessoa->bindValue(":senha",$senha);
      $insertpessoa->execute();
      $_POST=[];
      header("location:form1.php");
      // DEPOIS FAZER VALIDAÇÃO PARA VER CASOS DE ERRO    
      }
    }
  };

  // FUNÇÃO PARA CRIAR UM SESSÃO PARA O USUÁRIO ACESSAR
  function login_criasessao(){
    if(isset($_POST['logar'])){
      include "config.php";

      $cpf = $_POST['cpf'];
      $usuario = $_POST['usuario'];
      $senha = base64_encode($_POST['senha']);

      $selectloginpessoa = $conn -> prepare ("SELECT * FROM pessoa INNER JOIN usuariotitular ON usuariotitular.idUsuarioTitular = pessoa.idUsuarioTitular WHERE usuariotitular.CPF = :cpf AND pessoa.LoginAcesso = :usuario AND pessoa.Senha = :senha ;");
      $selectloginpessoa->bindValue(":cpf",$cpf);
      $selectloginpessoa->bindValue(":usuario",$usuario);
      $selectloginpessoa->bindValue(":senha",$senha);
      $selectloginpessoa->execute();
      
      if($selectloginpessoa ->rowCount()==0){

        echo '<div class="container" style="background-color: #f99; border-color: #ebccd1; width:450px;">
                <h2 style="margin-left: auto; margin-right: auto; margin-top: 30%; color: #420c09;">INFORMAÇÕES DE ACESSO<BR></h2>
                <h2 style="margin-left: auto; margin-right: auto; color: #420c09;">INCORRETAS!</h2>
                <h2 style="margin-left: auto; margin-right: auto; color: #420c09;"><BR>VERIFIQUE AS INFORMAÇÕES DE</h2>
                <h2 style="margin-left: auto; margin-right: auto; color: #420c09;">CPF DO TITULAR<BR></h2>
                <h2 style="margin-left: auto; margin-right: auto; margin-bottom: 30%;  color: #420c09;">LOGIN E SENHA!</h2>
              </div>';
        $_POST=[];

      }else{

        session_start();
        $linhas_loginpessoa = $selectloginpessoa->fetch();
        $idpessoa = $linhas_loginpessoa['idPessoa'];
        $idusuariotitular = $linhas_loginpessoa['idUsuarioTitular'];
        $nmpessoa = $linhas_loginpessoa['nmPessoa'];
        $idtipoacesso = $linhas_loginpessoa['idTipoAcesso'];
        $_SESSION['idpessoa']=$idpessoa;
        $_SESSION['idusuariotitular']=$idusuariotitular;
        $_SESSION['nmpessoa']=$nmpessoa;
        $_SESSION['idtipoacesso']=$idtipoacesso;
        
        header("location:../sitefinmeta/01_home_log.php");
      }
    }
  };

        
 

  // AVATAR DO USUÁRIO NO HEADER
  function avatar_usuario(){
    ?>
      <a href="#" class="d-flex align-items-center link-body-emphasis text-finmeta   text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #0d6efd">
        <img src="../imagens/pedro.png" alt="" width="48" height="48" class="rounded-circle me-2">
        <strong><?php echo $_SESSION['nmpessoa']; ?></strong>
      </a>
    <?php
  }

  // RETORNA UMA ARRAY COM AS COLUNAS DE UMA TELA COM BASE NO $tela PARA MOSTRAR 
  function colunas_telas($tela){
    // SWITCH CASE PARA TORNAR DINÂMICA A CRIAÇÃO DO BOTÃO
    // ADIÇÃO DO NOME DAS COLUNAS NA ARRAY QUE VAI NA FUNÇÃO TABELA E EM OUTRAS FUNÇÕES(**** TEM QUE SER NA ORDEM QUE VOCÊ QUER QUE APAREÇA ****)
    switch ($tela) {
      case 1:
          echo "Home";
          break;
      case 2:
          // echo "Movimentações";
          $col = array(
              'Natureza Movimentação'  => 'select',
              'Usuário Resposável'  => 'select',
              'Conta Movimentada'  => 'select',
              'Origem Movimentação'  => 'select',
              'Orçamento Afetado'  => 'select',
              'Forma de Pagamento/Recebimento'  => 'select',
              'Valor Movimentação(R$)'  => 'n',
              'Data Movimentação'  => 'dt'
          );
          break;
      case 3:
          // echo "Orçamento Mensal";
          $col = array(
              'Nome Orçamento' => 't',
              'Descrição' => 't',
              'Economia Esperada(R$)' => 'n',
              'Mês Referente' => 'n',
              'Resultado' => 'select'
          );
          break;
      case 4:
          // echo "Objetivos/Metas";
          $col = array(
              'Nome Objetivo' => 't',
              'Descrição' => 't',
              'Valor ' => 'n',
              'Previsão p/ Alcançar' => 'dt',
              'Status Objetivo' => 'select'
          );
          break;
      case 5:
          // echo "Contas";
          $col = array(
              'Nome Conta' => 't',
              'Descrição-Conta' => 't',
              'Tipo de Contas' => 'select'
          );
          break;
      case 6:
          // echo "Cartões";
          $col = array(
              'Nome Cartão' => 't',
              'Descrição Cartão' => 't',
              'Tipo do Cartão' => 'select',
              'Conta Relacionada' => 'select',
              'Status Cartão' => 'select',
              'Dia de Vencimento da Fatura' => 'n'
          );
          break;
      case 7:
          // echo "Faturas de Cartões";
          $col=array(
            'Cartão Referente' => 't',
            'Mês Referente' => 'm',
            'Data de vencimento' => 'date',
            'Status Fatura' => 'select'
          );

          break;
      case 8:
          // echo "Despesas Fixas";
          $col = array(
              'Nome Despesas' => 't',
              'Descrição-Despesas' => 't',
              'Dia de Ocorrência' => 'n',
              'Mês de Ocorrência' => 'n'
          );
          break;
      case 9:
          // echo "Empréstimos";
          $col = array(
              'Empréstimos' => 't',
              'Descrição Empréstimo' => 't',
              'Usuário' => 'select',
              'Valor Emprestado' => 'n',
              'Parcelas Pagamento' => 'n',
              'Juros(%)' => 'n',
              'Aplicação Juros' => 'select',
              'Status Empréstimo' => 'select'
          );
          break;
      case 10:
          // echo "Receitas/Fontes de Renda";
          $col = array(
              'Receitas ou Fontes de Renda' => 't',
              'Usuário' => 'select',
              'Descrição Receitas/Fontes de Renda' => 't',
              'Valor(R$)' => 'n',
              'Dia de Pagamento' => 'n'
          );
          break;
      case 11:
          // echo "Ativos";
          $col = array(
              "Nome Ativo" => 't',
              "Descrição Ativo" => 't',
              "Tipo Ativo" => 'select',
              "Usuário" => 'select',
              "Rendimento(%)" => 'n',
              "Data Aquisição" => 'dt'
          );
          break;
      case 12:
          // echo "Calendário";
          break;
      case 13:
          // echo "Tipos de Obrigações";
          $col = array(
            'Tipo de Ocorrência'=> 't',
            'Natureza Movimentação'  => 'select'
          );
          break;
      case 14:
          // echo "Tipo de Gastos";
          $col = array('Descrição do Tipo de Gasto'=>'t');
          break;
      case 15:
          // echo "Relatórios";
          break;
      case 16:
          // echo "Configurações";
          break;
      case 17:
          // echo "Perfil";
          break;
      case 18:
          // echo "Usuários";
        $col = [
          'Nome Usuário' => 't',
          'Nível Relacionamento' => 'select', 
          'Tipo de Acesso' => 'select',
          'E-mail' => 'e',
          'CPF Usuário' => 'cpf',
          'Login Usuário' => 't',
          'Senha' => 'p'
        ];
        
        break;
      }
      return $col;
  }  
  
  // FUNCTION QUE PODE RETORNAR O NOME DA TELA, A NUMERAÇÃO DA TELA OU O NOME DO ARQUIVO DA TELA, DEPENDENDO DOS POSSÍVEIS VALORES DO PARÂMETRO $nome_arquivo, SENDO ELES null, 1 OU 2 PARA OS RETORNOS RESPECTIVAMENTE
  function telaconsulta($tela_consulta,$nome_arquivo=NULL){

    // $nome_arquivo É PARA SABER SE DEVE RETORNAR O NOME DO ARQUIVO, CASO ESTEJA NULA, EXIBE O NOME DA TELA(USADO NO FORM(HTML) DE CADASTRO)
    // SWITCH CASE PARA TORNAR DINÂMICA A CRIAÇÃO DO BOTÃO
    switch ($tela_consulta) {
      case 1:
        if($nome_arquivo==null){
          echo "Home";
        }elseif($nome_arquivo==1){
          echo "01";
        }elseif($nome_arquivo==2){
          return "01_home_log.php";
        }
          break;
      case 2:
        if($nome_arquivo==null){
          echo "Movimentações";
        }elseif($nome_arquivo==1){
          echo "02";
        }elseif($nome_arquivo==2){
          return "02_movimentacao.php";
        }
          break;
      case 3:
        if($nome_arquivo==null){
          echo "Orçamento Mensal";
        }elseif($nome_arquivo==1){
          echo "03";
        }elseif($nome_arquivo==2){
          return "03_orcamento.php";
        }
          break;
      case 4:
        if($nome_arquivo==null){
          echo "Objetivos/Metas";
        }elseif($nome_arquivo==1){
          echo "04";
        }elseif($nome_arquivo==2){
          return "04_meta.php";
        }
          break;
      case 5:
        if($nome_arquivo==null){
          echo "Contas";
        }elseif($nome_arquivo==1){
          echo "05";
        }elseif($nome_arquivo==2){
          return "05_conta.php";
        }
          break;
      case 6:
        if($nome_arquivo==null){
          echo "Cartões de Crédito";
        }elseif($nome_arquivo==1){
          echo "06";
        }elseif($nome_arquivo==2){
          return "06_cartao.php";
        }
          break;
      case 7:
        if($nome_arquivo==null){
          echo "Faturas de Cartões";
        }elseif($nome_arquivo==1){
          echo "07";
        }elseif($nome_arquivo==2){
          return "07_fatura.php";
        }
          break;
      case 8:
        if($nome_arquivo==null){
          echo "Despesas Fixas";
        }elseif($nome_arquivo==1){
          echo "08";
        }elseif($nome_arquivo==2){
          return "08_despesa.php";
        }
          break;
      case 9:
        if($nome_arquivo==null){
          echo "Empréstimos";
        }elseif($nome_arquivo==1){
          echo "09";
        }elseif($nome_arquivo==2){
          return "09_emprestimo.php";
        }
          break;
      case 10:
        if($nome_arquivo==null){
          echo "Receitas/Fontes de Renda";
        }elseif($nome_arquivo==1){
          echo "10";
        }elseif($nome_arquivo==2){
          return "10_renda.php";
        }
          break;
      case 11:
        if($nome_arquivo==null){
          echo "Ativos";
        }elseif($nome_arquivo==1){
          echo "11";
        }elseif($nome_arquivo==2){
          return "11_ativo.php";
        }
          break;
      case 12:
        if($nome_arquivo==null){
          echo "Calendário";
        }elseif($nome_arquivo==1){
          echo "12";
        }elseif($nome_arquivo==2){
          return "12_calendario.php";
        }
          break;
      case 13:
        if($nome_arquivo==null){
          echo "Tipos de Ocorrências";
        }elseif($nome_arquivo==1){
          echo "13";
        }elseif($nome_arquivo==2){
          return "13_obrigacao.php";
        }
          break;
      case 14:
        if($nome_arquivo==null){
          echo "Tipo de Gastos";
        }elseif($nome_arquivo==1){
          echo "14";
        }elseif($nome_arquivo==2){
          return "14_gasto.php";
        }
          break;
      case 15:
        if($nome_arquivo==null){
          echo "Relatórios";
        }elseif($nome_arquivo==1){
          echo "15";
        }elseif($nome_arquivo==2){
          return "15_relatorio.php";
        }
          break;
      case 16:
        if($nome_arquivo==null){
          echo "Configurações";
        }elseif($nome_arquivo==1){
          echo "16";
        }elseif($nome_arquivo==2){
          return "16_configuracao.php";
        }
          break;
      case 17:
        if($nome_arquivo==null){
          echo "Perfil";
        }elseif($nome_arquivo==1){
          echo "17";
        }elseif($nome_arquivo==2){
          return "17_perfil.php";
        }
          break;
      case 18:
        if($nome_arquivo==null){
          echo "Usuários";
        }elseif($nome_arquivo==1){
          echo "18";
        }elseif($nome_arquivo==2){
          return "18_dependente.php";
        }
          break;
    }
  }
  
        // FUNCTION QUE CRIA DE MANEIRA DINÂMICA A TABELA COM BASE NO SELEC
        function tabela($algoritimo_sql,$colunas,$tela=null){
  
          include "config.php";
          
          $i=0;// CONTADOR PARA SER USADO NO foreach A SEGUIR
          $ocorencias=1;// AJUSTE PARA TROCAR SÓ NA PRIMEIRA OCORRÊNCIA O NOME DAS COLUNAS NO SELECT(SQL) EM $algoritimo_sql PARA EXIBÍ-LAS NAS TELAS
          foreach($colunas as $replace_colunas){ // COLOCA A CRASE NO NOME DAS COLUNAS PARA AS CONSULTAS
            $col_nome[]="`".$replace_colunas."`";
            $algoritimo_sql = str_replace($replace_colunas,$col_nome[$i],$algoritimo_sql,$ocorencias);
            $i=$i+1;
            }
          
            // var_dump($algoritimo_sql);// TESTE VAR_DUMP
            
            $valores=$conn->prepare($algoritimo_sql);//CONSULTA SQL
            $valores->execute();  
            $evitar_linhas_nulas = $valores->fetch();// esse $evitar_linhas_nulas é para evitar linhas nulas 
          
            ?>
        
           <!-- INÍCIO TABELA -->
           <table class="table table-hover">

             <!-- INÍCIO do head da tabela -->
             <!-- CABEÇÁLHOS DA TABELA -->
             <thead>
               <tr>
                 
                 <?php
                
                foreach($colunas as $colunas){
                  ?>
                    <th scope="col">
                      <?php echo $colunas; ?>
                    </th>
                    
                    <?PHP
                }
                ?>
                <th></th>
              </tr>
            </thead>
            <!-- FIM do head da tabela -->
            <?php

                  // if($valores->rowCount() == 0){
                  if ($valores->rowcount()==0|| $evitar_linhas_nulas[0] == null){
                ?>
                  </table>
                    VOCÊ AINDA NÃO TEM REGISTROS<!-- EDITAR ISSO -->
                <?PHP
                }else{
                   
                ?>
                  
                      
                  <!-- INÍCIO do body da tabela -->
                  <tbody>
                    <?php
                    $valores->execute();  
                    
                    while($linhas_valores=$valores->fetch()){
                      
                      ?>
                      <tr>
                        <!-- <th scope="row">
                          
                          </th> -->
                          <!--É UM "CABEÇÁLHO", E ESTE É O DA LINHA --> 
                          <?php 

                        $i2=0; // O CONTADOR QUE SERÁ UTILIZADO NO if else A BAIXO PARA EXIBIR OU NÃO A SENHA CASO O USUÁRIO NÃO SEJA ADMINISTRADOR 
                        $var_exib_senha=array_keys($linhas_valores);
                        // VALORES DA TABELA 
                        // O CONTADOR SEMPRE VAI COMEÇAR EM $i=1 PARA QUE NÃO MOSTRE O ID NA TELA
                          for ($i = 1; $i < (count($linhas_valores)/2); $i++) {
                            ?>
                                <td>
                                  <?php
                                  $i2=$i2+2;
                                  if ($var_exib_senha[$i2]!=='`Senha`' || $linhas_valores['indentificacao_botao_modal']==$_SESSION['idpessoa'] || $_SESSION['idtipoacesso'] ==1 ){ // PARA EXIBIR OU NÃO A SENHA CASO O USUÁRIO NÃO SEJA ADMINISTRADOR 
                                  $string = $linhas_valores[$i]; 
                                  $limite = 45;
                                  $truncada = (strlen($string) > $limite) ? mb_substr($string, 0, $limite) . "..." : $string; // É UM IF PARA VALIDAR O VALOR DA LINHA CONSULTADA NO BANCO ARMAZENADO EM $string SERÁ MOSTRADO NA TELA DE MANEIRA TRUNCADA OU NÃO
                                  if ($var_exib_senha[$i2]=='`Senha`' ){// VALIDAÇÃO PARA DECODIFICAR A SENHA QUE ESTÁ EM BASE 64
                                    echo base64_decode($truncada); // É O VALOR DA $linha_valores[...] EXIBIDO NA TELA"
                                  }else{
                                    echo $truncada; // É O VALOR DA $linha_valores[...] EXIBIDO NA TELA"
                                  }
                                }else{
                                  
                                  echo '*******';
                                }
                                ?>
                                  </td>
                                  <?php 
                                  
                          }
                             
                              ?>

                                <!-- COLUNA DOS BOTÕES -->
                                <td>

                                    <?php 
                                  if(($tela==18 && $linhas_valores['indentificacao_botao_modal']!==$_SESSION['idpessoa'] && $_SESSION['idtipoacesso'] ==1) || $tela!==18){ // VALIDAÇÃO PARA PERMITIR SOMENTE UM USUÁRIO ADMINISTRATIVO EDITAR OUTROS USUÁRIOS

                                    $id_botao_modal= 'atualiza_'.base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal']))));

                                    if($tela!==2 || strripos($linhas_valores['`Origem Movimentação`'],'Ocorrência ',0)!==false || $tela==2 && strripos($linhas_valores['`Origem Movimentação`'],'Gasto ',0)!==false){
                                      ?>
                                    <!-- CRIAR FUNCTION -->
                                    <!-- Botão Editar Dependentes -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $id_botao_modal; ?>"> <!-- PARA USAR O ID DOS DADOS NO HTML SÃO USADOS 5 BASE 64 SEGUIDOS -->
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                      </svg>
                                    </button>

                                    <?php
                                    $campos= colunas_telas($tela);
                                    $info_exib= "Atualizar ";
                                    modal_cadastro($tela,$campos,$id_botao_modal,$info_exib,$linhas_valores);
                                  }
                                    ?>
         
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                    <!-- Modal -->


                                      <!-- <div class="modal fade" id="<?php echo $id_botao_modal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->


                                        <!-- PARA USAR O ID DOS DADOS NO HTML SÃO USADOS 5 BASE 64 SEGUIDOS -->


                                        <!-- <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> -->


                                              <!-- /////// TESTE TESTE TESTE TESTE -->


                                              <!-- TEM QUE CHAMAR UMA FUNCTION PARA EDIÇÃO  <?php echo $linhas_valores['indentificacao_botao_modal']."<BR>"; echo base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal'])))) ?> -->


                                              <!-- PARA USAR O ID DOS DADOS NO HTML SÃO USADOS 5 BASE 64 SEGUIDOS -->


                                              <!-- /////// TESTE TESTE TESTE TESTE -->

                                               <!--
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>    -->


                                      <!-- Fim Modal -->

<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                  <?php 
                                    $id_botao_modal= 'inativa_'.base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal']))));
                                      ?>
                                      <!-- Botão Remover Dependentes -->
                                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?php echo $id_botao_modal; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                      </svg>
                                    </button>

                                    <?php
                                    $campos= colunas_telas($tela);
                                    $info_exib= "Inativar ";
                                    modal_cadastro($tela,$campos,$id_botao_modal,$info_exib,$linhas_valores);
                                    ?>

<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                                  
                                    <?php
                                  }else{
                                    
                                  }
                                    ?>

                                </td>
                            </tr>

                          <?php
                    }
                          ?>

                      </tbody>
                      <!-- FIM do body da tabela -->

                </table>
                <!-- FIM DA TABELA -->
                <?php
                      
          }
        }

        
        // FUNCTION QUE CRIA MODAIS BOTÕES E MODAIS PARA CADASTRO DE INFORMAÇÕES DE MANEIRA DINÂMICA
        function botao_modal_cadastro($tela,$col,$operacao,$linhas_valores=null){
          
          if(($tela==18 && $_SESSION['idtipoacesso'] ==1) || $tela!==18){  
            if (str_contains($operacao,'adiciona')){
              if(str_contains($operacao,'gasto')){
                $info_exib= "Adicionar Gasto -";
                ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $operacao."_".$tela?>">
                  + Adicionar <?php telaconsulta($tela); ?>
                </button>
                <?php  
              }elseif(str_contains($operacao,'ocorrência')){
                $info_exib= "Adicionar Ocorrência -";
                ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $operacao."_".$tela?>">
                  + Adicionar <?php telaconsulta($tela); ?>
                </button>
                <?php  
              }else{
                $info_exib= "Adicionar ";
                ?>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $operacao."_".$tela?>">
                + Adicionar <?php telaconsulta($tela); ?>
              </button>
              <?php
            }
            }elseif ($operacao == 'atualiza'){
              $info_exib= "Atualizar ";
              ?>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $operacao."_".base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal'])))) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                </svg>
                              </button>
              <?php
            }elseif ($operacao == 'inativa'){
              $info_exib= "Inativar";
              ?>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?php echo $operacao."_".base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal'])))) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                </svg>
              </button>
              <?php
            }
            
            modal_cadastro($tela,$col,$operacao,$info_exib,$linhas_valores);
          }
                  
        }

        

      // Alteração de nomes de inputs
      function types_inputs($types_inputs){

        // t para text 
        // cpf para cpf
        // e para email
        // n para number
        // p para password
        $types_prontos=[];
        foreach($types_inputs as $tipo){
          switch ($tipo){
              case 't':
                  $types_prontos[] = str_replace('t', 'text', $tipo);
                  break;
              case 'cpf':
                  $types_prontos[] = str_replace('cpf', 'text', $tipo);
                  break;
              case 'e':
                  $types_prontos[] = str_replace('e', 'email', $tipo);
                  break;
              case 'n':
                  $types_prontos[] = str_replace('n', 'number', $tipo);
                  break;
              case 'p':
                  $types_prontos[] = str_replace('p', 'password', $tipo);
                  break;
              case 'r':
                  $types_prontos[] = str_replace('r', 'radio', $tipo);
                  break;
              case 'b':
                  $types_prontos[] = str_replace('b', 'button', $tipo);
                  break;
              case 'c':
                  $types_prontos[] = str_replace('c', 'checkbox', $tipo);
                  break;
              case 'co':
                  $types_prontos[] = str_replace('co', 'color', $tipo);
                  break;
              case 'dt':
                  $types_prontos[] = str_replace('dt', 'date', $tipo);
                  break;
              case 'dtlo':
                  $types_prontos[] = str_replace('dtlo', 'datetime-local', $tipo);
                  break;
              case 'f':
                  $types_prontos[] = str_replace('f', 'file', $tipo);
                  break;
              case 'h':
                  $types_prontos[] = str_replace('h', 'hidden', $tipo);
                  break;
              case 'i':
                  $types_prontos[] = str_replace('i', 'image', $tipo);
                  break;
              case 'm':
                  $types_prontos[] = str_replace('m', 'month', $tipo);
                  break;
              case 'r':
                  $types_prontos[] = str_replace('r', 'range', $tipo);
                  break;
              case 'rs':
                  $types_prontos[] = str_replace('rs', 'reset', $tipo);
                  break;
              case 'sr':
                  $types_prontos[] = str_replace('sr', 'search', $tipo);
                  break;
              case 'sb':
                  $types_prontos[] = str_replace('sb', 'submit', $tipo);
                  break;
              case 'tl':
                  $types_prontos[] = str_replace('tl', 'tel', $tipo);
                  break;
              case 'ti':
                  $types_prontos[] = str_replace('ti', 'time', $tipo);
                  break;
              case 'u':
                  $types_prontos[] = str_replace('u', 'url', $tipo);
                  break;
              case 'w':
                  $types_prontos[] = str_replace('w', 'week', $tipo);
                  break;
              default:
                $types_prontos[] = $tipo;
                break;
          }
        }
        return $types_prontos;
      }


      // PARA FAZER O TESTE DO UPDATE
        // $valores_form_cad =[
          //   $nome = $_POST['nome'],
          //   $cpf = $_POST['cpf'],
          //   $senha = base64_encode($_POST['senha']),
          //   $email = $_POST['email'],
          // ]

         
          // modal_cadastro($campos_form_cad,$input_types_form_cad);

          // $valores_form_cad =[
          //   $nome = $_POST['nome'],
          //   $cpf = $_POST['cpf'],
          //   $senha = base64_encode($_POST['senha']),
          //   $email = $_POST['email'],
      // ];


          function modal_cadastro($tela,$campos,$operacao,$info_exib=null,$linhas_valores=[]) {
            // $operacao É PARA INFORMAR SE A MODAL QUE SERÁ MOSTADA É PARA EXCLUIR(inativa), ALTERAR(atualiza) OU ADICIONAR(adiciona)
            // $campos É A INFORMAÇÃO DO CAMPO QUE ESTÁ SENDO EXIBIDO NO HTML E FORMATO DESSE CAMPOS(text,number,etc...)(ESSE CAMPO VEM ARRASTADO DESDE DA CHAMADA A colunas_telas() NO ARQUIVO DA TELA)
            // $operacao É PARA INFORMAR SE A MODAL QUE SERÁ MOSTADA É PARA EXCLUIR(inativa), ALTERAR(atualiza) OU ADICIONAR(adiciona)
            // $info_exib É UMA A MESMA INFORMAÇÃO DE $operacao MAS É PARA MOSTRAR NA TELA (C/ PRIMEIRA LETRA MAIÚSCULA E COM UM R NO FINAL(GERÚNDIO))
            // $linhas_valores É PARA EXIBIR O DADO DA TELA EM CASO DE ALTERAÇÃO OU EXCLUSÃO(CASO SEJA ADIÇÃO ELA NÃO É UTILIZADA)
            $fomr_cad_types = types_inputs($campos);  // Recebe os tipos de inputs para cada campo
            $campos = array_keys($campos);            // Obtém os nomes dos campos

            include "config.php";

            ?>
            <!-- Modal -->
            <?php
            if ($operacao=='adiciona'){
              ?>
              <div class="modal fade" id="<?php echo $operacao."_".$tela?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- O php NO id COLOCAR A INFORMAÇÃO DA OPERAÇÃO E A TELA EM QUE ESSA OPERAÇÃO ESTÁ SENDO FEITA NA MODAL PARA SER ATIVADA PELO BOTÃO COM A MESMA INFORMAÇÃO NO ATRIBUTO data-bs-target="#..." -->
              <?php
            }elseif(strripos($operacao,'atualiza',0)!==false){
              $id_botao_modal= 'atualiza_'.base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal']))));
              ?>
              <div class="modal fade" id="<?php echo $id_botao_modal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- O php NO id COLOCAR A INFORMAÇÃO DA OPERAÇÃO E A TELA EM QUE ESSA OPERAÇÃO ESTÁ SENDO FEITA NA MODAL PARA SER ATIVADA PELO BOTÃO COM A MESMA INFORMAÇÃO NO ATRIBUTO data-bs-target="#..." -->
              <?php
            }else{
              $id_botao_modal= 'inativa_'.base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal']))));
              ?>
              <div class="modal fade" id="<?php echo $id_botao_modal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- O php NO id COLOCAR A INFORMAÇÃO DA OPERAÇÃO E A TELA EM QUE ESSA OPERAÇÃO ESTÁ SENDO FEITA NA MODAL PARA SER ATIVADA PELO BOTÃO COM A MESMA INFORMAÇÃO NO ATRIBUTO data-bs-target="#..." -->
              <?php
            }
              ?>
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                              <?php 
                              if ($operacao=='adiciona'){//Valida se é atualização ou não pois mostram de maneiras diferentes
                                echo $info_exib." ";// PARA O CASO DE ADICIONAR, EXIBE NO TÍTULO DA MODAL A OPERAÇÃO 'ADICIONAR' E ...
                                echo telaconsulta($tela); // QUAL TELA ESTÁ SOFRENDO ESTA ADIÇÃO
                              }elseif(strripos($operacao,'atualiza',0)!==false){
                                if($tela == 2){

                                  // var_dump($linhas_valores);
                                  echo $info_exib." Movimentação"; // PARA O CASO DE EXCLUIR OU ALTERAR DEVE MOSTRAR O DADO QUE ESTÁ SOFRENDO A ALTERAÇÃO OU INATIVAÇÃO
                                }else{
                                  // var_dump($linhas_valores);
                                  echo $info_exib." ".$linhas_valores[1]; // PARA O CASO DE EXCLUIR OU ALTERAR DEVE MOSTRAR O DADO QUE ESTÁ SOFRENDO A ALTERAÇÃO OU INATIVAÇÃO
                                }
                              }else{
                                if($tela == 2){

                                  // var_dump($linhas_valores);
                                  echo $info_exib." Movimentação"; // PARA O CASO DE EXCLUIR OU ALTERAR DEVE MOSTRAR O DADO QUE ESTÁ SOFRENDO A ALTERAÇÃO OU INATIVAÇÃO
                                }else{
                                  // var_dump($linhas_valores);
                                  echo $info_exib." ".$linhas_valores[1]; // PARA O CASO DE EXCLUIR OU ALTERAR DEVE MOSTRAR O DADO QUE ESTÁ SOFRENDO A ALTERAÇÃO OU INATIVAÇÃO
                                }
                              }                              
                              ?><!-- VERIFICAR ISSO AQUI -->
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                        <?php
                      if($operacao=='adiciona'){//Valida se é atualização ou não pois mostram de maneiras diferentes
                        ?>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <!-- INÍCIO FORMULÁRIO DE ADIÇÃO -->
                          <div class="modal-body">
                            <form action="../Basis/cadastrador.php?add&tela=<?php telaconsulta($tela,1); ?>" method="post"><!--USAR O ARQUIVO cadastrador.php PARA FAZER A ATUALIZAÇÃO E EXCLUSÂO(LÓGICA) DAS INFORMAÇÔES PASSANDO UM PREFIXO PELO HEADER -->
                            <!-- a function telaconsulta pode retornar o nome da tela, a númeração da tela ou o nome do arquivo -->
                            <!-- como o segundo parâmetro da função "telaconsulta($tela,1)" é 1, a função só vai retornar a númeração da tela e não o nome da tela-->
                                <div class="mb-3">

                                      <?php
                                      // Loop para criar os inputs conforme o tipo de cada campo
                                      for ($i = 0; $i < count($campos); $i++) {
                                          $campoNome = $campos[$i];
                                          $campoId = str_replace(" ", "_", $campoNome);
                                          $campoTipo = $fomr_cad_types[$i];

                                          // Verifica se o tipo é suportado para exibição no formulário CASO CONTRÁRIO ELE CRIA UM CAMPO SELECT
                                          if (in_array($campoTipo, types_para_form_cadastro())) {
                                            if($campoTipo == 'password'){$campoTipo='text';}
                                              ?>
                                              <label for="<?php echo $campoId; ?>" class="form-label"><?php echo $campoNome; ?></label>
                                              <input type="<?php echo $campoTipo; ?>" name="<?php echo $campoId; ?>" class="form-control" id="<?php echo $campoId; ?>"> <!-- O PARÂMETRO name DO CAMPO É A VARIÁVEL $campoId QUE SÃO AS CHAVES DA ARRAY RETORNADA DA FUNÇÃO colunas_telas() CHAMADO NO ARQUIVO DA TELA -->
                                              <?php
                                          } elseif ($campoTipo == 'select') {
                                            $operacao_tela_id=$operacao."_".$tela."_".$campoId;//VARIÁVEL QUE IRÁ INDICAR QUAL SELECT(SQL) FAZER NA FUNCTION consulta_sql() PARA APARECER NO SELECT(FORM HTML)

                                            // var_dump($operacao_tela_id); // TESTE PARA SABER O VALOR QUE ESTÁ SENDO LANÇADO NA FUNÇÃO consulta_sql()
                                            
                                            $sql=consulta_sql($operacao_tela_id);
                                            
                                            $valores_selec_modal= $conn->prepare($sql);
                                            $valores_selec_modal->execute();
                                            
                                            // var_dump($linha=$valores_selec_modal->fetch()); // TESTE PARA SABER O QUE ESTÁ VINDO DA EXECUÇÃO DA consulta_sql()
                                              ?>
                                            <label for="<?php echo $campoId; ?>" class="form-label"><?php echo $campoNome; ?></label>
                                            <select class="form-control" id="<?php echo $campoId; ?>" name="<?php echo $campoId; ?>">
                                              <option value="">Selecione</option>
                                                <?php
                                            while($linhas_selec_modal=$valores_selec_modal->fetch()){
                                              ?>
                                              <option value="<?php echo $linhas_selec_modal['identificacao_modal_form_selec'] ?>"><?php echo $linhas_selec_modal['descricao_modal_form_selec'] ?></option>
                                              <!-- 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO RESPECTIVAMENTE O ID E A DESCRIÇÃO PELA "CONSULTA SQL" SELECT(consulta_sql()) QUE FOI FEITA ANTERIORMENTE PARA MOSTRAR NA MODAL -->
                                              <?php
                                            }
                                            ?>
                                              </select>
                                              <?php

                                          }
                                          
                                        }
                                        ?>
                                        </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                  <input type="submit" class="btn btn-primary" value="Cadastrar" name="cadastra"/>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- FIM FORMULÁRIO DE ADIÇÃO -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                          <?php
                      }elseif(strripos($operacao,'atualiza',0)!==false){//Valida se é atualização ou não pois mostram de maneiras diferentes
                        // PARA COLOCAR AS MODAIS DE EXCLUSÃO E ALTERAÇÃO
                        ?>
                        <!-- INÍCIO FORMULÁRIO DE ALTERAÇÃO -->
                          <div class="modal-body">
                            <form action="../Basis/cadastrador.php?up&tela=<?php telaconsulta($tela,1); ?>&id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal']))))  ?>" method="post"><!--USAR O ARQUIVO cadastrador.php PARA FAZER A ATUALIZAÇÃO E EXCLUSÂO(LÓGICA) DAS INFORMAÇÔES PASSANDO UM PREFIXO PELO HEADER -->
                            <!-- a function telaconsulta pode retornar o nome da tela, a númeração da tela ou o nome do arquivo -->
                            <!-- como o segundo parâmetro da função "telaconsulta($tela,1)" é 1, a função só vai retornar a númeração da tela e não o nome da tela-->
                                <div class="mb-3">

                                      <?php
                                      // Loop para criar os inputs conforme o tipo de cada campo
                                      for ($i = 0; $i < count($campos); $i++) {
                                          $campoNome = $campos[$i];
                                          $campoId = str_replace(" ", "_", $campoNome);
                                          $campoTipo = $fomr_cad_types[$i];

                                          // Verifica se o tipo é suportado para exibição no formulário CASO CONTRÁRIO ELE CRIA UM CAMPO SELECT
                                          if (in_array($campoTipo, types_para_form_cadastro())) {
                                            if($campoTipo == 'password'){$campoTipo='text';}
                                              ?>
                                              <label for="<?php echo $campoId; ?>" class="form-label"><?php echo $campoNome; ?></label>
                                              <input type="<?php echo $campoTipo; ?>" name="<?php echo $campoId; ?>" class="form-control" id="<?php echo $campoId; ?>"> <!-- O PARÂMETRO name DO CAMPO É A VARIÁVEL $campoId QUE SÃO AS CHAVES DA ARRAY RETORNADA DA FUNÇÃO colunas_telas() CHAMADO NO ARQUIVO DA TELA -->
                                              <?php
                                          } elseif ($campoTipo == 'select') {
                                            if($campoId=='Origem_Movimentação' && strripos($linhas_valores['`Origem Movimentação`'],'Ocorrência ',0)!==false){
                                              $operacao_tela_id="atualiza_".$tela."_TipoObrigacao";//VARIÁVEL QUE IRÁ INDICAR QUAL SELECT(SQL) FAZER NA FUNCTION consulta_sql() PARA APARECER NO SELECT(FORM HTML)
                                              ?>
                                              <input type="hidden" name="obrigacao" class="form-control" id=" ?>">
                                              <?php
                                              
                                            }elseif($campoId=='Origem_Movimentação' && strripos($linhas_valores['`Origem Movimentação`'],'Gasto ',0)!==false){
                                              $operacao_tela_id="atualiza_".$tela."_TipoGasto";//VARIÁVEL QUE IRÁ INDICAR QUAL SELECT(SQL) FAZER NA FUNCTION consulta_sql() PARA APARECER NO SELECT(FORM HTML)
                                              ?>
                                              <input type="hidden" name="gasto" class="form-control" id=" ?>">
                                              <?php

                                            }else{
                                              $operacao_tela_id="atualiza_".$tela."_".$campoId;//VARIÁVEL QUE IRÁ INDICAR QUAL SELECT(SQL) FAZER NA FUNCTION consulta_sql() PARA APARECER NO SELECT(FORM HTML)
                                            }
                                              
                                            // var_dump($operacao_tela_id); // TESTE PARA SABER O VALOR QUE ESTÁ SENDO LANÇADO NA FUNÇÃO consulta_sql()
                                            
                                            $sql=consulta_sql($operacao_tela_id);
                                            $sql= str_replace("'chaveprimaria'",$linhas_valores['indentificacao_botao_modal'],$sql);
                                            // echo $operacao;
                                            // echo $sql;
                                            // exit();
                                            $valores_select_modal= $conn->prepare($sql);
                                            $valores_select_modal->execute();
                                            
                                            $sql2=consulta_sql($operacao_tela_id."_selecionado");
                                            $sql2= str_replace("'chaveprimaria'",$linhas_valores['indentificacao_botao_modal'],$sql2);
                                            // echo $operacao;
                                            // echo $sql2;
                                            // exit();
                                            $valores_select_modal_selecionado= $conn->prepare($sql2);
                                            $valores_select_modal_selecionado->execute();
                                            $linhas_selec_modal_selecionado=$valores_select_modal_selecionado->fetch();
                                            
                                            // var_dump($linha=$valores_selec_modal->fetch()); // TESTE PARA SABER O QUE ESTÁ VINDO DA EXECUÇÃO DA consulta_sql()
                                              ?>
                                            <label for="<?php echo $campoId; ?>" class="form-label"><?php echo $campoNome; ?></label>
                                            <select class="form-control" id="<?php echo $campoId; ?>" name="<?php echo $campoId; ?>">
                                              <option value="">Selecione</option>
                                              <option value="<?php echo $linhas_selec_modal_selecionado['identificacao_modal_form_selec']; ?>" selected><?php echo $linhas_selec_modal_selecionado['descricao_modal_form_selec']; ?></option>
                                                <?php
                                            while($linhas_selec_modal=$valores_select_modal->fetch()){
                                              ?>
                                              <option value="<?php echo $linhas_selec_modal['identificacao_modal_form_selec'] ?>"><?php echo $linhas_selec_modal['descricao_modal_form_selec'] ?></option>
                                              <!-- 'identificacao_modal_form_selec' E 'descricao_modal_form_selec' SÃO RESPECTIVAMENTE O ID E A DESCRIÇÃO PELA "CONSULTA SQL" SELECT(consulta_sql()) QUE FOI FEITA ANTERIORMENTE PARA MOSTRAR NA MODAL -->
                                          

                                              <?php
                                            }
                                            ?>
                                              </select>
                                              <?php
                                          }
                                        }
                                        ?>
                                        </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                  <input type="submit" class="btn btn-primary" value="Cadastrar" name="cadastra"/>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- FIM FORMULÁRIO DE ALTERAÇÃO -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->                           
                          <?php
                        }elseif(strripos($operacao,'inativa',0)!==false){//Valida se é atualização ou não pois mostram de maneiras diferentes
                          // PARA COLOCAR AS MODAIS DE EXCLUSÃO E ALTERAÇÃO
                          ?>
                          <!-- INÍCIO FORMULÁRIO DE EXCLUSÃO -->
                            <div class="modal-body">
                              <form action="../Basis/cadastrador.php?inativa&tela=<?php telaconsulta($tela,1); ?>&id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($linhas_valores['indentificacao_botao_modal']))))  ?>" method="post"><!--USAR O ARQUIVO cadastrador.php PARA FAZER A ATUALIZAÇÃO E EXCLUSÂO(LÓGICA) DAS INFORMAÇÔES PASSANDO UM PREFIXO PELO HEADER -->
                              <!-- a function telaconsulta pode retornar o nome da tela, a númeração da tela ou o nome do arquivo -->
                              <!-- como o segundo parâmetro da função "telaconsulta($tela,1)" é 1, a função só vai retornar a númeração da tela e não o nome da tela-->
                                  <div class="mb-3">
  
                                        <?php
                                        // Loop para criar os inputs conforme o tipo de cada campo
                                       
  
                                            ?>
                                            <input type="hidden" name="obrigacao" class="form-control" id=" ?>">
                                            <h5>
                                              Tem certeza que você deseja <strong style='color:red;'>inativar</strong>:<br><strong><?php echo $linhas_valores[1]; ?></strong> ?
                                            </h5>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                    <input type="submit" class="btn btn-danger" value="Sim" name="cadastra"/>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <!-- FIM FORMULÁRIO DE EXCLUSÃO -->
                      
                            <?php
                          }
                          ?>
  <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                </div>
            </div>

            <!-- Fim Modal -->
            <?php
              
        }
        
      
      
        
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function types_para_form_cadastro(){
          $array = array (
            'text',
            'number',
            'password',
            'date',
            'datetime-local',
            'file',
            'month',
            'reset',
            'submit',
            'time',
            'week'
          );
          return $array;
        }

        // OK

        // t para text 
        // cpf para text 
        // n para number
        // p para password
        // dt para date
        // dtlo para datetime-local
        // f para file
        // m para month
        // rs para reset
        // sb para submit
        // ti para time
        // w para week
        // e para email

        
        // +/-
        // co para color
        // h para hidden
        // i para image
        // sr para search
        // tl para tel
        // u para url
        
        
        // NOK
        // r para radio
        // b para button
        // c para checkbox
        // r para range

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
function menu_lateral($tela){
  if(isset($_GET['fecha_menu'])){
    unset($_GET['abre_menu']);
  }
  
  if(isset($_GET['abre_menu'])){
    ?>

  <!-- Menu 1  -->
  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-primary b-example-vr " style="width: 280px;background-color: #114b7a!important;;">
    <div class="nav-link active">
      <!-- Logo FinMeta -->
      <a href="?fecha_menu" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-white text-decoration-none"><!-- Fazer um negócio em PHP que abre o Menu 2 -->
        <img src="../imagens/file.png" width="50" style="margin-right: 10px;">
        <span class="fs-4">FinMeta</span>
      </a>
    </div>
    <hr style="color: white; height: 1px; background-color: #ffffff; opacity:1">
    <ul class="nav nav-pills flex-column mb-auto">
      <li <?php if($tela == 1){echo 'class="nav-item"';}else{} ?>>
        <a href="01_home_log.php" <?php if($tela== 1){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li <?php if($tela == 2){echo 'class="nav-item"';}else{} ?>>
        <a href="02_movimentacao.php"  <?php if($tela== 2){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#movimentacao"/></svg>
          Movimentações
        </a>
      </li>
      <li <?php if($tela == 3){echo 'class="nav-item"';}else{} ?>>
        <a href="03_orcamento.php" <?php if($tela== 3){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#orcamento"/></svg>
          Orçamento Mensal
        </a>
      </li>
      <li <?php if($tela == 4){echo 'class="nav-item"';}else{} ?>>
        <a href="04_meta.php" <?php if($tela== 4){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#meta"/></svg>
          Objetivos/Metas
        </a>
      </li>
      <li <?php if($tela == 5){echo 'class="nav-item"';}else{} ?>>
        <a href="05_conta.php" <?php if($tela== 5){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#conta"/></svg>
          Contas
        </a>
      </li>
      <li <?php if($tela == 6){echo 'class="nav-item"';}else{} ?>>
        <a href="06_cartao.php" <?php if($tela== 6){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#cartao"/></svg>
          Cartões de Crédito
        </a>
      </li>
      <!-- <li <?php if($tela == 7){echo 'class="nav-item"';}else{} ?>>
        <a href="07_fatura.php" <?php if($tela== 7){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#fatura"/></svg>
          Faturas
        </a>
      </li> -->
      <li <?php if($tela == 8){echo 'class="nav-item"';}else{} ?>>
        <a href="08_despesa.php" <?php if($tela== 8){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16" style="padding: 0px;"><use xlink:href="#despesa"/></svg>
          Despesas Fixas
        </a>
      </li>
      <li <?php if($tela == 9){echo 'class="nav-item"';}else{} ?>>
        <a href="09_emprestimo.php" <?php if($tela== 9){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#emprestimo"/></svg>
          Empréstimos
        </a>
      </li>
      <li <?php if($tela == 10){echo 'class="nav-item"';}else{} ?>>
        <a href="10_renda.php" <?php if($tela== 10){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#renda"/></svg>
          Receitas/Fontes de Renda
        </a>
      </li>
      <li <?php if($tela == 11){echo 'class="nav-item"';}else{} ?>>
        <a href="11_ativo.php" <?php if($tela== 11){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#ativo"/></svg>
          Ativos/Investimentos
        </a>
      </li>
      <!-- <li <?php if($tela == 12){echo 'class="nav-item"';}else{} ?>>
        <a href="12_calendario.php" <?php if($tela== 12){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#calendario"/></svg>
          Calendário
        </a>
      </li> -->
      <li <?php if($tela == 13){echo 'class="nav-item"';}else{} ?>>
        <a href="13_obrigacao.php" <?php if($tela== 13){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#obrigacao"/></svg>
          Tipos de Ocorrência
        </a>
      </li>
      <li <?php if($tela == 14){echo 'class="nav-item"';}else{} ?>>
        <a href="14_gasto.php" <?php if($tela== 14){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#gasto"/></svg>
          Tipos de Gastos
        </a>
      </li>
        <!-- <li <?php if($tela == 15){echo 'class="nav-item"';}else{} ?>>
          <a href="15_relatorio.php" <?php if($tela== 15){echo 'class="nav-link active" aria-current="page"';}else{echo 'class="nav-link link-body-emphasis text-white"';} ?>>
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#relatorio"/></svg>
            Relatórios
          </a>
        </li> -->
    </ul>
    <!-- <div class="dropdown" > -->
    <hr style="color: white; height: 1px; background-color: #ffffff; opacity:1">
  </div>

  <?php
    }else{
  ?>
  
  <!-- Menu 2 Que só ficará a mostra com validação PHP -->

  <div class="d-flex flex-column b-example-vr bg-body-tertiary" style="width: 4.5rem;background-color: #114b7a!important;">
     <!-- Logo FinMeta  -->
    <a href="?abre_menu" class="d-block p-3 link-body-emphasis text-decoration-none" title="FinMeta" data-bs-toggle="tooltip" data-bs-placement="right">
      <img src="../imagens/file.png" width="100%">
      <span class="visually-hidden ">FinMeta</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      </li>
      <li <?php if($tela == 1){echo 'class="nav-item"';}else{} ?>>
        <a href="01_home_log.php" <?php if($tela == 1){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Home"><use xlink:href="#home"/></svg>
        </a>
      </li>
      <li <?php if($tela == 2){echo 'class="nav-item"';}else{} ?>>
        <a href="02_movimentacao.php" <?php if($tela == 2){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Movimentações" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Dashboard"><use xlink:href="#movimentacao"/></svg>
        </a>
      </li>
      <li <?php if($tela == 3){echo 'class="nav-item"';}else{} ?>>
        <a href="03_orcamento.php" <?php if($tela == 3){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Orçamento Mensal" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Orders"><use xlink:href="#orcamento"/></svg>
        </a>
      </li>
      <li <?php if($tela == 4){echo 'class="nav-item"';}else{} ?>>
        <a href="04_meta.php" <?php if($tela == 4){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Objetivos/Metas" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Products"><use xlink:href="#meta"/></svg>
        </a>
      </li>
      <li <?php if($tela == 5){echo 'class="nav-item"';}else{} ?>>
        <a href="05_conta.php" <?php if($tela == 5){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Contas" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#conta"/></svg>
        </a>
      </li>
      <li <?php if($tela == 6){echo 'class="nav-item"';}else{} ?>>
        <a href="06_cartao.php" <?php if($tela == 6){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Cartões de Crédito" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#cartao"/></svg>
        </a>
      </li>
      <!-- <li <?php if($tela == 7){echo 'class="nav-item"';}else{} ?>>
        <a href="07_fatura.php" <?php if($tela == 7){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Faturas" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#fatura"/></svg>
        </a>
      </li> -->
      <li <?php if($tela == 8){echo 'class="nav-item"';}else{} ?>>
        <a href="08_despesa.php" <?php if($tela == 8){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Despesas Fixas" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#despesa"/></svg>
        </a>
      </li>
      <li <?php if($tela == 9){echo 'class="nav-item"';}else{} ?>>
        <a href="09_emprestimo.php" <?php if($tela == 9){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Empréstimos" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#emprestimo"/></svg>
        </a>
      </li>
      <li <?php if($tela == 10){echo 'class="nav-item"';}else{} ?>>
        <a href="10_renda.php" <?php if($tela == 10){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Receitas/Fontes de Renda" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#renda"/></svg>
        </a>
      </li>
      <li <?php if($tela == 11){echo 'class="nav-item"';}else{} ?>>
        <a href="11_ativo.php" <?php if($tela == 11){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Ativos" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#ativo"/></svg>
        </a>
      </li>
      <!-- <li <?php if($tela == 12){echo 'class="nav-item"';}else{} ?>>
        <a href="12_calendario.php" <?php if($tela == 12){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Calendário" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#calendario"/></svg>
        </a>
      </li> -->
      <li <?php if($tela == 13){echo 'class="nav-item"';}else{} ?>>
        <a href="13_obrigacao.php" <?php if($tela == 13){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Tipos de Ocorrência" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#obrigacao"/></svg>
        </a>
      </li>
      <li <?php if($tela == 14){echo 'class="nav-item"';}else{} ?>>
        <a href="14_gasto.php" <?php if($tela == 14){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Tipos de Gastos" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#gasto"/></svg>
        </a>
      </li>
      <!-- <li <?php if($tela == 15){echo 'class="nav-item"';}else{} ?>>
        <a href="15_relatorio.php" <?php if($tela == 15){echo 'class="nav-link text-white active border-bottom rounded-0" aria-current="page"';}else{echo 'class="nav-link text-white link-body-emphasis text-white border-bottom rounded-0"';} ?>title="Relatórios" data-bs-toggle="tooltip" data-bs-placement="right">
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#relatorio"/></svg>
        </a>
      </li> -->
    </ul>
    <hr style="color: white; height: 1px; background-color: #ffffff; opacity:1">
  </div>

  <?php
  }
  
}

function menu_header($tela){
  ?>
  <header class="py-3 mb-3 border-bottom">
          <div class=" d-grid gap-3 align-items-center" style="grid-template-columns: 3fr 3fr; align-content: right;">          
            <div>
              <h1>
              <?php if($tela==1){?>
                Home
              <?php }elseif($tela==2){?>
              Movimentações
              <?php }elseif($tela==3){?>
              Orçamento Mensal
              <?php }elseif($tela==4){?>
              Objetivos/Metas
              <?php }elseif($tela==5){?>
              Contas
              <?php }elseif($tela==6){?>
              Cartões de Crédito
              <?php }elseif($tela==7){?>
              Faturas de cartão
              <?php }elseif($tela==8){?>
              Despesas fixas
              <?php }elseif($tela==9){?>
              Empréstimos
              <?php }elseif($tela==10){?>
              Receitas/Fontes de Renda
              <?php }elseif($tela==11){?>
              Ativos
              <?php }elseif($tela==12){?>
              Calendário
              <?php }elseif($tela==13){?>
              Tipos de Obrigação
              <?php }elseif($tela==14){?>
              Tipos de Gastos
              <?php }elseif($tela==15){?>
              Relatórios
              <?php }elseif($tela==16){?>
              Configurações e Perfil
              <?php }elseif($tela==17){?>
              Perfil
              <?php }elseif($tela==18){?>
              Dependentes
              <?php } ?>
              </h1>
            </div
            >
            <div class="d-flex align-items-center">
              <form class="w-100 me-3" role="search">
                <input type="search" class="form-control" placeholder="Procurar..." aria-label="Search">
              </form>
              <!-- <div class="dropdown p-3 text-bg-primary" style="position: fixed; bottom: 0; left: 0; width: 280px;"> -->
              <div class="dropdown p-3 " style="width: 280px;">
                <?php avatar_usuario(); ?>
                <ul class="dropdown-menu text-small shadow">
                  <!-- <li><a class="dropdown-item" href="16_configuracao.php">Configurações</a></li> -->
                  <li><a class="dropdown-item" href="17_perfil.php">Perfil</a></li>
                  <li><a class="dropdown-item" href="18_dependente.php">Dependentes</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../Basis/Main.php?sair">Sair</a></li>
                </ul>
              </div>
            </div>
          </div>
        </header>
  <?php
}
?>

<?php ?>
