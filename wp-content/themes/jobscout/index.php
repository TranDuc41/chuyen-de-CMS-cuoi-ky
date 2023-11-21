<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */

get_header();
$blog_heading = get_theme_mod('blog_section_title', __('NEWEST BLOG ENTRIES', 'jobscout')); ?>
<?php
// Đặt slug của trang
$page_slug = get_post_field('post_name', get_queried_object());

$page = get_page_by_path($page_slug);

if ($page) {

	$page_excerpt = get_post_field('post_excerpt', $page->ID);

	// Lấy URL hình đại diện
	$page_featured_image_url = get_the_post_thumbnail_url($page->ID, 'full');

	// Kiểm tra và hiển thị hình đại diện nếu có
	if (!empty($page_featured_image_url)) {
		echo '<div class="banner-blog-main">
		<div class="banner-blog" style="background-image: url(' . esc_url($page_featured_image_url) . '); "><h2 class="banner-title-blog">' . $page_excerpt . '</h2></div>
		</div>';
	}
}

?>
<?php if ($blog_heading) echo '<h2 class="section-title">' . esc_html($blog_heading) . '</h2>'; ?>

<div id="primary" class="content-area">

	<?php
	/**
	 * Before Posts hook
	 */
	do_action('jobscout_before_posts_content');
	?>

	<main id="main" class="site-main">

		<?php
		if (have_posts()) :

			/* Start the Loop */
			while (have_posts()) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_format());

			endwhile;

		else :

			get_template_part('template-parts/content', 'none');

		endif; ?>

	</main><!-- #main -->

	<?php
	/**
	 * After Posts hook
	 * @hooked jobscout_navigation - 15
	 */
	do_action('jobscout_after_posts_content');
	?>

</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
