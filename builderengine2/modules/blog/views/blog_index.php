<?foreach($post as $entry):?>
    <div class="grid_4 main-content-thumb">
        <h4>&#151; <?=date("M d, Y",$entry->date_created)?></h4>
        <div class="image-link">
            <a  href="/index.php/module/blog/<?=$entry->id?>"></a>
        </div>
        <h3><a  href="/index.php/module/blog/<?=$entry->id?>"><?=$entry->title?></a></h3>
        <p>
            <?=substr(strip_tags($entry->content),0,150)?>
        </p>
        
    </div>
<?endforeach;?>