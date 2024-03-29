<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background: url('<?= asset("assets/img/inf.jpg") ?>') bottom center;">
    <div class="container position-relative d-flex flex-column align-items-center">

      <h2>Contact</h2>
      <ol>
        <li><a href="<?= URL ?>">Home</a></li>
        <li>Contact</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container position-relative" data-aos="fade-up">

      <div class="row gy-4 d-flex justify-content-end">

        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

          <div class="info-item d-flex">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h4>Local:</h4>
              <p>Luanda - Cacuaco</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex">
            <i class="bi bi-phone flex-shrink-0"></i>
            <div>
              <h4>Telefone:</h4>
              <p>+244 944 589 883/ 921 059 499</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

          <form action="<?=URL?>/contact" method="post"  class="" id="contactForm">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control rounded-0 p-2 <?=$dados['error']?'is-invalid':'' ?>" id="name" placeholder="Seu Nome" >
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control rounded-0 p-2 <?=$dados['error']?'is-invalid':'' ?>" name="email" id="email" placeholder="Seu Email" >
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control rounded-0 p-2 <?=$dados['error']?'is-invalid':'' ?>" name="subject" id="subject" placeholder="Assunto" >
            </div>
            <div class="form-group mt-3 mb-3">
              <textarea class="form-control rounded-0 p-2  <?=$dados['error']?'is-invalid':'' ?>" name="message" rows="5" placeholder="Mensagem" ></textarea>
              <span class="invalid-feedback">
                <?=$dados['error']?>
              </span>
            </div>
            
            <button type="submit" name="send" value="submit" class=" btn btn-primary rounded-0 border-0" style="background: #56b8e6;">Envie Mensagem</button>
          </form>

        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
