<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and Page SEO -->
  <title>BuilderEngine CMS Open Source & Enterprise. PHP Professional Content Management Platform and Website Builder</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="BuilderEngine CMS is an next generation smart Content Management System and Website Builder.">
  <meta name="keywords" content="BuilderEngine, Content Management System, Website Builder, CMS Software, Enterprise, Builders, Designers, Epic">
  <meta name="author" content="BuilderEngine">

<script>
var icon_file = '<?=get_theme_path()?>' + "style/font-awesome.css";
</script>
  <?=$BuilderEngine->integrate_builderengine_styles()?>
  <!-- Stylesheets -->
  <!-- Bootstrap -->
  <link href="<?=get_theme_path()?>style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->

  <link rel="stylesheet" href="<?=get_theme_path()?>style/font-awesome.css">
  <!-- Navigation menu -->
  
  <link rel="stylesheet" href="<?=get_theme_path()?>style/ddlevelsmenu-base.css">
  <link rel="stylesheet" href="<?=get_theme_path()?>style/ddlevelsmenu-topbar.css">
  <!-- cSlider -->
  <link rel="stylesheet" href="<?=get_theme_path()?>style/slider.css">
  <!-- PrettyPhoto -->
  <link rel="stylesheet" href="<?=get_theme_path()?>style/prettyPhoto.css">
  <!-- Custom style -->

  <link href="<?=get_theme_path()?>style/style.css" rel="stylesheet">
  <!-- Responsive Bootstrap -->
  <link href="<?=get_theme_path()?>style/bootstrap-responsive.css" rel="stylesheet">
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=get_theme_path()?>img/favicon/favicon.png">

</head>

<body style="background-color: <?=$BuilderEngine->get_option("website_bg_color");?> !important;">
  <? $BuilderEngine->set_blocks_global(true);?>
