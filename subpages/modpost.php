<?php

    function receive_message(){
        if ($SERVER["REQUEST_METHOD"] == "POST"){
            echo "<p>File submitted!</p>";
        }
    }
?>