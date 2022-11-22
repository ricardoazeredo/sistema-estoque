<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'include/head.php';
    require 'include/functions.php';

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
    estaLogado($pdo);
?>
   <div class="container">
    <main>
        <h1>SIS Estoque - Página Inicial</h1>
    </main>







   </div>

<?php 'include/script.php'; ?>