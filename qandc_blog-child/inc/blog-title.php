<?php
    $args = array(
         'post_type' => 'bloginfo',
				        'posts_per_page' => 1,
				        'orderby' => 'rand'
    );

    $the_h1_query = new WP_Query( $args );
?>
<?php if ( $the_h1_query->have_posts() ) : while ( $the_h1_query->have_posts() ) : $the_h1_query->the_post(); ?>

	<h1 class="blog-title"><?php echo get_post_meta( $post->ID, '_cmb2_h1_title', true ); ?></h1>

<?php endwhile; else : ?>
    <p>  </p>
<?php endif;

wp_reset_postdata(); ?>