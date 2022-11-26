<?php
    session_start();
    ob_start();
    include 'config.php';
    require ('./include/head.php');    
    require './include/header.php';

    //Criando o array para add as informções
    $banco =[];

    $id = filter_input(INPUT_GET,'id');
    echo $id;
    if($id) {
        $sql = $pdo->query("SELECT * FROM produtos WHERE id = $id");
        $banco = $sql->fetch(PDO::FETCH_ASSOC);        
    } else {
        header("Location: index.php");
        exit;
    } 
    
    
    
?>

<div class="container">
    <div class="conteudo">
        
        <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error'])
                ?>
                </div>            
        <?php endif; ?>
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg'])
                ?>
                </div>   
         <?php endif; ?>   
        <div class="editar d-flex justify-content-around align-items-center">
            
                <h1>SIS Estoque - Cadastrar Usuário</h1>
    
                <form action="cadastrar-action.php" method="POST" class="mb-4">
                    
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control"  >
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="produto" class="form-control" >
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control preco" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmar Senha</label>
                        <input type="password" name="confirmar" class="form-control preco" >
                    </div>
                    
                    <input type="submit" value="Adicionar" class="btn btn-primary" name="add">
    
                </form>
            </div>
        </div>

    </div>
</div>
<?php include 'include/footer.php'; ?>

