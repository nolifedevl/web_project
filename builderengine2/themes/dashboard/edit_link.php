<?=get_header();?>

                <script src="<?=get_theme_path()?>/js/plugins/forms/uniform/jquery.uniform.min.js"></script>
                <script src="<?=get_theme_path()?>/js/plugins/forms/validation/jquery.validate.js"></script>
                <script src="<?=get_theme_path()?>/js/plugins/forms/select2/select2.js"></script> 
                <script src="<?=get_theme_path()?>/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
                <link href="<?=get_theme_path()?>/js/plugins/forms/select2/select2.css" rel="stylesheet" />
                
                <script>
                   $( document ).ready(function() {
                        $("#groups").select2({tags:[ <? foreach ($groups as $group): ?>"<?=$group->name?>", <?endforeach;?>]});
                        $("#tags").select2({tags:[]});
                    });
                </script>
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-dashboard"></i> Edit Website Link</h1>
                    </div>



                    <div class="row-fluid">
                        <div class="span9">
                            <div class="widget">
                                <div class="widget-title">
                                    <div class="icon"><i class="icon20 i-stack-checkmark"></i></div> 
                                    <h4>Link Details</h4>
                                    
                                </div><!-- End .widget-title -->
                            
                                <div class="widget-content">
                                    <form class="form-horizontal" method="post">
                                    <input type=hidden name='id' value='<?=$link->id?>'>
                                        <div class="control-group">
                                            <label class="control-label" for="required">Link Name</label>
                                            <div class="controls controls-row">
                                                <input type="text" name="name" value='<?=$link->name?>' class="required group span12">
                                            </div>
                                        </div><!-- End .control-group  -->
                                        <div class="control-group">
                                            <label class="control-label" for="required">Link Target</label>
                                            <div class="controls controls-row">
                                                <input type="text" name="target" class="required group span12" value='<?=$link->target?>'>
                                            </div>
                                        </div><!-- End .control-group  -->
                                        <div class="control-group">
                                            <label class="control-label" for="required">Link Meta Title</label>
                                            <div class="controls controls-row">
                                                <input type="text" name="title" class="group span12" placeholder="Leave blank if none."  value='<?=$link->title?>'>
                                            </div>
                                        </div><!-- End .control-group  -->
                                        <div class="control-group">
                                            <label class="control-label" for="tags">Groups</label>
                                            <div class="controls controls-row">
                                                <input class="span12" id="groups" type="text" name="groups" value="<?=$link->groups_string?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="tags">Tags</label>
                                            <div class="controls controls-row">
                                                <input class="span12" id="tags" type="text" name="tags" value="<?=$link->tags?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="tags">Parent</label>
                                            <div class="controls controls-row">
                                                <select name="parent">
                                                    <option value="0">No Parent</option>
                                                    <? foreach(get_links() as $db_link): ?>
                                                    <option value="<?=$db_link->id?>" <?if($link->parent == $db_link->id):?>selected<?endif;?>><?=$db_link->name?></option>
                                                    <? endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Order</label>
                                            <div class="controls controls-row">
                                                <input class="span12" type="text" name="order" value="<?=$link->order?>" />
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Edit Link</button>
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