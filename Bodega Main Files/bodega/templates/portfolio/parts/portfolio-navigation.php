<?php
global $qode_options;

$enable_navigation = true;
if (isset($qode_options['portfolio_hide_pagination']) && $qode_options['portfolio_hide_pagination'] == "yes"){
    $enable_navigation = false;
}

$navigation_through_category = false;
if (isset($qode_options['portfolio_navigation_through_same_category']) && $qode_options['portfolio_navigation_through_same_category'] == "yes")
    $navigation_through_category = true;
?>
<?php if($enable_navigation){ ?>
    <div class="portfolio_navigation">
        <div class="portfolio_navigation_inner">
            <?php if(get_previous_post() != ""){ ?>
                <div class="portfolio_prev">
                    <?php
                    if($navigation_through_category){
                        previous_post_link('%link','<i class="fa fa-angle-left"></i></span>', true,'','portfolio_category');
                    } else {
                        previous_post_link('%link','<i class="fa fa-angle-left"></i></span>');
                    }
                    ?>
                </div> <!-- close div.portfolio_prev -->
            <?php } ?>
            <?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != "") { ?>
                <div class="portfolio_button">
                    <a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="fa fa-th"></i></a>
                </div> <!-- close div.portfolio_button -->
            <?php } ?>
            <?php if(get_next_post() != ""){ ?>
                <div class="portfolio_next">
                    <?php
                    if($navigation_through_category){
                        next_post_link('%link','<i class="fa fa-angle-right"></i>', true,'','portfolio_category');
                    } else {
                        next_post_link('%link','<i class="fa fa-angle-right"></i>');
                    }
                    ?>
                </div> <!-- close div.portfolio_next -->
            <?php } ?>
        </div>
    </div> <!-- close div.portfolio_navigation -->
<?php } ?>	