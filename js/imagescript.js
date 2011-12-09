/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var items = [];
function viewImageFolders() {
    $.getJSON('ajax/listfolders.php', function($data) {
        // console.log($data);   
                    
        $.each($data, function(key, val) {
            //console.log(key);
            //console.log(val);

            items.push('<li class="folder-closed" id="folder-icon-' + val.folder_id + '"><a href="imagefolder.php?folderid=' + val.folder_id + '">' + val.folder_name + '</a></li>')

        });
        //console.log(items);
        $('<ul />', {
            'class': 'folder-item',
            html: items.join('')
        }).appendTo('#folderlist');
 
        if( folderId != undefined ) {
            openFolder(folderId);
        }
    });
}

function showPreview() {
    $('#image').html('<img src="' + $imageData[$inx].image_file + '" />');
    $('#title').html('<h1>' + $imageData[$inx].image_name + '</h1>');
    $('#description').html($imageData[$inx].image_description);

    $('li#image-' + $inx).addClass('currentImage');
}

function openFolder(folderid) {
    $('li#folder-icon-' + folderid).removeClass('folder-closed');
    $('li#folder-icon-' + folderid).addClass('folder-open');
}

function closeFolder(folderid) {
    $('li#folder-icon-' + folderid).removeClass('folder-open');
    $('li#folder-icon-' + folderid).addClass('folder-closed');
}

function viewAdminFolders() {
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
}
var $response; 
function initCreateAdminFolderForm() {
    $('form#createFolder').submit(function() {
        
        console.log('submit create folder');
        $.post("../ajax/createfolder.php", $('#createFolder').serialize(),
            function($data) {
                
                var $obj = jQuery.parseJSON($data);
                $response = $obj; 
                if( $obj.status == 'success') {
                    console.log('rock rock');
                    $('#createFolder').hide(500).delay(2500).show(500);
                    $('#statusBox').html('Uusi kansio luotu onnistuneesti.');
                    $('#statusBox').show(500).delay(2500).hide(500);
                    $('#createFolder').each(function(){
                        this.reset();
                    });
                    
                    
                }
            }
            );
        
        
        return false;
    });
}