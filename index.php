<?php get_header(); ?>
<script type="text/javascript">pageid = 'portfolio';</script>


<article id="portfolio" class="main">	
	<section class="summary wrap clearfix">		
		<h1>Blog</h1>
	</section>
	<section class="content wrap">
		<div class="gallery clearfix">
			<?php if (have_posts()) :?>
				<?php while (have_posts()) : the_post(); ?>	   
			<figure>			
				<a href="<?php the_permalink(); ?>" class="explain-work" rel="<?php the_ID();?>">
					<?php the_post_thumbnail('thumbnail');?>
				</a>									
				<figcaption>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="categories"><?php the_category(', '); ?></div>
					<?php the_excerpt(); ?>
				</figcaption>						
			</figure>
			<?php endwhile; ?>
			<?php else :?>
				<h3><?php _e('Sorry, works not found','pcazorla'); ?>!</h3>
			<?php endif; ?>	
		</div>
		
		<?php if (show_posts_nav()) : ?>
		<nav class="navPages">		
		<?php global $wp_query;
		$big = 999999999; // need an unlikely integer		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'prev_text' => 'Prev',
			'next_text' => 'Next'
		) );
		?>
		</nav>
		<?php endif; ?>	
	</section>
</article>
<?php get_footer(); ?>