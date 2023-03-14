<?php


function create_shortcode_randompost() {
	$random_query = new WP_Query(array(
		'posts_per_page' => 10,
		'orderby' => 'rand'
	));


	ob_start();
	if ( $random_query->have_posts() ) :
		echo '<section class="elementor-section elementor-top-section elementor-element elementor-element-0419977 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="0419977" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">';
		while ( $random_query->have_posts() ) :
			$random_query->the_post();?>

        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-a04b2c5 mt-8" data-id="a04b2c5" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);">
                <div class="elementor-background-overlay"></div>
                <section class="elementor-section elementor-inner-section elementor-element elementor-element-6a626b6 elementor-section-height-min-height elementor-section-content-middle hover-title elementor-section-boxed elementor-section-height-default" data-id="6a626b6"
                    data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e1b1685" data-id="e1b1685" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-593b0ba elementor-widget elementor-widget-heading" data-id="593b0ba" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default"><?php the_title() ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

		<?php endwhile;
		echo '</div>
        </section>';
	endif;
	$list_post = ob_get_contents(); 

	ob_end_clean();


	return $list_post;
}
add_shortcode('accessories_portfolio', 'create_shortcode_randompost');

?>
