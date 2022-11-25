<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'include/head.php';
    require 'include/functions.php';
    require 'include/header.php';

    $logado = estaLogado($pdo);
    
   
    if($logado == 0){
        echo "<br/>";
         echo $logado;
        header("Location: login.php");
    }  

?>
<div class="container">
    <div class="conteudo">
        <h1>SIS Estoque - Cadastro de Produto</h1>

    </div>     
</div>

<?php include 'include/footer.php'; ?>