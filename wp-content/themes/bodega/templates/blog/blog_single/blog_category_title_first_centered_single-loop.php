<?php
global $qode_options;

$blog_show_comments = "yes";
if (isset($qode_options['blog_single_show_comments'])) {
    $blog_show_comments = $qode_options['blog_single_show_comments'];
}
$blog_show_author = "yes";
if (isset($qode_options['blog_author_info'])) {
    $blog_show_author = $qode_options['blog_author_info'];
}
$blog_show_like = "no";
if (isset($qode_options['blog_single_show_like'])) {
    $blog_show_like = $qode_options['blog_single_show_like'];
}
$blog_show_date = "yes";
if (isset($qode_options['blog_single_show_date'])) {
    $blog_show_date = $qode_options['blog_single_show_date'];
}

$blog_social_share_type = "dropdown";
if(isset($qode_options['blog_single_select_share_option'])){
	$blog_social_share_type = $qode_options['blog_single_select_share_option'];
}
$blog_show_social_share = "yes";
if (isset($qode_options['enable_social_share'])&& ($qode_options['enable_social_share']) =="yes"){
    if (isset($qode_options['post_types_names_post'])&& $qode_options['post_types_names_post'] =="post"){
        if (isset($qode_options['blog_single_show_social_share']) && $blog_social_share_type == "dropdown") {
            $blog_show_social_share = $qode_options['blog_single_show_social_share'];
        }
    }
}

$blog_show_categories = "yes";
if (isset($qode_options['blog_single_show_category'])) {
    $blog_show_categories = $qode_options['blog_single_show_category'];
}
$blog_show_ql_icon_mark  = "yes";
if (isset($qode_options['blog_single_show_ql_icon'])) {
    $blog_show_ql_icon_mark  = $qode_options['blog_single_show_ql_icon'];
}
$blog_ql_background_image = "no";
if(isset($qode_options['blog_category_title_first_centered_ql_background_image'])){
	$blog_ql_background_image = $qode_options['blog_category_title_first_centered_ql_background_image'];
}

$background_image_object = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID()), 'blog_image_format_link_quote');
$background_image_src = $background_image_object[0];

$_post_format = get_post_format();

