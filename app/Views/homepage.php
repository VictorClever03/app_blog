<?php

use App\Helpers\Sessao;
?>
<?= Sessao::notify("auth"); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-xl-4">
        <h2 data-aos="fade-up">Concentre-se no que importa</h2>
        <blockquote data-aos="fade-up" data-aos-delay="100">
          <p>Um Blog informativo e interativo no IPPA permitirá a fácil comunicação verbal e visual por meio de
            postagens, atualização dos conteúdos entre alunos, professores e a coordenação em geral. </p>
        </blockquote>
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          <a href="<?= URL ?>/about" class="btn-get-started">Saber mais</a>
          <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Ver
              Video</span></a>
        </div>

      </div>
    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= Why Choose Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Por que o Blog?</h2>

      </div>

      <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

        <div class="col-xl-5 img-bg" style="background: url('<?= asset("assets/img/lab.jpg") ?>') center"></div>
        <div class="col-xl-7 slides  position-relative">

          <div class="slides-1 swiper">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">Implementa a dinâmica nas informações entre aluno, professor e a coordenação </h3>

                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, ipsam perferendis
                    asperiores explicabo vel tempore velit totam, natus nesciunt accusantium dicta quod quibusdam
                    ipsum maiores nobis non, eum. Ullam reiciendis dignissimos laborum aut, magni voluptatem velit
                    doloribus quas sapiente optio.</p>
                </div>
              </div><!-- End slide item -->

              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">Interatividade entre os alunos</h3>
                  <p>Dolorem quia fuga consectetur voluptatem. Earum consequatur nulla maxime necessitatibus cum
                    accusamus. Voluptatem dolorem ut numquam dolorum delectus autem veritatis facilis. Et ea ut
                    repellat ea. Facere est dolores fugiat dolor.</p>
                </div>
              </div><!-- End slide item -->

              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">Visualizar o quadro de honra</h3>
                  <h4 class="mb-3">Necessitatibus voluptatibus explicabo dolores a vitae voluptatum.</h4>
                  <p>Neque voluptates aut. Soluta aut perspiciatis porro deserunt. Voluptate ut itaque velit. Aut
                    consectetur voluptatem aspernatur sequi sit laborum. Voluptas enim dolorum fugiat aut.</p>
                </div>
              </div><!-- End slide item -->



            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>

      </div>

    </div>
  </section><!-- End Why Choose Us Section -->

  <!-- ======= Our Services Section ======= -->
  <section id="services-list" class="services-list">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Nossos Cursos</h2>

      </div>

      <div class="row gy-5">

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="icon flex-shrink-0"><i class="bi bi-briefcase" style="color: #f57813;"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">GSI</a></h4>
            <p class="description">Se concentra na gestão de recursos de informática para otimizar o rendimento
              Repassa hardware, software, armazenamento de dados e tecnologias de telecomunicação.</p>
          </div>
        </div>
        <!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="icon flex-shrink-0"><i class="bi bi-hdd-network" style="color: #15a04a;"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Electrónica e telecomunicações</a></h4>
            <p class="description">Electrónica e Telecomunicação podem actuar em várias áreas da Industria e os
              serviços tradicionalmente ligados à Engenharia Electrónica e Telecomunicações.</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <div class="icon flex-shrink-0"><i class="bi bi-laptop" style="color: #d90769;"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Informática</a></h4>
            <p class="description">A Informática é um ramo das ciências da informação e da computação. Estuda os
              processos de recolha, armazenamento, processamento, transferência e difusão de dados digitais. </p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <div class="icon flex-shrink-0"><i class="bi bi-house-door" style="color: #15bfbc;"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Desenhador Projectista</a></h4>
            <p class="description">O projetista é o profissional que cria o desenho de itens em geral, ferramentas,
              equipamentos e uma série de outros materiais que são necessários para o desenvolvimento de produtos
              específicos..</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
          <div class="icon flex-shrink-0"><i class="bi bi-bar-chart" style="color: #f5cf13;"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Contabilidade e Gestão</a></h4>
            <p class="description">Contabilidade é uma ciência aplicada, que tem como objetivo medir e avaliar o
              patrimônio e a realidade econômica de uma entidade, seja esta uma pessoa ou organização.</p>
          </div>
        </div><!-- End Service Item -->



      </div>

    </div>
  </section><!-- End Our Services Section -->

  <?php if (!isset($_SESSION['BlogUser_id'])) : ?>

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h3>Para mais informações contacte-nos</h3>
            <p>Clique o botão abaixo para entrar em contacto.</p>
            <a class="cta-btn" href="<?= URL ?>/contact">Contacte</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->
  <?php endif; ?>


  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Quadro De Honra</h2>

      </div>

      <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <?php if ($honra) : ?>
            <?php foreach ($honra as $key => $value) : ?>
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <?=$value['descricao']?>
                  </p>
                  <div class="profile mt-auto">
                    <img src="<?= asset($value['imagem']) ?>" class="testimonial-img" alt="">
                    <h3><?=$value['nome']?></h3>
                    <h4><?=$value['media']?> Valores</h4>
                  </div>
                </div>
              </div><!-- End testimonial item -->

            <?php endforeach; ?>
          <?php endif; ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->


  <?php if (!isset($_SESSION['BlogUser_id'])) : ?>
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Postagens Recentes</h2>

        </div>

        <div class="row gy-5">
          <?php if ($Rposts) : ?>
            <?php foreach ($Rposts as $key => $value) : ?>
              <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="post-box">
                  <div class="post-img"><img src="<?= asset($value['imagem']) ?>" class="img-fluid" alt=""></div>
                  <div class="meta">
                    <span class="post-date"><?= date('Y-m-d', strtotime($value['create_at'])) ?></span>
                    <span class="post-author"> / <?= $value['nome_u'] ?></span>
                  </div>
                  <h3 class="post-title"><?= $value['titulo'] ?></h3>
                  <p><?= $value['conteudo'] ?></p>
                  <a href="<?= URL ?>/login" class="readmore stretched-link"><span>Ver mais</span><i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

      </div>
    </section><!-- End Recent Blog Posts Section -->
  <?php else : ?>
    <section id="recent-posts" class="recent-posts">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Postagens Recentes</h2>

        </div>

        <div class="row gy-5">
          <?php if ($Rposts) : ?>
            <?php foreach ($Rposts as $key => $value) : ?>
              <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="post-box">
                  <div class="post-img"><img src="<?= asset($value['imagem']) ?>" class="img-fluid" alt=""></div>
                  <div class="meta">
                    <span class="post-date"><?= date('Y-m-d', strtotime($value['create_at'])) ?></span>
                    <span class="post-author"> / <?= $value['nome_u'] ?></span>
                  </div>
                  <h3 class="post-title"><?= $value['titulo'] ?></h3>
                  <p><?= $value['conteudo'] ?></p>
                  <a href="<?= URL ?>/details/<?= $value['id_postagens'] ?>" class="readmore stretched-link"><span>Ver mais</span><i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

      </div>
    </section><!-- End Recent Blog Posts Section -->

  <?php endif ?>
</main><!-- End #main -->