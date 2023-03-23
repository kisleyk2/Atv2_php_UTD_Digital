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
        <nav>
            <a href="areaUser.php"><button class="btn btn-success menu">Início</button></a> 
            <a href="fornecedores.php"><button class="btn btn-success menu">Fornecedores</button></a> 
            <a href="produtos.php"><button class="btn btn-success menu">Produto</button></a>
            <div class="input-group" style="width: 8vw; height:5vh;">
                <select name="conta" class="btn form-select bg-success text-light menu" aria-label="Default select example"  id="link" required>
                    <option selected>Cadastro</option>
                    <option value="cadastro.php">Usuário</button></option>
                </select>
            </div>
        </nav>

        <!-- Área de Login/Usuário -->
        <article class="telaLogin">
            <div class="login">
                Login

                <div class="mt-5">
                    <form action="valida.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success" id="basic-addon1">
                                <span class="iconify" data-icon="mdi:clipboard-user" style="color:white"></span>
                            </span>
                            <input name="login" type="text" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1" style="background-color: transparent;" required>
                        </div>                       
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success" id="basic-addon1" style="color:white">
                                <span class="iconify" data-icon="mdi:password"></span>
                            </span>
                            <input name="senha" type="password" class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1" style="background-color: transparent;" required>
                        </div>                        
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-success form-control">Acesso</button>
                        </div>
                    </form>
                </div>                
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
        <main></main>

        <!-- Área de Rodapé -->
        <footer></footer>
    
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


        <?php if(isset($_GET['msg'])){ ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    Swal.fire(
                    "Dados Incorretos",
                    "Email ou senha inválidos",
                    "error"
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

