<main id="main" class="main">

  <div class="pagetitle">
    <h1>Painel Principal</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=URL?>/admin">Home</a></li>
        <li class="breadcrumb-item active">Painel</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- blog Card -->
          <div class="col-xxl-4 col-md-4">

            <div class="card info-card sales-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Posts <span>| Todos</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-newspaper"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$post['postTotal']?></h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End blog Card -->

          <!-- contactos Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Mensagens <span>| Todos</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-lines-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$contact['messageTotal']?></h6>


                  </div>
                </div>
              </div>

            </div>
          </div><!-- End contactos Card -->

          <!-- users Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card customers-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Usuários <span>| Todos</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$user['userTotal']?></h6>


                  </div>
                </div>

              </div>
            </div>
          </div><!-- End users Card -->

          <!-- contactos -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Mensagens Enviadas <span>| Todos</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Email</th>
                      <th scope="col">Assunto</th>
                      <th scope="col">Ver</th>
                      <!-- <th scope="col">Status</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($messages) : $i = 0; ?>
                      <?php foreach ($messages as $key => $value) : ?>
                        <tr>
                          <th scope="row"><?=$i+=1?></th>
                          <td><?=$value['nome']?></td>
                          <td><a  class="text-primary"><?=$value['email']?></a></td>
                          <td><?=$value['assunto']?></td>
                          <td class="d-flex gap-3">
                            <button class="badge bg-success border-0 p-2" data-bs-toggle="modal" data-bs-target="#modal<?=$i?>">Ver</button>
                            <button class="badge bg-danger border-0 p-2" data-bs-toggle="modal" data-bs-target="#modalD<?=$i?>">Deletar</button>
                            
                        </td>
                        </tr>
                        
                        
                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modal<?=$i?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Mensagem de <?=$value['nome']?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?=$value['mensagem']?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalD<?=$i?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Mensagem de <?=$value['nome']?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Tem certeza que deseja deletar?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <form action="<?=URL?>/admin/deleteMessage/<?=$value['id']?>" method="post">
                              <button type="submit" class="btn btn-primary">Deletar</button>
                            </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                        <!-- Optional: Place to the bottom of scripts -->
                        <script>
                          const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                        
                        </script>
                      <?php endforeach; ?>
                    <?php endif; ?>

                  </tbody>
                </table>

              </div>

            </div>
          </div>
          <!-- End contactos -->



        </div>
      </div><!-- End Left side columns -->



    </div>
  </section>

</main><!-- End #main -->