<?php
/*
** archive.php
** mk_build_main_wrapper : builds the main divisions that contains the content. Located in framework/helpers/global.php
** mk_get_view gets the parts of the pages, modules and components. Function located in framework/helpers/global.php
*/

get_header('news_resources'); ?>
<?php $custom_query = new WP_Query('pagename=news-and-resources');
while($custom_query->have_posts()) : $custom_query->the_post(); ?>
<?php
  $image = get_field('page_header');
  // vars
  $url = $image['url'];
  // masternail
  $size = 'header-image';
  $master = $image['sizes'][ $size ];
  $width = $image['sizes'][ $size . '-width' ];
  $height = $image['sizes'][ $size . '-height' ];
?>
<div class="psycographic_survey">
  <div style="background:url(<?php echo $master; ?>);" class="header-bg">
    <div class="overlay">
      <h1><?php if( get_field('page_title') ) : the_field('page_title'); else : echo the_title(); endif; ?></h1>
      <?php if( get_field('page_subtitle') ) : ?>
        <h2> <?php the_field('page_subtitle'); ?></h2>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php
mk_build_main_wrapper( mk_get_view('templates', 'wp-news_resources-archive', true) );

get_footer();