$background_image_html = '';
$background_image_html_class = '';
if($blog_ql_background_image == "yes"){
	if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes"){
		if($_post_format == "quote"){
			$background_image_html_class .=  ' quote_image"';
		}elseif($_post_format == "link"){
			$background_image_html_class .=  ' link_image"';
		}
		$background_image_html =  ' style="background-image: url(' . esc_url($background_image_src) . ')"';
	}
}
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<?php if($blog_show_categories == "yes"){?>
					<div class="post_info post_categories">
						<?php qode_post_info(array('category' => $blog_show_categories)); ?>
					</div>
				<?php } ?>
				<h2>
					<?php the_title(); ?>
				</h2>
				<?php if($blog_show_author == "yes"){?>
					<div class="post_info post_author">
						<?php qode_post_info(array('author' => $blog_show_author)); ?>
					</div>
				<?php } ?>
                <div class="post_image">
                    <?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
                    <?php if($_video_type == "youtube") { ?>
                        <iframe  src="http://www.youtube.com/embed/<?php echo esc_attr(get_post_meta(get_the_ID(), "video_format_link", true));  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
                    <?php } elseif ($_video_type == "vimeo"){ ?>
                        <iframe src="http://player.vimeo.com/video/<?php echo esc_attr(get_post_meta(get_the_ID(), "video_format_link", true));  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    <?php } elseif ($_video_type == "self"){ ?>
                        <div class="video">
                            <div class="mobile-video-image" style="background-image: url(<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>);"></div>
                            <div class="video-wrap"  >
                                <video class="video" poster="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>" preload="auto">
                                    <?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_webm", true));  ?>"> <?php } ?>
                                    <?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_mp4", true));  ?>"> <?php } ?>
                                    <?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_ogv", true));  ?>"> <?php } ?>
                                    <object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
                                        <param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
                                        <param name="flashvars" value="controls=true&file=<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_mp4", true));  ?>" />
                                        <img src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
                                    </object>
                                </video>
                            </div></div>
                    <?php } ?>
                </div>
				<div class="post_text">
					<div class="post_text_inner">
						<?php
						the_content();
						?>
						<?php if($blog_show_date == "yes" || $blog_show_social_share == "yes"  || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>		
							<div class="post_info post_info_item">
								<?php qode_post_info(array('date' => $blog_show_date, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); 
								if($blog_social_share_type == "dropdown"){
									qode_post_info(array('share' => $blog_show_social_share));			
								}
								?>								
							</div>
						<?php } ?>	
						<?php if(isset($qode_options['blog_single_show_social_share']) && $qode_options['blog_single_show_social_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]');
						}; ?>	
					</div>
				</div>
			</div>
		</article>	
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<?php if($blog_show_categories == "yes"){?>
					<div class="post_info post_categories">
						<?php qode_post_info(array('category' => $blog_show_categories)); ?>
					</div>
				<?php } ?>
				<h2>
					<?php the_title(); ?>
				</h2>
				<?php if($blog_show_author == "yes"){?>
					<div class="post_info post_author">
						<?php qode_post_info(array('author' => $blog_show_author)); ?>
					</div>
				<?php } ?>
				<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
					if ( has_post_thumbnail() ) { ?>
						<div class="post_image">
							<?php the_post_thumbnail('full'); ?>
						</div>
				<?php }} ?>
                <div class="audio_image">
					<audio class="blog_audio" src="<?php echo esc_url(get_post_meta(get_the_ID(), "audio_link", true)); ?>" controls="controls">
						<?php _e("Your browser don't support audio player","qode"); ?>
					</audio>
				</div>
				<div class="post_text">
					<div class="post_text_inner">
						<?php
						the_content();
						?>
						<?php if($blog_show_date == "yes" || $blog_show_social_share == "yes"  || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>		
							<div class="post_info post_info_item">
								<?php qode_post_info(array('date' => $blog_show_date, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); 
									if($blog_social_share_type == "dropdown"){
									qode_post_info(array('share' => $blog_show_social_share));			
									}
								?>								
							</div>
						<?php } ?>	
						<?php if(isset($qode_options['blog_single_show_social_share']) && $qode_options['blog_single_show_social_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]');
						}; ?>	
					</div>
				</div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_text<?php echo esc_attr($background_image_html_class); ?>" <?php echo $background_image_html; /* dynamically generated style attr. Note that is escaped on line 61 */ ?>>
                    <div class="post_text_inner">
						<div class="post_title post_info_item">
							<?php $title_link = get_post_meta(get_the_ID(), "title_link", true) != '' ? esc_url(get_post_meta(get_the_ID(), "title_link", true)) : 'javascript: void(0)'; ?>
							<h3><a href="<?php echo esc_url($title_link); ?>"><?php the_title(); ?></a></h3>
						</div>
                        <?php if($blog_show_ql_icon_mark == "yes"){ ?>
							<div class="post_info_link_mark post_info_item">
								<span class="fa fa-link link_mark"></span>
							</div>
                   		<?php } ?>
						<?php if($blog_show_date == "yes" || $blog_show_social_share == "yes"  || $blog_show_comments == "yes" || $blog_show_like == "yes" || $blog_show_categories == "yes" || $blog_show_author == "yes") { ?>		
							<div class="post_info post_info_item">
								<?php qode_post_info(array('date' => $blog_show_date, 'comments' => $blog_show_comments, 'like' => $blog_show_like, 'author' => $blog_show_author , 'category' => $blog_show_categories)); 
									if($blog_social_share_type == "dropdown"){
									qode_post_info(array('share' => $blog_show_social_share));			
									}
								?>								
							</div>
						<?php } ?>
						<?php if(isset($qode_options['blog_single_show_social_share']) && $qode_options['blog_single_show_social_share'] == "yes" && $blog_social_share_type == "list"){
							echo do_shortcode('[no_social_share_list]');
						}; ?>						
					</div>					
				</div>
				<div class="post_content"><?php the_content(); ?></div>
			</div>
	</article>	
<?php
		break;
		case "gallery":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<?php if($blog_show_categories == "yes"){?>
					<div class="post_info post_categories">
						<?php qode_post_info(array('category' => $blog_show_categories)); ?>
					</div>
				<?php } ?>
				<h2>
					<?php the_title(); ?>
				</h2>
				<?php if($blog_show_author == "yes"){?>
					<div class="post_info post_author">
						<?php qode_post_info(array('author' => $blog_show_author)); ?>
					</div>
				<?php } ?>
				<div class="post_image">
					<?php get_template_part('templates/blog/parts/post-format-gallery-slider'); ?>
				</div>
				<div class="post_text">
					<div class="post_text_inner">
						<?php
						the_content();
						?>
						<?php if($blog_show_date == "yes" || $blog_show_social_share == "yes"  || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>		
							<div class="post_info post_info_item">
								<?php qode_post_info(array('date' => $blog_show_date, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); 
									if($blog_social_share_type == "dropdown"){
									qode_post_info(array('share' => $blog_show_social_share));			
									}
								?>								
							</div>
						<?php } ?>	
						<?php if(isset($qode_options['blog_single_show_social_share']) && $qode_options['blog_single_show_social_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]');
						}; ?>	
					</div>
				</div>
            </div>
		</article>
<?php
		break;
		case "quote":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_content_holder">
					<div class="post_text<?php echo esc_attr($background_image_html_class); ?>" <?php echo $background_image_html; /* dynamically generated style attr. Note that is escaped on line 61 */ ?>>
                        <div class="post_text_inner">
							<div class="post_title">
								<h3>
                                    <?php echo esc_html(get_post_meta(get_the_ID(), "quote_format", true)); ?>
                                </h3>
								<span class="quote_author">&mdash; <?php the_title(); ?></span>
							</div>
                            <?php if($blog_show_ql_icon_mark == "yes"){ ?>
                                <div class="post_info_quote_mark post_info_item">
                                    <span class="fa fa-quote-right quote_mark"></span>
                                </div>
                            <?php } ?>
							<?php if($blog_show_date == "yes" || $blog_show_social_share == "yes"  || $blog_show_comments == "yes" || $blog_show_like == "yes" || $blog_show_categories == "yes" || $blog_show_author == "yes") { ?>				
							<div class="post_info post_info_item">
								<?php qode_post_info(array('date' => $blog_show_date, 'comments' => $blog_show_comments, 'like' => $blog_show_like, 'author' => $blog_show_author , 'category' => $blog_show_categories));
									if($blog_social_share_type == "dropdown"){
									qode_post_info(array('share' => $blog_show_social_share));			
									}
								?>								
							</div>
						<?php } ?>
							<?php if(isset($qode_options['blog_single_show_social_share']) && $qode_options['blog_single_show_social_share'] == "yes" && $blog_social_share_type == "list") {
								echo do_shortcode('[no_social_share_list]');
							}; ?>
						</div>						
					</div>
					<div class="post_content"><?php the_content(); ?></div>
				</div>
			</article>	
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">				
				<?php if($blog_show_categories == "yes"){?>
				<div class="post_info post_categories">
					<?php qode_post_info(array('category' => $blog_show_categories)); ?>
				</div>
				<?php } ?>
                <h2>
                    <?php the_title(); ?>
                </h2>
				<?php if($blog_show_author == "yes"){?>
					<div class="post_info post_author">
						<?php qode_post_info(array('author' => $blog_show_author)); ?>
					</div>
				<?php } ?>
				<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
                if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
				<?php }} ?>
				<div class="post_text">
					<div class="post_text_inner">
                        <?php
                            the_content();
						?>
						<?php if($blog_show_date == "yes" || $blog_show_social_share == "yes"  || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>		
							<div class="post_info post_info_item">
								<?php qode_post_info(array('date' => $blog_show_date, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); 
									if($blog_social_share_type == "dropdown"){
									qode_post_info(array('share' => $blog_show_social_share));			
									}
								?>								
							</div>
						<?php } ?>	
						<?php if(isset($qode_options['blog_single_show_social_share']) && $qode_options['blog_single_show_social_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]');
						}; ?>		
					</div>
				</div>
			</div>
		</article>	
<?php
}
?>