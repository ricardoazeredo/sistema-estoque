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

        <form action="add-action.php" method="POST" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Código</label>
                <input type="text" name="codigo" class="form-control" >
            </div>
            
            <div class="mb-3">
                <label class="form-label">Produto</label>
                <input type="text" name="produto" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Preço</label>
                <input type="text" name="preco" class="form-control preco" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Quantidade</label>
                <input type="text" name="quantidade" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Qtd. Minima</label>
                <input type="text" name="minima" class="form-control" required>
            </div>
           
            <input type="submit" value="Adicionar Produto" class="btn btn-primary" name="add">

        </form>

    </div>     
</div>

<?php include 'include/footer.php'; ?>