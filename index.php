<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'include/head.php';
    require 'include/functions.php';
    require 'include/header.php';

    function construtor($pdo){
        $email= "rico@email.com";
        
            $consulta = $pdo->query("SELECT * FROM usuarios where email = '$email'");
            if($consulta->rowCount() == 0){
                $sql ="INSERT INTO usuarios (nome,email,senha ) VALUES (:nome,:email,:senha)";
                $sql= $pdo->prepare($sql);
                $sql->bindValue(':nome',"Ricardo");
                $sql->bindValue(':email',$email);
                $sql->bindValue(':senha',password_hash("123",PASSWORD_DEFAULT));
                $sql->execute();
            }
    }

    construtor($pdo);
    $logado = estaLogado($pdo);
    $lista = [];
   
    if($logado == 0){        
        header("Location: login.php");
        exit;
    }

    $sql = $pdo->query("SELECT * FROM produtos");
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll();
    }


    if(isset($_GET['busca'])){
        
        $search = $_GET['busca'];
        $lista = $pdo->query("SELECT * FROM produtos Where codigo = '$search' or produto like '%$search%'");
    }      

?>
   
   <div class="container">
        <div class="conteudo">
            <h1>SIS Estoque - Página Inicial</h1>

            <form method="get" class="mt-4">
                <fieldset>
                    <input 
                        type="text" 
                        placeholder="Digite o código ou nome do produto" 
                        name="busca"
                        id="busca"
                        class="form-control"
                        value=<?=(!empty($_GET['busca'])) ? $_GET['busca'] : '' ;?>
                        
                    >                    
                </fieldset>
            </form>
            <div class="table-responsive">
                <table class="table mt-4">
                    <tr>
                        <th>Imagem</th>
                        <th>Cód.</th>
                        <th>Produto</th>
                        <th>Preço Unit.</th>
                        <th>Qtd.</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach($lista as $item) : ?>
                        <tr>
                            <td><img src="./assets/img/<?=$item['imagem_url']?>" class="exibicao"></td>
                            <td><?php echo $item['codigo']; ?></td>
                            <td><?php echo $item['produto']; ?></td>
                            <td>R$ <?php echo number_format($item['preco'],2,',','.'); ?></td>
                            <td><?php echo $item['quantidade']; ?></td>
                            <td>
                                <a href="editar-produto.php?id=<?php echo $item['id'];?>">Editar</a>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>	
                </table>
            </div>

        </div>     
    
   </div>

<?php include 'include/footer.php'; ?>