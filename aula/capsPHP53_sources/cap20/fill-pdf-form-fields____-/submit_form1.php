<?php
    // check that a form was submitted
    if(isset($_POST) && is_array($_POST) && count($_POST)){
        // we will use this array to pass to the createFDF function
        $data=array();
        
        // This displays all the data that was submitted. You can
        // remove this without effecting how the FDF data is generated.
        echo'<pre>POST '; print_r($_POST);echo '</pre>';
    }else{
        echo 'You did not submit a form.';
    }
?>
