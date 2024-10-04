<header class="l-hd" id="header">
   <div class="l-hd__inr">
      <div class="p-hd__logo">
         <div class="p-hd__logo-inr">
            <a href="<?php echo esc_url(home_url("/")); ?>">
               <picture class="p-hd__logo-img">
                  <source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/common/logo_b_pc.svg">
                  <source media="(max-width:767px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/common/logo_b_sp.svg">
                  <img src="<?php echo get_template_directory_uri() ?>asset/media/images/common/logo_b_pc.svg" width="120" height="38" alt="佐渡建築設計スタジオ" class="p-logo__img">
               </picture>
            </a>
         </div>
      </div><!-- p-hd__logo -->
      <nav class="p-hd__nav" id="header-nav">
         <ul class="p-hd__main" id="header-nav-main">
            <li class="p-hd__item menu-item"><a class="p-hd__link u-hover-line" href="<?php echo esc_url(home_url("/about")); ?>"><span class="u-hover-line-child">ABOUT US</span></a></li>
            <li class="p-hd__item menu-item"><a class="p-hd__link u-hover-line" href="<?php echo esc_url(home_url("/works")); ?>"><span class="u-hover-line-child">WORKS</span></a></li>
            <li class="p-hd__item menu-item"><a class="p-hd__link u-hover-line" href="<?php echo esc_url(home_url("/member")); ?>"><span class="u-hover-line-child">MEMBER</span></a></li>
            <li class="p-hd__item menu-item"><a class="p-hd__link u-hover-line" href="<?php echo esc_url(home_url("/news")); ?>"><span class="u-hover-line-child">NEWS</span></a></li>
            <li class="p-hd__item menu-item"><a class="p-hd__link u-hover-line" href="<?php echo esc_url(home_url("/contact")); ?>"><span class="u-hover-line-child">CONTACT</span></a></li>
         </ul>
      </nav><!-- p-hd__nav -->
   </div>
</header>