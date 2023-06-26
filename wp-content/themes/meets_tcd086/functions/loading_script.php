<?php
     function has_loading_screen(){
       $options = get_design_plus_option();
?>
<script>

<?php if(wp_is_mobile()) { ?>
jQuery(window).bind("pageshow", function(event) {
  if (event.originalEvent.persisted) {
    window.location.reload()
  }
});
<?php }; ?>

jQuery(function($){

  <?php if(is_front_page()) { ?>
  $('html').addClass('display_load_screen');
  <?php }; ?>

  var winH = $(window).innerHeight();
  $('#site_loader_overlay').css('height', winH);

  <?php if ($options['load_icon'] == 'type4' || $options['load_icon'] == 'type5') { ?>
  $('#site_loader_logo').addClass('active');
  <?php }; ?>

  setTimeout(function(){
    if( $('#site_loader_overlay').is(':visible') ) {

      <?php if($options['load_screen_animation_type'] == 'type1'){ ?>
      $('#site_loader_overlay').delay(600).fadeOut(900);
      <?php } elseif($options['load_screen_animation_type'] == 'type2'){ ?>
      $('#site_loader_overlay').addClass('active slide_up');
      <?php } elseif($options['load_screen_animation_type'] == 'type3'){ ?>
      $('#site_loader_overlay').addClass('active slide_down');
      <?php } elseif($options['load_screen_animation_type'] == 'type4'){ ?>
      $('#site_loader_overlay').addClass('active slide_left');
      <?php } else { ?>
      $('#site_loader_overlay').addClass('active slide_right');
      <?php }; ?>

      <?php
           // front page -----------------------------------
           if(is_front_page()) {
             $display_header_content = '';
             if(!is_mobile() && $options['show_index_slider']) {
               $display_header_content = 'show';
             } elseif(is_mobile() && ($options['mobile_show_index_slider'] != 'type3') ) {
               $display_header_content = 'show';
             }
             if($display_header_content == 'show') {
               get_template_part('functions/slider_ini');
             };
           };
      ?>

      setTimeout(function(){
        $("#page_header span").each(function(i){
          $(this).delay(i * 100).queue(function(next) {
            $(this).addClass('animate');
            next();
          });
        });
      }, 500);

    }
  }, <?php if($options['load_time']) { echo esc_html($options['load_time']); } else { echo '7000'; }; ?>);

});
</script>
<?php } ?>
<?php
     // no loading ------------------------------------------------------------------------------------------------------------------
     function no_loading_screen(){
       $options = get_design_plus_option();
?>
<script>

<?php if(wp_is_mobile()) { ?>
jQuery(window).bind("pageshow", function(event) {
  if (event.originalEvent.persisted) {
    window.location.reload()
  }
});
<?php }; ?>

jQuery(document).ready(function($){

  setTimeout(function(){
    $("#page_header span").each(function(i){
      $(this).delay(i * 100).queue(function(next) {
        $(this).addClass('animate');
        next();
      });
    });
  }, 500);

});

</script>
<?php } ?>