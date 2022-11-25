<?php
session_start();
ob_start();
require 'config.php';
$id = filter_input(INPUT_POST,'id');
echo $id;

$sql = $pdo->query("SELECT * FROM produtos WHERE id = '$id'");

$permitidos = array('image/jpg','image/jpeg','image/png');

 if(in_array($_FILES['img']['type'], $permitidos)){
    $imagem = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], 'assets/img/'.$imagem);

      $sql = $pdo->prepare("UPDATE produtos SET imagem_url = :img WHERE id = :id");
      $sql->bindValue(':id',$id);
      $sql->bindValue(':img',$imagem);
      $sql->execute();

    echo 'Arquivo salvo com sucesso';
    header('Location: editar-produto.php');
    exit;
 } else {
    echo 'Arquivo não permitido';
 }
?>

