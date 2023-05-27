<main id="main" class="main">
  <div class="pagetitle">
    <h1>Usuarios</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URL ?>/admin">Home</a></li>
        <li class="breadcrumb-item active">usuarios</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <!-- contactos -->
  <div class="col-lg-12 ">
    <div class="row ">

      <div class="col-12">
        <div class="card recent-sales overflow-auto">


          <div class="card-body ">
            <!-- Modal trigger button -->
            <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modalCad">+Cadastrar</button>


            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalCad" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Cadastrar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="<?= URL ?>/admin/cadastrar/usuario" method="post" id="formCat">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                        <div class="invalid-feedback" id="error_nome"></div>
                      </div>
                      <div class="mb-3">
                        <label for="desc" class="form-label">Email</label>
                        <input type="email" class="form-control" id="desc" name="email">
                        <div class="invalid-feedback" id="error_desc"></div>
                      </div>
                      <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                        <div class="invalid-feedback" id="error_senha"></div>
                      </div>
                      <div class="mb-3">
                        <label for="select" class="form-label">Nivel</label>
                        <select class="form-select" aria-label="Default select example" id="select" name="nivel">
                          <option selected value='1'>normal</option>
                          <option value="0">admin</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>



            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nivel</th>
                  <th scope="col">Acções</th>
                  <!-- <th scope="col">Status</th> -->
                </tr>
              </thead>
              <tbody>
                <?php if ($users) : $i = 0; ?>
                  <?php foreach ($users as $key => $value) : ?>
                    <tr>
                      <th scope="row"><?= $i += 1 ?></th>
                      <td><?= $value['nome'] ?></td>
                      <td><?= $value['email'] ?></td>
                      <td><?= $value['adm']=='0'?'admin':'normal' ?></td>
                      <td class="d-flex gap-3">

                        <button class="badge bg-success border-0 p-2" data-bs-toggle="modal" data-bs-target="#modalE<?= $i ?>">Editar</button>
                        <button class="badge bg-danger border-0 p-2" data-bs-toggle="modal" data-bs-target="#modalD<?= $i ?>">Deletar</button>

                      </td>
                    </tr>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalE<?= $i ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Editar o usuario: <?= $value['nome'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= URL ?>/admin/editar/usuario/<?= $value['id_usuarios'] ?>" method="post" id="formEdit">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nomeE" name="nome" value="<?=$value['nome']?>">
                                <div class="invalid-feedback" id="error_nomeE"></div>
                              </div>
                              <div class="mb-3">
                                <label for="desc" class="form-label">Email</label>
                                <input type="email" class="form-control" id="descE" name="email" value="<?=$value['email']?>">
                                <div class="invalid-feedback" id="error_desc"></div>
                              </div>
                              <div class="mb-3">
                                <label for="select" class="form-label">Nivel</label>
                                <select class="form-select" aria-label="Default select example" id="select" name="nivel">
                                  <option selected value='1'>normal</option>
                                  <option value="0">admin</option>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                              <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalD<?= $i ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId"><?= $value['nome'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Tem certeza que deseja deletar?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <form action="<?= URL ?>/admin/delete/usuario/<?= $value['id_usuarios'] ?>/<?=$value['adm']?>" method="post">
                              <button type="submit" class="btn btn-primary">Deletar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>



                  <?php endforeach; ?>
                <?php endif; ?>

              </tbody>
            </table>

          </div>

        </div>
      </div>
      <!-- End contactos -->
    </div>
  </div>

</main>
<script>
  const formCat = document.querySelector('#formCat');
  const formEdit = document.querySelector('#formEdit');
  const nome = document.querySelector('#nome');
  const desc = document.querySelector('#desc');
  const senha = document.querySelector('#senha');
  const error_nome = document.querySelector('#error_nome');
  const error_desc = document.querySelector('#error_desc');
  const error_senha = document.querySelector('#error_senha');
  const nomeE = document.querySelector('#nomeE');
  const descE = document.querySelector('#descE');
  const error_nomeE = document.querySelector('#error_nomeE');
  const error_descE = document.querySelector('#error_descE');
  formCat.addEventListener('submit', (e) => Validate(e));
  formEdit.addEventListener('submit', (e) => ValidateE(e));

  function empty(values) {
    if (values.value === '') {
      return true;
    } else {
      return false
    }
  }

  function ValidateE(e) {
    e.preventDefault();
    if (empty(nomeE) || empty(descE)) {
      if (empty(nomeE)) {
        nomeE.classList.add('is-invalid');
        nomeE.classList.remove('is-valid');
        error_nomeE.innerHTML = '';
        error_nomeE.innerHTML += 'Preencha o campo nome';
      } else {
        nomeE.classList.remove('is-invalid');
        nomeE.classList.add('is-valid');
      }

      if (empty(descE)) {
        descE.classList.add('is-invalid');
        descE.classList.remove('is-valid');
        error_descE.innerHTML = '';
        error_descE.innerHTML += 'Preencha o campo Email';
      } else {
        descE.classList.remove('is-invalid');
        descE.classList.add('is-valid');
      }
    } else {
      formEdit.submit();
    }
  }

  function Validate(e) {
    e.preventDefault();
    if (empty(nome) || empty(desc) || empty(senha)) {
      if (empty(nome)) {
        nome.classList.add('is-invalid');
        nome.classList.remove('is-valid');
        error_nome.innerHTML = '';
        error_nome.innerHTML += 'Preencha o campo nome';
      } else {
        nome.classList.remove('is-invalid');
        nome.classList.add('is-valid');
      }

      if (empty(desc)) {
        desc.classList.add('is-invalid');
        desc.classList.remove('is-valid');
        error_desc.innerHTML = '';
        error_desc.innerHTML += 'Preencha o campo Email';
      } else {
        desc.classList.remove('is-invalid');
        desc.classList.add('is-valid');
      }
      if (empty(senha)) {
        senha.classList.add('is-invalid');
        senha.classList.remove('is-valid');
        error_senha.innerHTML = '';
        error_senha.innerHTML += 'Preencha o campo Senha';
      } else {
        desc.classList.remove('is-invalid');
        desc.classList.add('is-valid');
      }
    } else {
      formCat.submit();
    }
  }
</script>