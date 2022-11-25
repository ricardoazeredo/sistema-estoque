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
            <div class="leftside">
            
                <div class="avatar mt-4">
                    <img src="assets/img/<?=$banco['imagem_url']; ?>" alt="">
                </div>
                <div class="mudar">
                    
                    <form action="recebedor.php" method="post" enctype="multipart/form-data" />
                    <input type="hidden" name="id" value="<?php echo $banco['id']; ?>">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Trocar Imagem</label>
                        <input class="form-control" type="file" name="img">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <a href="index.php" class="btn btn-danger">Voltar</a>
                    </form>
                </div>
            </div>
            <div class="rightside">  
                <h1>SIS Estoque - Editando o Produto</h1>
    
                <form action="editar-action.php" method="POST" class="mb-4">
                    <input type="hidden" name="id" value="<?php echo $banco['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Código</label>
                        <input type="text" name="codigo" class="form-control" value="<?=$banco['codigo'];?>" >
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Produto</label>
                        <input type="text" name="produto" class="form-control" value="<?=$banco['produto'];?>" >
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Preço</label>
                        <input type="text" name="preco" class="form-control preco" value="<?=$banco['preco'];?>" >
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Quantidade</label>
                        <input type="text" name="quantidade" class="form-control" value="<?=$banco['quantidade'];?>" >
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Qtd. Minima</label>
                        <input type="text" name="minima" class="form-control" value="<?=$banco['min_quantidade'];?>" >
                    </div>
                
                    <input type="submit" value="Adicionar Produto" class="btn btn-primary" name="add">
    
                </form>
            </div>
        </div>

    </div>
</div>
<?php include 'include/footer.php'; ?>

