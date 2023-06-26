<?php
     $options = get_design_plus_option();
     if($options['show_load_screen'] != 'type1'){ 
       $hex_color1 = implode(',', hex2rgb($options['load_color1']));
       $hex_color2 = implode(',', hex2rgb($options['load_color2']));
?>
#site_wrap { display:none; }
#site_loader_overlay {
  background:<?php echo esc_attr($options['load_bgcolor']); ?>;
  opacity: 1;
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  width: 100%;
  height: 100vh;
  z-index: 99999;
}
#site_loader_overlay.slide_up {
  top:-100vh; opacity:0;
  -webkit-transition: transition: top 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
  transition: top 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
}
#site_loader_overlay.slide_down {
  top:100vh; opacity:0;
  -webkit-transition: transition: top 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
  transition: top 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
}
#site_loader_overlay.slide_left {
  left:-100%; opactiy:0;
  -webkit-transition: transition: left 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
  transition: left 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
}
#site_loader_overlay.slide_right {
  left:100%; opactiy:0;
  -webkit-transition: transition: left 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
  transition: left 1.0s cubic-bezier(0.83, 0, 0.17, 1) 0.4s, opacity 0s cubic-bezier(0.83, 0, 0.17, 1) 1.5s;
}
<?php if($options['load_icon'] == 'type4' || $options['load_icon'] == 'type5'){ ?>
#site_loader_logo { position:relative; width:100%; height:100%; }
#site_loader_logo_inner {
  position:absolute; text-align:center; width:100%;
  top:50%; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%);
}
#site_loader_overlay.active #site_loader_logo_inner {
  opacity:0;
  -webkit-transition: all 1.0s cubic-bezier(0.22, 1, 0.36, 1) 0s; transition: all 1.0s cubic-bezier(0.22, 1, 0.36, 1) 0s;
}
#site_loader_logo img.mobile { display:none; }
#site_loader_logo .catch { line-height:1.6; padding:0 50px; width:100%; -webkit-box-sizing:border-box; box-sizing:border-box; }
#site_loader_logo_inner .message { text-align:left; margin:30px auto 0; display:table; }
#site_loader_logo.no_logo .message { margin-top:0 !important; }
#site_loader_logo_inner .message.type2 { text-align:center; }
#site_loader_logo_inner .message.type3 { text-align:right; }
#site_loader_logo_inner .message_inner { display:inline; line-height:1.5; margin:0; }
@media screen and (max-width:750px) {
  #site_loader_logo.has_mobile_logo img.pc { display:none; }
  #site_loader_logo.has_mobile_logo img.mobile { display:inline; }
  #site_loader_logo .message { margin:23px auto 0; }
  #site_loader_logo .catch { padding:0 20px; }
}

