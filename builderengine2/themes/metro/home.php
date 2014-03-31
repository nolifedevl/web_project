<?=get_header();?>

  <div class="clearfix"></div>
<style>
.da-slide {
  height: 300px !important;
}
</style>
  <!-- Header ends -->
<? $BuilderEngine->set_blocks_global(false);?>
<!-- Slider starts -->
  <div class="parallax-slider">
          <!-- Slider (Parallax Slider) -->            
            
              <!-- Each slide should be enclosed inside "da-slide" class -->
              <!-- Slide starts -->
              <? $area = new Area("theme-be-metro1-home-slider", "da-slider"); ?>
              <? $block = new Block("theme-be-metro1-home-slider-slide-1", "da-slide");?>

              <? $block->set_default('
              <div class="da-slide">

                  <p class="bviolet">
                    <!-- Heading -->
                    <span class="das-head">Your New Best Friend</span><br />
                    <!-- Para -->
                    BuilderEngine is built with Graphical User Interfaces for creating various content blocks, full theme creation editors and control layouts with drag & drop.
                    <br />
                    <!-- Link -->
                    <a class="das-link btn" href="">Read More <i class="icon-double-angle-right"></i></a>
                  </p>
                  <!-- Image -->
                  <div class="da-img"><img src="'.get_theme_path().'img/parallax/1.png" alt="image01" /></div>

              </div>
              <!-- Slide ends -->
              ');?>
              <? $area->add_block($block); ?>

              <? $block = new Block("theme-be-metro1-home-slider-slide-2", "da-slide");?>
              <? $block->set_default('
              <div class="da-slide">

                  <p class="bblue">
                    <!-- Heading -->
                    <span class="das-head">MVC Framework</span><br />
                    <!-- Para -->
                    MVC Framework with HTML5 supported Core that gives you an cutting edge platform to build amazing websites for you or your clients.
                    <br />
                    <a class="das-link btn">Read More <i class="icon-double-angle-right"></i></a>
                  </p>
                  <!-- Image -->
                  <div class="da-img"><img src="'.get_theme_path().'img/parallax/2.png" alt="image01" /></div>

              </div>
              ');?>
              <? $area->add_block($block); ?>

              <? $block = new Block("theme-be-metro1-home-slider-slide-3", "da-slide");?>
              <? $block->set_default('
              <div class="da-slide">

                  <p class="bgreen">
                    <!-- Heading -->
                    <span class="das-head">Build Modules</span><br />
                    <!-- Para -->
                    Intelligent Modular Structure that can Create, Clone & Merge Features. Extend modules or build from scratch with Drag & Drop controls.
                    <br />
                    <a class="das-link btn">Read More <i class="icon-double-angle-right"></i></a>
                  </p>
                  <!-- Image -->
                  <div class="da-img"><img src="'.get_theme_path().'img/parallax/3.png" alt="image01" /></div>

              </div>
              ');?>
              <? $area->add_block($block); ?>

              <? $block = new Block("theme-be-metro1-home-slider-slide-4", "da-slide");?>
              <? $block->set_default('
              <div class="da-slide">

                  <p class="bred">
                    <!-- Heading -->
                    <span class="das-head">Create Templates</span><br />
                    <!-- Para -->
                    Import Templates from various sources and extend them with BuilderEngine functions or create your own new templates with the GUI ThemeBuilder.
                    <br />
                    <a class="das-link btn">Read More <i class="icon-double-angle-right"></i></a>
                  </p>
                  <!-- Image -->
                  <div class="da-img"><img src="'.get_theme_path().'img/parallax/4.png" alt="image01" /></div>

              </div>
              
              ');?>
              <? $area->add_block($block); ?>
              <? $block = new Block("theme-be-metro1-home-slider-controls");?>
              <? $block->set_default('
              <nav class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
              </nav>
              ');?>
              <? $area->add_block($block); ?>
              <? $area->disable_block_wrapper(); ?>
              <? $area->show(); ?>
              
              
              

  </div>
<!-- Slider ends -->



<!-- Hero starts -->

  <div <?$styler = new Styler("theme-metro-home-welcome-holder","hero");$styler->show()?>>
    <div class="container">
      

      <div class="row">
        <div class="span12">

          <div class="hero-left">
            <?$icon = new IconSelector("theme-metro1-home-welcome-icon", "icon-desktop"); $icon->show()?>
          </div>
              <? $block = new Block("theme-metro1-home-welcome-text", "hero-right")?>
                <? $block->set_default("<div class=\"hero-title\">Howdy Dude! <b class=\"lightblue\">Welcome</b> to the most amazing <b class=\"lightblue\">CMS</b> ever to land on your server.</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dictum condimentum magna, vel cursus turpis fermentum vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dictum condimentum magna, vel cursus turpis fermentum vel.</p>
                  ");
                    $block->show();
                    ?>


          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>

<div class="container">
<!-- Hero Ends -->
<? $area = new Area("test")?>
<?  $area->css("width", "100%");
    $area->css("margin-left", "0px"); ?>
<? $area->enable_span12(); ?>
<!-- Big box starts -->
<? $block = new Block("theme-metro1-home-big-boxes", "big-box")?>
<? $area->add_block($block); ?>
<? $block->set_default('

    <div class="container">
      <div class="row">
        <div class="span12">

          <!-- Left box -->
          <div class="big-box-left blightblue">
            <!-- Box content -->
            <div class="box-content">
              <!-- title -->
              <div class="box-title">Discover the powerful<br />world of BuilderEngine</div>
              <!-- Para -->
              <p>GUI Editors for Template Creation, Build your own Modules with Drag & Drop, Experience the MVC lightweight Core.</p>
              <!-- Button -->
              <a href="http://www.builderengine.com/" class="btn btn-inverse">Check It Out</a>
              <br /><br />
              <!-- Links -->
              <div class="box-links">
                <a href="http://www.builderengine.com/">View the CMS Features <i class="icon-double-angle-right"></i></a>
                <a href="http://www.builderengine.com/">Download Now <i class="icon-double-angle-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Center box -->
          <div class="big-box-mid blightblue">
            <!-- Image -->
            <a href="http://www.builderengine.com/"><img src="'.get_theme_path().'img/frontimage2.jpg" alt="" /></a>
          </div>

          <!-- Right box -->
          <div class="big-box-right bblack">
             <div class="box-content">
                <div class="box-title">Builder<span class="lightblue">Engine</span></div>

                <h4>Version</h4>
                2.0.0
                <h4>Language</h4>
                PHP / MySQL
                <h4>License</h4>
                Open Source<br />
                MIT License <br />
                GPL-Compatible
             </div>
          </div>

          <div class="clearfix"></div>

        </div>
      </div>
    </div>  

');  
?>
  <div class="clearfix"></div>

<!-- Big box ends -->

<? $block = new Block("theme-metro1-home-platform", "cta")?>
<? $area->add_block($block); ?>
<? $block->set_default('
<!-- CTA Starts -->

  <div class="container bblue">
    <div class="row">
      <div class="span5">
        <div class="ctas">
          <!-- Title and Para -->
          <h5><i class="icon-arrow-right icon-metroid"></i> Professional CMS Platform </A5>
          <p>BuilderEngine stands out among other content management systems because of the impressive array of functionality, flexibility & designer GUI\'s that is incorporated into its core.</p>
        </div>
      </div>
      <div class="span4">
        <div class="ctas">
          <!-- List -->
          <ul>
            <li>Corporate web portals, Business websites</li>
            <li>Community portal, Social Network websites</li>
            <li>Art, Music and Multimedia websites</li>
          </ul>
        </div>
      </div>
      <div class="span3">
        <div class="ctas">
          <!-- Button -->
          <a href="http://www.builderengine.com/" class="btn btn-inverse btn-large">View Latest Development Tasks & Updates <i class="icon-double-angle-right"></i></a>
          <p>Version 2.0 in Development Cycle</p>
        </div>
      </div>
    </div>
  </div>
');?>

<!-- CTA Ends -->

<? $block = new Block("theme-be-metro1-home", "service-home");
 $area->add_block($block); 
$block->set_default('
  <div class="container">
    <!-- Title -->
    <h3 class="title"><i class="icon-arrow-right title-icon"></i> Service</h3>
    <div class="row">

      <!-- Social -->
      <div class="span3">

        <div class="service-social bblack">
          <!-- Big number -->
          <div class="service-big">1,777,<span class="lightblue">000</span></div>
          <!-- Labels -->
          <div class="label label-important">Customers</div> 
          <div class="label label-info">Business</div> 
          <div class="label label-success">Clients</div>

          <hr />

          <!-- Social media -->
          <div class="service-box bblue">
            <!-- name and followers -->
            <a href="#">Facebook <span class="pull-right">25000</span></a>
          </div>
          <div class="service-box borange">
            <!-- name and followers -->
            <a href="#">Google Plus <span class="pull-right">500</span></a>
          </div>
          <div class="service-box blightblue">
            <!-- name and followers -->
            <a href="#">Twitter <span class="pull-right">25000</span></a>
          </div>
          <div class="service-box bred">
            <!-- name and followers -->
            <a href="#">PInterest <span class="pull-right">15000</span></a>
          </div>
          <div class="service-box borange">
            <!-- name and followers -->
            <a href="#">RSS <span class="pull-right">25000</span></a>
          </div>    

          <div class="clearfix"></div>

        </div>

      </div>

      <!-- Service -->

      <div class="span6 service-list">

          <!--  Service #1 -->
          <!-- Service icon -->
          <div class="service-icon">
            <img src="'.get_theme_path().'img/icons/camera.png" style="width: 45px; height: 45px;">
          </div>

          <div class="service-content">
            <!-- Title -->
            <div class="service-home-meta">something</div>
            <h4>Designed For You</h4>
            <p>Aenean sodales augue ac rhoncus erat hendrerit. Vivamus vel ultricies elit.</p>
          </div>

          <hr />

          <!-- Service #2 -->

          <div class="service-icon">
            <img src="'.get_theme_path().'img/icons/desktop.png" style="width: 45px; height: 45px;">
          </div>

          <div class="service-content">
            <div class="service-home-meta">something</div>
            <h4>This Design is Responsive</h4>
            <p>Aenean sodales augue ac rhoncus erat hendrerit. Vivamus vel ultricies elit.</p>
          </div>

          <hr />   

          <!-- Service #3 -->

          <div class="service-icon">
            <img src="'.get_theme_path().'img/icons/cloud.png" style="width: 45px; height: 45px;">
          </div>

          <div class="service-content">
            <div class="service-home-meta">something</div>
            <h4>Easy To Use CMS</h4>
            <p>Aenean sodales augue ac rhoncus erat hendrerit. Vivamus vel ultricies elit.</p>
          </div>
          
          <hr />

          <!-- Service #4 -->

          <div class="service-icon">
            <img src="'.get_theme_path().'img/icons/user.png" style="width: 45px; height: 45px;">
          </div>

          <div class="service-content">
            <div class="service-home-meta">something</div>
            <h4>Top Notch Support</h4>
            <p>Aenean sodales augue ac rhoncus erat hendrerit. Vivamus vel ultricies elit.</p>
          </div>
          
          <br />


          <div class="clearfix"></div>

      </div>

      <!-- Image -->
      <div class="span3">
        <a href="#" class="service-image"><img src="'.get_theme_path().'img/photos/girl2.png" alt="" /></a>
      </div>

    </div>

    <hr />
    
  </div>
');


 $block = new Block("theme-be-metro1-home-cms-features", "features-one");
$area->add_block($block);
 $block->set_default('
 <div class="container">

    <div class="row">

      <div class="span6">
              <a href="#"><img src="'.get_theme_path().'img/befeaturesscreen1.jpg" alt="" /></a>
            </div>

            <div class="span6">

              <h2>Full <span class="lightblue">GUI</span> Controlled Content Management System.</h2>
              <!-- Meta -->
              <div class="features-meta">
                <i class="icon-desktop lightblue"></i> Templates - 
                <i class="icon-gift lightblue"></i> Content Blocks - 
                <i class="icon-sitemap lightblue"></i> Modules
              </div>
              <p>Graphical User Interfaces (GUI) has been built for every part of the system with drag & drop controls. Build complete templates, common content areas with blocks and even create your own custom modules. </p>
              <a href="#" class="btn btn-danger btn-large">View Features <i class="icon-double-angle-right"></i></a>
            </div>

    </div>
  </div>
  '); 

$block = new Block("theme-be-metro1-home-clients", "clients");
$area->add_block($block);
$block->set_default('        
<!-- Clients starts -->
  
    <div class="container">
            <div class="row">
               <div class="span12">
                     <h3 class="title">Our Friends</h3>
                     <p><i class="icon-quote-left lightblue"></i>Vivamus diam diam, fermentum sed dapibus eget, egestas sed eros. Lorem fermentum ipsum dolor sit amet, ipsum dolor sit amet, consectetur fermentum adipiscing elit.<i class="icon-quote-right lightblue"></i></p>
                     <img src="'.get_theme_path().'img/clients/amazon.png" alt="" />
                     <img src="'.get_theme_path().'img/clients/google.png" alt="" />
                     <img src="'.get_theme_path().'img/clients/twitter.png" alt="" />
                     <img src="'.get_theme_path().'img/clients/facebook.png" alt="" />
                     <img src="'.get_theme_path().'img/clients/skype.png" alt="" />
                     <img src="'.get_theme_path().'img/clients/youtube.png" alt="" />
               </div>
            </div>
    </div>
<!-- Clients ends -->

     ');    
$area->disable_children_float_left();   
$area->show();?>
</div>
<div class="clearfix"></div>
<?=get_footer();?>