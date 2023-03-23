<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Projeto Uchiha </title>
        <link rel="stylesheet" href="css/style.css">
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    </head>
    <body>

        <!-- Área de Banner -->
        <header></header>

        <!-- Área de Menus -->
        <nav>
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

        <!-- Área de Login/Usuário -->
        <article class="telaLogin">        
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
            <form action="recebe.php" method="POST" style="margin-top: 2vh; width: 42vw; padding: 20px">
                <div class="card border-light mb-3 bg-transparent" style="max-width: 90vw;">
                    <div class="card-header bg-success border-light fs-3 text-light">Cadastro de Produtos</div>
                    <div class="card-body text-secondary">
                        <div>
                            <input type="hidden" name="cad" value="produto">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> Código *</span>
                            <input name="cod" type="text" class="form-control" placeholder="Código" aria-describedby="basic-addon1" style="background-color: transparent;" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> Nome do Produto *</span>
                            <input name="nome" type="text" class="form-control" placeholder="Nome do Produto" aria-describedby="basic-addon1" style="background-color: transparent;" required>
                        </div>                        

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> Estoque *</span>
                            <input name="estoque" type="text" class="form-control"  aria-describedby="basic-addon1" placeholder="Estoque" style="background-color: transparent;" required>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> Preço *</span>
                            <input name="preco" type="text" class="form-control"  aria-describedby="basic-addon1" placeholder="Preço" style="background-color: transparent;" required>
                        </div>  

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> Data de Cadastro *</span>
                            <input name="data" type="date" class="form-control" aria-describedby="basic-addon1" style="background-color: transparent;" required>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-light">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </form>
        </main>

        <!-- Área de Rodapé -->
        <footer></footer>
    
		<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

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

