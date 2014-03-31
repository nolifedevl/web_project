    <div id="block-editor" style="position:relative; width: 740px;">
<script>
    
    $("#admin-window").css('display','block');
    $("#admin-window").draggable();
    $(".tip").css("float", "left");

    $(".delete-version").click(function () {
        version_id = $(this).attr("version-id");


        version_name = $("#version-name-" + version_id).html();

        if($("#activate-version-" + version_id).attr("active") == "true")
        {
            alert("You cannot delete a currently active version.");
            return;
        }
        confirmed = confirm("Are you sure you want to delete version '" + version_name + "'");
        
        if(!confirmed)
            return;

        oTable = $('#dataTable').dataTable();
        $(this).parents("TR").fadeOut("fast", function () {
        var pos = oTable.fnGetPosition(this);
        oTable.fnDeleteRow(pos);
        });

        $.get("/admin/ajax/delete_version/" + version_id, function(data){});
        
        //$(this).parent().parent().parent().remove();

    });

    $(".rename-version").click(function () {
        version_id = $(this).attr("version-id");

        version_name = $("#version-name-" + version_id).html();
        $("#version-name-" + version_id).html("<input type='text' id='version-new-name-" + version_id + "' value='"+version_name+"'>");
        $("#version-name-" + version_id).addClass("nolink");
        $("#rename-version-" + version_id).css("display", "none");
        $("#save-version-" + version_id).css("display", "block");
        
        //$("#save-version-" + version_id).css("width", "14px");
        

        $("#save-version-" + version_id).click(function () {

            new_name = $("#version-new-name-" + version_id).val();
            $.post('/admin/ajax/version_set_name',
            {
                'id'        : version_id,
                'new_name'  : encodeURIComponent(new_name)
            },
            function(data) {
                $("#version-name-" + version_id).html(new_name);
                $("#save-version-" + version_id).css("display", "none"); 
                $("#rename-version-" + version_id).css("display", "block");  
                
            });
            

        });
        
    });

    $('.toggle-version-activate').click(function () {
        if($(this).attr("approved") != "true")
            return;

        version_id = $(this).attr("version-id");
        $.get("/admin/ajax/version_activate/" + version_id, function(data){});  
        $( ".toggle-version-activate" ).each(function( index ) {
            $(this).removeClass("green");
            $(this).attr("active", "false");
            if($(this).attr("approved") == "true")
                $(this).attr("data-original-title", "Switch to this version.");
        });

        $(this).addClass("green");
        $(this).attr("active", "true");
        $(this).attr("data-original-title", "This version is already active.");
    });

    $('.toggle-version-approve').click(function () {

        version_id = $(this).attr("version-id");

        if($("#activate-version-" + version_id).attr("active") == "true")
        {
            alert("You cannot disapprove a currently active version.");
            return;
        }
        $.get("/admin/ajax/toggle_version_approved/" + version_id, function(data){});  
        
        if($(this).attr("approved") == "true")
        {
            $(this).attr("approved", "false"); 
            $(this).attr("data-original-title", "Version is not approved");  
           


            $(this).removeClass("i-thumbs-up-3");
            $(this).removeClass("green");

            $(this).addClass("i-thumbs-up-4");
            $(this).addClass("red");

            $("#activate-version-" + version_id).removeClass("green");
            $("#activate-version-" + version_id).addClass("red");
            $("#activate-version-" + version_id).attr("data-original-title", "This version is not approved.");
            $("#activate-version-" + version_id).attr("approved", "false");



        }
        else
        {
            $(this).attr("approved", "true");
            $(this).attr("data-original-title", "Version is approved");  
           
            $(this).removeClass("i-thumbs-up-4");
            $(this).removeClass("red");

            $(this).addClass("i-thumbs-up-3");
            $(this).addClass("green");

            $("#activate-version-" + version_id).removeClass("red");
            $("#activate-version-" + version_id).attr("data-original-title", "Switch to this version.");
            $("#activate-version-" + version_id).attr("approved", "true");

        }

    });



    $(".tip").css('cursor', "pointer");
    $(".save-version").css('display', "none");

    $(".tip").tooltip ({placement: 'top'}); 
        //------------- Data tables -------------//
    $('#dataTable').dataTable( {
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "bJQueryUI": false,
        "bAutoWidth": false,
        "bSort": false,
        "oLanguage": {
            "sSearch": "<span>Filter:</span> _INPUT_",
            "sLengthMenu": "<span>_MENU_ entries</span>",
            "oPaginate": { "sFirst": "First", "sLast": "Last" },
        }
    });

    
    </script>
