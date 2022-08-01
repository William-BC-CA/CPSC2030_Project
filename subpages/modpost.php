<?php

    function receive_message(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            //  && (!empty($_FILES["fileName"]["name"]))
            if ((is_uploaded_file($_FILES["myFile"]["tmp_name"]))){
                echo "<p class = 'results'>File submitted!</p>";
            }
            else {
                echo "<p class = 'failure-message'>Please choose a file!</p>";
            }
        }
    }
?>