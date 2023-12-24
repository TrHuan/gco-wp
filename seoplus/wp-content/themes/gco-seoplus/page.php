<?php
/**
 * Page Default
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header();

global $post;
$page_slug = $post->post_name;

?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb.php'); ?>

<main class="main-site main-page main-<?php echo $page_slug; ?>">
    <div class="main-container">
        <div class="main-content">

            <?php if (have_posts()) { ?>
                <?php while (have_posts()) { the_post(); ?>

                    <?php if( have_rows('main') ): ?>
                        <?php while( have_rows('main') ): the_row(); ?>
                            
                            <?php get_template_part('templates/addons/main', ''); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php } ?>
            <?php } ?>
            
			
<!-- Code hiện coupon đếm ngược -->									
<div class="get-coupon-box">	
	<div class="get-coupon"  onclick="myFunction()" id="foo" ><span id="label"></span><span id="countdowntimer"> </span><span id="button_text">Bấm vào đây để lấy mã giải nén</span></div>
</div>
									
<script type="text/javascript">
	
	function myFunction() {
		
		var timeleft = 30;

		document.getElementById("button_text").innerHTML = "";
		document.getElementById("label").innerHTML = "Time: ";
		
  //added this next 4 lines for the link
  var a = document.createElement('a');
 // var link = document.createTextNode("https://www.youtube.com/watch?v=26WpGvLpFzw");
  // a.appendChild(link);
  // a.href = "https://www.youtube.com/watch?v=26WpGvLpFzw";

  var downloadTimer = setInterval(function() {
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if (timeleft <= 0) {
      clearInterval(downloadTimer);

      document.getElementById("foo").innerHTML = "Mã của bạn là: 0868913668";
      //added this part for the delay
      setTimeout(function() {
      //  document.getElementById("foo").innerHTML = "";
		  
        // document.getElementById("foo").appendChild(a);
      }, 5000);
    }
  }, 1000);	
	}
</script>				
			
			
			
        </div>
    </div>
</main>

<?php get_footer(); ?>
