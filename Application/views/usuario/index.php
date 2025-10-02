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
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card shadow rounded-4">
        <div class="card-body">
          <h2 class="card-title mb-4 text-center">Cadastro de Usuários</h2>
          <form action="/usuario/salvar" method="POST" enctype="multipart/form-data">

            <!-- Nome -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="nome" class="col-form-label mb-0">
                  <i class="fas fa-user"></i> Nome
                </label>
              </div>
              <div class="col">
                <input type="text" class="form-control" id="nome" name="txt_nome" required>
              </div>
            </div>

            <!-- Email -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="email" class="col-form-label mb-0">
                  <i class="fas fa-envelope"></i> Email
                </label>
              </div>
              <div class="col">
                <input type="email" class="form-control" id="email" name="txt_email" required>
              </div>
            </div>

            <!-- Senha -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="senha" class="col-form-label mb-0">
                  <i class="fas fa-lock"></i> Senha
                </label>
              </div>
              <div class="col">
                <input type="password" class="form-control" id="senha" name="txt_senha" required>
              </div>
            </div>

            <!-- Foto -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="foto" class="col-form-label mb-0">
                  <i class="fas fa-image"></i> Foto
                </label>
              </div>
              <div class="col">
                <input type="file" class="form-control" id="foto" name="txt_foto" required>
              </div>
            </div>

            <!-- Botões -->
            <div class="d-flex justify-content-end gap-2">
              <a href="/usuario" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Salvar
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Lista de Usuários -->
  <div class="row justify-content-center mt-5">
    <div class="col-12">
      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4">Lista de Usuários</h3>
          <div class="table-responsive">
            <table class="table align-middle table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col"><i class="fas fa-id-badge"></i> ID</th>
                  <th scope="col"><i class="fas fa-user"></i> Nome</th>
                  <th scope="col"><i class="fas fa-envelope"></i> Email</th>
                  <th scope="col"><i class="fas fa-lock"></i> Senha</th>
                  <th scope="col"><i class="fas fa-image"></i> Foto</th>
                  <th scope="col"><i class="fas fa-cog"></i> Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['usuarios'] as $dados): ?>
                <tr>
                  <td><?= htmlspecialchars($dados['id']) ?></td>
                  <td><?= htmlspecialchars($dados['nome']) ?></td>
                  <td><?= htmlspecialchars($dados['email']) ?></td>
                  <td><?= htmlspecialchars($dados['senha']) ?></td>
                  <td><?= htmlspecialchars($dados['foto']) ?></td>
                  <td>
                     <button class="btn mt-1 " data-bs-toggle="modal" data-bs-target="#editProductModal"
                                            data-id="<?= htmlspecialchars($dados['id']) ?>"
                                            data-nome="<?= htmlspecialchars($dados['nome']) ?>"
                                            data-email="<?= htmlspecialchars($dados['email']) ?>"
                                            data-senha="<?= htmlspecialchars($dados['senha']) ?>"
                                            data-foto="<?= htmlspecialchars($dados['foto']) ?>">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                    <a href="/usuario/excluir/<?= $dados['id'] ?>" class="btn btn-primary mt-1 ">
                      <i class="fas fa-trash-alt"></i> Excluir
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Editar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/usuario/editar" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="edit-id" name="txt_id">
          <div class="row">
            <div class="col-md-8">
              <div class="mb-3">
                <label for="edit-nome" class="form-label"><i class="fas fa-tag"></i> Nome</label>
                <input type="text" class="form-control" id="edit-nome" name="txt_nome" required>
              </div>
              <div class="mb-3">
                <label for="edit-email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" class="form-control" id="edit-email" name="txt_email" required>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="edit-senha" class="form-label"><i class="fas fa-lock"></i> Senha</label>
                  <input type="password" class="form-control" id="edit-senha" name="txt_senha" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="edit-foto" class="form-label"><i class="fas fa-image"></i> Foto</label>
                  <input type="file" class="form-control" id="edit-foto" name="txt_foto">
                </div>
              </div>
            </div>
          <div class="d-flex justify-content-end gap-2 mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar Alterações</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const editProductModal = document.getElementById('editProductModal');
  if (editProductModal) {
    editProductModal.addEventListener('show.bs.modal', event => {
      const button = event.relatedTarget;

      const id = button.getAttribute('data-id');
      const nome = button.getAttribute('data-nome');
      const email = button.getAttribute('data-email');
      const senha = button.getAttribute('data-senha');
      const fotoSrc = button.getAttribute('data-foto');

      const modal = event.target;
      modal.querySelector('#edit-id').value = id;
      modal.querySelector('#edit-nome').value = nome;
      modal.querySelector('#edit-email').value = email;
      modal.querySelector('#edit-senha').value = senha;
      modal.querySelector('#current-product-image').src = imagemSrc;
      modal.querySelector('#edit-imagem').value = '';
      
      // A linha chave que agora vai funcionar:
      if (idCategoria) {
          modal.querySelector('#edit-id-categoria').value = idCategoria;
      }
    });
  }
</script>

</body>
</html>
