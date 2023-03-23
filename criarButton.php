<?php
    if ($_SESSION['conta'] == "Administrador\n") {
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
        </script>
<?php
    }
?>