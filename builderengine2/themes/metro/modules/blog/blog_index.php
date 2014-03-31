

      <div class="blog">
               <div class="row">
                  <div class="span12">
                     
                     <!-- Blog Posts -->
                     <div class="row">
                        <div class="span8">
                           <div class="posts">
                           
                              <!-- Each posts should be enclosed inside "entry" class" -->

                              <?foreach($post as $entry):?>
                              <!-- Post -->
                              <div class="entry">
                                 <h2><i class="icon-arrow-right title-icon"></i> <a href="/blog/<?=$entry->id?>"><?=$entry->title?></a></h2>
                                 
                                 <!-- Meta details -->
                                 <div class="meta">
                                    <i class="icon-calendar"></i> <?=date("M d, Y",$entry->date_created)?> <i class="icon-user"></i> <?=$entry->author->username?> 
                                 </div>
                                 
                                 <?if($entry->image):?>
                                 <!-- Thumbnail -->
                                 <div class="bthumb2">
                                    <a href="/blog/<?=$entry->id?>"><img src="/files/images/<?=$entry->image?>" alt="" /></a>
                                 </div>
                                 <?endif;?>

                                 <p><?=substr(strip_tags($entry->content),0,500)?>...</p>
                                 <a href="/blog/<?=$entry->id?>" class="btn btn-info">Read More...</a>
                                 <div class="clearfix"></div>
                              </div>
                              <?endforeach;?> 
                                                         
                              
                              <!-- Pagination 
                              <div class="paging">
                                 <span class='current'>1</span>
                                 <a href='#'>2</a>
                                 <span class="dots">&hellip;</span>
                                 <a href='#'>6</a>
                                 <a href="#">Next</a>
                              </div> 
                              -->
                              <div class="clearfix"></div>
                              
                           </div>
                        </div>                        
                        <div class="span4">
                           <div class="sidebar">
                              <!-- Widget -->
                
                              <div class="widget">
                                 <h4>Recent Posts</h4>
                                 <ul>
                                    <li><a href="#">Sed eu leo orci, condimentum gravida metus</a></li>
                                    <li><a href="#">Etiam at nulla ipsum, in rhoncus purus</a></li>
                                    <li><a href="#">Fusce vel magna faucibus felis dapibus facilisis</a></li>
                                    <li><a href="#">Vivamus scelerisque dui in massa</a></li>
                                    <li><a href="#">Pellentesque eget adipiscing dui semper</a></li>
                                 </ul>
                              </div>
                              <div class="widget">
                                 <h4>About</h4>
                                 <p>Nulla facilisi. Sed justo dui, id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>,velit at <a href="#">magna sollicitudin cursus</a> ac ultrices magna. Aliquam consequat, purus vitae auctor ullamcorper, sem velit convallis quam, a pharetra justo nunc et mauris. </p>
                              </div>                              
                           </div>                                                
                        </div>
                     </div>
                     
                     
                     
                  </div>
               </div>
            </div>

