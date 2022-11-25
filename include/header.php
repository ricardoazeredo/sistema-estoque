<?php
 $url = $_SERVER['PHP_SELF']; 
?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-estoque">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Sistema de Estoque</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if($url === "/sis-estoque/index.php") { 
          echo '';
        } else { ?>        
          <li class="nav-item">
            <a class="nav-link active"  href="index.php">Home</a>
          </li>
        <?php } ?>
        <?php if($url === "/sis-estoque/adicionar-produto.php") { 
          echo '';
        } else { ?>
        <li class="nav-item">
          <a class="nav-link active" href="adicionar-produto.php">Adicionar Produto</a>
        </li>
        <?php } ?>
        <?php if($url === "/sis-estoque/relatorio.php") { 
          echo '';
        } else { ?> 
        <li class="nav-item">
          <a class="nav-link active" href="relatorio.php" disabled>Relatório</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link active" href="sair.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>