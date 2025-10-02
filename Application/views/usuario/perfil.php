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

  <?php if (!empty($data['usuario'])): ?>
  <div class="card shadow mx-auto" style="max-width: 600px; width: 100%;">
    <form action="/usuario/editar" method="post" enctype="multipart/form-data">
        <div class="card-body text-center">
          <input type="hidden" name="txt_id" value="<?= htmlspecialchars($data['usuario'][0]['id']) ?>">
            <img src="/uploads/foto/<?= $data['usuario'][0]['foto'] ?>" class="rounded-circle mb-3 shadow-sm" style="width: 128px; height: 128px; object-fit: cover;">
          <h2 class="mb-3 card-title"><?= htmlspecialchars($data['usuario'][0]['nome']) ?></h2>
            <h6 class="badge bg-secondary mb-3"><?= htmlspecialchars($data['usuario'][0]['tipo'] ?? 'Usuário') ?></h6>
          <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" id="foto" name="txt_foto" class="form-control" accept="image/*">
                </div>
          <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" id="nome" name="txt_nome" class="form-control" value="<?= htmlspecialchars($data['usuario'][0]['nome']) ?>" required>
            </div>
          <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" id="email" name="txt_email" class="form-control" value="<?= htmlspecialchars($data['usuario'][0]['email']) ?>" required>
            </div>
          <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" id="senha" name="txt_senha" class="form-control">
            </div>
        </div>
      <div class="card-footer text-end">
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </form>

    <?php if (isset($_GET['msg'])): ?>
      <div class="alert alert-success m-4"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>
  <?php endif; ?>


  </div>
</div>
 