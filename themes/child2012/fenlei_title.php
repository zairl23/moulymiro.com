<?php
/*
 * Template Name: Fenlei_Title
 */
?>


<aside class='widget'>
<?php 
//Identify current Post-Category-ID ermitteln
  foreach((get_categories()) as $category)
    {
    	$postcat= $category->cat_ID;
    	$catname =$category->cat_name;
   
?>
<script type='text/javascript'>
  jQuery(function($) {
  $(window).load(function() {

    $("<?php echo '#'.$catname; ?>").click(function(){
        $("<?php echo '.'.$catname; ?>").toggle();
      });

  });
});
</script>
  <ul>
    <li>
		  <button id="<?php echo $catname; ?>" style="background: white;color: #21759b; border: 0;">
			  <?php echo $catname; ?>
		  </button>
		  <div class="<?php echo $catname; ?>" style="display: none">
		  <?php query_posts("cat=$postcat&posts_per_page=-1");
    		while (have_posts()) : the_post(); ?>
    		
          <ul>
        			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            			<?php the_title(); ?></a>
        			</li>
    			</ul>
    		<?php endwhile; ?>
   
	 </div>
	</li>
</ul>
   <?php } ?>
	
	</aside>

  
