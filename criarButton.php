<?php
    if (isset($_SESSION['logado']) && $_SESSION['conta'] == "Administrador\n") {
        
?>        
        <script>
            /* Criar button Usuário */
            document.addEventListener('DOMContentLoaded', function() {
                var nav = document.querySelector('.menus');

                var a = document.createElement('a');
                var atrib = document.createAttribute("href");
                atrib.value = "lista.php";
                a.setAttributeNode(atrib);

                var button = document.createElement('button');
                button.className = "btn btn-success menu";
                button.innerHTML = "Usuários";
                
                a.appendChild(button);
                nav.appendChild(a);
            }, false);
           
            /* Criar button Produto */
            document.addEventListener('DOMContentLoaded', function() {
                var nav = document.querySelector('.menus');

                var a = document.createElement('a');
                var atrib = document.createAttribute("href");
                atrib.value = "produtos.php";
                a.setAttributeNode(atrib);

                var button = document.createElement('button');
                button.className = "btn btn-success menu";
                button.innerHTML = "Produtos";
                
                a.appendChild(button);
                nav.appendChild(a);
            }, false);

            /* Criar button Fornecedores */
            document.addEventListener('DOMContentLoaded', function() {
                var nav = document.querySelector('.menus');

                var a = document.createElement('a');
                var atrib = document.createAttribute("href");
                atrib.value = "fornecedores.php";
                a.setAttributeNode(atrib);

                var button = document.createElement('button');
                button.className = "btn btn-success menu";
                button.innerHTML = "Fornecedores";
                
                a.appendChild(button);
                nav.appendChild(a);
            }, false);
        </script>
<?php
    }
?>