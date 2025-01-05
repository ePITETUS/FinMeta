<?php

include "Main.php";
$tela=$_GET['tela'];
echo $tela;
valida_sessao();


if(isset($_GET['inativa'])){
    
    var_dump($_POST);
    $tela2=$tela."_inativa";
    $sql=update_sql($tela2);
    echo $sql;
    $update=$conn->prepare($sql);
    $update->execute();
        
    $redirecionamento =telaconsulta($tela,2);
    echo $redirecionamento;
    
    header("location:../sitefinmeta/$redirecionamento");
}

if(isset($_GET['up'])){
    
    var_dump($_POST);
    if(isset($_POST['obrigacao'])){
        $tela2=$tela."_Obrigacao";
    }elseif(isset($_POST['gasto'])){
        $tela2=$tela."_Gasto";
    }else{
        $tela2=$tela;
    }
    
    echo "<br><br><br>";
    var_dump($_POST);   
    echo $tela;
    $sql=update_sql($tela2);
    echo $sql;
    $update=$conn->prepare($sql);
    $update->execute();
        
    $redirecionamento =telaconsulta($tela,2);
    echo $redirecionamento;
    
    header("location:../sitefinmeta/$redirecionamento");
}

if(isset($_GET['add'])){
    if($tela == 6){
        echo "teste";
        $sql=insert_sql($tela);
        // echo $sql;
        $insert=$conn->prepare($sql);
        $insert->execute();
        $idusuariotitular = $_SESSION['idusuariotitular'];
        $_POST=[];

        $proc_cartao= $conn -> prepare ("SELECT idCartao,nmCartao,tipocartao.dscTipoCartao FROM cartao INNER JOIN tipocartao ON cartao.idTipoCartao = tipocartao.idTipoCartao WHERE cartao.idUsuarioTitular = $idusuariotitular ORDER BY 1 DESC LIMIT 1");
        $proc_cartao -> execute ();
        $valores_proc_cartao = $proc_cartao-> fetch();
        
        // var_dump($valores_proc_cartao);
        
        $insere_formapagamento= $conn -> prepare ("INSERT INTO `formapagamento`( `idUsuarioTitular`, `idCartao`, `dscFormaPagamento`, `fAtivo`) VALUES ($idusuariotitular,".$valores_proc_cartao['idCartao'].",'".$valores_proc_cartao ["dscTipoCartao"]." - ".$valores_proc_cartao ["nmCartao"]."',1)");
        $insere_formapagamento -> execute ();
        var_dump($insere_formapagamento);
        
        // $redirecionamento =telaconsulta($tela,2);
    }else{

        $sql=insert_sql($tela);
        $insert=$conn->prepare($sql);
        $insert->execute();
        $redirecionamento =telaconsulta($tela,2);
    }

    
    header("location:../sitefinmeta/$redirecionamento");
}

if(isset($_GET['add_ocorrencia_entrada'])){

    var_dump($_POST);
    $sql=insert_sql($tela.'_ocorrencia_entrada');
    $sql= str_replace("'CURRENT_TIMESTAMP()'","CURRENT_TIMESTAMP()",$sql);
    echo $sql;
    $insert=$conn->prepare($sql);
    $insert->execute();
    $redirecionamento =telaconsulta($tela,2);
    header("location:../sitefinmeta/$redirecionamento");
}

if(isset($_GET['add_ocorrencia_saida'])){

    var_dump($_POST);
    $sql=insert_sql($tela.'_ocorrencia_saida');
    $sql= str_replace("'CURRENT_TIMESTAMP()'","CURRENT_TIMESTAMP()",$sql);
    echo $sql;
    $insert=$conn->prepare($sql);
    $insert->execute();
    $redirecionamento =telaconsulta($tela,2);
    header("location:../sitefinmeta/$redirecionamento");
}

if(isset($_GET['add_gasto_saida'])){

    var_dump($_POST);
    $sql=insert_sql($tela.'_gasto_saida');
    $sql= str_replace("'CURRENT_TIMESTAMP()'","CURRENT_TIMESTAMP()",$sql);
    echo $sql;
    $insert=$conn->prepare($sql);
    $insert->execute();
    $redirecionamento =telaconsulta($tela,2);
    header("location:../sitefinmeta/$redirecionamento");
}



?>