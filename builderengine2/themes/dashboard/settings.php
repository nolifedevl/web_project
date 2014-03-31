<?=get_header();?>
                <link href="<?=get_theme_path()?>js/plugins/forms/switch/bootstrapSwitch.css" rel="stylesheet">
                <script src="<?=get_theme_path()?>/js/plugins/forms/uniform/jquery.uniform.min.js"></script>
                <script src="<?=get_theme_path()?>/js/plugins/forms/validation/jquery.validate.js"></script>
                <script src="<?=get_theme_path()?>/js/plugins/forms/select2/select2.js"></script> 
                <script src="<?=get_theme_path()?>/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
                <link href="<?=get_theme_path()?>/js/plugins/forms/select2/select2.css" rel="stylesheet" />
                <link href="<?=get_theme_path()?>js/plugins/forms/spectrum/spectrum.css" rel="stylesheet" /> 

                <script src="<?=get_theme_path()?>js/plugins/forms/spectrum/spectrum.js"></script><!--  Color picker -->

                
                <script>
                $(document).ready(function() {
                    $("#color-picker").spectrum({
                        preferredFormat: "hex6",
                        color: "<?=$builderengine->get_option("website_bg_color");?>",
                        showInput: true,
                        showInitial: true,     
                        clickoutFiresChange: true,
                        chooseText: "Select",
                        cancelText: "Close"
                    });
                    $("#tags").select2({tags:[]});
                });
                </script>
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-cogs"></i> Website Settings</h1>
                    </div>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-title">
                                    <div class="icon"><i class="icon20 i-stack-checkmark"></i></div> 
                                    <h4>Settings Administration</h4>
                                    
                                </div><!-- End .widget-title -->
                            
                                <div class="widget-content">
                                    <form id="validate" class="form-horizontal" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="required">Website Name</label>
                                            <div class="controls controls-row">
                                                <input type="text" name="website_title" class="required span12" value="<?=$builderengine->get_option("website_name");?>" >
                                            </div>
                                        </div><!-- End .control-group  -->

                                        <div class="control-group">
                                            <label class="control-label" for="required">Admin Email</label>
                                            <div class="controls controls-row">
                                                <input type="text" name="admin_email" class="required span12" value="<?=$builderengine->get_option("admin_email");?>" >
                                            </div>
                                        </div><!-- End .control-group  -->

                                        <div class="control-group">
                                            <label class="control-label" for="colorpicker">Website Background Color</label>
                                            <div class="controls controls-row">
                                                <input type="text" id="color-picker" name="website_bg_color" value="<?=$builderengine->get_option("website_bg_color");?>" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Google Analytics Tracking Code</label>
                                            <div class="controls controls-row">
                                                <textarea class="span12" name="google_analytics_code" ><?=$builderengine->get_option("google_analytics_code");?></textarea>
                                            </div>
                                        </div><!-- End .control-group  -->
                                        <div class="control-group">
                                            <label class="control-label" for="tags">Website Keywords</label>
                                            <div class="controls controls-row">
                                                <input class="span12" id="tags" type="text" name="website_keywords" value="<?=$builderengine->get_option("website_keywords");?>" />
                                            </div>
                                        </div><!-- End .control-group  -->
                                        <div class="control-group"> 
                                            <label class="control-label" for="normal">Website Description</label> 
                                            <div class="controls controls-row">
                                                <textarea class="span12" id="textarea" rows="3" name="website_description"><?=$builderengine->get_option("website_description");?></textarea> 
                                            </div> 
                                        </div>
                  
                                
                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-primary" value="Save">
                                        </div>
                                    </form>
                                </div><!-- End .widget-content -->
                            </div><!-- End .widget -->
                        </div><!-- End .span12  --> 

                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
  </body>
</html>