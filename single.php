<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Andries
 */

get_header();

// Get the current post ID and the URL of the featured image
$post_id = get_the_ID(); 
$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');

// Get the first category of the post
$categories = get_the_category();
$category_name = (!empty($categories)) ? $categories[0]->name : 'Uncategorized';

?>

<main id="primary" class="site-main fade-in">

    <div class="wrapper single-post">
        <div class="back-home">
			<div class="icon"><span class="item"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_file_uri('images/back.png'); ?>" alt="icon for linkedin sharing "></a></span></div>
        </div>
        <div class="featured-image">
		<div class="left" style="background-image: url('<?php echo esc_url($featured_img_url); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            <div class="right">
                <div class="content-box">
                    <p class="post-meta"><?php echo esc_html($category_name); ?> | 4 MINUTE READ</p>
                    <h3 class="post-title"><?php echo get_the_title(); ?></h3>
                    <p class="date"><?php echo get_the_date(); ?></p>
                </div>
            </div>
        </div>
        <div class="post-body">
			<div class="slim">
				<?php the_content(); ?>
			</div>
		</div>
    </div>  

</main><!-- #main -->

<?php
get_footer();
?>
