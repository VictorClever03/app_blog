<main id='main' class="main">
  <div class="pagetitle">
    <h1>Visualizar o post</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URL ?>/admin">Home</a></li>
        <li class="breadcrumb-item active">Postagens</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h4 class="h3"><?= $post['titulo'] ?></h4>
          </div>
          <div class="card-body">
            <!-- <h1 class="card-title "><=$see['subtema']?></h1> -->
            <p class="card-text"><?= $post['conteudo'] ?></p>
            <img src="<?= asset($post['imagem']) ?>" alt="imagem de capa" width="600" height="300">
          </div>
          <hr>
          <div class="card-body">
            <a href="<?= URL ?>/admin/posts" class="btn btn-primary">Voltar</a>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalED">Editar</button>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modalED" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitleId">Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= URL ?>/admin/posts/edit/<?=$post['id_postagens']?>" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <p>
              <label for="title">Titulo: </label>
              <input type="text" class="form-control <?= $dados['error'] ? 'is-invalid' : '' ?>" name="title" id="title" value="<?=$post['titulo']?>">
            </p>
            <p>
              <label for="desc">Descrição: </label>
              <textarea name="desc" id="desc" cols="30" rows="5" class="form-control <?= $dados['error'] ? 'is-invalid' : '' ?>"><?=$post['conteudo']?></textarea>

            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary" name="btn" value="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>