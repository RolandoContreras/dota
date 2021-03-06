  <section class="pcoded-main-container">
    <div class="pcoded-wrapper">
      <div class="pcoded-content">
        <div class="pcoded-inner-content">
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Listado</h5>
                  </div>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'backoffice';?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a>Todos los Cursos</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="main-body">
            <div class="page-wrapper">
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            ¿Qué curso estas buscando?
                        </div>
                        <div class="card-block">
                           <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <form method="get" action="<?php echo site_url().$url;?>">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="search" id="search" placeholder="Buscar tu Curso">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h5><?php echo $category_name;?></h5>
                      </div>
                      <div class="card-block">
                        <div class="grid">
                        <?php
                        foreach ($obj_courses as $value) { ?>
                          <figure class="effect-apollo">
                              <img width="365" height="340" src="<?php echo site_url()."static/cms/img/cursos/$value->img";?>" alt="advance-3">
                            <figcaption>
                                <h2><span style="font-size: 32px !important;font-weight: 300 !important;"><?php echo $value->name;?></span></h2>
                              <p><?php echo corta_texto($value->description, 100);?></p>
                              <a href="<?php echo site_url()."backoffice/$value->category_slug/$value->slug";?>">Ver Más</a>
                            </figcaption>
                          </figure>
                        <?php } ?>
                        </div>
                      </div>
                        
                        <div class="row">
                          <div class="col-sm-12 col-md-5"></div>
                          <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers">
                              <ul class="pagination">
                                <?php echo $obj_pagination; ?>
                              </ul>
                            </div>
                          </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    