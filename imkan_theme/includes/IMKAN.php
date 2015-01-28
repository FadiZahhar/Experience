<?php
/* Developed by Fadi Nicolas Zahhar
* info@fnz.me
* skype: pro-freelancer
* Tel: 961-3-706663
* January 18 2015
* Imkan Class include all the custom made functions for Imkan Group
* */
 class IMKAN {

  public static function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

	public static function get_slider() {

          global $post;
         $arg = array( 'category_name' => 'sub-sliders', 'orderby' => id, 'order' => 'DESC' );
         $posts = get_posts( $arg );
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            $sub_slider .= '<li>
    <img src="'. $large_image_url[0] .'" alt=""/>
    <div class="orbit-caption">
      <h2>'.$post->post_title.'</h2>
      <p>“'.strip_tags($post->post_content).'”</p>
    </div>
  </li>';
         }


        echo ' <section id="slider" class="hide-for-small columns">
      <div class="row">
        <div class="medium-12 large-12 columns">

 <ul class="example-orbit" data-orbit>
  '.$sub_slider.'
</ul>

</div>
      </div>
    </section>';
    }


      public static function get_home_slider() {

          global $post;
         $arg = array( 'category_name' => 'home-slider', 'orderby' => id, 'order' => 'DESC' );
         $posts = get_posts( $arg );
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            $sub_slider .= '<li>
    <img src="'. $large_image_url[0] .'" alt=""/>
    <div class="orbit-caption">
      <h2>'.$post->post_title.'</h2>
      <p>“'.strip_tags($post->post_content).'”</p>
    </div>
  </li>';
         }


        echo ' <section id="slider" class="homeslider hide-for-small columns">
      <div class="row">
        <div class="medium-12 large-12 columns">

 <ul class="example-orbit" data-orbit>
  '.$sub_slider.'
</ul>

</div>
      </div>
    </section>';
    }

    public static function get_home() {

        global $post;
         $arg = array( 'numberposts' => 2, 'category_name' => 'news-room', 'orderby' => id, 'order' => 'DESC' );
         $posts = get_posts( $arg );
         $news = '';
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            $news .= '<li><a href="'.$post->guid.'" >
        <img src="'. $large_image_url[0] .'" />
        <div >
          <h2>'.$post->post_title.'</h2>
          <p>'.substr(strip_tags($post->post_content),0,200).'..</p>
</div></a>
        </li>';
         }

         $partners = get_page_by_path('pratners',OBJECT,'post');

        echo ' <section id="content">



<div class="row">
  <div class="large-8 columns">
  <h1 style="text-align:left">Latest News</h1>
    <ul class="latestnews">
      '.$news.'
     </ul>
</div>

<div class="row">
<div class="large-4 columns">
<h1 style="text-align:left">Partners</h1>
  <div id="partners">
  '. $partners->post_content .'
  </div>


</div>
  </div>

    </section>';
    }


    public static function get_content() {
        global $post;
$slug = explode("/",$_SERVER[REQUEST_URI]);
$slug = $slug[count($slug)-2];
        $post = get_page_by_path($slug,OBJECT,'post');
        $large_image_url = array();
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        if($large_image_url!="") {
        $gal ="";

        if( class_exists( 'kdMultipleFeaturedImages' ) ) {
            if(kd_mfi_get_the_featured_image( 'featured-image-2', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-2', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-3', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-3', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-4', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-4', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-5', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-5', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-6', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-6', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-7', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-7', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-8', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-8', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-9', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-9', 'post' ) .'</div>';
            if(kd_mfi_get_the_featured_image( 'featured-image-10', 'post' ))
            $gal .= '<div>' . kd_mfi_get_the_featured_image( 'featured-image-10', 'post' ) .'</div>';

            $gal = '<div class="gal"><div><img src="' . $large_image_url[0] .'" alt="" title="" /></div>' . $gal . '</div>';
        }

        echo '<section id="content">

<div class="row">
  <div class="large-12 columns">
      <h1>'.$post->post_title.'</h1>
  </div>
</div>

<div class="row">
  <div class="large-7 columns">
      <article>
         '.$post->post_content.'
</article>
  </div>

  <div class="large-5 columns">
';
if($gal!=""){
echo $gal;
}
else {
  echo '<img src="'.$large_image_url[0] .'" alt="" title="" />';
}
 
 echo '  
  </div>
</div>

    </section>';
}
else {
            echo '<section id="content">

<div class="row">
  <div class="large-12 columns">
      <h1>'.$post->post_title.'</h1>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
      <article>
         '.$post->post_content.'
</article>
  </div>

</div>

    </section>';
}
    }

    public static function get_services() {
         global $post;
         $arg = array( 'category_name' => 'services', 'orderby' => id, 'order' => 'ASC' );
         $posts = get_posts( $arg );
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            if($large_image_url!=""){
                $services .= '<li><a href="'.$post->guid.'">
        <img src="'.$large_image_url[0].'" />
        <div >
          <h2>'.$post->post_title.'</h2>
          <p>'.substr(strip_tags($post->post_content),0,300).'..</p>
</div>
        </a></li>';
            }
         }
        echo '    <section id="content">

<div class="row">
  <div class="large-12 columns">
      <h1>Services</h1>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    <ul class="services">

    '.$services.'

    </ul>
</div>

    </section>';
    }

    public static function get_projects() {
                global $post;
         $arg = array( 'category_name' => 'projects', 'orderby' => id, 'order' => 'ASC' );
         $posts = get_posts( $arg );
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

                $projects .= '<li><a href="'.$post->guid.'">
        <img src="'.$large_image_url[0].'" />
        <div >
          <h2>'.$post->post_title.'</h2>
          <p>'.substr(strip_tags($post->post_content),0,300).'..</p>
          <h3>December 6 2015</h3>
          <h4>By Lorem Ipsum</h4>
</div>
        </a></li>
        ';

         }
        echo '<section id="content">

<div class="row">
  <div class="large-12 columns">
      <h1>Projects</h1>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    <ul class="projects">
      '.$projects.'
      </ul>
</div>

    </section>';
    }

    public static function get_partners() {
                global $post;
         $arg = array( 'category_name' => 'our-partners', 'orderby' => id, 'order' => 'ASC' );
         $posts = get_posts( $arg );
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

                $partners .= '<li>
        <img src="'.$large_image_url[0].'" />
        <div >
          <h2>'.$post->post_title.'</h2>
          <p>'.substr(strip_tags($post->post_content),0,300).'..</p>
</div>
        </li>
        ';

         }
        echo '<section id="content">

