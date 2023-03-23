<?php
    session_start();
    $dados = file("produtos.txt");    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Projeto Uchiha </title>
        <link rel="stylesheet" href="css/style.css">
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    </head>
    <body>

        <!-- Área de Banner -->
        <header></header>

        <!-- Área de Menus -->
        <nav class="menus">
            <a href="areaUser.php"><button class="btn btn-success menu">Início</button></a>
            <div class="input-group" style="width: 8vw; height:5vh;">
                <select name="conta" class="btn form-select bg-success text-light menu" aria-label="Default select example"  id="link" required>
                    <option selected>Cadastro</option>
                    <option value="cadastro.php">Usuário</button></option>
                    <?php
                        echo $_SESSION['logado'];
                        echo $_SESSION['conta'];
                        if (isset($_SESSION['logado']) && $_SESSION['conta'] == "Administrador\n") {
                    ?>
                            <option value="cadastroProd.php">Produto</a></option>
                            <option value="cadastroFor.php">Fornecedor</a></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </nav>

        <article class="telaLogin" style="margin-top: 11vh; width: 70vw;">        
            <!-- Área de Login -->
            <?php
                if (!isset($_SESSION['logado'])) {
            ?>
                    <!-- Área de Login -->
                    <div class="login"> 
                        <div class="text-center text-white">
                            Login
                        </div>
                        <div class="text-center mt-5">
                            <form action="valida.php" method="POST">
                                <div class="mt-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-success" id="basic-addon1">
                                            <span class="iconify" data-icon="mdi:clipboard-user" style="color:white"></span>
                                        </span>
                                        <input name="login" type="text" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1" style="background-color: transparent;">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-success" id="basic-addon1" style="color:white">
                                            <span class="iconify" data-icon="mdi:password"></span>
                                        </span>
                                        <input name="senha" type="password" class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1" style="background-color: transparent;">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success form-control">Acesso</button>
                                    </div>                        
                                </div>
                            </form>
                        </div>             
                    </login>                       
            <?php
                } else {
            ?>      
                    <div class="login">
                        <!-- Área de Usuário -->

                        <div class="text-center text-white p-1">
                            <?= $_SESSION['nome']?>
                        </div>
                        
                        <div class="text-white p-1 text-center">
                            <?php 
                                if ($_SESSION['sexo'] == 'masculino') { ?>
                                    <img class="imgLogin" src="images/user_man.png" style="height: 25vh">
                            <?php } else { ?>
                                    <img class="imgLogin" src="images/user_woman.png" style="height: 25vh" />
                            <?php } ?>
                        </div>

                        <div class="text-white p-1 text-center">
                            <div class="bg-success rounded-3"  style="margin-top: -2vh">
                                <?=$_SESSION['conta']?>
                                <a class="btn btn-danger" style="width: 80px;" href="sair.php">Sair</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </article>

        <!-- Área Principal -->
        <main style="margin-top: 1vh; margin-left: 14.5vw; width: 70vw; height: auto; background-color: transparent;">
            <div class="lista">
                <div class="card p-2">
                    <table class="table table-bordered mb-2" id="myTable">
                        <thead class="text-center text-white" style="background-color: #994d4d">
                            <th colspan=6>Lista de Produtos</th>
                        </thead>    
                        <thead class="text-center bg-success text-white">
                            <th> Código </th>
                            <th> Produto </th>
                            <th> Estoque </th>
                            <th> Preço </th>
                            <th> Data de Cadastro </th>
                            <th> Ações </th>
                        </thead>
                        <tbody>
                            
                            <?php foreach($dados as $chave=>$string): ?>
                                <?php 
                                    $linha = explode(" - ", $string);
                                ?>
                                <tr class="text-center">
                                    <?php foreach ($linha as $dado): ?>
                                        <td><?=$dado;?></td>		
                                    <?php endforeach; ?>

                                    <td style="width: 150px">
                                        <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#deletar<?=$chave;?>"> 
                                            <span class="iconify" data-icon="mdi:trash-can-empty" data-width="20" data-height="20"></span>
                                        </button>

                                        <button class="btn btn-warning btn-xs">
                                            <span class="iconify" data-icon="mdi:lead-pencil" data-width="20" data-height="20"></span>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deletar<?=$chave;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Registro?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deseja excluir o cliente <strong><?=$linha[0];?></strong> esse registro? Essa alteração não pode ser desfeita!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não, Sair!</button>
                                                        <a href="deletar.php?id=<?=$chave;?>&arquivo=produtos.txt&pos=3" type="button" class="btn btn-success">Sim, pode continuar !</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>                        
                        </tbody>
                        <tfoot class="text-center text-white" style="background-color: #487aa1">
                            <th> Código </th>
                            <th> Produto </th>
                            <th> Estoque </th>
                            <th> Preço </th>
                            <th> Data de Cadastro </th>
                            <th> Ações </th>
                        </tfoot>
                    </table>
                </div>                
            </div>
        </main>
        
        <!-- Button Oculto -->
        <?php
            include_once 'criarButton.php';
        ?>
    
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        
        <!-- Bootstrap -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Icones -->
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>    
        
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

        <!-- Custom Script -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#myTable').DataTable({
                    "language": {
                        "sProcessing":    "Procesando...",
                        "sLengthMenu":    "Mostrar _MENU_ registros",
                        "sZeroRecords":   "Não se encontram resultados",
                        "sEmptyTable":    "Ningún dato disponible en esta tabla",
                        "sInfo":          "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
                        "sInfoEmpty":     "Mostrando registros de 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":   "",
                        "sSearch":        "Buscar:",
                        "sUrl":           "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Carregando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":    "Último",
                            "sNext":    "Seguinte",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });
            });
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){

            $('#link').on('change', function () {
                var url = $(this).val(); 
                if (url) { 
                    window.open(url, '_self');
                }
                return false;
                });
            });
        </script>
    </body>
</html>
