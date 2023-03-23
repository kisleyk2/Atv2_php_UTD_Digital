<?php

session_start();
session_destroy();

?>

<script type="text/javascript">
  alert("Usuário Deslogado!"); 
  window.setTimeout("location.href='index.php';", 200);
</script>