<style>
.pagination li {
    border: none !important;
    padding: 0px !important;
}

</style>
    <div class="block-editor"  style="width: 740px; position: absolute">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget second">
                    <div class="widget-title">
                        <div class="icon"><i class="icon20 i-menu-6"></i></div>
                        <?if($mode == "layout"):?>
                        <h4>Global Versions</h4>
                        <?else:?>
                        <h4>Page Versions</h4>
                        <?endif;?>
                        <a href="#" id="versions-close" class="close i-close-2"></a>
                    </div><!-- End .widget-title -->

                    <div class="widget-content">
                        <form class="form-horizontal">
                            <div class="control-group">
                                <div class="controls-row">
                                    <div class="span12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Version Name</th>
                                                    <th>Creator</th>
                                                    <th>Approver</th>
                                                    <th>Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <? foreach($page_versions as $version): ?>
                                                <tr class="rowlink">
                                                    <td id="version-name-<?=$version->id?>"><?=$version->name?></td>
                                                    <td><?=$version->author?></td>
                                                    <td><?=$version->approver?></td>
                                                    <td><?=date("j/n/Y",$version->time_created)." at ".date("g:i A",$version->time_created);?></td>
                                                    <td>
                                                        <div style="width:134px">
                                                        <? if($version->approver == "N/A"): ?>
                                                            <span class="tip i-thumbs-up-4 red toggle-version-approve" approved="false" version-id="<?=$version->id?>" data-original-title="Version is rejected"></span>
                                                        <?else:?>
                                                        <span class="tip i-thumbs-up-3 green toggle-version-approve" approved="true" version-id="<?=$version->id?>" data-original-title="Version is approved"></span>
                                                        <?endif;?>
                                                        <? if($version->approver == "N/A"): ?>
                                                        <span id="activate-version-<?=$version->id?>" class="i-checkmark-3 red tip toggle-version-activate" version-id="<?=$version->id?>" active="false" approved="false" data-original-title="Version not approved"></span>

                                                        <?elseif($version->active == "true"):?>
                                                        <span id="activate-version-<?=$version->id?>" class="i-checkmark-3 green tip toggle-version-activate" version-id="<?=$version->id?>" active="true" approved="true" data-original-title="This version is already active"></span>
                                                        <?else:?>
                                                        <span id="activate-version-<?=$version->id?>" class="i-checkmark-3 tip toggle-version-activate" version-id="<?=$version->id?>" active="false" approved="true" data-original-title="Switch to this version"></span>
                                                        <?endif;?>
                                                        <span class="i-remove-5 tip delete-version" version-id="<?=$version->id?>" data-original-title="Delete version"></span>
                                                        <span id="rename-version-<?=$version->id?>" version-id="<?=$version->id?>" class="rename-version i-pencil tip" data-original-title="Rename version"></span>
                                                        <span id="save-version-<?=$version->id?>" version-id="<?=$version->id?>" class="save-version i-disk tip" data-original-title="Save"></span>
                                                        </div>
                                                    </td>

                                                </tr>
                                            <? endforeach;?>

                                            </tbody>
                                        </table>
                                    </div><!-- End .span12  -->
                                </div><!-- End .controls-row -->
                            </div><!-- End .control-group  -->
                        </form>

                    </div><!-- End .widget-content -->

                </div><!-- End .widget -->
            </div><!-- End .span6  -->
        </div>
    </div>
</div>