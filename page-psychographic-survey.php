<?php
/*
 Template Name: Psychographic Survey
*/

get_header(); ?>
<div class="psycographic_survey image-header">
<?php
Mk_Static_Files::addAssets('mk_button');
Mk_Static_Files::addAssets('mk_audio');
Mk_Static_Files::addAssets('mk_swipe_slideshow'); ?>
<?php
								$image = get_field('page_header');
								// vars
								$url = $image['url'];
								// thumbnail
								$size = 'large';
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
<div id="dialog">
  <h4 id="message">
		<?php if(get_field('result_header') ) : the_field('result_header'); else : ?>Drumroll please...<br />your Wellview Consumer Connect profile is…<?php endif; ?></h4>
  <h1 id="result" class="result-<?php the_field('result_number'); ?>"><?php if(get_field('result') ) : the_field('result'); else : the_field('page_title'); ?>!<?php endif; ?></h1>
		page psychographic survey
  <div class="result">
    <div class="result-summary">
      <?php the_field('result_description'); ?>
    </div>
  <a id="button" class="close_button" href="#"><?php if(get_field('result_cta') ) : the_field('result_cta'); else : ?>Learn more about your <strong><?php the_field('page_title'); ?></strong> profile<?php endif; ?></a>
  <div class="result-email">
    <?php the_field('result_email'); ?>
  </div>
</div>
<?php if( have_rows('result_pop-ups') ): ?>
<div id="quiz-result">
   <?php while ( have_rows('result_pop-ups') ) : the_row(); ?>
		<?php $results = get_sub_field('result_number'); ?>
		<div id="<?php echo $results['value']; ?>" class="dynamic-results">
			<h4 id="message"><?php the_field('intro');?></h4>
	    <h1 id="result" class="result-<?php echo $results['label']; ?>"><?php the_sub_field('result_name'); ?></h1>
	    <div class="result">
	      <div class="result-summary">
	        <?php the_sub_field('result_description'); ?>
	  			<?php $link = get_field('cta_button'); ?>
					<?php if( $link) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a href="<?php echo $link_url; ?>" class="wvhButton" style="float:none;margin-bottom:2em;display:inline-block;"><?php echo $link_title; ?></a>
					<?php endif; ?>
	  			<i style="font-size:.9em;"><?php the_field('wrap_up'); ?></i>
	      </div>
	  	</div>
	  </div>
	<?php  endwhile; else : ?>
</div>
<?php endif; ?>
