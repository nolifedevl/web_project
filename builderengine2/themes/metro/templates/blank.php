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

            <?$icon = new IconSelector("theme-be-metro1-page-templated-clients-page-title-icon-".$page->id, "icon-arrow-right", "float: left; margin-top: 10px; margin-right: 10px;"); $icon->force_class("title-icon"); $icon->set_global(); $icon->show()?>
<h2 class="pull-left">
           <? $block = new Block("theme-be-metro1-page-templated-clientspage-title-".$page->id,"","float: left");
              $block->set_default('Blank Page Title');
              $block->show()?>
            </h2>
            <? $block = new Block("theme-be-metro1-page-templated-clients-page-meta-".$page->id,"pull-right heading-meta");
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

      <div class="row">
<?  $area = new Area("theme-be-metro1-template-blank-content-".$page->id);?>
<?  $area->css("width", "100%"); ?>
<?  $area->set_global(false); ?>
<?  $block = new Block("theme-be-metro1-template-blank-".$page->id, "span12");
    $area->add_block($block);
    $block->set_default(' Put your page content here
                        ');
$area->disable_children_float_left();  
    $area->show();?>



      </div>

    </div>
  </div>
  <!-- Content ends -->

<?=get_footer();?>