<?php
/**
 * @package Symetrio
 * @author Wonster
 * @link http://wonster.co/
 */

global $post_settings; ?>
<?php

$id					= get_the_id();
$url				= get_permalink();
$title				= get_the_title();
$post_thumbnail_id	= get_post_thumbnail_id( $id );
$image_attributes	= wp_get_attachment_image_src( $post_thumbnail_id, 'size_5' );
$style				= ( $image_attributes[0] ) ? 'style="background-image: url(\'' . $image_attributes[0] . '\')"' : '';
$date_y				= get_the_time( $post_settings['wtr_BlogDateFormat']['date_y'] );
$date_m				= get_the_time( $post_settings['wtr_BlogDateFormat']['date_m'] );
$date_d				= get_the_time( $post_settings['wtr_BlogDateFormat']['date_d'] );
$author				= get_the_author_meta( 'display_name' );
$comments			= wtr_comments_number( 'wtrBlogDfPostOtherLink wtrRadius3 wtrAnimate ', $id);
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class( 'wtrBlogModernPostHeader clearfix' ) ?> <?php echo $style; ?> >
		<div class="wtrInner">
			<div class="wtrBlogModernPostHeadlineContent wtrRadius3">
				<header class="wtrBlogDfPostHeader clearfix" >
					<h1 class="wtrBlogDfPostHeadline wtrBlogModernPostHeadline"><?php echo $title; ?></h1>
					<?php wtr_post_category( 'wtrBlogDfPostCategory wtrBlogModernPostCategory ' ) ?>
					<div class="wtrBlogModernPostAdditionalData clearfix">
						<div class="wtrBlogDfPostOther wtrBlogModernPostOther clearfix" >
							<?php echo $post_settings['wtr_TranslateBlogPostByAuthor'] ?> <a href="<?php echo $url; ?>" class="wtrBlogDfPostOtherLink wtrRadius3 wtrAnimate"><?php echo $author; ?></a>
							<?php echo $comments; ?>
						</div>
						<div class="wtrBlogModernPostDate clearfix">
							<div class="wtrBlogModernPostDateCreated">
								<div class="wtrBlogModernDateYear"><?php echo $date_y ;?></div>
								<div class="wtrBlogModernDateMonth"><?php echo $date_m ;?></div>
								<div class="wtrBlogModernDateDay"><?php echo $date_d ;?></div>
							</div>
						</div>
					</div>
				</header>
			</div>
		</div>
	</div>
	<div class="wtrContainer wtrContainerColor wtrPost wtrPage">
		<div class="wtrInner clearfix">
			<section class="wtrContentCol <?php echo $post_settings['wtr_ContentInClass']['content']; ?> clearfix">
				<article class="wtrBlogDfPost clearfix">
					<div class="wtrBlogDfPostAssets clearfix">
						<?php wtr_post_social_share( 'wtrBlogModernSocialShare' ) ?>
					</div>
					<div class="wtrBlogDfPostContent wtrBlogModernPostContent clearfix">
						<div class="wtrPageContent clearfix">
							<?php the_content(); ?>
						</div>
						<?php wtr_wp_link_pages(); ?>
						<?php wtr_post_tags() ?>
					</div>
				</article>
				<?php wtr_related_posts(); ?>
				<?php wtr_draw_post_author(); ?>
				<?php comments_template(); ?>
			</section>
			<?php get_sidebar(); ?>
		</div>
	</div>
