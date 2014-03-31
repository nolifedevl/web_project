

<!-- Footer -->

<!-- Below area is for Testimonial -->
<div class="foot bblack">
  <div class="container">
    <div class="row">
      <div class="span12">
          
          <!-- User icon -->
          
          <? $block = new Block("theme-be-metro1-footer-quote-text");$block->set_default('<p><em>"BuilderEngine Content Management System Version 2, HTML5 enhanced and powering amazing new websites for <br />developers, designers, entrepreneurs & enterprises."</em></p>
'); $block->show()?>
        
      </div>
    </div>
  </div>
</div>  

<footer>
  <div class="container">
    <div class="row">


      <div class="widgets">
        <? $BuilderEngine->set_blocks_global(true);?>

        <div <?$styler = new Styler("theme-be-metro1-footer-contact-holder", "span3");$styler->css("width", "266px");$styler->show()?>>
          <div class="fwidget">
            
            <h4><? $block = new Block("theme-be-metro1-footer-contact-title");$block->set_default('Contact'); $block->show()?></h4>

                  
            <? $block = new Block("theme-be-metro1-footer-contact-line1");$block->set_default('<p>Nullam justo nunc, dignissim at convallis posuere, sodales eu orci. </p>'); $block->show()?>
                  <hr style="clear: both" />
                  <?$icon = new IconSelector("theme-metro1-footer-address-line1-icon", "icon-home ", "margin-top: 5px; margin-right: 5px; float: left"); $icon->show()?>&nbsp; <? $block = new Block("theme-be-metro1-footer-contact-address-line1","", "float: left");$block->set_default('123, Mountain View, CA, 54321.'); $block->show()?>
                  <hr style="clear: both" />
                  <?$icon = new IconSelector("theme-metro1-footer-address-line2-icon", "icon-phone ", "margin-top: 5px; margin-right: 5px; float: left"); $icon->show()?> &nbsp; <? $block = new Block("theme-be-metro1-footer-contact-address-line2","", "float: left");$block->set_default('+239-3823-3434'); $block->show()?>
                  <hr style="clear: both" />
                  <?$icon = new IconSelector("theme-metro1-footer-address-line3-icon", "icon-envelope-alt ", "margin-top: 5px; margin-right: 5px; float: left"); $icon->show()?> &nbsp; <? $block = new Block("theme-be-metro1-footer-contact-address-line3","", "float: left");$block->set_default('<a href="mailto:info@builderengine.com">info@builderengine.com</a>'); $block->show()?>
                  <hr style="clear: both" />
                    

          </div>
        </div>
        
        <? $block = new Block("theme-be-metro1-footer-categories", "span3"); ?>
        <? $block->set_default('
        <div  class="span3">
          <div class="fwidget">
            <h4>Categories</h4>
            <ul>
              <li><a href="#">Condimentum - Condimentum gravida</a></li>
              <li><a href="#">Etiam at - Condimentum gravida</a></li>
              <li><a href="#">Fusce vel - Condimentum gravida</a></li>
              <li><a href="#">Vivamus - Condimentum gravida</a></li>
              <li><a href="#">Pellentesque - Condimentum gravida</a></li>
              <li><a href="#">Fusce vel - Condimentum gravida</a></li>
            </ul>
          </div>
        </div> ');?>       
        <? $block->show(); ?>

        <? $block = new Block("theme-be-metro1-footer-subscribe", "span3"); ?>
        <? $block->set_default('
        <div  class="span3">
          <div class="fwidget">
            
            <h4>Subscribe</h4>
            <p>Duis leo risus, condimentum ut posuere ac, vehicula luctus nunc.  Quisque rhoncus, a sodales enim arcu quis turpis.</p>
            <p>Enter you email to Subscribe</p>


          </div>
        </div>');?>
        <? $block->show(); ?>

        <? $block = new Block("theme-be-metro1-footer-recent", "span3"); ?>
        <? $block->set_default('
        <div class="span3">
          <div class="fwidget">
            <h4>Recent News</h4>
            <ul>
              <li><a href="#">Sed eu leo orci, condimentum gravida metus</a></li>
              <li><a href="#">Etiam at nulla ipsum, in rhoncus purus</a></li>
              <li><a href="#">Fusce vel magna faucibus felis dapibus facilisis</a></li>
              <li><a href="#">Vivamus scelerisque dui in massa</a></li>
              <li><a href="#">Pellentesque eget adipiscing dui semper</a></li>
            </ul>
          </div>
        </div>');?>
        <? $block->show(); ?>

      </div>

      <div class="span12">
          <div class="copy">
                <?$block = new Block("theme-be-metro-1-footer-links","","float: left");
                $block->set_global(true);
                $block->set_default('<p>Copyright &copy; <a href="index.php">Your Site</a> - <a href="index.php">Home</a> | <a href="#">About Us</a> | <a href="#">FAQ</a> | <a href="#">Contact Us</a>');
                $block->show();?><div style="float: left"> -  Powered by: <a href="http://www.builderengine.com">BuilderEngine</a> -- <a href="/admin">Admin CP</a></p></div>
          </div>
      </div>

    </div>
  <div class="clearfix"></div>
  </div>
</footer> 

        <?=$BuilderEngine->integrate_builderengine_js();?>
<!-- JS -->
<script src="<?=get_theme_path()?>js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="<?=get_theme_path()?>js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="<?=get_theme_path()?>js/jquery.isotope.js"></script> <!-- isotope -->
<script src="<?=get_theme_path()?>js/ddlevelsmenu.js"></script> <!-- Navigation menu -->
<script src="<?=get_theme_path()?>js/jquery.cslider.js"></script> <!-- jQuery cSlider -->
<script src="<?=get_theme_path()?>js/modernizr.custom.28468.js"></script> <!-- Extra script for cslider -->

<script src="<?=get_theme_path()?>js/filter.js"></script> <!-- Support -->
<script src="<?=get_theme_path()?>js/custom.js"></script> <!-- Custom JS -->

</body>
</html>