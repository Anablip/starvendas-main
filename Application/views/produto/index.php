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
          <h2 class="card-title mb-4 text-center">Cadastro de Produtos</h2>
          <form action="/produto/salvar" method="POST" enctype="multipart/form-data">
            
            <!-- Categoria -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="id_categoria" class="col-form-label mb-0">
                  <i class="fas fa-list"></i> Categoria
                </label>
              </div>
              <div class="col">
                <select class="form-select" id="id_categoria" name="txt_categoria" required>
                  <option value="" selected disabled>Selecione a categoria</option>
                  <?php foreach ($data['categorias'] as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>">
                      <?= $categoria['nome'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Nome -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="nome" class="col-form-label mb-0">
                  <i class="fas fa-tag"></i> Nome
                </label>
              </div>
              <div class="col">
                <input type="text" class="form-control" id="nome" name="txt_nome" placeholder="Digite o nome do produto" required>
              </div>
            </div>

            <!-- Descrição -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="descricao" class="col-form-label mb-0">
                  <i class="fas fa-align-left"></i> Descrição
                </label>
              </div>
              <div class="col">
                <input type="text" class="form-control" id="descricao" name="txt_descricao" placeholder="Digite a descrição" required>
              </div>
            </div>

            <!-- Preço -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="preco" class="col-form-label mb-0">
                  <i class="fas fa-dollar-sign"></i> Preço (R$)
                </label>
              </div>
              <div class="col">
                <input type="number" step="0.01" class="form-control" id="preco" name="txt_preco" placeholder="0.00" required>
              </div>
            </div>

            <!-- Imagem -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="imagem" class="col-form-label mb-0">
                  <i class="fas fa-image"></i> Imagem
                </label>
              </div>
              <div class="col">
                <input type="file" class="form-control" id="imagem" name="txt_imagem" required>
              </div>
            </div>

            <!-- Quantidade -->
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <label for="quantidade" class="col-form-label mb-0">
                  <i class="fas fa-cubes"></i> Quantidade
                </label>
              </div>
              <div class="col">
                <input type="number" class="form-control" id="quantidade" name="txt_quantidade" min="1" required>
              </div>
            </div>

            <!-- Botões -->
            <div class="d-flex justify-content-end gap-2">
              <a href="/produto" class="btn btn-secondary">
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

  <!-- Lista de Produtos -->
  <div class="row justify-content-center mt-5">
    <div class="col-12">
      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4">Lista de Produtos</h3>
          <div class="table-responsive">
            <table class="table align-middle table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col"><i class="fas fa-id-badge"></i> ID</th>
                  <th scope="col"><i class="fas fa-list"></i> Categoria</th>
                  <th scope="col"><i class="fas fa-tag"></i> Nome</th>
                  <th scope="col"><i class="fas fa-align-left"></i> Descrição</th>
                  <th scope="col"><i class="fas fa-dollar-sign"></i> Preço</th>
                  <th scope="col"><i class="fas fa-image"></i> Imagem</th>
                  <th scope="col"><i class="fas fa-cog"></i> Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['produtos'] as $produto): ?>
                <tr>
                  <td><?= htmlspecialchars($produto['id']) ?></td>
                  <td><?= htmlspecialchars($produto['categoria']) ?></td>
                  <td><?= htmlspecialchars($produto['nome']) ?></td>
                  <td><?= htmlspecialchars($produto['descricao']) ?></td>
                  <td>R$ <?= htmlspecialchars(number_format($produto['preco'], 2, ',', '.')) ?></td>
                  <td>
                    <img src="/uploads/produto/<?= htmlspecialchars($produto['imagem']) ?>" width="120" class="rounded shadow-sm">
                  </td>
                    <td>
                                        <button class="btn mt-1 " data-bs-toggle="modal" data-bs-target="#editProductModal"
                                            data-id="<?= htmlspecialchars($produto['id']) ?>"
                                            data-id-categoria="<?= htmlspecialchars($produto['id_categoria']) ?>"
                                            data-nome="<?= htmlspecialchars($produto['nome']) ?>"
                                            data-descricao="<?= htmlspecialchars($produto['descricao']) ?>"
                                            data-preco="<?= htmlspecialchars($produto['preco']) ?>"
                                            data-quantidade="<?= htmlspecialchars($produto['quantidade']) ?>"
                                            data-imagem="/uploads/produto/<?= htmlspecialchars($produto['imagem']) ?>">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <a href="/produto/excluir/<?= $produto['id'] ?>" class="btn btn-primary mt-1 ">
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
        <h5 class="modal-title" id="editProductModalLabel">Editar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/produto/editar" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="edit-id" name="txt_id">
          <div class="row">
            <div class="col-md-8">
              <div class="mb-3">
                <label for="edit-id-categoria" class="form-label"><i class="fas fa-list"></i> Categoria</label>
                <select class="form-select" id="edit-id-categoria" name="txt_categoria" required>
                  <option value="" disabled>Selecione...</option>
                  <?php foreach ($data['categorias'] as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="edit-nome" class="form-label"><i class="fas fa-tag"></i> Nome</label>
                <input type="text" class="form-control" id="edit-nome" name="txt_nome" required>
              </div>
              <div class="mb-3">
                <label for="edit-descricao" class="form-label"><i class="fas fa-align-left"></i> Descrição</label>
                <textarea class="form-control" id="edit-descricao" name="txt_descricao" rows="3" required></textarea>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="edit-preco" class="form-label"><i class="fas fa-dollar-sign"></i> Preço (R$)</label>
                  <input type="number" step="0.01" class="form-control" id="edit-preco" name="txt_preco" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="edit-quantidade" class="form-label"><i class="fas fa-cubes"></i> Quantidade</label>
                  <input type="number" class="form-control" id="edit-quantidade" name="txt_quantidade" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3 text-center">
                <label class="form-label">Imagem Atual</label><br>
                <img id="current-product-image" src="" alt="Imagem do Produto" class="img-thumbnail mb-2" style="max-width: 100%;">
                <label for="edit-imagem" class="form-label">Alterar Imagem</label>
                <input type="file" class="form-control" id="edit-imagem" name="txt_imagem">
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
      const idCategoria = button.getAttribute('data-id-categoria'); // Agora terá o valor correto!
      const nome = button.getAttribute('data-nome');
      const descricao = button.getAttribute('data-descricao');
      const preco = button.getAttribute('data-preco');
      const quantidade = button.getAttribute('data-quantidade');
      const imagemSrc = button.getAttribute('data-imagem');

      const modal = event.target;
      modal.querySelector('#edit-id').value = id;
      modal.querySelector('#edit-nome').value = nome;
      modal.querySelector('#edit-descricao').value = descricao;
      modal.querySelector('#edit-preco').value = preco;
      modal.querySelector('#edit-quantidade').value = quantidade;
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