<?php 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php the_title();?></title>

  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<!-- baguette box -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.css">
<!-- baguettebox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.js"></script>
  
  <!-- google font cdn -->
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,600,700,900|Montserrat:400,400i,600,900" rel="stylesheet"> 
<!-- <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/public/css/style.css" >  -->

<!-- cdn animate.js -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">

  <?php wp_head();?>

<style type="text/css">
</style>

</head>
<body>

<header class="headerPages"  style="background-image: url('<?php echo $thumb['0'];?>')">

  <nav class="navbar navbar-expand-xl navbar-light bg-faded midnightHeader">
   <?php the_custom_logo();?>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
     <div class="">X
      <!-- <div id="menuArea">
  <input type="checkbox" id="menuToggle"></input>
<label for="menuToggle" class="menuOpen">
  <div class="open"></div>
</label>
<div class="menu menuEffects">
  <label for="menuToggle"></label>
  <div class="menuContent">
    <ul>
      <?php 
      //wp_list_pages('exclude=221,223,225&depth=1&title_li=');
      ?>
      <li>   <a class="boutonMenuMobile boutonGal center" href="https://portal.freetobook.com/reservations?w_id=7613&w_tkn=HQMmHgdOgU0THt5JeHgryQC2qxK89YUupKbd6Ni7QuKAbUxnLvXXzIK2M94CY">BOOK NOW</a></li> 
    </ul>
     
  </div>
</div>
</div> -->
     </div>
   </button>
   <?php
    wp_nav_menu([
      'menu'            => 'Top menu',
      'theme_location'  => 'top',
      'container'       => 'div',
      'container_id'    => 'bs4navbar',
      'container_class' => 'collapse navbar-collapse',
      'menu_id'         => true,
      'menu_class'      => 'navbar-nav ml-auto',
      'depth'           => 2,
      'fallback_cb'     => 'bs4navwalker::fallback',
      'walker'          => new bs4navwalker()
    ]);
    ?>
  </nav>

  <!-- <div class="titleBandOut">
   <div class="titleBandIn">
     OLD INVERLOCHY CASTLE
   </div> 
  </div> -->

</header>
