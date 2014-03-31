<?=get_header()?>

<? if($_POST){


$message = "<h2>Contact form submitted</h2><br>";
foreach($_POST as $field => $value){
  $message .= $field.": ".$value."<br>";
}

$to      = $BuilderEngine->get_option("admin_email");
$subject = 'the subject';
$headers = 'MIME-Version: 1.0' . "\r\n".
    'Content-type: text/html; charset=iso-8859-1' . "\r\n".
    'From: no-reply@'.$_SERVER['HTTP_HOST'] . "\r\n" .
    'Reply-To: no-reply@'.$_SERVER['HTTP_HOST'] . "\r\n" .
    'mailed-by: no-reply@'.$_SERVER['HTTP_HOST'] . "\r\n";

mail($to, $subject, $message, $headers) or die("error");
}?>
<? $BuilderEngine->set_blocks_global(false);?>
  <div class="clearfix"></div>

  <!-- Header ends -->

  <!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2 class="pull-left">
            <?$icon = new IconSelector("theme-be-metro1-page-templated-contact-us-form-page-title-icon-".$page->id, "icon-arrow-right", "float: left; margin-top: 10px; margin-right: 10px;"); $icon->force_class("title-icon"); $icon->set_global(); $icon->show()?>

           <? $block = new Block("theme-be-metro1-page-templated-contact-us-form-page-title-".$page->id,"","float: left");
              $block->set_default('Contact Us');
              $block->show()?>
            </h2>
            <? $block = new Block("theme-be-metro1-page-templated-contact-us-form-page-meta-".$page->id,"pull-right heading-meta");
              $block->set_default('This Is <span class="lightblue">Meta</span>. Write <span class="lightblue">Something</span> Here');
              $block->show()?>

          
        </div>
      </div>
    </div>
  </div>
  <!-- Page heading ends -->
<?  $area = new Area("theme-be-metro1-template-contact-us-content-".$page->id);?>
<?  $area->css("width", "100%"); ?>
<?  $area->set_global(false); ?>
<?  $block = new Block("theme-be-metro1-template-contact-us-".$page->id);
    $area->add_block($block);
    $block->set_default(' 
 <!-- Content starts -->
  <div class="content">
    <div class="container">

      <div class="contact">
                        <div class="row">
                           <div class="span12">
                              <!-- Google maps -->
                              <div class="gmap">
                                 <!-- Google Maps. Replace the below iframe with your Google Maps embed code -->
                                 <iframe height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ie/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=Sean+Mulvoy+Rd,+Galway,+County+Galway&amp;aq=t&amp;sll=53.201733,-9.131381&amp;sspn=1.326075,3.56781&amp;ie=UTF8&amp;geocode=Fe0HLQMdigR2_w&amp;split=0&amp;hq=&amp;hnear=Sean+Mulvoy+Rd,+Galway,+County+Galway&amp;ll=53.282797,-9.042806&amp;spn=0.002585,0.006968&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                              </div>
                              
                           </div>
                        </div>
                        <div class="row">
                           <div class="span6">
                              <div class="cwell">
                                 <!-- Contact form -->
                                    <h3 class="title">Contact Form</h3>
                                    <div class="form">
                                      <!-- Contact form (not working)-->
                                      <form class="form-horizontal" method="post" action="">
                                          <!-- Name -->
                                          <div class="control-group">
                                            <label class="control-label" for="name">Name</label>
                                            <div class="controls">
                                              <input type="text" class="input-medium" id="name" name="name">
                                            </div>
                                          </div>
                                          <!-- Email -->
                                          <div class="control-group">
                                            <label class="control-label" for="email">Email</label>
                                            <div class="controls">
                                              <input type="text" class="input-medium" id="email" name="email">
                                            </div>
                                          </div>
                                          <!-- Website -->
                                          <div class="control-group">
                                            <label class="control-label" for="website">Website</label>
                                            <div class="controls">
                                              <input type="text" class="input-medium" id="website" name="website">
                                            </div>
                                          </div>
                                          <!-- Comment -->
                                          <div class="control-group">
                                            <label class="control-label" for="comment">Comment</label>
                                            <div class="controls">
                                              <textarea class="input-madium" id="comment" rows="3" name="question"></textarea>
                                            </div>
                                          </div>
                                          <!-- Buttons -->
                                          <div class="form-actions">
                                             <!-- Buttons -->
                                            <input type="submit" class="btn btn-inverse" value="Submit">
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                          </div>
                                      </form>
                                    </div>
                                 </div>
                           </div>
                           <div class="span6">
                                 <div class="cwell">
                                    <!-- Address section -->
                                       <h3 class="title">Address</h3>

                                       <div class="address">
                                           <address>
                                              <!-- Company name -->
                                              <h4>BuilderEngine, Inc.</h4>
                                              <!-- Address -->
                                              Digital Highway, Sean Mulvoy Road,<br>
                                              Galway City, Ireland<br>
                                              <!-- Phone number -->
                                              <abbr title="Phone">P:</abbr> (123) 456-7890.
                                           </address>
                                            
                                           <address>
                                              <!-- Name -->
                                              <h4>Full Name</h4>
                                              <!-- Email -->
                                              <a href="mailto:#">first.last@gmail.com</a>
                                           </address>
                                           
                                       </div>
                                 </div>
                           </div>
                        </div>
                        
                     </div> 

    </div>
  </div>
  <!-- Content ends -->
      ');
$area->disable_children_float_left();  
    $area->show();?>
 
<?=get_footer()?>