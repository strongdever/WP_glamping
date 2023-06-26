<footer>
  <div class="part1">
    <a href="">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="">
    </a>
  </div>
  <div class="part2">
    <ul>
      <li>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_email_icon.svg" alt="">
        <a href="mailto:booking@glamping-ako.com">booking@glamping-ako.com</a>
        
      </li>
      <li>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_pin.svg" alt="">
        <a href="https://goo.gl/maps/tjRvRhmZyUH9VucM7" target="_blank">
          〒678-0215<br>
          兵庫県赤穂市御崎143-1
        </a>
      </li>
      <li>
	<img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_insta_icon.svg" alt="">
 <a href="https://www.instagram.com/dotglamping__ako/" target="_blank">

			dotglamping__ako
		  </a>
      </li>
	  <li>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_phone_icon.svg" alt="">
        <a href="tel:0791559991">
          0791-55-9991
        </a>
      </li>
	  <li>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_fax_icon.svg" alt="">
        <a >
          0791-55-9992
        </a>
      </li>
    </ul>
  </div>
  <div class="part3">
    <ul class="menu_part">
      <li class="sculpin">
        <a href="<?php echo home_url() ?>" class="<?php is_front_page() == 1 ? 'active' : '' ?>">
          Top
        </a>
      </li>
      <li class="sculpin">
        <a href="<?php echo home_url() ?>/activity" class="eigo <?php $post_slug == 'activity' ? 'active' : '' ?>">
          Activity
        </a>
      </li>
      <li class="sculpin">
        <a href="<?php echo home_url() ?>/galleryview" class="eigo <?php $post_slug == 'gallery' ? 'active' : '' ?>">
          Gallery
        </a>
      </li>
      <li class="sculpin">
        <a href="<?php echo home_url() ?>/room" class="eigo <?php $post_slug == 'room' ? 'active' : '' ?>">
          Room
        </a>
      </li>

      <li class="sculpin">
        <a href="<?php echo home_url() ?>/food" class="eigo <?php $post_slug == 'food' ? 'active' : '' ?>">
          Food
        </a>
      </li>
      <!--<li class="sculpin">
        <a href="<?php echo home_url() ?>/sauna" class="eigo <?php $post_slug == 'sauna' ? 'active' : '' ?>">
          Sauna
        </a>
      </li>-->
      <li class="sculpin">
        <a href="<?php echo home_url() ?>/faq" class="eigo <?php $post_slug == 'faq' ? 'active' : '' ?>">
          FAQ
        </a>
      </li>
      <li class="sculpin">
        <a href="<?php echo home_url() ?>/top2/#sec5" class="eigo <?php $post_slug == 'access' ? 'active' : '' ?>">
          Access
        </a>
      </li>
    </ul>
  </div>
  <div class="part4 fixedcontainer flex_part">
    <ul>
      <li>
        <a href="https://dot-glamping.studio.site/fujisan" target="_blank" class="flex_img_left">
          <div class="flex_img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer1.jpg" alt="">
          </div>
          <div class="flex_body">
            <h3>
              Dot Glamping 富士山
            </h3>
            <p>
              "Time is Wonder" <br>
              富士絶景×ヤバいコンテンツで、<br>
              ココロとカラダが解き放たれる体験型の施設
            </p>
          </div>
        </a>
      </li>
      <li>
        <a href="https://dotglamping-ashizurimisaki.com/" target="_blank" class="flex_img_left">
          <div class="flex_img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer2.jpg" alt="">
          </div>
          <div class="flex_body">
            <h3>
              Dot Glamping アシズリテルメ
            </h3>
            <p>
              “The Edge”<br>
			   四国最南端の絶景×ヤバいコンテンツの掛け合わせで「感性が刺激される」体験型の施設
            </p>
          </div>
        </a>
      </li>
      <li>
        <a href="https://dot.glamping-ako.com" class="flex_img_left">
          <div class="flex_img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer3.jpg" alt="">
          </div>
          <div class="flex_body">
            <h3>
              Dot Glamping 赤穂
            </h3>
            <p>”Nude”<br>
              心と身体を解放しながら、そのものの良さを、そのままに味わう。ありのままの過ごす時間を堪能する。
            </p>
          </div>
        </a>
      </li>
    </ul>
  </div>
  <div class="part5 fixedcontainer">
    ©Dot Glamping 赤穂
  </div>
</footer>
</div>
<div id="lightbox_wrapper" class="flex_part"></div>

<!-- jQuery -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.12.0/paper-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.viewbox.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery-ui.js"></script>

<script src="<?php echo get_template_directory_uri() ?>/assets/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/common.js?ver=0.0.4"></script>

<?php wp_footer(); ?>

</body>

</html>