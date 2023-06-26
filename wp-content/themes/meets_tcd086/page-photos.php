<?php

/**
 * The main template file
 * Template Name: Photo Page
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header('stag', array('page' => 'top'));
?>

<section id="subpage_fv">
  <div class="part1">
    <img class="pc" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery_fv.jpg" alt="Gallery">
    <img class="sp" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery_fv_sp.jpg" alt="Gallery">
    <h2>
      Gallery
    </h2>
  </div>
</section>
<section id="gallery_sec1">
  <div class="part1 fixedcontainer">
    <h2>
      どこか懐かしくて、<br>わたしたちのDNAが落ち着く場所
    </h2>
    <p>
      誰もが知る有名な絶景ではないかもしれない。<br>
		でも、何故か心が懐かしさを感じたり、愛おしさを感じる風景が、赤穂にはある。<br>
		街の片隅に、海辺のその先に、自分の手元に。<br>
		派手さだけが全てではない。<br>
		心が喜ぶ風景を切り取ったギャラリー
    </p>
  </div>
</section>
<div id="gallery_sec2">
  <div class="part1 fixedcontainer">
    <div class="block block1 layout_change_btn">
      <ul>
        <li>
          <a data-target="#gallery_layout_grid" class="active layout_btn">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery1.svg" alt="">
          </a>
        </li>
        <li>
          <a data-target="#gallery_layout_linear" class="layout_btn">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery2.svg" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="part2 pc active inviewfadeInUp layout_part" id="gallery_layout_grid">
    <div class="block block1">
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery1.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery1.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery4.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery4.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery7.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery7.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block2 layout_part">
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery2.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery2.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery5.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery5.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery8.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery8.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery10.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery10.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block3">
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery3.png" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery3.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery6.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery6.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery9.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery9.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="part2 sp active inviewfadeInUp layout_part" id="gallery_layout_grid">
    <div class="block block1">
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery1_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery1_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery3_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery3_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery5_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery5_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery7_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery7_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery9_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery9_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block2 layout_part">
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery2_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery2_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery4_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery4_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery6_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery6_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery8_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery8_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="piece inviewfadeInUp">
        <img class="lightbox_trigger" src="<?php echo get_template_directory_uri() ?>/assets/images/gallery10_sp.jpg" alt="">
        <div class="lightbox">
          <div class="bg"></div>
          <div class="boxcontent fixedcontainer">
            <a class="close_btn">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.png" alt="">
            </a>
            <div class="flex_img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery10_sp.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="part3 layout_part" id="gallery_layout_linear">
    <div class="slicker_parts inviewfadeInUp pc">
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery1.jpg" alt="" style="width: 40vw;">
      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery2.jpg" alt="" style="width: 50vw;">

      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery3.jpg" alt="">
      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery4.jpg" alt="" style="width: 40vw;">
      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery5.jpg" alt="" style="width: 40vw;">
      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery6.jpg" alt="" style="width: 60vw;">

      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery7.jpg" alt="">

      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery8.jpg" alt="" style="width: 40vw;">

      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery9.jpg" alt="">

      </div>
      <div class="slicker_part">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery10.jpg" alt="" style="width: 60vw;">

      </div>
    </div>
    <div class="sp block">
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery1_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery3_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery5_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery7_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery10_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery2_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery4_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery6_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery8_sp.jpg" alt="">
      </div>
      <div class="piece inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/gallery9_sp.jpg" alt="">
      </div>
    </div>
    <p class="paging">
      <span id="current_paging">1</span>/<span>10</span>
    </p>
  </div>
</div>
<div id="gallery_sec3">
  <div class="part1 fixedcontainer">
  </div>
</div>
<?php
get_footer('stag', array('page' => 'top'));
