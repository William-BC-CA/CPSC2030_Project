<?php

    function receive_message(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "<p class = 'submitted-file'>File submitted!</p>";
        }
    }
?>