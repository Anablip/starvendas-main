<?php
  ob_start();
  session_start();
  $usuarioLogado = isset($_SESSION['usuario_logado']) ? $_SESSION['usuario_logado'] : null;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Essência Joias</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
  </head>
  <body style="background-color: #4744fcff;">
  <style>
    .icon-roxo-claro {
      color: #84abffff ;
     
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Substitui todas as classes de ícones por novos ícones e cor roxo claro
      const iconMap = {
        "fa-star": "fa-gem",
        "fa-list": "fa-layer-group",
        "fa-box": "fa-cube",
        "fa-user": "fa-user-circle",
        "fa-map-marker-alt": "fa-location-dot",
        "fa-shopping-cart": "fa-basket-shopping",
        "fa-bars": "fa-grip-lines"
      };
      document.querySelectorAll("i.fas").forEach(function(icon) {
        for (const oldIcon in iconMap) {
          if (icon.classList.contains(oldIcon)) {
            icon.classList.remove(oldIcon);
            icon.classList.add(iconMap[oldIcon]);
          }
        }
        icon.classList.add("icon-roxo-claro");
      });
    });
  </script>
  <nav class="navbar navbar-expand-lg" style="background-color: #8987f8ff;">
    <div class="container">
      <a class="navbar-brand fw-bold text-white" href="/">
        <i class="fas fa-star"></i> Essência Joias
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="/home">
              <i class="fas fa-home"></i> Home
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="menuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bars"></i> Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="menuDropdown">
              <li>
                <a class="dropdown-item" href="/categoria">
                  <i class="fas fa-list-alt"></i> Categoria
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/produto">
                  <i class="fas fa-box-open"></i> Produto
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/usuario">
                  <i class="fas fa-user-circle"></i> Usuario
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/endereco">
                  <i class="fas fa-map-marked-alt"></i> Endereço
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/carrinho">
                  <i class="fas fa-shopping-cart"></i> Carrinho
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/compra">
                  <i class="fas fa-shopping-basket"></i> Compra
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/usuario/entrar">
                  <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a class="dropdown-item" href="/usuario/cadastro">
                  <i class="fas fa-user-plus"></i> Cadastro
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <?php if ($usuarioLogado): ?>
              <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (!empty($usuarioLogado->foto)): ?>
                  <img src="/uploads/foto/<?= htmlspecialchars($usuarioLogado->foto) ?>" alt="Foto" class="rounded-circle me-2" style="width:30px; height:30px; object-fit:cover;">
                <?php else: ?>
                  <i class="fas fa-user-circle me-2"></i>
                <?php endif; ?>
                <?= htmlspecialchars($usuarioLogado->nome) ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                  <a class="dropdown-item" href="/usuario/perfil/<?= htmlspecialchars($usuarioLogado->id) ?>">
                    <i class="fas fa-user"></i> Perfil
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/usuario/sair">
                    <i class="fas fa-sign-out-alt"></i> Sair
                  </a>
                </li>
              </ul>
            <?php else: ?>
              <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> Usuário
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                  <a class="dropdown-item" href="/usuario/entrar">
                    <i class="fas fa-sign-in-alt"></i> Login
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/usuario/cadastro">
                    <i class="fas fa-user-plus"></i> Cadastrar
                  </a>
                </li>
              </ul>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
    require '../Application/autoload.php';
    use Application\core\App;
    use Application\core\Controller;
    $app = new App();
  ?>
  <style>
    footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      z-index: 999;
    }
  </style>
  <footer class="text-white py-3 mt-5" style="background-color: #8987f8ff;">
    <div class="container text-center">
      &copy; 2025 Essência Joias. Todos os direitos reservados.
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
  
  </body>
</html>
