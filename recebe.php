<?php
    # Recebendo os Dados
    $dados = $_POST;

    # Tratando a data
    $dt = explode("-",$dados['data']);
    $dados['data'] = $dt[2]."/".$dt[1]."/".$dt[0];

    if ($_POST['cad'] == "usuario") {        
        $senha = $_POST['senha'];
        $confSenha = $_POST['confSenha'];
        unset($dados['cad']);
        unset($dados['confSenha']);

        # Convertendo os dados em string
        $string = implode(" - ",$dados);

        # Cadastro de Usuário
        $arquivo = fopen("cadastros.txt","a+");
        fwrite($arquivo, $string."\n");
        fclose($arquivo);

        # Redirecionando para alguma página
        header("location: areaUser.php");

    } elseif ($_POST['cad'] == "fornecedor") {
        unset($dados['cad']);
        # Convertendo os dados em string
        $string = implode(" - ",$dados);

        # Cadastro de Usuário
        $arquivo = fopen("fornecedores.txt","a+");
        fwrite($arquivo, $string."\n");
        fclose($arquivo);

        # Redirecionando para alguma página
        header("location: fornecedores.php");
        
    } elseif ($_POST['cad'] == "produto") {
        unset($dados['cad']);
        # Convertendo os dados em string
        $string = implode(" - ",$dados);

        # Cadastro de Usuário
        $arquivo = fopen("produtos.txt","a+");
        fwrite($arquivo, $string."\n");
        fclose($arquivo);

        # Redirecionando para alguma página
        header("location: produtos.php");
    }
?>