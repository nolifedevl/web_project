<?=get_header()?>
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
            <?$icon = new IconSelector("theme-be-metro1-page-templated-process-form-page-title-icon-".$page->id, "icon-arrow-right", "float: left; margin-top: 10px; margin-right: 10px;"); $icon->force_class("title-icon"); $icon->set_global(); $icon->show()?>

           <? $block = new Block("theme-be-metro1-page-templated-process-us-form-page-title-".$page->id,"","float: left");
              $block->set_default('Process');
              $block->is_ok_with_expand();
              $block->show()?>
            </h2>
            <? $block = new Block("theme-be-metro1-page-templated-process-us-form-page-meta-".$page->id,"pull-right heading-meta");
              $block->set_default('This Is <span class="lightblue">Meta</span>. Write <span class="lightblue">Something</span> Here');
              $block->is_ok_with_expand();
              $block->show()?>

          
        </div>
      </div>
    </div>
  </div>
  <!-- Page heading ends -->

  <!-- Content starts -->
  <div class="content">
    <div class="container">
      <div class="row">
   <? $area = new Area("theme-be-metro1-template-process-".$page->id);?>
   <? $area->set_global(false); ?>
   <? $block = new Block("theme-be-metro1-template-process-box1-".$page->id, "span3", "float: left;margin-top:5px;margin-bottom:5px;");
      $area->add_block($block);
      $block->set_default('

      <!-- Step 1 -->
      <!-- Use the class "process-meta" to add step details. Use the class "b-green" or "b-orange" or etc.,. to add background colors -->
      <div class="process-meta bred">Step 1</div>
      <h4>Requirement</h4>
      <p>In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. Sed a interdum mauris.</p>
');

   $block = new Block("theme-be-metro1-template-process-box2-".$page->id, "span3", "float: left;margin-top:5px;margin-bottom:5px;");
   $area->add_block($block);
   $block->set_default('

      <!-- Step 2 -->
      <div class="process-meta blightblue">Step 2</div>
      <h4>PSD Design</h4>
      <p>In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. Sed a interdum mauris.</p>                        
');

   $block = new Block("theme-be-metro1-template-process-box3-".$page->id, "span3", "float: left;margin-top:5px;margin-bottom:5px;");
   $area->add_block($block);
   $block->set_default('

      <!-- Step 3 -->
      <div class="process-meta bviolet">Step 3</div>
      <h4>Coding</h4>
      <p>In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. Sed a interdum mauris.</p>                        
');

   $block = new Block("theme-be-metro1-template-process-box4-".$page->id, "span3", "float: left;margin-top:5px;margin-bottom:5px;");
   $area->add_block($block);
   $block->set_default('

      <!-- Step 4 -->
      <div class="process-meta borange">Step 4</div>
      <h4>Testing</h4>
      <p>In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. Sed a interdum mauris.</p>                        
');


   
     
         $area->show();
   ?>                      
</div> 
    </div>
  </div>
<?=get_footer()?>