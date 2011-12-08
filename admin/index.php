<? ?>

<? include_once '../includes/admin-page-start.php' ?>

<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
        <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tabs-1">Etusivu</a></li>
        <li class="ui-state-default ui-corner-top"><a href="#tabs-2">Kansiot</a></li>
        <li class="ui-state-default ui-corner-top"><a href="#tabs-3">Luo uusi kansio</a></li>
        <li class="ui-state-default ui-corner-top"><a href="#tabs-4">Kuvat</a></li>
        <li class="ui-state-default ui-corner-top"><a href="#tabs-5">Käyttäjät</a></li>
    </ul>

    <div id="tabs-1"  class="ui-tabs-panel ui-widget-content ui-corner-bottom">
        <h1>Admin site</h1>
    </div>
    <div id="tabs-2"  class="ui-tabs-panel ui-widget-content ui-corner-bottom">
        <h1>Kansiot</h1>

        <div id="admin-folderlist">&nbsp;</div>



    </div>
    <div id="tabs-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
        <h1>Luo uusi kansio</h1>

        <div id="statusBox">&nbsp;</div>

        <form action="#" method="post" id="createFolder">
            <fieldset>
                <div class="formField">
                    <label>Kansion nimi</label>
                    <input type="text" name="name" />

                </div>
                <div class="formField">
                    <label>Kansion kuvaus</label>
                    <input type="text" name="desc" />

                </div>
                <div class="formField">
                    <input type="submit" value="Luo uusi" id="createfolder" />
                </div>


            </fieldset>

        </form>

    </div>
    <div id="tabs-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
        <h1>Kuvat</h1>
    </div>
    <div id="tabs-5" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
        <h1>Käyttäjät</h1>
    </div>
</div>
<? include_once '../includes/admin-page-end.php' ?>

<script>
    var $result; 
    $(document).ready(function() {
        
        $('#tabs').tabs();
        viewAdminFolders();
        initCreateAdminFolderForm();
        
    });
</script>

</body>
</html>
