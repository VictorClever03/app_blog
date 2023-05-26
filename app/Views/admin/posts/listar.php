<?php

use App\Helpers\Sessao;
use App\Helpers\Valida;

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Listar Postagens</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URL ?>/admin">Home</a></li>
        <li class="breadcrumb-item active">Posts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <!-- contactos -->
  <div class="col-12">
    <div class="card recent-sales overflow-auto">


      <div class="card-body">
        <h5 class="card-title">Mensagens Enviadas <span>| Todos</span></h5>

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titulo</th>
              <th scope="col">Criador</th>
              <th scope="col">Categoria</th>
              <th scope="col">Data de criação</th>
              <th scope="col">Acção</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($dados) : $i = 0; ?>
              <?php foreach ($dados as $key => $value) : ?>
                <tr>
                  <th scope="row"><?= $i += 1 ?></th>
                  <td><?= $value['titulo'] ?></td>
                  <td><a class="text-primary"><?= $value['nome_u'] ?></a></td>
                  <td><?= $value['nome_c'] ?></td>
                  <td><?= Valida::ANG($value['create_at']) ?></td>
                  <td class="d-flex gap-3">
                    <a href="<?= URL ?>/admin/posts/edit/<?= $value['id_postagens'] ?>" class="badge bg-success border-0 p-2 text-white">Ver</a>
                    <button class="badge bg-danger border-0 p-2" data-bs-toggle="modal" data-bs-target="#modalD<?= $i ?>">Deletar</button>

                  </td>
                </tr>


                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="modalD<?= $i ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId"><?= $value['titulo'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Tem certeza que deseja deletar?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <form action="<?= URL ?>/admin/delete/post/<?= $value['id_postagens'] ?>" method="post">
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
</main>