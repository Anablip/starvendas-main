               <!-- Adicione isso no <head> do seu layout principal ou da view -->
<style>
  body {
    background: linear-gradient(135deg, #e3f2fd, #bbdefb, #e0d3f2, #f0e6ff);
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
  }
  .card {
    border-radius: 12px;
    border: none;
    box-shadow: 0 10px 20px rgba(0,0,0,0.07);
    background: #f8faff;
  }
  .card-title {
    color: #5a2e91;
    font-weight: 600;
  }
  .btn-primary {
    background-color: #9c27b0;
    border-color: #9c27b0;
  }
  .btn-primary:hover {
    background-color: #2196f3;
    border-color: #2196f3;
  }
  .badge.bg-secondary {
    background-color: #e0d3f2;
    color: #5a2e91;
  }
  .card-footer {
    background: #e6f0ff;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
  }
</style>
               <div class="container">
                  <div class="row mt-3">
                    <?php foreach ($data['produtos'] as $produto): ?>
                      <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                         <img src="/uploads/produto/<?= htmlspecialchars($produto['imagem']) ?>"  class="rounded shadow-sm">
                          <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($produto['descricao']) ?></p>
                            <span class="badge bg-secondary"><?= htmlspecialchars($produto['categoria']) ?></span>
                          </div>
                          <div class="card-footer d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-success">R$ <?= htmlspecialchars(number_format($produto['preco'], 2, ',', '.')) ?></span>
                            <a href="/produto/detalhes/<?= htmlspecialchars($produto['id']) ?>" class="btn btn-primary btn-sm">Comprar</a>
                          </div>
                        </div>
                        <script>
                          // Faz a imagem girar suavemente ao passar o mouse
                        $uploadPath = '../public/uploads/produto/' . $imagemName;
                      if (move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
                        $Produtos = $this->model('Produtos');
                        $Produtos::salvar($categoria, $nome, $preco, $imagemName, $quantidade, $descricao);
                      }
                      $this->redirect('produto/index');
                                          </script>              </div>
                    <?php endforeach; ?>
                  </div>
                </div>
