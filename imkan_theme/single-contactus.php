<?php
/*
Single Post Template: contactus
Description: This part is optional, but helpful for describing the Post Template
*/


get_header(); 


IMKAN::get_slider();

?>

    <section id="content">

<div class="row">
  <div class="small-12 medium-12 large-12 columns">
      <h1>Contact us</h1>
  </div>
</div>

<div class="row">
  

  <div class="small-12 medium-4 large-4 columns">

<?php
$arg = array( 'numberposts' => 3 ,'category_name' => 'staticpages', 'orderby' => id, 'order' => 'ASC' );
		 $posts = get_posts( $arg );
		 echo $posts[1]->post_content
?>
      
      <!--<h3>Join Our Facebook Community</h3> 
      <img src="img/facebook.jpg" />  -->
  </div>

  <div class="small-12 medium-8 large-8 columns">
  	<?php
         
		 echo $posts[2]->post_content;
       ?>
       <input id="code" name="code" type="hidden" value="<?= $session['code'] ?>" />
       <button>Submit</button>
      </form>
  </div>

</div>

    </section>
<?php

get_footer(); 

?>