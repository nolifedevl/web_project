<?=get_header();?>

  <div class="clearfix"></div>

  <!-- Header ends -->

  <!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">
 <?$icon = new IconSelector("theme-be-metro1-page-heading-title-icon-".get_page_path(), "icon-arrow-right", "float: left; margin-top: 10px; margin-right: 10px;"); $icon->set_global(true);$icon->force_class("title-icon"); $icon->set_global(); $icon->show()?>
<h2 class="pull-left">
           <? $block = new Block("theme-be-metro1-page-heading-title-".get_page_path(),"","float: left");
              $block->set_global(true);
              $block->set_default('Page Title');
              $block->is_ok_with_expand();
              $block->show()?>
            </h2>
            <? $block = new Block("theme-be-metro1-page-templated-contact-us-form-page-meta-".get_page_path(),"pull-right heading-meta");
                $block->set_global(true);
                $block->is_ok_with_expand();
              $block->set_default('This Is <span class="lightblue">Meta</span>. Write <span class="lightblue">Something</span> Here');
              $block->show()?>
                      </div>
      </div>
    </div>
  </div>
  <!-- Page heading ends -->

  <!-- Content starts -->
  <div class="content">
    <div class="container">
      <?=$contents?>
  
    </div>
  </div>
  <!-- Content ends -->
  <?=get_footer();?>