 <footer id=colophon class="site-footer dark style_old">
    <div class="footer no-footer-sticky ">
      <div class=container>
        <div class="row footer-columns footer-sidebars">
          <div class="footer-col footer-col5 col-xs-12 col-md-3">
            <aside id=text-3 class="widget widget_text">
              <div class=textwidget>
                <p>
                    <img class="wp-image-4261 size-full alignnone" src="<?php echo site_url().'assets/page_front/images/logo/logo_color-white.png';?>" alt="logo" width="300">
                </p>
                <p>Únete a cientos de personas que están haciendo sus vidas diferentes. Aprovecha de todos los beneficios que tenemos para ti.</p>
              </div>
            </aside>
          </div>
          <div class="footer-col footer-col5 col-xs-12 col-md-2">
            <aside id=nav_menu-3 class="widget widget_nav_menu">
              <h3 class="widget-title">Mapa</h3>
              <div class=menu-links-container>
                <ul id=menu-links class=menu>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url();?>" class=tc-menu-inner>Inicio</a>
                  </li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'cursos';?>" class=tc-menu-inner>Cursos</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4235 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'login';?>" class=tc-menu-inner>Iniciar Sesión</a>
                  </li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4235 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'registro';?>" class=tc-menu-inner>Registro</a>
                  </li>
                </ul>
              </div>
            </aside>
          </div>
          <div class="footer-col footer-col5 col-xs-12 col-md-2">
            <aside id=nav_menu-2 class="widget widget_nav_menu">
              <h3 class="widget-title">Contacto</h3>
              <div class=menu-company-container>
                <ul id=menu-company class=menu>
                  <li>
                      <i class="fa fa-envelope"></i>
                      contacto@jeloviaronline.com
                  </li>
                   <li>
                      <i class="fa fa-phone"></i>+ (51) 998 878 636
                  </li>
                  <li>
                      <i class="fa fa-map-marker"></i> No #200 Joseob, Lima.
                  </li>
                </ul>
              </div>
            </aside>
          </div>
          
          <div class="footer-col footer-col5 col-xs-12 col-md-2">
            <aside class="widget widget_nav_menu">
              <h3 class="widget-title">Cursos</h3>
              <div class=menu-support-container>
                <ul class=menu>
                    <?php 
                    foreach ($obj_category as $value) { ?>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                            <a href="<?php echo site_url()."cursos/$value->slug";?>" class=tc-menu-inner><?php echo $value->name;?></a>
                        </li>
                    <?php } ?>
                </ul>
              </div>
            </aside>
          </div>
            <div class="footer-col footer-col5 col-xs-12 col-md-2">
            <aside class="widget widget_nav_menu">
              <h3 class="widget-title">Terminos</h3>
              <div class=menu-support-container>
                <ul class=menu>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'terminos-condiciones';?>" class=tc-menu-inner>Términos y condiciones</a>
                  </li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'politica-privacidad';?>" class=tc-menu-inner>Política De Privacidad Y Cookies</a>
                  </li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="#" class=tc-menu-inner>Preguntas Frecuentes</a>
                  </li>
                </ul>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-area no-footer-sticky ">
      <div class=container>
        <div class=copyright-content>
          <div class=row>
            <div class=col-sm-6>
              <div class=copyright-text>Construido por <a href="http://evolucionweb.tech/" target="_blank">Evolución</a><img src="<?php echo site_url().'assets/page_front/images/logo/evolucion_logo.png';?>" alt="evolucion logo" width="80"/></div>
            </div>
            <div class="col-sm-6 text-right">
              <ul id=copyright-menu class=list-inline>
                <li id=menu-item-16 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="https://www.facebook.com" class=tc-menu-inner>Facebook</a></li>
                <li id=menu-item-4232 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4232 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="https://www.youtube.com" class=tc-menu-inner>Youtube</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>