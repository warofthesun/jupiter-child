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
<?php

$image = get_field('image_test');

if( !empty($image) ):
  // vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ]; ?>

<?php endif; ?>
<div class="flexible_content">
	<div class="mk-grid">
		<div class="vc_row headline">
			With Wellview Profiling, participants are more than twice as likely to open and read a health communication, and more than 9 times more likely to click and take action.
		</div>
		<div class="vc_row content_row">
			<div class="vc_col-sm-3 vc_col-md-7 background_image" style="background-image:url('<?php echo $thumb; ?>');">
				<div class="overlay">
					<img src="<?php the_field('inner_image'); ?>" alt="" />
				</div>
			</div>
			<div class="vc_col-sm-9 vc_col-md-5" style="display:flex;justify-content:center;align-items:center;">
				Wellview Profiled
				55% Opens/Reads
				31% Clicks

				Industry Average*
				24.7% Opens/Reads
				3.3% Clicks
			</div>
		</div>
	</div>
</div>


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
<div id="dialog" class="test" title="<?php the_field('page_title'); ?>">
  <h4 id="message">Drumroll please...<br />your healthcare engagement profile is…</h4>
  <h1 id="result" class="result-<?php the_field('result_number'); ?>"><?php the_field('page_title'); ?>!</h1>

  <div class="result">
    <div class="result-summary">
      <?php the_field('result_description'); ?>
    </div>
  <a id="button" class="close_button" href="#">Learn more about your <strong><?php the_field('page_title'); ?></strong> profile</a>
  <div class="result-email">
    <?php the_field('result_email'); ?>
  </div>
</div>
