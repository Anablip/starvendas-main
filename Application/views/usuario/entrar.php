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
<div class="container mt-4" style="max-width: 400px;">
  <div class="card shadow">
    <div class="card-body">
      <h5 class="card-title mb-4 text-center">Login</h5>
      <form action="/usuario/entrar" method="post">
        <?php if (isset($data['erro'])): ?><div class="alert alert-danger"><?= htmlspecialchars($data['erro']) ?></div><?php endif; ?>
        <div class="mb-3">
          <label for="txt_email" class="form-label">Usuário:</label>
          <input type="text" id="txt_email" name="txt_email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="txt_senha" class="form-label">Senha:</label>
          <input type="password" id="txt_senha" name="txt_senha" class="form-control" required>
        </div>
        <div class="d-grid">
           <button type="submit" class="btn btn-primary btn-sm">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>