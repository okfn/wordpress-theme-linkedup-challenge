<?php
/*
Template Name: Left Nav
*/
?>

<?php get_header(); ?>
<div class="left-nav-layout">
		<div class="container">

			<div id="content" class="clearfix row">

        <div class="left-nav main-nav panel panel-default col-sm-3">
            <div class="panel-heading">
          <?php if ( get_theme_mod( 'wpbsone_logo' ) ) : ?>
              <div class="site-logo">
                  <a href='<?php echo home_url(); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'wpbsone_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
              </div>
          <?php else : ?>
              <h1 class='site-title'><a href='<?php echo home_url(); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
              <?php //bloginfo( 'description' ); ?>
          <?php endif; ?>
          </div>
  <div class="panel-body">
          <?php  wp_nav_menu(
						array(
							'menu' => 'main_nav', /* menu name */
							'menu_class' => 'nav nav-stacked',
							'theme_location' => 'main_nav', /* where in the theme it's assigned */
							'container' => 'false', /* container class */
							'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
							// 'depth' => '2',  suppress lower levels for now
							'walker' => new Bootstrap_walker()
						)
					); ?>

          </div>
        </div>

				<div id="main" class="col-sm-8 col-sm-offset-4 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header>

							<div class="page-header"><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></div>

						</header> <!-- end article header -->

						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>

						</section> <!-- end article section -->

						<footer>

							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ', ', '</p>'); ?>

						</footer> <!-- end article footer -->

					</article> <!-- end article -->

					<?php comments_template('',true); ?>

					<?php endwhile; ?>

					<?php else : ?>

					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>

					<?php endif; ?>

				</div> <!-- end #main -->

				<?php //get_sidebar(); // sidebar 1 ?>

			</div> <!-- end #content -->


<div class="container">
  <footer class="site-footer" role="contentinfo">

    <div id="inner-footer" class="clearfix">
      <div id="widget-footer" class="clearfix row">
        <div class="col-sm-8 col-sm-offset-4">
          <div class="row">
            <?php
						if ( is_active_sidebar('footer2') ) { ?>
            <div class="col-sm-6">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-6">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
              <?php endif; ?>
            </div>
          </div>
          <?php } else { ?>
            <div class="col-sm-12">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
              <?php endif; ?>
            </div>
          <?php } ?>
        </div>
      </div>

      <nav class="clearfix">
        <?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
      </nav>

    </div> <!-- end #inner-footer -->

  </footer> <!-- end footer -->

</div> <!-- end #container -->
<?php get_footer(); ?>