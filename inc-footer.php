<footer class="l-ft" id="footer">
    <div class="c-ft__inr c-width c-width--1200">
        <div class="c-ft__logo">
            <a href="<?php echo esc_url(home_url("/")); ?>">
                <picture class="c-ft__logo-img">
                    <source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/common/logo_w.svg">
                    <source media="(max-width:767px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/common/logo_w.svg">
                    <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/common/logo_b.svg" width="210" height="60" alt="佐渡建築設計スタジオ" >
                </picture>
            </a>
        </div>
        <div class="c-ft__contact">
            <p class="c-ft__contact__ttl">お気軽にお問い合わせください</p>
            <div class="c-linkbtn-wrap">
                <a href="<?php echo esc_url(home_url("/contact")); ?>" class="c-linkbtn c-linkbtn--contact l-ft__btn">CONTACT</a>
            </div>
        </div>
        <div class="c-ft__info">
            <div class="c-ft__links">
                <ul class="c-ft__links-list">
                    <li class="c-ft__links-item">
                        <a href="<?php echo esc_url(home_url("/about")); ?>" class="c-ft__link">ABOUT US</a>
                    </li>
                    <li class="c-ft__links-item">
                        <a href="<?php echo esc_url(home_url("/works")); ?>" class="c-ft__link">WORKS</a>
                    </li>
                    <li class="c-ft__links-item">
                        <a href="<?php echo esc_url(home_url("/member")); ?>" class="c-ft__link">MEMBER</a>
                    </li>
                    <li class="c-ft__links-item">
                        <a href="<?php echo esc_url(home_url("/news")); ?>" class="c-ft__link">NEWS</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>