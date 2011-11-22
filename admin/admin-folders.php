<?
include_once '../includes/admin-page-start.php';
?>
<h1>Folders</h1>

<div id="admin-folderlist">&nbsp;</div>

<?
include_once '../includes/admin-page-end.php';
?>

<script>
    var $result; 
    $(document).ready(function() {
                
        $.getJSON('../ajax/listfolders.php', function($data) {
            console.log($data);   
            var folders = [];
            $.each($data, function(key, val) {

                var folderUrl = 'admin-folder.php?folderid=' + val.folder_id;
                var folderName = val.folder_name;
                var listItem = '<li><a href="' + folderUrl + '">'+folderName + '</a></li>';
                
                folders.push(listItem);
            });
            
            $('<ul />', {
                'class': 'folder-item',
                html: folders.join('')
            }).appendTo('#admin-folderlist');
        
        });
        console.log('done');
            
    });
</script>

</body>
</html>
