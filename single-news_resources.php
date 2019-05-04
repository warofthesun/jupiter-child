<?php
/*
 Template Name: Image Header
*/

get_header('news_resources'); ?>
<div class="psycographic_survey">
<!--NEWS RESOURCES-->
<?php
								$image = get_field('page_header');
								$url = $image['url'];
								$size = 'header-image';
								$thumb = $image['sizes'][ $size ];
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];
								?>

<div style="background:url(<?php echo $thumb; ?>);" class="header-bg remove-margin__bottom">
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

  <div class="result">
    <div class="result-summary">
      <?php the_field('result_description'); ?>
    </div>
  <a id="button" class="close_button" href="#"><?php if(get_field('result_cta') ) : the_field('result_cta'); else : ?>Learn more about your <strong><?php the_field('page_title'); ?></strong> profile<?php endif; ?></a>
  <div class="result-email">
    <?php the_field('result_email'); ?>
  </div>
</div>
