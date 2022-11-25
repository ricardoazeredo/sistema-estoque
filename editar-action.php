<?php
    require 'config.php';

   
    $id = filter_input(INPUT_POST, 'id');
    $codigo = filter_input(INPUT_POST, 'codigo'); 
    $produto = filter_input(INPUT_POST, 'produto'); 
    $preco = filter_input(INPUT_POST, 'preco'); 
    $quantidade = filter_input(INPUT_POST, 'quantidade'); 
    $min_quantidade = filter_input(INPUT_POST, 'minima'); 
    
    
    //verificar se o id, o nome e o email são válidos
    
    if($id && $codigo && $produto && $preco && $quantidade && $min_quantidade) {

        $sql = $pdo->prepare("UPDATE produtos SET codigo = :codigo, produto = :produto, preco = :preco, quantidade = :quantidade, min_quantidade = :min_quantidade WHERE id = :id");
        $sql->bindValue(':codigo',"$codigo"); 
        $sql->bindValue(':produto',$produto);
        $sql->bindValue(':preco',$preco);
        $sql->bindValue(':quantidade',$quantidade);
        $sql->bindValue(':min_quantidade',$min_quantidade);
        $sql->bindValue(':id',$id); 
        $sql->execute(); 
        
        header("Location: index.php");
        exit;

    } else {
         //caso contrário, vai retorna para página adicionar.php e não registra.
         header('Location: editar-produto.php'); 
         exit;
    }    