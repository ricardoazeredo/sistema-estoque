<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'include/head.php';
    require 'include/header.php';

    $list = [];

    $sql = $pdo->query("SELECT * FROM produtos WHERE min_quantidade > quantidade");
    if($sql->rowCount() > 0){
        $list = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Nem um produto está com estoque baixo";
    }
    

?>
<div class="container">
    <div class="conteudo">
        <h1>Relatório</h1>
        <button class="btn btn-secondary" onclick="imprimir()">Imprimir</button>
        
        
        <table class="table table-resposnive">
            <tr>
                <th>Nome do Produto</th>
                <th>Qtd.</th>
                <th>Qtd. Mínima</th>
                <th>Diferença</th>
            </tr>
            <?php foreach($list as $item): ?>
                
                <tr>
                    <td><?=$item['produto'];?></td>
                    <td><?=$item['quantidade'];?></td>
                    <td><?=$item['min_quantidade'];?></td>
                    <td><?php echo (floatVal($item['min_quantidade']) - floatVal($item['quantidade'])); ?></td>
                </tr>
            <?php endforeach; ?>    
        </table>
    </div>
</div>
<?php include 'include/footer.php'; ?>
<script type="text/javascript">
    function imprimir(){
        window.print();
    }
</script>
