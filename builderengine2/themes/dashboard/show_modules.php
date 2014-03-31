<?=get_header();?>

    <script src="<?=get_theme_path()?>/js/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script src="<?=get_theme_path()?>/js/plugins/forms/validation/jquery.validate.js"></script>
    <script src="<?=get_theme_path()?>/js/plugins/forms/select2/select2.js"></script> 
    <script src="<?=get_theme_path()?>js/plugins/tables/datatables/jquery.dataTables.min.js"></script><!-- Init plugins only for page -->
    <link href="<?=get_theme_path()?>/js/plugins/forms/select2/select2.css" rel="stylesheet" />
    <link href="<?=get_theme_path()?>/js/plugins/tables/datatables/jquery.dataTables.css" rel="stylesheet" />
    <script src="<?=get_theme_path()?>/js/pages/data-tables.js"></script><!-- Init plugins only for page -->
    
    
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-dashboard"></i> Modules administration</h1>
                    </div>

                    <div class="row-fluid">
                        
                        <div class="span12">
                            
                            <div class="widget">
                                <div class="widget-title">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Modules</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .widget-title -->
                            
                                <div class="widget-content">
                                
                                    <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th style="width: 100px;">Version</th>
                                            <th>Path</th>
                                            <th>Installed By</th>
                                            <th style="width: 160px">Install Date</th>
                                            <th style="width: 120px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?foreach($modules as $module): ?>
                                        <tr>
                                            <td><?=$module->name?></td>
                                            <td><?=$module->version?></td>
                                            <td>modules/<?=$module->folder?></td>
                                            <td style="text-align: center"><?=$module->installer_name?></td>
                                            <td><?=date("d-M-Y G:i:s", $module->install_time);?></td>
                                            <td><a href="/index.php/admin/modules/edit/<?=$module->id?>"><span class="i-quill-2"></span></a> <a href="/index.php/admin/links/delete/<?=$module->id?>" onclick="return confirm('Are you sure you want to permanently delete this user?')"><span class="i-remove-4"></span></a></td>
                                        </tr>
                                    <?endforeach;?>
                                       
                                    </tbody>
                                </table>
                            
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