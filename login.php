<? include_once 'includes/page-start.php' ?>

<h1>Kirjaudu</h1>

<form id="loginForm">
      <fieldset>
        <div class="field" >
            <label>Sähköpostiosoite:</label>
            <input type="text" name="email" />
        </div>
        <div class="field" >
            <label>Salasana:</label>
            <input type="password" name="password" />
        </div>
        <input type="submit" value="Kirjaudu" id="loginButton" />
    </fieldset>

</form>


<? include_once 'includes/page-end.php' ?>
<script>
    var $result; 
    $(document).ready(function() {
        console.log('ajax request');
        viewImageFolders();
        
        $('input#loginButton').click( 
        function() {
            
            $.post("ajax/login.php", $('#loginForm').serialize(),
            
            function($data) {
                console.log($data);

                console.log($data.status);
                
                if( "success" == $data.status) {
                    console.log("ok");
                    window.location = 'index.php';
                }
                
            });
            
            return false; 
        }
    );
        
        
    });
            
    console.log('done');
</script>

</body>
</html>
