<? if(!is_installed()): ?>
<script>
$(document).ready(function(){
  $("#collapse-nav").addClass('collapse');
                    $("#collapse-nav").text("");
                    
                    $('#sidebar').addClass('isCollapse');
                    $('.sidebar-widget').addClass('hided');
                    $('#content').addClass('isCollapse');  
                    localStorage.setItem("collapseNav", 0); 
    
});
</script>
<?endif?>
<aside id="sidebar" >
            <div class="side-options">
                <ul>
                    <li>
                    <a href="#" id="collapse-nav" class="act act-primary tip" title="Collapse navigation" style><i class="icon16 i-arrow-left-7"></i></a></li>
                </ul>
            </div>

            <div class="sidebar-wrapper" <? if(!is_installed()): ?>style="visibility: hidden"<?endif;?>>
            
                <nav id="mainnav">
                    <? if(is_installed()): ?>
                    <ul class="nav nav-list">
                        <li>
                            <a <?=href("admin", "main/dashboard")?>>
                                <span class="icon"><i class="icon20 i-screen"></i></span>
                                <span class="txt">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon"><i class="icon20 i-users"></i></span>
                                <span class="txt">Users</span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a <?=href("admin", "user/add")?>>
                                        <span class="icon"><i class="icon20 i-user-plus"></i></span>
                                        <span class="txt">Add New</span>
                                    </a>
                                </li>
                                <li>
                                    <a <?=href("admin", "user/search")?>>
                                        <span class="icon"><i class="icon20  i-search-5"></i></span>
                                        <span class="txt">Search Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="icon20 i-users-4"></i></span>
                                        <span class="txt">User Groups</span>
                                    </a>
                                    <ul class="sub">
                                <li>
                                    <a <?=href("admin", "user/add_group")?>>
                                        <span class="icon"><i class="icon20 i-user-plus"></i></span>
                                        <span class="txt">Add New</span>
                                    </a>
                                </li>
                                <li>
                                    <a <?=href("admin", "user/groups")?>>
                                        <span class="icon"><i class="icon20  i-search-5"></i></span>
                                        <span class="txt">All Groups</span>
                                    </a>
                                </li>

                                
                            </ul>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <span class="icon"><i class="icon20 i-link"></i></span>
                                <span class="txt">Links</span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a <?=href("admin", "links/add")?>>
                                        <span class="icon"><i class="icon20 i-user-plus"></i></span>
                                        <span class="txt">Add New</span>
                                    </a>
                                </li>
                                <li>
                                    <a <?=href("admin", "links/show")?>>
                                        <span class="icon"><i class="icon20  i-search-5"></i></span>
                                        <span class="txt">Show All</span>
                                    </a>
                                </li>
                                
                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <span class="icon"><i class="icon20 i-cogs"></i></span>
                                <span class="txt">Settings</span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a <?=href("admin", "main/settings")?>>
                                        <span class="icon"><i class="icon20 i-cog-3"></i></span>
                                        <span class="txt">General</span>
                                    </a>
                                </li>

                                <li>
                                    <a <?=href("admin", "themes/show")?>>
                                        <span class="icon"><i class="icon20  i-palette"></i></span>
                                        <span class="txt">Themes</span>
                                    </a>
                                </li>
                                <li>
                                    <a <?=href("admin", "modules/show")?>>
                                        <span class="icon"><i class="icon20  i-cube-3"></i></span>
                                        <span class="txt">Modules</span>
                                    </a>
                                </li>
                                
                                
                            </ul>
                        </li>

                        <li>
                            <a <?=href("admin", "files/show")?>>
                                <span class="icon"><i class="icon20 i-cloud-upload"></i></span>
                                <span class="txt">File Manager</span>
                            </a>
         
                        </li>


                            
                        
                        <?

                        $links = get_admin_links();
                        foreach($links as $key => $menu):
                        $module = $key;
                        $module[0] = strtoupper($module[0]); 
                        ?>
                            <li>
                                    <a href="#">
                                        <span class="icon"><i class="icon20 i-table-2"></i></span>
                                        <span class="txt"><?=$module?></span>
                                    </a>
                                    <ul class="sub">
                                       <? foreach( $links[$key] as $sub_key => $link): 
                                            
                                       ?>
                                        <li>
                                            <? if(is_array($links[$key][$sub_key])): ?>
                                            <a href="#">
                                            <? else: ?>
                                            <a href="<?=$links[$key][$sub_key]?>">
                                            <? endif;?>
                                                <span class="icon"><i class="icon20 i-table"></i></span>
                                                <span class="txt"><?=$sub_key?></span>
                                            </a>
                                            <? if(is_array($links[$key][$sub_key])): ?>
                                                <ul class="sub">
                                                    <? foreach($links[$key][$sub_key] as $sub_sub_key => $link): ?>
                                                        <li>
                                                            <a href="<?=$link?>">
                                                                <span class="icon"><i class="icon20 i-table-2"></i></span>
                                                                <span class="txt"><?=$sub_sub_key?></span>
                                                            </a>
                                                        </li>
                                                    <? endforeach; ?>
                                                </ul>        
                                            <? endif; ?>
                                        </li>
                                        <? endforeach; ?>

                                    </ul>
                                </li>
                        <? endforeach; ?>
                           <?
                            /*$modules = get_modules();
                            foreach($modules as $module): ?>
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="icon20 i-table-2"></i></span>
                                        <span class="txt"><?=$module->name?></span>
                                    </a>
                                    <ul class="sub">
                                       <? foreach( get_admin_links($module->folder_name) as $link): ?>
                                        <li>
                                            <a href="/index.php/admin/module<?=$link['handle']?>">
                                                <span class="icon"><i class="icon20 i-table"></i></span>
                                                <span class="txt"><?=$link['name']?></span>
                                            </a>
                                        </li>
                                        <? endforeach; ?>

                                    </ul>
                                </li>
                            
                        <?  endforeach; ?> */
                        ?>
                        
                        
                    </ul>
                    <?endif?>
                </nav> <!-- End #mainnav -->

                <div class="sidebar-widget center">
                    <h4 class="sidebar-widget-header"><i class="icon i-pie-2"></i> Basic stats</h4>
                    <div class="spark-stats">
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="txt">Visits</span>
                                    <?
                            $day = 86400;
                            $this_week = $this->BuilderEngine->get_total_site_visits(time()-(7*$day),time(), "all");
                            $last_week = $this->BuilderEngine->get_total_site_visits(time()-(14*$day),time()-(7*$day), "all");
                            
                            if($last_week == 0)
                                $percent = 0;
                            else
                                $percent = round($this_week / $last_week * 100);
                            if($percent > 9999)
                                $percent = 9999;
                            if($percent < 100)
                                $percent = -(100 - $percent);
                                        ?>

                                    <? if($percent > 0):?>
                                            <span class="positive">
                                        <?else:?>
                                            <span class="negative">
                                        <?endif;?>
                                        
                                        <? if($percent > 0):?>
                                            <span class="up"></span>
                                        <?else:?>
                                            <span class="down"></span>
                                        <?endif;?>
                                        

                                        <span class="number"><?=abs($percent)?><small>%</small></span>
                                    </span>
                                    <span class="spark">
                                        <? 
                                        $visits = $BuilderEngine->get_site_visits("all", 10, false);
                                        ?>
                                        <? if($percent > 0):?>
                                            <span class="positive">
                                        <?else:?>
                                            <span class="negative">
                                        <?endif;?>

                                        
                                            <?
                                            if($visits > 0)
                                            {
                                                $string = "";
                                                foreach ( array_reverse($visits) as $day){
                                                    $string .= $day.",";
                                                }
                                                echo trim($string, ",");
                                            }
                                            ?>

                                           
                                            </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="txt">Unique Visitors</span>
                                    <?
                            $day = 86400;
                            $this_week = $this->BuilderEngine->get_total_site_visits(time()-(7*$day),time(), "unique");
                            $last_week = $this->BuilderEngine->get_total_site_visits(time()-(14*$day),time()-(7*$day), "unique");
                            
                            if($last_week == 0)
                                $percent = 0;
                            else
                                $percent = round($this_week / $last_week * 100);
                            if($percent > 9999)
                                $percent = 9999;
                            if($percent < 100)
                                $percent = -(100 - $percent);
                                        ?>
                                        
                                    <? if($percent > 0):?>
                                            <span class="positive">
                                        <?else:?>
                                            <span class="negative">
                                        <?endif;?>
                                        
                                        <? if($percent > 0):?>
                                            <span class="up"></span>
                                        <?else:?>
                                            <span class="down"></span>
                                        <?endif;?>
                                        

                                        <span class="number"><?=abs($percent)?><small>%</small></span>
                                    </span>
                                    <span class="spark">
                                        <? 
                                        $visits = $BuilderEngine->get_site_visits("unique", 10, false);
                                        ?>
                                        <? if($percent > 0):?>
                                            <span class="positive">
                                        <?else:?>
                                            <span class="negative">
                                        <?endif;?>

                                        
                                            <?
                                            if($visits > 0)
                                            {
                                                $string = "";
                                                foreach ( array_reverse($visits) as $day){
                                                    $string .= $day.",";
                                                }
                                                echo trim($string, ",");
                                            }
                                            ?>

                                           
                                            </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div><!-- End .spark-stats -->
                </div><!-- end .sidebar-widget -->

                <div class="sidebar-widget center">
                    <h4 class="sidebar-widget-header"><i class="icon i-fire-2"></i> Site overload</h4>
                    <div id="gauge" style="width:200px; height:150px;"></div>
                    <div id="gauge1" style="width:200px; height:150px;"></div>
                </div><!-- end .sidebar-widget -->
             
            </div> <!-- End .sidebar-wrapper  -->
        </aside><!-- End #sidebar  -->