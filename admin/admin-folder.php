<? 
$folderId = $_GET['folderid'];
$listImagesByFolderAjaxUrl = "../ajax/getimagesbyfolder.php?folderid=" . $folderId;
?>

<? include_once '../includes/admin-page-start.php' ?>

<h1>View a folder</h1>


<div id="foldersImages" >&nbsp;</div>


<? include_once '../includes/admin-page-end.php' ?>

<script>
    var $result; 
    $(document).ready(function() {
        var url = '<?= $listImagesByFolderAjaxUrl?>';
        $images = []; 
        var imageCount = 0; 
        $.getJSON(url, function($data) {
           console.log("'rock rock") ;
           console.log($data);
            $.each($data, function(key, val) {
                        
                $imageHtml = '<img src="../'+ val.image_thumb_file + '" alt="' + val.title + '" id="thumbimage" />';
                $imageLink = '<a class="thumb" title="' + val.image_name + '" href="admin-getimage.php?imageid=' + val.image_id + '">' + $imageHtml + '</a>';  
                $imageCaption = '<div class="caption">' + val.image_description +'</div>';
                $images.push('<li id="image-' + val.image_id + '">' + $imageLink + '</li>');
                imageCount++; 
            });
            
            console.log('data done.. lets publish it');
            $('<ul />', {
                'class': 'thumbs, noscript',
                'id': 'imagelist',
                html: $images.join('')
            }).appendTo('#foldersImages');
           
        });
        
    });
</script>

</body>
</html>
