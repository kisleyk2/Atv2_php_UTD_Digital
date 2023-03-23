<?php

    # Identificar o arquivo em que quero exluir
    $arq = $_GET['arquivo'];

    # Ler o arquivo de clientes, fornecedor ou produto
    $dados = file($arq);

    # Identificar o id que quero excluir do arquivo txt
    $id = $_GET['id'];

    # Excluir o cliente do arquivo
    unset($dados[$id]);

    # Excluir o arquivo anterior
    unlink($arq);

    # Reescrever os dados no arquivo
    $string =implode("", $dados);

	$arquivo = fopen($arq, "a+");
	fwrite($arquivo, $string);
	fclose($arquivo);

	# Redirecionar para a lista
    if ($_GET['pos'] == "1")
	    header("location: lista.php");
    else if ($_GET['pos'] == "2")
        header("location: fornecedores.php");
    else if ($_GET['pos'] == "3")
        header("location: produtos.php");
?>