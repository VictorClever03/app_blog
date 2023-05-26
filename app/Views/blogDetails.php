<?php

use App\Helpers\ResumirTexto as Text;
?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= asset("assets/img/blog-header.jpg") ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">

      <h2>Blog Detalhes</h2>
      <ol>
        <li><a href="<?= URL ?>">Home</a></li>
        <li>Detalhes do Blog</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

          <article class="blog-details">

            <div class="post-img">
              <img src="<?= asset($post['imagem']) ?>" alt="" class="img-fluid">
            </div>

            <h2 class="title"><?= $post['titulo'] ?></h2>

            <div class="meta-top">
              <ul class="mb-3">
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= $post['nome_u'] ?></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01"><?= date('Y-m-d', strtotime($post['create_at'])) ?></time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#"><?= $count['total'] ?> Coment..</a></li>
              </ul>
              <p>
                <?= $post['conteudo'] ?>
              </p>
            </div><!-- End meta top -->

            <!--  -->

          </article><!-- End blog post -->

          <div class="comments">
            <div class="reply-form">

              <h4>Comentar</h4>
              <form action="<?= URL ?>/comment/create/<?= $post['id_postagens'] ?>" method="post">
                <div class="row">
                  <div class="col form-group">
                    <textarea name="comment" class="form-control" placeholder="Comente aqui*"></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" name="btn-comments" value="submit">Postar</button>

              </form>

            </div>
          </div>
          <div class="comments">

            <h4 class="comments-count"><?= $count['total'] ?> Comentario(s)</h4>

            <?php if ($comments) : $i = 0; ?>
              <?php foreach ($comments as $key => $value) : $i += 1; ?>
                <div id="comment-1" class="comment">
                  <div class="d-flex">
                    <div class="comment-img"><span class="rounded-5 p-2 text-white" style="background:#56B8E6;" title="<?= $_SESSION['BlogUser_nome'] ?>"><?= Text::perfil($value['nome']) ?></span></div>
                    <div>
                      <h5 class="d-flex">
                        <a href="#"><?= $value['nome'] ?></a>
                        <?php if ($value['user'] === $_SESSION['BlogUser_id']) : ?>
                          <a class="reply" href="<?=URL?>/comment/edit/<?=$value['id_coment']?>/<?= $post['id_postagens'] ?>"><i class="bi bi-pencil-square"></i></a>
                          <form action="<?=URL?>/comment/delete/<?=$value['id_coment']?>/<?= $post['id_postagens'] ?>" method="post">
                            <button type="submit" class="text-decoration-none bg-transparent border-0"><a class="reply"><i class="bi bi-trash3"></i></a></button>
                          </form>
                          
                          <?php endif; ?>
                      </h5>
                      <time datetime="2020-01-01"><?= date('Y-m-d', strtotime($value['create_coment'])) ?></time>
                      <p>
                        <?= $value['conteudo_c'] ?>
                      </p>
                    </div>
                  </div>
                </div><!-- End comment #1 -->
                
                
              <?php endforeach; ?>
            <?php endif; ?>


          </div><!-- End blog comments -->

        </div>






        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

          <div class="sidebar ps-lg-4">

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Posts Recentes</h3>

              <div class="mt-3">
                <?php if ($Rposts) : ?>
                  <?php foreach ($Rposts as $key => $value) : ?>
                    <div class="post-item">
                      <img src="<?= asset($value['imagem']) ?>" alt="" class="flex-shrink-0">
                      <div>
                        <h4><a href="<?= URL ?>/details/<?= $value['id_postagens'] ?>"><?= $value['titulo'] ?></a></h4>
                        <time datetime="2020-01-01"><?= date('Y-m-d', strtotime($value['create_at'])) ?></time>
                      </div>
                    </div><!-- End recent post item-->

                  <?php endforeach ?>
                <?php endif ?>

              </div>

            </div><!-- End sidebar recent posts-->



          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->










</main><!-- End #main -->