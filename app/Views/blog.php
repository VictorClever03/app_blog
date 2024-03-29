<?php 
use App\Models\user\Posts as total;

?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?=asset("assets/img/blog-header.jpg")?>');">
  <div class="container position-relative d-flex flex-column align-items-center">

    <h2>Blog</h2>
    <ol>
      <li><a href="<?=URL?>">Home</a></li>
      <li>Blog</li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row g-5">

      <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

        <div class="row gy-5 posts-list">
        <?php if($posts):?>
          <?php foreach($posts as $key=>$value):?>
            <div class="col-lg-6">
                  <article class="d-flex flex-column">

                    <div class="post-img">
                      <img src="<?= asset($value['imagem']) ?>" alt="" class="img-fluid">
                    </div>

                    <h2 class="title">
                      <a href="<?=URL?>/details/<?=$value['id_postagens']?>"><?= $value['titulo'] ?></a>
                    </h2>

                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?=URL?>/details/<?=$value['id_postagens']?>"><?= $value['nome_u'] ?></a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?=URL?>/details/<?=$value['id_postagens']?>"><time datetime="2022-01-01"><?= date('Y-m-d',strtotime($value['create_at'])) ?></time></a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="<?=URL?>/details/<?=$value['id_postagens']?>"><?=total::getCountComment0($value['id_postagens'])['total']?> coment..</a></li>
                      </ul>
                    </div>

                    <div class="content">
                      <p>
                        <?= $value['conteudo'] ?>
                      </p>
                    </div>

                    <div class="read-more mt-auto align-self-end">
                      <a href="<?=URL?>/details/<?=$value['id_postagens']?>">Ver mais <i class="bi bi-arrow-right"></i></a>
                    </div>

                  </article>
                </div><!-- End post list item -->

          <?php endforeach;?>
        <?php endif;?>
          
                
        </div><!-- End blog posts list -->

        <div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div><!-- End blog pagination -->

      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

        <div class="sidebar ps-lg-4">

          

          <div class="sidebar-item categories">
            <h3 class="sidebar-title">Categorias</h3>
            <ul class="mt-3">
              <?php if($cat):?>
                <?php foreach($cat as $key=>$value):?>
                  <li><a href="#"><?=$value['nome']?> </a></li>
                <?php endforeach?>
              <?php endif?>
              
            </ul>
          </div><!-- End sidebar categories-->

          <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Posts Recentes</h3>

            <div class="mt-3">
            <?php if($Rposts):?>
                <?php foreach($Rposts as $key=>$value):?>
                  <div class="post-item">
                <img src="<?=asset($value['imagem'])?>" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="<?=URL?>/details/<?=$value['id_postagens']?>"><?=$value['titulo']?></a></h4>
                  <time datetime="2020-01-01"><?= date('Y-m-d',strtotime($value['create_at'])) ?></time>
                </div>
              </div><!-- End recent post item-->

                <?php endforeach?>
              <?php endif?>
              
            </div>

          </div><!-- End sidebar recent posts-->

         
        </div><!-- End Blog Sidebar -->

      </div>

    </div>

  </div>
</section><!-- End Blog Section -->

</main><!-- End #main -->