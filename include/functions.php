<?php

require './config.php';

function criandoToken($pdo,$email) {
    $token = md5(time().rand(0,9999).time().rand(0,9999));
    $sql = "UPDATE usuarios SET token = :token WHERE email = :email";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':token',$token);
    $sql->bindValue(':email',$email);
    $sql->execute();

    return $token;
}

function estaLogado($pdo) { 
    
    if(isset($_SESSION['token'])){
       $token = $_SESSION['token'];
       $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token = :token");
       $sql->bindValue(':token', $token);
       $sql->execute();
       
       if($sql->rowCount() > 0) {
           return true;
       } else {
            return false;
       }
    }
    else {
        return false;
    }
}

function logout(){
    unset($_SESSION['token']);
        header("Location: login.php");
        exit;
}

