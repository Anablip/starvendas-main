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
          <h2 class="card-title mb-4 text-center">Cadastro de Categorias</h2>
            <form action="/categoria/salvar" method="POST">
            <div class="row align-items-center mb-3">
              <div class="col-auto">
              <label for="categoria" class="col-form-label mb-0">
                <i class="fas fa-tag"></i> Nome
              </label>
              </div>
              <div class="col">
              <input type="text" class="form-control" id="categoria" name="txt_nome" required>
              </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
              <a href="/categoria" class="btn btn-secondary">
              Cancelar
              </a>
              <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Salvar
              </button>
            </div>
            </form>
          </div>
          </div>
        </div>
        </div>

    <div class="row justify-content-center mt-5">
    <div class="col-12">
      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4">Lista de Categorias</h3>
          <div class="table-responsive">
            <table class="table align-middle table-striped table-hover">
              <thead>
              <tr>
                <th scope="col"><i class="fas fa-id-badge"></i> ID</th>
                <th scope="col"><i class="fas fa-tag"></i> Nome</th>
                <th scope="col"><i class="fas fa-cog"></i> Ações</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($data['categorias'] as $dados): ?>
              <tr>
                <td><?= $dados['id'] ?></td>
                <td><?= $dados['nome'] ?></td>
                <td>
                <button class="btn btn-sm " data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $dados['id'] ?>" data-categoria="<?= $dados['nome'] ?>">
                  <i class="fas fa-edit"></i> Editar
                </button>
                <a href="/categoria/excluir/<?= $dados['id'] ?>" class="btn btn-primary mt-1  ">
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

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/categoria/editar" method="POST">
            <input type="hidden" id="edit-id" name="txt_id">
            <div class="mb-3">
              <label for="edit-categoria" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit-categoria" name="txt_nome" required>
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
    var categoria = button.getAttribute('data-categoria')
    var modalCategoriaInput = editModal.querySelector('#edit-categoria')
    modalIdInput.value = id
    modalCategoriaInput.value = categoria
  })
</script>