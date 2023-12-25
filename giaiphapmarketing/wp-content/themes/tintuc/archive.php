<?php get_header();?>
<div id="main">
  <?php get_template_part('template-parts/tempalte-post-update');?>
  <section class="main">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="breadcrumb">
            <?php if ( function_exists('yoast_breadcrumb') ) {
              yoast_breadcrumb('<p id="breadcrumbs">','</p>');
            } ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 col-xs-12">
          <?php if ( ! dynamic_sidebar( 'ads-top-cate' ) ) : ?>
        <?php endif;?>
        <header class="entry-header">
          <h1 class="cat-links">
            <?php
            if ( is_day() ) :
              printf( 'Ngày: %s', '<span>' . get_the_date('d/m/Y') . '</span>' );

            elseif ( is_month() ) :
              printf( 'Tháng: %s', '<span>' . get_the_date('m') . '</span>' );

            elseif ( is_year() ) :
              printf( 'Năm: %s', '<span>' . get_the_date('Y') . '</span>' );

            elseif ( is_author() ) :
              printf( 'Tác giả: %s', '<span>' . get_the_author() . '</span>' );

            elseif ( is_tag() ) :
              echo '<span class="pull-left">Tìm theo từ khóa:&nbsp;</span>'.single_cat_title();

            elseif ( is_search() ) :
              printf( 'Từ khóa tìm kiếm: %s', get_search_query() );

            else :
              single_cat_title();

            endif;
            ?>
          </h1>
        </header><!-- .entry-header -->
        <div id="primary" class="content-area">
			<div class="term-des">
				<?php echo term_description(); ?>
			</div>
          <div class="flw site-main">
            <?php
            $postCount = 1; while (have_posts()) : the_post();
            if($postCount==1)
            $class = array('first','flw','mg-bottom10','thumb-left');
          else $class = array('flw','mg-bottom10','thumb-left');
            ?>
            <article <?php post_class($class);?>>
              <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                <?php if($postCount==1){ ?>
                <?php the_post_thumbnail('thumb_180x130', array('alt'=>get_the_title(),'class'=>'hidden-xs'));?>
                <?php the_post_thumbnail('thumb_545x280', array('alt'=>get_the_title(),'class'=>'hidden-lg hidden-md hidden-sm'));?>
                <?php } else the_post_thumbnail('thumb_180x130', array('alt'=>get_the_title())); ?>
              </a>
              <h3><a class="bold font24" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
              <?php $category = get_the_category();
//print_r($category);
              foreach ($category as $child) {
                $child_id= $child->term_id;
                $children = get_terms(array(
                  'taxonomy'=>'category',
                  'parent'    => $child_id,
                  'hide_empty' => false
                  ) );
                if($children) $category[0]->name;
                else $cate=$child->name;
              }
              ?>
              <div class="date"><i><?php printf( '%s', '<span>' . get_the_date('d/m/Y') . '</span>' );?> | <?php echo $cate; ?></i></div>
              <div class="post-excerpt hidden-mobile hidden-xs"><?php eweb_truncate_description('300');?></div>

              <?php //related_post();?>
            </article>
          <?php $postCount++; endwhile; wp_reset_query();?>
          <nav class="navigation paging-navigation" role="navigation">
            <?php wp_pagenavi();?>
          </nav><!-- .navigation -->
        </div>
      </div>
      <?php if ( ! dynamic_sidebar( 'ads-bottom-cate' ) ) : ?>
    <?php endif;?>
  </div>
  <div class="col-md-3 hidden-sm hidden-xs">
    <?php get_sidebar();?>
  </div>
</div>
</div>
</section><!-- .main -->
<?php get_footer();?>