<? if($user->is_member_of("Administrators") || $user->is_member_of("Frontend Editor") || $user->is_member_of("Frontend Manager") ): ?>
        <div class="be-navbar navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="brand" href="#">BuilderEngine</a>
              <div class="nav-collapse collapse">
                <ul class="nav navbar-nav">
                
                    <li class="active"><a href="#" id='edit-button'>Edit</a></li>
                    <li><a href="#" id='resize-button'>Resize</a></li>
                    <li><a href="#" id='move-button'>Move</a></li>
                    <li><a href="#" id='style-button'>Style</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Blocks <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#" id="add-block-button">Add</a></li>
                        <li><a href="#" id="copy-block-button">Copy</a></li>
                        <li class="disabled"><a href="#" id="paste-block-button">Paste</a></li>
                        <li><a href="#" id="delete-block-button">Delete</a></li>
                      </ul>
                    </li>
                    <?if($user->is_member_of("Frontend Manager")):?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Versions <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#" id='page-versions-button'>Page Versions</a></li>
                        <li><a href="#" id='layout-versions-button'>Global Versions</a></li>
                      </ul>
                    </li>


                    <?endif;?>

                </ul>

                    <? if($versions->get_pending_page_version_id(get_page_path()) || $versions->get_pending_page_version_id("layout")):?>
                    <button id="publish-button" class="btn btn-primary pull-right" page="<?=get_page_path()?>">Publish</button>
                    <?else:?>
                    <button id="publish-button" class="btn btn-primary disabled pull-right" page="<?=get_page_path()?>">This page is published</button>
                    <?endif;?>
                    <a href="/admin"><span class="btn btn-primary pull-right" style="margin-right:15px">Admin CP</span></a>
              </div><!--/.nav-collapse -->
            </div>
          </div>
        </div>
        <? endif; ?>
  <!-- Sliding panel starts-->

  <div class="slidepanel">
    <div class="container">
      <div class="row">
        <div class="span8">
          <div class="spara"> 
            <!-- Contact details -->
            <? $area = new Area("theme-be-metro1-header-social");?>
            <? $area->set_global(true); ?>
            <? $block = new Block("theme-be-metro1-header-social-email", "spara","float: left;"); ?>
            <? $icon = new IconSelector("theme-be-metro1-header-social-email-icon", "icon-envelope-alt","color: #52b9e9;float: left;margin-top: 12px;margin-right: 3px;margin-left: 8px;");?>
            <? $area->add_block($icon);?>
            <? $area->add_block($block);?>
            <? $block->set_default("
            <p> info@builderengine.com</p>");?>

            <? $block = new Block("theme-be-metro1-header-social-twitter", "spara","float: left;"); ?>
            <? $icon = new IconSelector("theme-be-metro1-header-social-twitter-icon", "icon-twitter","color: #52b9e9;float: left;margin-top: 12px;margin-right: 3px;margin-left: 8px;");?>
            <? $area->add_block($icon);?>
            <? $area->add_block($block);?>
            <? $block->set_default("
            <p> @builderengine</p>");?>

            <? $block = new Block("theme-be-metro1-header-social-desktop", "spara","float: left;"); ?>
            <? $icon = new IconSelector("theme-be-metro1-header-social-desktop-icon", "icon-desktop","color: #52b9e9;float: left;margin-top: 12px;margin-right: 3px;margin-left: 8px;");?>
            <? $area->add_block($icon);?>
            <? $area->add_block($block);?>
            <? $block->set_default("
            <p> 123-456-7890</p>");?>


            
            <?$area->show();?>
          </div>
        </div>
        <? $block = new Block("theme-be-metro1-header-social-share", "span4"); ?>
        <? $block->set_global(true); ?>
        <? $block->set_default('

            <div class="social">
              <!-- Social media icons -->
                      <a href="https://www.facebook.com/BuilderEngine" class="bblue"><img src="'.get_theme_path().'img/icons/fb.png"></a>
                      <a href="#" class="bred"><img src="'.get_theme_path().'img/icons/g_plus.png"></a> 
                      <a href="https://twitter.com/BuilderEngine" class="blightblue"><img src="'.get_theme_path().'img/icons/twitter.png"></a>
                      <a href="#" class="bviolet"><img src="'.get_theme_path().'img/icons/linkedin.png"></a>
                      <a href="#" class="borange"><img src="'.get_theme_path().'img/icons/rss.png"></a>
            </div>

        ');?>
        <? $block->show();?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <!-- Sliding panel ends-->

  <!-- Header starts -->

  <header>
    <div class="container">
      <div id="virtual-block-holder"></div>
      <div class="row">

        <div class="span3">

          <!-- Logo starts -->

          <div class="logo">
            <div class="logo-image">
              <!-- Image link -->
              <a href="/"> <?$icon = new IconSelector("theme-metro1-header-site-icon", "icon-laptop "); $icon->show()?></a>
            </div>
            
            <div class="logo-text">
              <? $block = new Block("theme-be-metro1-header-site-name"); ?>
            <? $block->set_default('
              <h1><a href="index.php">Your<span class="lightblue">Website</span></a></h1>
              <div class="logo-meta">By BuilderEngine</div>
              ');?>
            <? $block->show(); ?>
            </div>
            

            <div class="clearfix"></div>
          </div>

          <!-- Logo ends -->

        </div>

        <div class="span9">

          <!-- Navbar starts -->

          <div <?$styler = new Styler("theme_be_metro1_main_navbar_holder", "navi pull-right"); $styler->show();?> >
            <div id="ddtopmenubar" class="mattblackmenu">
              <!-- Main navigation -->
              <!-- Use the background color class in anchor tag for colorful menu -->
              <ul>
            <?foreach(get_links() as $link): ?>
            <? if(!$user->is_member_of_any($link->groups))
                continue;
                    

                ?>
                <?if(count($link->childs) > 0):?>
                  <li><a href="<?=$link->target?>" rel="ddsubmenu2" <?$bg = new Background_Selector("theme-be-metro1-main-nav-link-bg-".$link->id, "bblack"); $bg->show();?> > <?$icon = new IconSelector("theme-metro1-mainmenu-navbar-".$link->id, "icon-home"); $icon->show()?> <?=$link->name?></a>
                    
                    <ul id="ddsubmenu2" class="ddsubmenustyle">
                      <?foreach($link->childs as $sub_link): ?>
                      <li><a href="<?=$sub_link->target?>" class="bblack">  <?=$sub_link->name?></a></li>

                      <?endforeach;?>
                      </ul>
                      <?else:?>
                      <li><a href="<?=$link->target?>" class="bblack" <?$bg = new Background_Selector("theme-be-metro1-main-nav-link-bg".$link->id, "bblack"); $bg->show();?>> <?$icon = new IconSelector("theme-metro1-mainmenu-navbar-".$link->id, "icon-home"); $icon->show()?> <?=$link->name?></a>
                    
                    <?endif;?>
                  
                  </li>

            <?endforeach;?>
                

              </ul>
            </div>
          </div>

          <div class="navis"></div>

          <!-- Navbar ends -->

          <div class="clearfix"></div>

        </div>

      </div>
    </div>
  </header>