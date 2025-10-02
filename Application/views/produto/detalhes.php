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
<div class="container d-flex justify-content-center align-items-center mt-3">
  <div class="card shadow mx-auto" style="max-width: 900px; width: 100%;">
    <?php if (!empty($data['produto'])): ?>
        <div class="row g-0">
            <div class="col-md-5 d-flex align-items-center justify-content-center p-4">
                <img src="/uploads/produto/<?= htmlspecialchars($produto['imagem']) ?>"  class="rounded shadow-sm" >
            </div>
            <div class="col-md-7 p-4">
                <h6 class="badge bg-secondary"><?= htmlspecialchars($data['produto']['categoria']) ?></h6>
                <h2 class="mb-3 card-title"><?= htmlspecialchars($data['produto']['nome']) ?></h2>
                <p class="mb-3"><?= htmlspecialchars($data['produto']['descricao']) ?></p>
                <h4 class="fw-bold text-primary mb-4">R$ <?= htmlspecialchars(number_format($data['produto']['preco'], 2, ',', '.')) ?></h4>
                <a href="carrinho/adicionar/<?= $data['produto']['id'] ?>" class="btn btn-primary btn-lg w-100">Comprar</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning m-4">Produto não encontrado.</div>
    <?php endif; ?>
</div>