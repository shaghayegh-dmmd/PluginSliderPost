<?php
/*
Plugin Name:  slider_post
Plugin URI:   https://lyla.marketing
Description:  Carousel style for post. 
Version:      1.0
Author:       dmmd 
Author URI:   https://lyla.marketing
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  slider_post
Domain Path:  /languages
*/


function wpb_demo_shortcode() {
$args = array( 
    'post_type' => 'post',
);  
 
// the query
$the_query = new WP_Query( $args ); 
?>

<?php
ob_start();
?>
 
<div id="primary" class="site_post">
    <div class="test">
<div id="content" role="main" class="slide_post">
    
    
 
<?php if ( $the_query->have_posts() ) : ?>
 
    <!-- pagination here -->
 
    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) :
        $the_query->the_post();
        $post_id = get_the_ID();
        $thumbnail = get_post_meta( $post_id, 'cryptopher_post_meta_box_org_thumb', true);
        $author = get_post_meta( $post_id,
            'cryptopher_post_meta_box_org_author', true);
        
        ?>
        
        <div class="post">
             
             <img loading="lazy" width="150"  src="<?php echo $thumbnail?>" 
                 class="attachment-thumbnail size-thumbnail "
                 alt="" style="
                        vertical-align: middle;
                        width: 190px;
                        height: 90px!important;
                        object-fit: cover;
                        border-radius: 15px!important;
                        ">
             
             <!-- Display the Title as a link to the Post's permalink. -->
             
             <h2>
                 <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"
                    style="
                        -webkit-box-orient: vertical;
                        display: block;
                        display: -webkit-box;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        max-height: 3rem;
                        -webkit-line-clamp: 2;
                        ">
                     <?php the_title(); ?>
                 </a>
             </h2>

             <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
             <div style="
                    font-size: 80%;
                    color: #FFEC8D;
                    width: 100%;
                    ">
                 <a href="<?php the_permalink() ?>" rel="author" style="color: #FFEC8D; width: 100%;">
                        <div style="display: flex; align-items: center;">
                             <img src="https://cryptopher.net/wp-content/uploads/2022/08/author_icon.png"
                                width="12" height="12" style="margin-right: 4px;">
                             <p style="width: 100%; margin-bottom: 0;">
                             <?php echo $author ?>
                             </p>
                         </div>
                        
                     </a>
             </div>
             
 

        </div>
 
    <?php endwhile; ?>
    <!-- end of the loop -->
 
    <!-- pagination here -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>



</div><!-- #content -->
</div>
<div class="arrow">
<div class="left-btn">
        <button class="btn btn-left">
          <img src="https://cryptopher.net/wp-content/uploads/2022/06/Vector.svg"> 
          </button>
      </div>
      <div class="right-btn">
        <button class="btn btn-right"> 
        <img src="https://cryptopher.net/wp-content/uploads/2022/06/Vector2.svg">
        </button>
      </div>
      </div>
</div><!-- #primary -->
<script>
    let slide_post = document.querySelector(".slide_post");
    let posts = document.querySelectorAll(".post");
    let nextBtn = document.querySelector(".btn-right");
    let backBtn = document.querySelector(".btn-left");
    let site_post = document.querySelector(".site_post");
    let test = document.querySelector(".test");
    let counter = 0;
    
    console.log(posts);
    let slideIndex = 0;
    let maxIndex = posts.length;
    
    
    
    nextBtn.addEventListener("click", () => {

    test.scrollLeft = Math.max(0, (Math.floor((test.scrollLeft) / 200) -1)* 200);


    })
    
    
    backBtn.addEventListener("click", () => {

    test.scrollLeft = Math.ceil((test.scrollLeft + 1) / 200) * 200; 
  
})

  test.addEventListener('wheel', (event) => {
    event.preventDefault();
  
    test.scrollBy({
      left: event.deltaY < 0 ? -50 : 60,
    });
  });
</script>

<?php
$xml = ob_get_clean();
return $xml;

}
// register shortcode
add_shortcode('greeting', 'wpb_demo_shortcode');
?>






<?php

function wpb_coins_list() {
$args = array( 
    'post_type' => 'coins',
);  
 
// the query
$the_query = new WP_Query( $args ); 
?>

<?php
ob_start();
?>
 
<div id="primary_coins" class="site_post_coin">
    <div class="test_coin">
<div id="content_coin" role="main" class="slide_post_coin">
    
    
 
<?php if ( $the_query->have_posts() ) : ?>
 
    <!-- pagination here -->
 
    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
        <div class="post_coin">
 <div class="post_image_coin"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
     <?php the_post_thumbnail('thumbnail'); ?>
     </a>
 </div>
 <!-- Display the Title as a link to the Post's permalink. -->
 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
 

 </div>
 
    <?php endwhile; ?>
    <!-- end of the loop -->
 
    <!-- pagination here -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>



</div><!-- #content -->
</div>
<div class="arrow_coin">
<div class="left-btn_coin">
        <button class="btn btn-left_coin">
          <img src="https://cryptopher.net/wp-content/uploads/2022/06/Vector.svg"> 
          </button>
      </div>
      <div class="right-btn_coin">
        <button class="btn btn-right_coin"> 
        <img src="https://cryptopher.net/wp-content/uploads/2022/06/Vector2.svg">
        </button>
      </div>
      </div>
</div><!-- #primary -->
<script>
    let slide_post_coin = document.querySelector(".slide_post_coin");
    let posts_coin = document.querySelectorAll(".post_coin");
    let nextBtn_coin = document.querySelector(".btn-right_coin");
    let backBtn_coin = document.querySelector(".btn-left_coin");
    let site_post_coin = document.querySelector(".site_post_coin");
    let test_coin = document.querySelector(".test_coin");
    let counter_coin = 0;
    

    let slideIndex_coin = 0;
    let maxIndex_coin = posts_coin.length;
    
    
    
    nextBtn_coin.addEventListener("click", () => {

    test_coin.scrollLeft = Math.max(0, (Math.floor((test_coin.scrollLeft) / 200) -1)* 200);


    })
    
    
    backBtn_coin.addEventListener("click", () => {

    test_coin.scrollLeft = Math.ceil((test_coin.scrollLeft + 1) / 200) * 200; 
  
})

  test_coin.addEventListener('wheel', (event) => {
    event.preventDefault();
  
    test_coin.scrollBy({
      left: event.deltaY < 0 ? -50 : 60,
    });
  });
</script>

<?php
$xml = ob_get_clean();
return $xml;

}
// register shortcode
add_shortcode('coins_list', 'wpb_coins_list');
?>



