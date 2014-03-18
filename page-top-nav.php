<?php
/*
Template Name: Home - Top Nav
*/
?>

<?php get_header(); ?>
  <div class="top-nav-layout">
    <header role="banner">
				
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
          
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
            
					<?php if ( get_theme_mod( 'wpbsone_logo' ) ) : ?>
            <div class="site-logo">
                <a href='<?php echo home_url(); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'wpbsone_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
            </div>
          <?php else : ?>
						<a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?> <?php //bloginfo( 'description' ); ?></a>
          <?php endif; ?>
					</div>

					<div class="collapse navbar-collapse navbar-responsive-collapse main-nav pull-right">
						<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
            

						<!--
						<?php //if(of_get_option('search_bar', '1')) {?>
						<form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
							<div class="form-group">
								<input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search','wpbootstrap'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
							</div>
						</form>
						<?php //} ?>
					</div>
          -->

				</div> <!-- end .container -->
			</div> <!-- end .navbar -->
		
		</header> <!-- end header -->
		
    
    
			<?php 
      // for each page in the main nav
      if (($locations = get_nav_menu_locations()) && $locations['main_nav'] ) {
          $menu = wp_get_nav_menu_object( $locations['main_nav'] );
          $menu_items = wp_get_nav_menu_items($menu->term_id);
          $pageID = array();
          foreach($menu_items as $item) {
              if($item->object == 'page')
                  $pageID[] = $item->object_id;
          }
          query_posts( array( 'post_type' => 'page','post__in' => $pageID, 'posts_per_page' => count($pageID), 'orderby' => 'post__in' ) );
      }
      while(have_posts() ) : the_post();
      ?>
  
     <section class="single-page-section" id="<?php echo $post->post_name;?>">
      
      <div class="container">
        
        <div class="clearfix row">
        
          <div class="col-sm-12 clearfix" role="main">
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
              
                
              <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
              
            
              <section class="post_content clearfix" itemprop="articleBody">
                <?php the_content(); ?>
            
              </section> <!-- end article section -->
        
                <?php //the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ', ', '</p>'); ?>
            
            </article> <!-- end article -->
            
            <?php //comments_template('',true); ?>
        
          </div> <!-- end #main -->
      
          <?php //get_sidebar(); // sidebar 1 ?>
      
        </div> <!-- end #content -->
        
        </div> <!-- end #container -->
        </section>
				<?php endwhile;?>
     
   </div>
   
   <div class="container">
      <footer class="site-footer" role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
            <div id="widget-footer" class="clearfix row">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
              <?php endif; ?>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
              <?php endif; ?>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
              <?php endif; ?>
            </div>
        
        <nav class="clearfix">
          <?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
        </nav>
      
      </div> <!-- end #inner-footer -->
      
    </footer> <!-- end footer -->
  
  </div> <!-- end #container -->
	
<?php get_footer(); ?>