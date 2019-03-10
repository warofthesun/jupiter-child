<?php
/*
 Template Name: Flexible Content
*/

get_header(); ?>
<div class="psycographic_survey">
<?php
Mk_Static_Files::addAssets('mk_button');
Mk_Static_Files::addAssets('mk_audio');
Mk_Static_Files::addAssets('mk_swipe_slideshow'); ?>
<?php
								$image = get_field('page_header');
								// vars
								$url = $image['url'];
								// thumbnail
								$size = 'header-image';
								$thumb = $image['sizes'][ $size ];
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];
								?>

<div style="background:url(<?php echo $thumb; ?>);" class="header-bg">
<div class="overlay">
  <h1><?php if( get_field('page_title') ) : the_field('page_title'); else : echo the_title(); endif; ?></h1>
  <?php if( get_field('page_subtitle') ) : ?>
    <h2> <?php the_field('page_subtitle'); ?></h2>
  <?php endif; ?>
</div>
</div>
</div>
<?php

// check if the repeater field has rows of data
if( have_rows('hero_section') ): ?>
<ul class="flexible_content-container">


 	<?php // loop through the rows of data
    while ( have_rows('hero_section') ) : the_row(); ?>

		<li class="flexible_content">
				<div class="vc_row headline mk-grid">
					<?php the_sub_field('headline'); ?>
				</div>
				<div class="content_container">
					<div class="vc_row content_row mk-grid">
						<?php

						$image = get_sub_field('hero_image');

						if( !empty($image) ):
						  // vars
							$url = $image['url'];

							// thumbnail
							$size = 'large';
							$thumb = $image['sizes'][ $size ]; ?>

						<?php endif; ?>
					<div class="vc_col-xs-12 vc_col-md-7 background_image" style="background-image:url('<?php echo $thumb; ?>');">
						<div class="overlay <?php the_sub_field('overlay_color'); ?>">

								<?php

								$image = get_sub_field('inner_image');
								if( !empty($image) ):

								  // vars
									$url = $image['url'];
									$alt = $image['alt'];

									// thumbnail
									$size = 'large';
									$thumb = $image['sizes'][ $size ];
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ]; ?>


								<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
							<?php endif; ?>
						</div>
					</div>
					<div class="vc_col-xs-12 vc_col-md-5 content <?php the_sub_field('overlay_color'); ?>">
						<div>
							<?php the_sub_field('detail_content'); ?>
						</div>
					</div>
				</div>
				</div>
		</li>

	<?php endwhile; ?>
	</ul>
<?php else :

    // no rows found

endif;

?>

<?php mk_build_main_wrapper( mk_get_view('singular', 'wp-page', true) ); ?>
</div>
    <script>
    jQuery(document).ready(function($) {
          $("#dialog").dialog({ autoOpen: false, modal: true, dialogClass: 'survey',  position: { my: "center", at: "top" } });

          if(window.location.href.indexOf('?result=1') != -1) {
          $('#dialog').dialog('open');
          }

          $(".close_button").click(function () {
              $("#dialog").dialog('close');
          });
    });
    </script>
<?php get_footer(); ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
