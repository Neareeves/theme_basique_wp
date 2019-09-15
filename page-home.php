<?php get_header('home');
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>

	<section id="section1" class="whiteBack" data-midnight="blackmd">
	<?php
	while ( have_posts() ) :
		the_post(); 
			// get_template_part( 'template-parts/content', get_post_type() );
		?>


		<div class="container"><?php the_content();?>
		</div>
		<?php 
			// the_post_navigation();
		?>

			<!-- // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;-->

			<?php endwhile; 
			?> 
			<div class="collageBloc container-fluid">
				<div class="col-md-12">
					<img class="img100" src="<?php the_field('collage_top_right') ?>">
				</div>
				
			</div>
	</section>
<section id="section2" data-midnight="whitemd">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 homePadding my-auto"><?php the_field('first_bloc_title') ?> </div>
			<div class="col-md-6">
				<img class="homeBloc" src="<?php the_field('first_bloc_picture'); ?>">
			</div>
		</div>
	</div>
</section>
<section id="section3" data-midnight="whitemd">
	<div class="container-fluid">
		<div class="section3" style="background-image: url('<?php the_field('second_bloc_picture') ?>')">
			<div class="textOut center">
				<?php the_field('second_bloc_text') ?>
			</div>
		</div>
	</div>
	
</section>
<?php include "location.php" ; ?>
<br><br><br><br>
 things here




<br>



              <script>
        
              </script>
		<?php get_footer(); ?>