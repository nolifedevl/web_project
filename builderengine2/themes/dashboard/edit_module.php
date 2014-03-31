<?=get_header();?>
                <link href="<?=get_theme_path()?>js/plugins/forms/switch/bootstrapSwitch.css" rel="stylesheet">
                <script src="<?=get_theme_path()?>js/plugins/forms/switch/bootstrapSwitch.js"></script>
                <script src="<?=get_theme_path()?>/js/plugins/forms/uniform/jquery.uniform.min.js"></script>
                <script src="<?=get_theme_path()?>/js/plugins/forms/validation/jquery.validate.js"></script>
                <script src="<?=get_theme_path()?>/js/plugins/forms/select2/select2.js"></script> 
                <script src="<?=get_theme_path()?>/js/pages/form-validation.js"></script><!-- Init plugins only for page -->

                <script src="<?=get_theme_path()?>/js/pages/form-elements.js"></script><!-- Init plugins only for page -->
                <link href="<?=get_theme_path()?>/js/plugins/forms/select2/select2.css" rel="stylesheet" />
                
                <script>
                    $( document ).ready(function() {
                        $("#frontend-groups").select2({tags:[ <? foreach ($groups as $group): ?>"<?=$group->name?>", <?endforeach;?>]});
                        $("#backend-groups").select2({tags:[ <? foreach ($groups as $group): ?>"<?=$group->name?>", <?endforeach;?>]});
                        $("#tags").select2({tags:[]});
                    });
                </script>
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-dashboard"></i> Modules Adminsitration</h1>
                    </div>



                    <div class="row-fluid">
                        <div class="span9">
                            <div class="widget">
                                <div class="widget-title">
                                    <div class="icon"><i class="icon20 i-stack-checkmark"></i></div> 
                                    <h4>Module Details</h4>
                                    
                                </div><!-- End .widget-title -->
                            
                                <div class="widget-content">
                                    <?
                                    $frontend_groups = $module->permissions['frontend']['names'];
                                    if(count($frontend_groups) == 0)
                                        $frontend_groups = "Members, Guests";
                                    else
                                        $frontend_groups = implode(",", $frontend_groups);

                                    $backend_groups = $module->permissions['backend']['names'];
                                    if(count($backend_groups) == 0)
                                        $backend_groups = "Administrators";
                                    else
                                        $backend_groups = implode(",", $backend_groups);



                                    ?>
                                    <form class="form-horizontal" method="post">
                                    <input type=hidden name='id' value='<?=$module->id?>'>
                                        <div class="control-group">
                                            <label class="control-label" for="required">Module Name</label>
                                            <div class="controls controls-row">
                                                <input type="text" name="name" value='<?=$module->name?>' class="required group span12">
                                            </div>
                                        </div><!-- End .control-group  -->
                                        <div class="control-group">
                                            <label class="control-label" for="tags">Access Groups</label>
                                            <div class="controls controls-row">
                                                <input class="span12" id="frontend-groups" type="text" name="frontend-groups" value="<?=$frontend_groups?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="tags">Admin Groups</label>
                                            <div class="controls controls-row">
                                                <input class="span12" id="backend-groups" type="text" name="backend-groups" value="<?=$backend_groups?>" />
                                            </div>
                                        </div>
                   
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Edit Module</button>
                                        </div>
                                    </form>
                                </div><!-- End .widget-content -->
                            </div><!-- End .widget -->
                        </div><!-- End .span12  --> 
                    </div><!-- End .row-fluid  -->



                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
  </body>
</html>