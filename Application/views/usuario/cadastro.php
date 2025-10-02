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
  <div class="card shadow" style="width: 22rem;">
      <div class="card-body">
          <h5 class="card-title mb-4 text-center">Cadastro de Usuário</h5>
          <form action="/usuario/salvar_cadastrar" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" name="txt_nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" id="email" name="txt_email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" id="senha" name="txt_senha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" id="foto" name="txt_foto" class="form-control" accept="image/*" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>