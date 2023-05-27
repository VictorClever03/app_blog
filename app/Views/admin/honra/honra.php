<?php

use App\Helpers\Sessao;
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quadro de honra</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=URL?>/admin">Home</a></li>
                <li class="breadcrumb-item active">Novo</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?=Sessao::sms("noticia")?>
    <div class="container">
        <form action="<?=URL?>/admin/newH" enctype="multipart/form-data" method="post">
            <p>
                <label for="title">Nome: </label>
                <input type="text" class="form-control <?=$dados['error']?'is-invalid':'' ?>" name="nome" id="title">
            </p>
            <p>
                <label for="title">Media: </label>
                <input type="text" class="form-control <?=$dados['error']?'is-invalid':'' ?>" name="media" id="title">
            </p>
            <p>
                <label for="desc">Descrição: </label>
                <textarea name="desc" id="desc" cols="30" rows="5" class="form-control <?=$dados['error']?'is-invalid':'' ?>"></textarea>
                
            </p>
            
            <p>
                <label for="img">Imagem de capa: </label>
                <input type="file" class="form-control <?=$dados['error']?'is-invalid':'' ?>" name="img" id="img">
                <span class="invalid-feedback"><?=$dados['error']?></span>
            </p>
           
            <p>
                <button class="btn btn-primary btn-xl" type='submit' name='not' value='submit'> Salvar</button>
            </p>
        </form>
    </div>
</main>