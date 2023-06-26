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
    <img class="pc" src="<?php echo get_template_directory_uri() ?>/assets/images/faq_fv.jpg" alt="Gallery">
    <img class="sp" src="<?php echo get_template_directory_uri() ?>/assets/images/faq_fv_sp.jpg" alt="Gallery">
    <h2>
      FAQ
    </h2>
  </div>
</section>
<?php $cat = $_GET['cat'] ?? '';?>
<section id="faq_sec1">
  <div class="part1 fixedcontainer">
    <div class="sidebar">
      <ul>
        <li>
          <a href="<?php echo home_url( )?>/faq">
            All
          </a>
        </li>
        <?php $categories = get_categories();
        $perPage = 40;
        $paged   = max(1, (int) filter_input(INPUT_GET, 'p-paged'));
          foreach ($categories as $category) {
            echo '<li><a href="'.home_url( ).'/faq?cat='.$category->term_id.'">'.$category->name.'</a></li>';
          }
        
        ?>
      </ul>
    </div>
    <div class="part_body">
      <?php
      $args = array(
        'post_status' => 'publish',
        'posts_per_page' => $perPage,
        'paged' => $paged,
        'orderby' => 'date',
        'cat' => $cat
      );
      $query = new WP_Query($args);
      while ($query->have_posts()) :
        $query->the_post();
        ?>
        
      <dl>
        <dt class="q">
          <?php the_title( )?>
          <div class="icon">
            <span></span>
            <span></span>
          </div>
        </dt>
        <dd class="a"><?php echo the_content( )?></dd>
      </dl>
        <?php 
      endwhile;
      wp_reset_query(  );
      wp_reset_postdata(  );
      ?>
    </div>
  </div>
</section>
<?php
get_footer('stag', array('page' => 'top'));
