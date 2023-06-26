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

<section id="subpage_fv">
  <div class="part1">
    <img class="pc" src="<?php echo get_template_directory_uri() ?>/assets/images/room_fv.jpg" alt="Gallery">
    <img class="sp" src="<?php echo get_template_directory_uri() ?>/assets/images/room_fv_sp.jpg" alt="Gallery">
    <h2>
      Room
    </h2>
  </div>
</section>
<section id="gallery_sec1">
  <div class="part1 fixedcontainer">
    <h2>
      小さなこだわりに宿る美と、<br>五感が感じる喜び
    </h2>
    <p>
      大切なのは、嫌なものが一つもないということ。<br>
		『nude』をテーマにデザインされたインテリアは、<br>心が裸になるかのように、スキンカラーを中心にしたあわいを感じる空間に。
    </p>
  </div>
</section>
<div id="activity_sec2">
  <div class="part1 fixedcontainer flex_part">
    <?php $parts = get_field('parts'); 
      foreach($parts as $part):
    ?>
    <div class="block fixedcontainer flex_img_left">

      <h4 class="sp"><?php echo $part['title'] ?></h4>
      <h3 class="sp"><?php echo $part['eng'] ?></h3>
      <div class="flex_img">
        <div class="slicker_parts1">
          <?php foreach($part['gallery'] as $image):?>
          <div class="slicker_part">
            <img src="<?php echo $image?>" alt="">
          </div>
          <?php endforeach ?>
        </div>
        <div class="slicker_parts2">
          <?php foreach($part['gallery'] as $image):?>
          <div class="slicker_part">
            <img src="<?php echo $image?>" alt="">
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="flex_body">
        <h3 class="pc"><?php echo $part['eigo'] ?></h3>
        <h4 class="pc"><?php echo $part['title'] ?></h4>
        <p><?php echo $part['content'] ?></p>
        <div class="close_piece">
          <dl>
            <dt>
              <img src="<?php echo get_template_directory_uri()?>/assets/images/room_icon1.svg" alt="">
            </dt>
            <dd>
              <h5>定員</h5>
              <p><?php echo $part['定員'];?></p>
            </dd>
          </dl>
          <dl>
            <dt>
              <img src="<?php echo get_template_directory_uri()?>/assets/images/room_icon2.svg" alt="">
            </dt>
            <dd>
              <h5>ベット</h5>
              <p><?php echo $part['ベット'];?></p>
            </dd>
          </dl>
          <dl>
            <dt>
              <img src="<?php echo get_template_directory_uri()?>/assets/images/room_icon3.svg" alt="">
            </dt>
            <dd>
              <h5>Wi-Fi</h5>
              <p><?php echo $part['wifi'];?></p>
            </dd>
          </dl>
          <dl>
            <dt>
              <img src="<?php echo get_template_directory_uri()?>/assets/images/room_icon4.svg" alt="">
            </dt>
            <dd>
              <h5>水回り</h5>
              <p><?php echo $part['水回り'];?></p>
            </dd>
          </dl>
          <dl>
            <dt>
              <img src="<?php echo get_template_directory_uri()?>/assets/images/room_icon5.svg" alt="">
            </dt>
            <dd>
              <h5>設備・アメニティ</h5>
              <p><?php echo $part['設備・アメニティ'];?></p>
            </dd>
          </dl>
        </div>
        <a class="toggle_btn">お部屋の詳細 <span><img src="<?php echo get_template_directory_uri(  )?>/assets/images/toggle_icon.svg" alt=""></span></a>
        <a href="<?php echo $part['book_url']?>" target="_blank" class="viewmore sculpin">BOOK NOW</a>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<div id="gallery_sec3">
  <div class="part1 fixedcontainer">
  </div>
</div>
<?php
get_footer('stag', array('page' => 'top'));
