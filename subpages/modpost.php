<?php

    function receive_message(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                echo "<p class = 'results'>File submitted!</p>";
        }
    }
?>