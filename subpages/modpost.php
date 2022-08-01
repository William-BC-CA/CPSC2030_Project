<?php

    function receive_message(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if ((isset($_FILES["fileName"])) && (!empty($_FILES["fileName"]))){
                echo "<p class = 'results'>File submitted!</p>";
            }
            else {
                echo "<p class = 'failure-message'>Please choose a file!</p>";
            }
        }
    }
?>