/* ----- animation ----- */
#site_loader_logo .logo_image { opacity:0; }
#site_loader_logo .catch { opacity:0; }
#site_loader_logo .message { opacity:0; }
#site_loader_logo.active .logo_image {
  -webkit-animation: opacityAnimation 1.4s ease forwards 0.5s;
  animation: opacityAnimation 1.4s ease forwards 0.5s;
}
#site_loader_logo img.use_logo_animation {
	position:relative;
  -webkit-animation: slideUpDown 1.5s ease-in-out infinite 0s;
  animation: slideUpDown 1.5s ease-in-out infinite 0s;
}
#site_loader_logo.active .catch {
  -webkit-animation: opacityAnimation 1.4s ease forwards 0.5s;
  animation: opacityAnimation 1.4s ease forwards 0.5s;
}
#site_loader_logo.active .message {
  -webkit-animation: opacityAnimation 1.4s ease forwards 1.5s;
  animation: opacityAnimation 1.4s ease forwards 1.5s;
}
#site_loader_logo_inner .text { display:inline; }
#site_loader_logo_inner .dot_animation_wrap { display:inline; margin:0 0 0 4px; position:absolute; }
#site_loader_logo_inner .dot_animation { display:inline; }
#site_loader_logo_inner i {
  width:2px; height:2px; margin:0 4px 0 0; border-radius:100%;
  display:inline-block; background:#000;
  -webkit-animation: loading-dots-middle-dots 0.5s linear infinite; -ms-animation: loading-dots-middle-dots 0.5s linear infinite; animation: loading-dots-middle-dots 0.5s linear infinite;
}
#site_loader_logo_inner i:first-child {
  opacity: 0;
  -webkit-animation: loading-dots-first-dot 0.5s infinite; -ms-animation: loading-dots-first-dot 0.5s linear infinite; animation: loading-dots-first-dot 0.5s linear infinite;
  -webkit-transform: translate(-4px); -ms-transform: translate(-4px); transform: translate(-4px);
}
#site_loader_logo_inner i:last-child {
  -webkit-animation: loading-dots-last-dot 0.5s linear infinite; -ms-animation: loading-dots-last-dot 0.5s linear infinite; animation: loading-dots-last-dot 0.5s linear infinite;
}
@-webkit-keyframes loading-dots-fadein{
  100% { opacity:1; }
}
@keyframes loading-dots-fadein{
  100% { opacity:1; }
}
@-webkit-keyframes loading-dots-first-dot {
  100% { -webkit-transform:translate(6px); -ms-transform:translate(6px); transform:translate(6px); opacity:1; }
}
@keyframes loading-dots-first-dot {
  100% {-webkit-transform:translate(6px);-ms-transform:translate(6px); transform:translate(6px); opacity:1; }
}
@-webkit-keyframes loading-dots-middle-dots { 
  100% { -webkit-transform:translate(6px); -ms-transform:translate(6px); transform:translate(6px) }
}
@keyframes loading-dots-middle-dots {
  100% { -webkit-transform:translate(6px); -ms-transform:translate(6px); transform:translate(6px) }
}
@-webkit-keyframes loading-dots-last-dot {
  100% { -webkit-transform:translate(6px); -ms-transform:translate(6px); transform:translate(6px); opacity:0; }
}
@keyframes loading-dots-last-dot {
  100% { -webkit-transform:translate(6px); -ms-transform:translate(6px); transform:translate(6px); opacity:0; }
}
<?php }; ?>
<?php if($options['load_icon'] == 'type2'){ ?>
#site_loader_animation {
  width: 44px;
  height: 44px;
  position: absolute;
  top: 0;
  left: 0;
	right: 0;
	bottom: 0;
	margin: auto;
}
#site_loader_animation:before {
  position: absolute;
  bottom: 0;
  left: 0;
  display: block;
  width: 12px;
  height: 12px;
  content: '';
  box-shadow: 20px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px -20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 0);
  animation: loading-square-loader 5.4s linear forwards infinite;
}
#site_loader_animation:after {
  position: absolute;
  bottom: 10px;
  left: 0;
  display: block;
  width: 12px;
  height: 12px;
  background-color: rgba(<?php echo $hex_color2; ?>, 1);
  opacity: 0;
  content: '';
  animation: loading-square-base 5.4s linear forwards infinite;
}
@-webkit-keyframes loading-square-base {
  0% { bottom: 10px; opacity: 0; }
  5%, 50% { bottom: 0; opacity: 1; }
  55%, 100% { bottom: -10px; opacity: 0; }
}
@keyframes loading-square-base {
  0% { bottom: 10px; opacity: 0; }
  5%, 50% { bottom: 0; opacity: 1; }
  55%, 100% { bottom: -10px; opacity: 0; }
}
@-webkit-keyframes loading-square-loader {
  0% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  5% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  10% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  15% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  20% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  25% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -30px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  30% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  35% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  40% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -30px rgba(<?php echo $hex_color2; ?>, 0); }
}
@keyframes loading-square-loader {
  0% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  5% { box-shadow: 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  10% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  15% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  20% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  25% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -30px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  30% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  35% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(242, 205, 123, 0); }
  40% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color1; ?>, 1), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -20px rgba(<?php echo $hex_color1; ?>, 1), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -40px rgba(<?php echo $hex_color1; ?>, 1), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -40px rgba(<?php echo $hex_color1; ?>, 1), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -40px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 20px 10px rgba(<?php echo $hex_color1; ?>, 0), 40px 10px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 40px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -30px rgba(<?php echo $hex_color1; ?>, 0), 20px -30px rgba(<?php echo $hex_color1; ?>, 0), 40px -30px rgba(<?php echo $hex_color2; ?>, 0); }
}
@media only screen and (max-width: 767px) {
	@-webkit-keyframes loading-square-loader { 
	0% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  5% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  10% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  15% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  20% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  25% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -15px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  30% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  35% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  40% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -15px rgba(<?php echo $hex_color2; ?>, 0); }
}
@keyframes loading-square-loader {
  0% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  5% { box-shadow: 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  10% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  15% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  20% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  25% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -15px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  30% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -50px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  35% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -50px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(242, 205, 123, 0); }
  40% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -50px rgba(242, 205, 123, 0); }
  45%, 55% { box-shadow: 10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  60% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  65% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -10px rgba(<?php echo $hex_color1; ?>, 1), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  70% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -10px rgba(<?php echo $hex_color1; ?>, 1), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  75% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -10px rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  80% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  85% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  90% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -20px rgba(<?php echo $hex_color2; ?>, 1); }
  95%, 100% { box-shadow: 10px 5px rgba(<?php echo $hex_color1; ?>, 0), 20px 5px rgba(<?php echo $hex_color1; ?>, 0), 0 -5px rgba(<?php echo $hex_color1; ?>, 0), 10px -5px rgba(<?php echo $hex_color1; ?>, 0), 20px -5px rgba(<?php echo $hex_color1; ?>, 0), 0 -15px rgba(<?php echo $hex_color1; ?>, 0), 10px -15px rgba(<?php echo $hex_color1; ?>, 0), 20px -15px rgba(<?php echo $hex_color2; ?>, 0); }
}
	#site_loader_animation:before { width: 8px; height: 8px; box-shadow: 10px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 20px 0 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -10px 0 rgba(<?php echo $hex_color1; ?>, 1), 10px -10px 0 rgba(<?php echo $hex_color1; ?>, 1), 20px -10px 0 rgba(<?php echo $hex_color1; ?>, 1), 0 -20px rgba(<?php echo $hex_color1; ?>, 1), 10px -20px rgba(<?php echo $hex_color1; ?>, 1), 20px -20px rgba(<?php echo $hex_color2; ?>, 0); }
  #site_loader_animation::after { width: 8px; height: 8px; }   
}
<?php } elseif($options['load_icon'] == 'type3'){ ?>
#site_loader_animation {
  width: 100%;
  min-width: 160px;
  font-size: 16px;
  text-align: center;
  position: absolute;
  top: 50%;
  left: 0;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  -webkit-animation: loading-dots-fadein .5s linear forwards;
  -moz-animation: loading-dots-fadein .5s linear forwards;
  -o-animation: loading-dots-fadein .5s linear forwards;
  -ms-animation: loading-dots-fadein .5s linear forwards;
  animation: loading-dots-fadein .5s linear forwards;
}
#site_loader_animation i {
  width: .5em;
  height: .5em;
  display: inline-block;
  vertical-align: middle;
  background: #e0e0e0;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  margin: 0 .25em;
  background: <?php echo $options['load_color1']; ?>;
  -webkit-animation: loading-dots-middle-dots .5s linear infinite;
  -moz-animation: loading-dots-middle-dots .5s linear infinite;
  -ms-animation: loading-dots-middle-dots .5s linear infinite;
  -o-animation: loading-dots-middle-dots .5s linear infinite;
  animation: loading-dots-middle-dots .5s linear infinite;
}
#site_loader_animation i:first-child {
  -webkit-animation: loading-dots-first-dot .5s infinite;
  -moz-animation: loading-dots-first-dot .5s linear infinite;
  -ms-animation: loading-dots-first-dot .5s linear infinite;
  -o-animation: loading-dots-first-dot .5s linear infinite;
  animation: loading-dots-first-dot .5s linear infinite;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transform: translate(-1em);
  -moz-transform: translate(-1em);
  -ms-transform: translate(-1em);
  -o-transform: translate(-1em);
  transform: translate(-1em);
}
#site_loader_animation i:last-child {
  -webkit-animation: loading-dots-last-dot .5s linear infinite;
  -moz-animation: loading-dots-last-dot .5s linear infinite;
  -ms-animation: loading-dots-last-dot .5s linear infinite;
  -o-animation: loading-dots-last-dot .5s linear infinite;
  animation: loading-dots-last-dot .5s linear infinite;
}
@-webkit-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-moz-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-o-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-webkit-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-moz-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-o-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-webkit-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-moz-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-o-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-webkit-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@-moz-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@-o-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@media only screen and (max-width: 767px) {
  #site_loader_animation i  { width: 0.25em; height: 0.25em; margin: 0 0.125em; }
}
<?php } else { ?>
#site_loader_animation {
  width: 48px;
  height: 48px;
  font-size: 10px;
  text-indent: -9999em;
  position: absolute;
  top: 0;
  left: 0;
	right: 0;
	bottom: 0;
	margin: auto;
  border: 3px solid rgba(<?php echo $hex_color1; ?>,0.2);
  border-top-color: <?php echo $options['load_color1']; ?>;
  border-radius: 50%;
  -webkit-animation: loading-circle 1.1s infinite linear;
  animation: loading-circle 1.1s infinite linear;
}
@-webkit-keyframes loading-circle {
  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
}
@media only screen and (max-width: 767px) {
	#site_loader_animation { width: 30px; height: 30px; }
}
@keyframes loading-circle {
  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
}
<?php } ?>
<?php } ?>
#site_loader_overlay.active #site_loader_animation {
  opacity:0;
  -webkit-transition: all 1.0s cubic-bezier(0.22, 1, 0.36, 1) 0s; transition: all 1.0s cubic-bezier(0.22, 1, 0.36, 1) 0s;
}
