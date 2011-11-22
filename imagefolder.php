<? include_once 'includes/page-start.php' ?>

<?
$folderId = $_GET['folderid'];
$folderAjaxUrl = "ajax/getfolder.php?folderid=" . $folderId;
$listImagesByFolderAjaxUrl = "ajax/getimagesbyfolder.php?folderid=" . $folderId;
?>


<h1 id="folderTitle">Images by folder</h1>

<p id="folderDescription">&nbsp;</p>

<div id="slideshow">
    <div id="title">&nbsp;</div>
    <div id="lane">
        <div id="image">&nbsp;</div>
        <div id="prev">
            <img id="prev" class="home" src="images/img_trans.gif" width="1" height="1" />
        </div>

        <div id="next"><img class="home" src="images/img_trans.gif" width="1" height="1" /></div>
    </div>
    <div id="description">&nbsp;</div>

</div>

<div id="thumbs">&nbsp;</div>


<? include_once 'includes/page-end.php' ?>
<script>
    var $result; 
    $(document).ready(function() {
        console.log('ajax request');
        viewImageFolders();
    });
            
             
    var $result; 
    var $imageData;
    var $inx = 0; 
    var imageCount =0; 
    var folderId = '<?= $folderId ?>';
    $(document).ready(function() {
        console.log('ajax request');
        var items = [];
        $.getJSON('<?= $folderAjaxUrl ?>', function($data) {
            $('h1#folderTitle').html($data.folder_name);
            $('p#folderDescription').html($data.description);
        });      
                
        $images = []; 
                
        $.getJSON('<?= $listImagesByFolderAjaxUrl ?>', function($data) {
            $imageData = $data; 
            $.each($data, function(key, val) {
                        
                $imageHtml = '<img src="'+ val.image_thumb_file + '" alt="' + val.title + '" id="thumbimage" />';
                $imageLink = '<a class="thumb" title="' + val.image_name + '" href="getimage.php?imageid=' + val.image_id + '">' + $imageHtml + '</a>';  
                $imageCaption = '<div class="caption">' + val.image_description +'</div>';
                $images.push('<li id="image-' + val.image_id + '">' + $imageLink + '</li>');
                imageCount++; 
            });
                
            $('<ul />', {
                'class': 'thumbs, noscript',
                'id': 'imagelist',
                html: $images.join('')
            }).appendTo('#thumbs');
        
            showPreview();

        });
                
        $('#prev').click(function() {
            // console.log('previous:');
            $('li#image-' + $inx).removeClass('currentImage');
            if( $inx > 0 ) {
                $inx--;
                showPreview();
            }
                    
            return false;
        });
                
        $('#next').click(function() {
           // console.log('next:');
            //console.log($inx);
            //console.log($imageData.length);
            $('li#image-' + $inx).removeClass('currentImage');
            if( $inx < $imageData.length ) {
                $inx++;
                showPreview();
            }
                    
        });
                
                
   });         
            
        //console.log('done');
</script>

</body>
</html>
