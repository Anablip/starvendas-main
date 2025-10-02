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
          <h2 class="card-title mb-4 text-center">Cadastro de Compra</h2>
          <form action="/compra/salvar" method="POST">

            <!-- Usuário -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="id_usuario" class="col-form-label mb-0">
                  <i class="fas fa-user"></i> Carrinho
                </label>
              </div>
              <div class="col">
                <select class="form-select" id="id_usuario" name="txt_carrinho" required>
                  <option value="" selected disabled>Selecione o carrinho</option>
                  <?php foreach ($data['carrinhos'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['usuario'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Endereço -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="id_endereco" class="col-form-label mb-0">
                  <i class="fas fa-map-marker-alt"></i> Produto
                </label>
              </div>
              <div class="col">
                <select class="form-select" id="id_endereco" name="txt_produto" required>
                  <option value="" selected disabled>Selecione o produto</option>
                  <?php foreach ($data['produtos'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="row align-items-center mt-3">
                <div class="col-auto">
                <label for="categoria" class="col-form-label mb-0">
                  <i class="fas fa-tag"></i> Quantidade
                </label>
                </div>
                <div class="col">
                <input type="number" class="form-control" id="categoria" name="txt_quantidade" required>
                </div>
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
          <h3 class="card-title mb-4">Lista de Compras</h3>
          <div class="table-responsive">
            <table class="table align-middle table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col"><i class="fas fa-id-badge"></i> ID</th>
                  <th scope="col"><i class="fas fa-user"></i> Carrinho</th>
                  <th scope="col"><i class="fas fa-map-marker-alt"></i> Produto</th>
                  <th scope="col"><i class="fas fa-map-marker-alt"></i> Quantidade</th>
                  <th scope="col"><i class="fas fa-cog"></i> Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['compras'] as $dados): ?>
                <tr>
                  <td><?= htmlspecialchars($dados['id']) ?></td>
                  <td><?= htmlspecialchars($dados['nome']) ?></td>
                  <td><?= htmlspecialchars($dados['produto']) ?></td>
                  <td><?= htmlspecialchars($dados['quantidade']) ?></td>
                  <td>
                    <button class="btn btn-sm " data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $dados['id'] ?>" data-compra="<?= $dados['nome']?>" data-produto="<?= $dados['produto'] ?>" data-quantidade="<?= $dados['quantidade'] ?>">
                  <i class="fas fa-edit"></i> Editar
                </button>
                     <a href="/compra/excluir/<?= $dados['id'] ?>" class="btn btn-primary mt-1 ">
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
          <h5 class="modal-title" id="editModalLabel">Editar Compra</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/compra/editar" method="POST">
            <input type="hidden" id="edit-id" name="txt_id">
            <div class="mb-3">
              <label for="edit-carrinho" class="form-label">Carrinho</label>
                <select class="form-select" id="edit-carrinho" name="txt_carrinho" required>
                  <option value="" selected disabled>Selecione o carrinho</option>
                  <?php foreach ($data['carrinhos'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['usuario'] ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="edit-produto" class="form-label">Produto</label>
                <select class="form-select" id="edit-produto" name="txt_produto" required>
                  <option value="" selected disabled>Selecione o produto</option>
                  <?php foreach ($data['produtos'] as $dados): ?>
                    <option value="<?= $dados['id'] ?>"><?= $dados['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="edit-quantidade" class="form-label">Quantidade</label>
              <input type="number" class="form-control" id="edit-quantidade" name="txt_quantidade" required>
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
    var compra = button.getAttribute('data-compra')
    var modalCompraInput = editModal.querySelector('#edit-compra')
    modalIdInput.value = id
    modalCompraInput.value = compra
  })
</script>
