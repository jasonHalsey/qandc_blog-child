<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	<?php
		if ( is_single() ) :
			echo '	<article id="post-', the_ID(), '" class="qandc-post-full">';
			echo '<div class="content-header-single">';
		else :
			echo '	<article id="post-', the_ID(), '" class="qandc-post">';
			echo '<div class="content-header">';
		endif;
	?>
			<div class="date_block">
				<span class="datenum"><?php the_time('m'); ?></span><br />
				<span class="datemon"><?php the_time('M'); ?></span>
				
			</div>
			<span class="desktop-list">
				<?php 
					if ( !is_single() ) :
							the_post_thumbnail( 'bones-thumb-320' ); 
					endif;
				?>
			</span>

			<span class="mobile-list">
				<?php 
					if ( !is_single() ) :
							the_post_thumbnail( 'bones-thumb-600' ); 
					endif;
				?>
			</span>
				
		</div>
		
			<?php
				if ( is_single() ) :
					echo '<header class="entry-header-single">';
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					echo '<header class="entry-header">';
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					echo '<a href="', esc_url( get_permalink() ), '" ><img src="', bloginfo('stylesheet_directory') ,'/img/arrow_icon.svg" class="readmore-arrow"/></a>';
				endif;
			?>
		</header><!-- .entry-header -->

		
			<?php
				if ( is_single() ) :
					echo '<div class="entry-content-single">';
					/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
				else :
					echo '<div class="entry-content">';
					the_excerpt();
				endif;

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>

		<footer class="entry-footer">
			<?php twentyfifteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->

	</article><!-- #post-## -->
