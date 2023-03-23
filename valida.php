<?php
    
    # Recebendo os Dados
    $dados = $_POST;
    $dadosUser = array();

    print_r($dados);

    # Convertendo em String
    $string = implode(" - ",$dados);
    $v = 0;

    print_r($string);
    # Tratando dados em arquivo
    if (file_exists('cadastros.txt') && $string != ' - ') {
        $ler = file('cadastros.txt');

        foreach ($ler as $l)  {
            #verifica a ocorrência de $tring em $l       
            if (str_contains($l,$string) == true) { 
                array_push($dadosUser,$l);
                $v = 1;
            }          
        }        
    }

    # Convertendo array em string
    $valores = explode(" - ", $dadosUser[0]);

    #Redirecionando
    if ($v == 0)         
        header("location: index.php?msg=error");
    else {
        # Iniciando a sessão
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $valores[0];
        $_SESSION['cpf'] = $valores[1];
        $_SESSION['data'] = $valores[2];
        $_SESSION['sexo'] = $valores[3];
        $_SESSION['email'] = $valores[4];
        $_SESSION['endereco'] = $valores[5];
        $_SESSION['login'] = $valores[6];
        $_SESSION['conta'] = $valores[8];


        header("location: areaUser.php?msg=logado");
    }
        

    
?>