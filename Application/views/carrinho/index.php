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
          <h2 class="card-title mb-4 text-center">Cadastro de Carrinho</h2>
          <form action="/carrinho/salvar" method="POST">

            <!-- Usuário -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="id_usuario" class="col-form-label mb-0">
                  <i class="fas fa-user"></i> Usuário
                </label>
              </div>
              <div class="col">
                <select class="form-select" id="id_usuario" name="txt_usuario" required>
                  <option value="" selected disabled>Selecione o usuário</option>
                  <?php foreach ($data['usuarios'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Endereço -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="id_endereco" class="col-form-label mb-0">
                  <i class="fas fa-map-marker-alt"></i> Endereço
                </label>
              </div>
              <div class="col">
                <select class="form-select" id="id_endereco" name="txt_endereco" required>
                  <option value="" selected disabled>Selecione o endereço</option>
                  <?php foreach ($data['enderecos'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Botões -->
            <div class="d-flex justify-content-end gap-2">
              <a href="/carrinho" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Salvar
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Lista de Carrinhos -->
  <div class="row justify-content-center mt-5">
    <div class="col-12">
      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4">Lista de Carrinhos</h3>
          <div class="table-responsive">
            <table class="table align-middle table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col"><i class="fas fa-id-badge"></i> ID</th>
                  <th scope="col"><i class="fas fa-user"></i> Usuário</th>
                  <th scope="col"><i class="fas fa-map-marker-alt"></i> Endereço</th>
                  <th scope="col"><i class="fas fa-cog"></i> Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['carrinhos'] as $dados): ?>
                <tr>
                  <td><?= $dados['id'] ?></td>
                  <td><?= $dados['usuario'] ?></td>
                  <td><?= $dados['endereco'] ?></td>
                  <td>
                   <button class="btn btn-sm " data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $dados['id'] ?>" data-usuario="<?= $dados['usuario'] ?>" data-endereco="<?= $dados['endereco'] ?>">
                  <i class="fas fa-edit"></i> Editar
                </button>
                    <a href="/carrinho/excluir/<?= $dados['id'] ?>" class="btn btn-primary mt-1 ">
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

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Carrinho</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/carrinho/editar" method="POST">
            <input type="hidden" id="edit-id" name="txt_id">
            <div class="mb-3">
              <label for="edit-usuario" class="form-label">Usuário</label>
                <select class="form-select" id="edit-usuario" name="txt_usuario" required>
                  <option value="" selected disabled>Selecione o usuário</option>
                  <?php foreach ($data['usuarios'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="edit-endereco" class="form-label">Endereço</label>
                <select class="form-select" id="edit-endereco" name="txt_endereco" required>
                  <option value="" selected disabled>Selecione o endereço</option>
                  <?php foreach ($data['enderecos'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var editModal = document.getElementById('editModal')
  editModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var id = button.getAttribute('data-id')
    var modalIdInput = editModal.querySelector('#edit-id')
    var usuario = button.getAttribute('data-usuario')
    var modalUsuarioInput = editModal.querySelector('#edit-usuario')
    var endereco = button.getAttribute('data-endereco')
    var modalEnderecoInput = editModal.querySelector('#edit-endereco')
    modalIdInput.value = id
    modalUsuarioInput.value = usuario
    modalEnderecoInput.value = endereco
  })
</script>