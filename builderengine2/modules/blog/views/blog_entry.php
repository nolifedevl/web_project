        
        
        <div class="post post-page">
            <!--<div class="post-img picture">
                <a href="images/blog-img-01-large.jpg" rel="image" title="Beatiful Mountain Ladscape"><img src="images/blog-img-01.jpg" alt="">
                    <div class="image-overlay-zoom"></div>
                </a>
            </div>-->
            <a href="#" class="post-icon standard"></a>
            <div class="post-content">
                <div class="post-title"><h2><a href=""><?=$post->title?></a></h2></div>
                <div class="post-meta">
                    <span><i class="mini-ico-calendar"></i><?=date("M d, Y",$post->date_created)?></span>
                    <span><i class="mini-ico-user"></i>By <a href="#"><?=$post->author->username?></a></span>
                    <!--<span><i class="mini-ico-comment"></i>With <a href="#">12 Comments</a></span>-->
                </div>
                <div class="post-description">
                    <p><?=$post->content?></p>                </div>
            </div>
        </div>
                