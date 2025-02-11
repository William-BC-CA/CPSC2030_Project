<?php
    require('database/database.php');
    $valid = false;
    $val_messages = Array();

    // VARIABLES
    $firstName = $lastName = $email = $rating = $age = "";

    function printFinal($pdo){
        global $valid;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($valid == true){
                echo "<div class = 'results'>Your review has been submitted!</div>";
                submit_review();
            }
        }
    }

    function the_validation_system(){
        global $firstName;
        global $lastName;
        global $email;
        global $comments;
        global $rating;
        global $age;
        global $valid;
        global $val_messages;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            // SET VARIABLES
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $comments = $_POST["comments"];
            $age = $_POST["age"];
            $firstNameChecker = $lastNameChecker = $ageChecker = true;
            
            if (isset($firstName) && isset($lastName) && isset($email) && isset($age) && isset($comments)){
                foreach($_POST as $type => $value){
                    if ($type == 'firstName'){
                        for($i = 0; $i < strlen($firstName); $i++){
                            $letter = substr($firstName, $i, $i + 1);
                            if (ctype_alpha($letter)){
                                $val_messages["firstName"] = "";
                            }
                            else {
                                $val_messages["firstName"] = $letter . " Insert bruh moment. Dude your name has to be in letters not numbers! Are you a robot?";
                                $i = strlen($firstName) - 1;
                                $firstNameChecker = false;
                            }
                        }
                        if ($firstNameChecker == "true"){
                            $tmpF = substr($firstName, 0, 1);
                            if (ctype_upper($tmpF)){
                                $val_messages["firstName"] = "";
                            }
                            else {
                                $val_messages["firstName"] = "First letter must be capital!";
                            }
                        }
                    }
                    if ($type == "lastName"){
                        for($i = 0; $i < strlen($lastName); $i++){
                            $letter = substr($lastName, $i, $i + 1);
                            if (ctype_alpha($letter)){
                                $val_messages["lastName"] = "";
                            }
                            else {
                                $val_messages["lastName"] = "Insert bruh moment. Dude your name has to be in letters not numbers! Are you a robot?";
                                $i = strlen($lastName) - 1;
                                $lastNameChecker = false;
                            }
                        }
                        if ($lastNameChecker == true){
                            $tmpL = substr($lastName, 0, 1);
                            if (ctype_upper($tmpL)){
                                $val_messages["lastName"] = "";
                            }
                            else {
                                $val_messages["lastName"] = "First letter must be capital!";
                            }
                        }
                    }
                    if ($type = "email"){
                        // Courtesy of Adnan Reza (Prof)
                        $eChecker= '#^(.+)@([^\.].*)\.([a-z]{2,})$#';
                        if (preg_match($eChecker, $email)){
                            $val_messages["email"] = "";
                        }
                        else {
                            $val_messages["email"] = "Invalid Email!";
                        }
                    }
                    if ($type = "age"){
                        if ($age >= 13){
                            $val_messages["age"] = "";
                        }
                        else {
                            $val_messages["age"] = "Invalid Age! You must be at least 13 years old to post a comment or Mommy and Daddy will be mad at you! ";
                        }
                    }
                    if ($type = "comments"){
                        if (strlen($comments) > 5){
                            $val_messages["comments"] = "";
                        }
                        else {
                            $val_messages["comments"] = "You must enter a comment!";
                        }
                    }

                }
            }
            if ((isset($_POST["ratings"])) && (count($_POST["ratings"]) == 1)){
                $val_messages["ratings"] = "";
            }
            else {
                $val_messages["ratings"] = "You must choose a rating!";
            }
            foreach($val_messages as $value){
                if ($value != ""){
                    return;
                }
            }
    
            $valid = true;
        }
    }

    function print_validate_message($type){
        global $val_messages;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if ((isset($val_messages[$type])) || ($type == "ratings" && isset ($_POST["ratings"]))){
                $toPrint = $val_messages[$type];
                echo "<p class = 'failure-message'>";
                echo $toPrint;
                echo "</p>";
            }
        }
    }
?>