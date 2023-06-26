<?php

/**
 * The main template file
 *
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


<section id="sec1">
  <div class="img1">
    <img class="pc" src="<?php echo get_template_directory_uri()?>/assets/images/fv_bg.jpg" alt="">
    <img class="sp" src="<?php echo get_template_directory_uri()?>/assets/images/fv_bg_sp.jpg" alt="">
  </div>
  <div class="img2">
    <img class="pc" src="<?php echo get_template_directory_uri()?>/assets/images/fv_2.png" alt="">
    <img class="sp" src="<?php echo get_template_directory_uri()?>/assets/images/fv_2_sp.png" alt="">
  </div>
</section>
<section id="sec2">
  <div class="part1 fixedcontainer inviewfadeInUp flex_part">
    <div class="block block1 inviewfadeInUp flex_img_right">
      <?php $sec2  =  get_field('sec2');?>
      <div class="flex_body">
        <div class="piece">
          <h3 class="eigo"><?php echo $sec2['title1']; ?></h3>
          <p><?php echo $sec2['content1']; ?></p>
        </div>
      </div>
      <div class="flex_img">
        <img class="pc" src="<?php echo get_template_directory_uri()?>/assets/images/sec1.png" alt="">
        <img class="sp" src="<?php echo get_template_directory_uri()?>/assets/images/sec1_1_sp.png" alt="">
      </div>
    </div>
    <div class="block block2 inviewfadeInUp flex_img_left">
      <?php $sec2  =  get_field('sec2');?>
      <div class="flex_body">
        <div class="piece">
          <h3 class="eigo"><?php echo $sec2['title2']; ?></h3>
          <p><?php echo $sec2['content2']; ?></p>
        </div>
      </div>
      <div class="flex_img">
        <img class="pc" src="<?php echo get_template_directory_uri()?>/assets/images/sec1_2.png" alt="">
        <img class="sp" src="<?php echo get_template_directory_uri()?>/assets/images/sec1_2_sp.png" alt="">
      </div>
    </div>
  </div>
</section>
<section id="sec3">
  <?php $sec3 = get_field('sec3'); ?>
  <h2 class="eigo inviewfadeInUp"><?php echo $sec3['title'];?></h2>
  <div class="part1 fixedcontainer pc inviewfadeInUp">
    <div class="block block1 inviewfadeInUp">
      <img src="<?php echo get_template_directory_uri()?>/assets/images/sec2_1.jpg" alt="">
      <h4 class="eigo"><?php echo $sec3['activity1']['title_eng']; ?></h4>
      <h3><?php echo $sec3['activity1']['title_ja']; ?></h3>
      <p><?php echo $sec3['activity1']['content']; ?></p>
      <a class="sculpin viewmore" href="<?php echo home_url()?>/activity">
        View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt="">
      </a>
    </div>
    <div class="block block2 inviewfadeInUp">
      <img src="<?php echo get_template_directory_uri()?>/assets/images/sec2_2.jpg" alt="">
      <h4 class="eigo"><?php echo $sec3['activity2']['title_eng']; ?></h4>
      <h3><?php echo $sec3['activity2']['title_ja']; ?></h3>
      <p><?php echo $sec3['activity2']['content']; ?></p>
      <a class="sculpin viewmore" href="<?php echo home_url()?>/activity">
        View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt="">
      </a>
    </div>
    <div class="block block3 inviewfadeInUp">
      <img src="<?php echo get_template_directory_uri()?>/assets/images/sec2_3.jpg" alt="">
      <h4 class="eigo"><?php echo $sec3['activity3']['title_eng']; ?></h4>
      <h3><?php echo $sec3['activity3']['title_ja']; ?></h3>
      <p><?php echo $sec3['activity3']['content']; ?></p>
      <a class="sculpin viewmore" href="<?php echo home_url()?>/activity">
        View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt="">
      </a>
    </div>
  </div>
  <div class="part1 sp inviewfadeInUp">
    <div class="slicker_parts3">
      <div class="block block1 inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/sec2_1.jpg" alt="">
        <h4 class="eigo"><?php echo $sec3['activity1']['title_eng']; ?></h4>
        <h3><?php echo $sec3['activity1']['title_ja']; ?></h3>
        <p><?php echo $sec3['activity1']['content']; ?></p>
        <a class="sculpin viewmore" href="<?php echo home_url()?>/activity">
          View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt="">
        </a>
      </div>
      <div class="block block2 inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/sec2_2.jpg" alt="">
        <h4 class="eigo"><?php echo $sec3['activity2']['title_eng']; ?></h4>
        <h3><?php echo $sec3['activity2']['title_ja']; ?></h3>
        <p><?php echo $sec3['activity2']['content']; ?></p>
        <a class="sculpin viewmore" href="<?php echo home_url()?>/activity">
          View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt="">
        </a>
      </div>
      <div class="block block3 inviewfadeInUp">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/sec2_3.jpg" alt="">
        <h4 class="eigo"><?php echo $sec3['activity3']['title_eng']; ?></h4>
        <h3><?php echo $sec3['activity3']['title_ja']; ?></h3>
        <p><?php echo $sec3['activity3']['content']; ?></p>
        <a class="sculpin viewmore" href="<?php echo home_url()?>/activity">
          View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt="">
        </a>
      </div>
    </div>
  </div>
</section>
<section id="sec4">
  <?php $sec41 = get_field('sec4_1'); ?>
  <div class="part1 part flex_part">
    <h3 class="sp"><?php echo $sec41['title']?></h3>
    <div class="block fixedcontainer flex_img_left">
      <div class="flex_img">
        <div class="slicker_parts1">
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-1.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-2.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-3.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-4.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-5.jpg" alt="">
          </div>
        </div>
        <div class="slicker_parts2">
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-1.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-2.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-3.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-4.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-5.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="flex_body">
        <h3 class="pc"><?php echo $sec41['title']?></h3>
        <p><?php echo $sec41['content']?></p>
        <a class="sculpin viewmore" href="<?php echo home_url()?>/room">View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt=""></a>
      </div>
    </div>
  </div>
  <?php $sec42 = get_field('sec4_2'); ?>
  <div class="part1 part flex_part">
    <h3 class="sp"><?php echo $sec42['title']?></h3>
    <div class="block fixedcontainer flex_img_right">
      <div class="flex_img">
        <div class="slicker_parts1">
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-12.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-13.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-14.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-15.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-16.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-17.jpg" alt="">
          </div>
        </div>
        <div class="slicker_parts2">
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-12.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-13.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-14.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-15.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-16.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-17.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="flex_body">
        <h3 class="pc"><?php echo $sec42['title']?></h3>
        <p><?php echo $sec42['content']?></p>
        <a class="sculpin viewmore" href="<?php echo home_url()?>/food">View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt=""></a>
      </div>
    </div>
  </div>
  <?php $sec43 = get_field('sec4_3'); ?>
  <div class="part1 part flex_part">
    <h3 class="sp" id="access"><?php echo $sec43['title']?></h3>
    <div class="block fixedcontainer flex_img_left">
      <div class="flex_img">
        <div class="slicker_parts1">
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-6.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-7.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-8.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-9.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-10.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-11.jpg" alt="">
          </div>
        </div>
        <div class="slicker_parts2">
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-6.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-7.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-8.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-9.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-10.jpg" alt="">
          </div>
          <div class="slicker_part">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/img-11.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="flex_body">
        <h3 class="pc"><?php echo $sec43['title']?></h3>
        <p><?php echo $sec43['content']?></p>
        <!--<a target="_blank" class="sculpin viewmore" href="<?php echo home_url()?>/sauna">View more <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt=""></a>--->
      </div>
    </div>
  </div>
</section>
<section id="sec5">
  <?php $sec5 = get_field('sec5');?>
  <div class="part1 fixedcontainer flex_part inviewfadeInUp">
    <div class="block flex_img_left ">
      <div class="flex_img">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/sec4.jpg" alt="">
      </div>
      <div class="flex_body">
        <div class="piece">
          <h3><?php echo $sec5['title']?></h3>
          <p><?php echo $sec5['content']?></p>
          <a class="sculpin viewmore" href="https://goo.gl/maps/tjRvRhmZyUH9VucM7">Google Map <img class="img1" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore.svg" alt=""><img class="img2" src="<?php echo get_template_directory_uri()?>/assets/images/viewmore_white.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer('stag', array('page' => 'top'));

