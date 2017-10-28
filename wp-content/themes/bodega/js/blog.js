var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

	fitAudio();
});

$j(window).load(function() {
	"use strict";

	initBlog();
	initBlogMasonryFullWidth();
});

$j(window).resize(function() {
	fitAudio();
	initBlog();
	initBlogMasonryFullWidth();
});

/*
 **	Init audio player for blog layout
 */
function fitAudio(){
	"use strict";

	$j('audio.blog_audio').mediaelementplayer({
		audioWidth: '100%'
	});
}

/*
 **	Init masonry layout for blog template
 */
function initBlog(){
    /*jshint validthis: true */
	"use strict";

	if($j('.blog_holder.masonry').length){
		var width_blog = $j(this).closest('.container_inner').width();
		if($j('.blog_holder.masonry').closest(".column_inner").length) {
			width_blog = $j('.blog_holder.masonry').closest(".column_inner").width();
		}
		$j('.blog_holder.masonry').width(width_blog);
		var $container = $j('.blog_holder.masonry');
		var $cols = 3;

		if($container.width() < 420) {
			$cols = 1;
		} else if($container.width() <= 805) {
			$cols = 2;
		}

		$container.isotope({
			itemSelector: 'article',
			resizable: false,
			masonry: { columnWidth: $j('.blog_holder.masonry').width() / $cols }
		});

		$j('.filter').click(function(){
			var selector = $j(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});

		if( $container.hasClass('masonry_infinite_scroll')){
			$container.infinitescroll({
					navSelector  : '.blog_infinite_scroll_button span',
					nextSelector : '.blog_infinite_scroll_button span a',
					itemSelector : 'article',
					loading: {
						finishedMsg: finished_text,
						msgText  : loading_text
					}
				},
				// call Isotope as a callback
				function( newElements ) {
					$container.isotope( 'appended', $j( newElements ) );
					fitVideo();
					fitAudio();
					initFlexSlider();
					setTimeout(function(){
						$j('.blog_holder.masonry').isotope( 'layout');
					},400);
				}
			);
		}else if($container.hasClass('masonry_load_more')){

			var i = 1;
			$j('.blog_load_more_button a').on('click', function(e)  {
				e.preventDefault();

				var link = $j(this).attr('href');
				var $content = '.masonry_load_more';
				var $anchor = '.blog_load_more_button a';
				var $next_href = $j($anchor).attr('href');
				$j.get(link+'', function(data){
					var $new_content = $j($content, data).wrapInner('').html();
					$next_href = $j($anchor, data).attr('href');
					$container.append( $j( $new_content) ).isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
					fitVideo();
					fitAudio();
					initFlexSlider();
					setTimeout(function(){
						$j('.blog_holder.masonry').isotope( 'layout');
					},400);
					if($j('.blog_load_more_button span').data('rel') > i) {
						$j('.blog_load_more_button a').attr('href', $next_href); // Change the next URL
					} else {
						$j('.blog_load_more_button').remove();
					}
				});
				i++;
			});
		}

		$j(window).resize(function(){
			if($container.width() < 420) {
				$cols = 1;
			} else if($container.width() <= 785) {
				$cols = 2;
			} else {
				$cols = 3;
			}
		});

		$j('.blog_holder.masonry, .blog_load_more_button_holder').animate({opacity: "1"}, 400, function(){
			$j('.blog_holder.masonry').isotope( 'layout');
		});
	}
}

/*
 **	Init full width masonry layout for blog template
 */
function initBlogMasonryFullWidth(){
	"use strict";

	if($j('.masonry_full_width').length){
		var width_blog = $j('.full_width_inner').width();

		$j('.masonry_full_width').width(width_blog);
		var $container = $j('.masonry_full_width');
		var $cols = 5;

		if($container.width() < 480) {
			$cols = 1;
		} else if($container.width() <= 703) {
			$cols = 2;
		} else if($container.width() <= 920) {
			$cols = 3;
		} else if($container.width() <= 1320) {
			$cols = 4;
		}
		$j('.filter').click(function(){
			var selector = $j(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});
		if( $container.hasClass('masonry_infinite_scroll')){
			$container.infinitescroll({
					navSelector  : '.blog_infinite_scroll_button span',
					nextSelector : '.blog_infinite_scroll_button span a',
					itemSelector : 'article',
					loading: {
						finishedMsg: finished_text,
						msgText  : loading_text
					}
				},
				// call Isotope as a callback
				function( newElements ) {
					$container.isotope( 'appended', $j( newElements ) );
					fitVideo();
					fitAudio();
					initFlexSlider();
					setTimeout(function(){
						$j('.blog_holder.masonry_full_width').isotope( 'layout');
					},400);
				}
			);
		}else if($container.hasClass('masonry_load_more')){


			var i = 1;
			$j('.blog_load_more_button a').on('click', function(e)  {
				e.preventDefault();

				var link = $j(this).attr('href');
				var $content = '.masonry_load_more';
				var $anchor = '.blog_load_more_button a';
				var $next_href = $j($anchor).attr('href');
				$j.get(link+'', function(data){
					var $new_content = $j($content, data).wrapInner('').html();
					$next_href = $j($anchor, data).attr('href');
					$container.append( $j( $new_content) ).isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
					fitVideo();
					fitAudio();
					initFlexSlider();
					setTimeout(function(){
						$j('.blog_holder.masonry_full_width').isotope( 'layout');
					},400);
					if($j('.blog_load_more_button span').data('rel') > i) {
						$j('.blog_load_more_button a').attr('href', $next_href); // Change the next URL
					} else {
						$j('.blog_load_more_button').remove();
					}
				});
				i++;
			});
		}
		$container.isotope({
			itemSelector: 'article',
			resizable: false,
			masonry: { columnWidth: $j('.masonry_full_width').width() / $cols }
		});

		$j(window).resize(function(){
			if($container.width() < 480) {
				$cols = 1;
			} else if($container.width() <= 703) {
				$cols = 2;
			} else if($container.width() <= 920) {
				$cols = 3;
			} else if($container.width() <= 1320) {
				$cols = 4;
			} else {
				$cols = 5;
			}
		});

		$j('.masonry_full_width, .blog_load_more_button_holder').animate({opacity: "1"}, 400, function(){
			$j('.blog_holder.masonry_full_width').isotope( 'layout');
		});
	}
}

