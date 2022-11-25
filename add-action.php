<?php
require 'config.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$codigo = $dados['codigo'];

if($dados['add']){
    $sql = $pdo->query("SELECT codigo FROM produtos WHERE codigo = $codigo");
    if($sql->rowCount() == 0) {
        $sql = "INSERT INTO produtos(codigo, produto, preco, quantidade, min_quantidade,imagem_url) Values (:codigo,:produto,:preco,:quantidade,:min_quantidade,:imagem) ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":codigo", $dados['codigo']);
        $sql->bindValue(":produto", $dados['produto']);
        $sql->bindValue(":preco", $dados['preco']);
        $sql->bindValue(":quantidade", $dados['quantidade']);
        $sql->bindValue(":min_quantidade", $dados['minima']);
        $sql->bindValue(":imagem", "default.png");
        $sql->execute();

        header("Location: index.php");
        exit;
    } else {
        header("Location: adicionar-produto.php");
        exit;
    }
}


