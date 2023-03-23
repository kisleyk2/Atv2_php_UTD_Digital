<?php
    session_start();
    if (!isset($_SESSION['logado']))
        header("location: index.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Projeto Uchiha </title>
        <link rel="stylesheet" href="css/style.css">
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>

        <!-- Área de Banner -->
        <header></header>

        <!-- Área de Menus -->
        <nav class="menus">
            <a href="areaUser.php"><button class="btn btn-success menu">Início</button></a> 
            <a href="fornecedores.php"><button class="btn btn-success menu">Fornecedores</button></a> 
            <a href="produtos.php"><button class="btn btn-success menu">Produto</button></a>
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

        <!-- Área de Login/Usuário -->
        <article class="telaLogin">        
            <div class="login">
                <!-- Área de Login -->
                <?php
                    if (isset($_SESSION['logado'])) {                        
                ?>
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
                            <div class="bg-success rounded-3" style="margin-top: -2vh">
                                <?=$_SESSION['conta']?>
                                <a class="btn btn-danger" style="width: 80px;" href="sair.php">Sair</a>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </article>

        <!-- Área de Tecnologias -->
        <article class="telaTecno">
            <div class="tecno">
                Tecnologias
            </div>
        </article>

        <!-- Área de Tecnologias -->
        <article class="telaParc">
            <div class="parc">
                Parceiros
            </div>
        </article>

        <!-- Área de Redes Sociais -->
        <article class="telaRedSoc">
            <div class="redSoc">
                Redes Sociais
            </div>
        </article>

        <!-- Área Principal -->
        <main>
        </main>

        <!-- Área de Rodapé -->
        <footer></footer>

        <!-- Button Oculto -->
        <?php
            include_once 'criarButton.php';
        ?>
    
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <?php if(isset($_GET['msg'])){ ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    Swal.fire(
                    "Seja Bem-Vindo",
                    "Acesso Autorizado",
                    "success"
                    )
                });
            </script>

        <?php } ?>

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