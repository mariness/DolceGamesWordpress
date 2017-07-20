<?php 
	get_header();

	// Get app features
	$args = array(
		'post_type'      => 'appz_features',
		'posts_per_page' => -1,
	);
	$loop = new WP_Query($args); 
	
	$features = array();
	while ($loop->have_posts()) : $loop->the_post(); 		
		$features[] = array(
			'id'      => $post->ID,
			'title'   => get_the_title(),
			'content' => $post->post_excerpt
		);
	endwhile; wp_reset_postdata();
?>

<header id="header" class="container_12">
	<div id="hand">
		<div class="img"></div>
		<div class="behind-img"></div>

		<ul class="iphone-slider">
			<?php foreach($features as $feature): ?>
				<li><?php echo generate_thumbnail_by_id($feature["id"], 163, 245); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div id="information" class="grid_5">
		<h1><?php echo theme_option('theme_app_name', __("Appz", TDOMAIN)); ?></h1>

		<h2><?php echo theme_option('theme_app_desc', __("The amazing template to show off your new iPhone App!", TDOMAIN)); ?></h2>

		<a href="<?php echo theme_option("theme_app_down"); ?>" class="download"><?php _e("Download", TDOMAIN); ?></a>
	</div>
</header>

<div class="features-slider-container container_12<?php echo (count($features) == 0) ? " no-features" : ""; ?>">
	<div class="features-slider">

		<?php 
			$i = 0; 
			$features_chunked = array_chunk($features, 4);
			foreach($features_chunked as $block): ?>
			<ul>
				<?php foreach($block as $feature): ?>
					<li data-screen="<?php echo $i; ?>"<?php echo ($i == 0) ? ' class="hover"' : ''; ?>>
						<?php
							$found_feature_img = false;

							if(class_exists('MultiPostThumbnails')){
								$url = MultiPostThumbnails::get_post_thumbnail_url('appz_features', 'app-feature-img', $feature["id"]);


								if(strlen($url) > 0){
									$found_feature_img = true;

									echo generate_tumbnail($url, 182, 105);
								}
							} 

							if(! $found_feature_img){
								echo generate_thumbnail_by_id($feature["id"], 182, 105); 
							}
						?>

						<h3><?php echo $feature["title"]; ?></h3>

						<p><?php echo $feature["content"]; ?></p>
					</li>
					<?php $i++; ?>
				<?php endforeach; ?>				
			</ul>
		<?php endforeach; ?>	

	</div>
</div>

<?php if(theme_option("theme_cta", true)): ?>
<div class="get-it container_12">
	<p>
		<?php _e("Get your", TDOMAIN); ?> 
		<span class="app-price"><?php _e("free", TDOMAIN); ?></span> 
		<a href="<?php echo theme_option("theme_app_down"); ?>" class="download"><?php _e("Download", TDOMAIN); ?></a> 
		<?php _e("of", TDOMAIN); ?> 
		<span class="app-name"><?php echo theme_option('theme_app_name', __("Appz", TDOMAIN)); ?></span> 
		<?php _e("today!", TDOMAIN); ?>
	</p>
</div>
<?php endif; ?>

<div class="container_12">
	<section id="content" class="grid_12">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>    
				<article>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>				

	</section>
</div>

<?php get_footer(); ?>