<div class="row">
  <div class="large-12 columns">
      <h1>Our Partners</h1>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    <ul class="partners">
      '.$partners.'
      </ul>
</div>

    </section>';
    }

    public static function get_news() {
         global $post;
         $arg = array( 'category_name' => 'news-room', 'orderby' => id, 'order' => 'Desc' );
         $posts = get_posts( $arg );
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            if($large_image_url!=""){
                $news .= '<li>
         <div class="date">27 Dec 2014</div>
        <div >
          <h2>'.$post->post_title.'</h2>
          <p>'.substr(strip_tags($post->post_content),0,300).'..</p>
          <h3><a href="'.$post->guid.'">Read More</a></h3>
</div>
        </li>';
            }
         }
        echo '    <section id="content">

<div class="row">
  <div class="large-12 columns">
      <h1>News Room</h1>
  </div>
</div>

<div class="row">


  <div class="large-4 columns">
        <ul class="news">

'.$news.'


      </ul>
  </div>

  <div class="large-8 columns">
      <h2>Lorem ipsum dolor sit amet, consecteur adipicing elit.</h2>
      <img src="'.get_stylesheet_directory_uri().'/img/news.jpg" alt="about us page" title="about us page" width="100%" />
      <article>
         <p>Nam auctor dapibus ante vel facilisis. Cras eget adipiscing nisi. Duis aliquet ligula non risus sollicitudin commodo. Donec ullamcorper lacinia turpis at aliquet. Cras consectetur fermentum erat, in placerat ligula pharetra eget. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam dolor nisi, fermentum at vulputate in, aliquam id justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam et accumsan ante, et consequat neque. Fusce quis molestie eros. </p>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus tincidunt ligula. Curabitur luctus iaculis bibendum. Donec scelerisque eros vel blandit luctus. Aliquam a semper nibh. Morbi pretium commodo ante sit amet congue. Proin nec mollis nulla. Ut commodo magna sed leo dapibus, sit amet imperdiet odio gravida. Quisque rhoncus dui ac odio venenatis, a tempor urna malesuada.</p>
</article>
  </div>

</div>

    </section>';
    }

     public static function get_news_new() {
         global $post;
         $arg = array( 'category_name' => 'news-room', 'orderby' => id, 'order' => 'Desc' );
         $posts = get_posts( $arg );
         $large_image_url = array();
         foreach($posts as $index => $post) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            if($large_image_url!=""){
                $news .= '<div>
                <h2>'.$post->post_title.'</h2>
      <img src="'.$large_image_url[0] .'" alt="about us page" title="'.$post->post_title.'" width="100%" />
      <article>
         <p>'.$post->post_content.'</p>
      </article>
         <!--<div class="date">27 Dec 2014</div>-->
        <div >
          
        
</div>
        </div>';
            }
         }
        echo '    <section id="content">

<div class="row">
  <div class="large-12 columns">
      <h1>News Room</h1>
  </div>
</div>

<div class="row">


  <div class="large-12 columns">
      <div class="news_gallery">
      '.$news.'
      </div>
  </div>



</div>

    </section>';
    }

    public static function get_service_slider() {
      global $post;
      $arg = array( 'category_name' => 'services', 'orderby' => id, 'order' => 'ASC' );
      $posts = get_posts( $arg );
      $large_image_url = array();
      foreach($posts as $index => $post) {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

          $services .= '<div><a href="'.$post->guid.'">
          <img src="'.$large_image_url[0].'" width="74" height="74" />
          <h2>'.$post->post_title.'</h2>
          <p>'.substr(strip_tags($post->post_content),0,300).'..</p>
          </a></div>';
      }
      echo '<section id="services_slider">
<div class="row">
<div class="large-12 columns">
<h1>Available Services</h1>
</div>
</div>
      <div class="row">
      <div class="large-12 columns">
      <div class="slide">
      '.$services.'
    </div>
  </div>
</div>

<div class="row">
<div class="large-12 columns">
<h1 style="padding:0">&nbsp;</h1>
</div>
</div>
</section>
';
    }
}
