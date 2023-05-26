<?php

use App\Helpers\Sessao;
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Novo Post</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=URL?>/admin">Home</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?=Sessao::sms("noticia")?>
    <div class="container">
        <form action="<?=URL?>/admin/posts/create" enctype="multipart/form-data" method="post">
            <p>
                <label for="title">Titulo: </label>
                <input type="text" class="form-control <?=$dados['error']?'is-invalid':'' ?>" name="title" id="title">
            </p>
            <p>
                <label for="desc">Descrição: </label>
                <textarea name="desc" id="desc" cols="30" rows="5" class="form-control <?=$dados['error']?'is-invalid':'' ?>"></textarea>
                
            </p>
            <p>
                <label for="cat">Categoria: </label>
                <select class="form-select form-select <?=$dados['error']?'is-invalid':'' ?>" aria-label=".form-select example" name="cat" id="cat">
                  <option selected>Escolha uma categoria</option>
                  <?php foreach($category as $key=>$value):?>
                    <option value="<?=$value['id_categoria']?>"><?=$value['nome']?></option>
                  <?php endforeach;?>
                  
                </select>
            </p>
            <p>
                <label for="img">imagem de capa: </label>
                <input type="file" class="form-control <?=$dados['error']?'is-invalid':'' ?>" name="img" id="img">
                <span class="invalid-feedback"><?=$dados['error']?></span>
            </p>
           
            <p>
                <button class="btn btn-primary btn-xl" type='submit' name='not' value='submit'> Salvar</button>
            </p>
        </form>
    </div>
</main>