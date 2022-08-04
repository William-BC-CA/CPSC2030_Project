<?php
  // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Import functions
  require_once('validate-review.php');

  $reviews = [];

  require_once('database/database.php');
  $pdo = database_connect();
  the_validation_system();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main-styles.css">
    <link rel="icon" href="../img/game.ico">
    <title>NTRX Counter-Strike Modding Hub</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            let background_img = Math.trunc((Math.random() * 3) + 1);
            // console.log(backgroundimg);

            // $(document).load(function(){
                switch(background_img){
                    case 1:
                        $("body").css("background", "url('../img/perry-grone-dqtz7uLc2F4-unsplash.jpg')");
                        break;
                    case 2:
                        $("body").css("background", "url('../img/jeremy-lishner-qQkhVM9bp10-unsplash.jpg')");
                        break;
                    case 3:
                        $("body").css("background", "url('../img/sylvie-charron-hDYZyZLAG2I-unsplash.jpg')");
                        break;
                }
                $("body").css("background-position", "center");
                $("body").css("background-repeat", "no-repeat");
                $("body").css("background-size", "cover");
                $("body").css("background-attachment", "fixed");
            // })
        })
    </script>
</head>
<body>
    <div class = "wrapper">
        <header>
            <h1><span class = "first-word">NTRX</span> Counter-Strike Modding Hub</h1>
        </header>
        <nav>
            <ul>
                <a href = "../"><li>Home</li></a>
                <a href = "maps.html"><li>Maps</li></a>
                <li>Skins
                    <ul>
                        <a href = "weapons.html"><li>Weapons</li></a>
                        <a href = "envtextures.html"><li>Environment Textures</li></a>
                    </ul>
                </li>
                <a href = "sounds.html"><li>Sounds</li></a>
                <li>Misc.
                    <ul>
                        <a href = "plugins.html"><li>Plugins</li></a>
                        <a href = "submitmod.php"><li>Submit Mod</li></a>
                        <a href = "reviews.php"><li>Reviews</li></a>
                        <a href = "tools.html"><li>Tools</li></a>
                    </ul>
                </li>
            </ul>
        </nav>
        <main>
            <form action="reviews.php" method = "post">
                <label for="firstName">First Name: </label>
                <input type="text" name = "firstName" id = "firstName">
                <br>
                <br>
                <!-- firstName Message -->
                <?php print_validate_message("firstName") ?>
                <label for = "lastName">Last Name: </label>
                <input type = "text" name = "lastName" id = "lastName">
                <br>
                <br>
                <!-- lastName Message -->
                <?php print_validate_message("lastName") ?>
                <label for = "email">Email: </label>
                <input type = "text" name = "email" id = "email">
                <br>
                <br>
                <!-- Email Message -->
                <?php print_validate_message("email") ?>
                <label for = "comments">Comment: </label>
                <br>
                <br>
                <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
                <br>
                <br>
                <fieldset>
                    <legend>Rating:</legend>
                    <input type = "radio" id = "1" name = "ratings[]" value = "1">
                        <label for = "1">1</label>
                    <input type = "radio" id = "2" name = "ratings[]" value = "2">
                        <label for = "2">2</label>
                    <input type = "radio" id = "3" name = "ratings[]" value = "3">
                        <label for = "3">3</label>
                    <input type= "radio" id = "4" name = "ratings[]" value = "4">
                        <label for = "4">4</label>
                    <input type = "radio" id = "5" name = "ratings[]" value = "5">
                        <label for = "5">5</label>
                    <input type = "radio" id = "6" name = "ratings[]" value = "6">
                        <label for = "6">6</label>
                    <input type = "radio" id = "7" name = "ratings[]" value = "7">
                        <label for = "7">7</label>
                    <input type = "radio" id = "8" name = "ratings[]" value = "8">
                        <label for = "8">8</label>
                    <input type = "radio" id = "9" name = "ratings[]" value = "9">
                        <label for = "9">9</label>
                    <input type = "radio" id = "10" name = "ratings[]" value = "10">
                        <label for = "10">10</label>

                    <!-- DISPLAY MESSAGE -->
                    <?php print_validate_message("ratings") ?>
                </fieldset>
                <br>
                <br>
                <label for = "age">Age: </label>
                <input type = "text" name = "age" id = "age">
                <?php print_validate_message("age") ?>
                <?php printFinal($pdo) ?>
                <br>
                <br>
                <input type = "submit" value = "Submit">
            </form>

            <?php
                getReviews();
                echo "<h2>Reviews</h2>";
                echo "<div>";
                // echo "<table>";
                // TODO: Design reviews printing!
                foreach($reviews as $value){
                    // echo "<div class = 'results'>
                    echo "<div><table><tr><th>Attribute:</th><th>Value:</th></tr><tr><th>Post ID:</th><td>" . $value['ID'] . "</td></tr>
                    <tr><th>Date:</th><td>" .$value['date'] . "</td></tr>
                    <tr><th>First Name:</th><td>" . $value['firstName'] . "</td></tr>
                    <tr><th>Last Name:</th><td>" . $value['lastName'] . "</td></tr>
                    <tr><th>Email:</th><td>" . $value['email'] . "</td></tr>
                    <tr><th>Comment:</th><td>" . $value ['comments'] . "</td></tr>
                    <tr><th>Rating:</th><td>" . $value['ratings'] . "</td></tr>
                    <tr><th>Age:</th><td>" . $value['age'] . "</td></tr></table></div>";
                    // </div>
                }
                echo "</div>";
                // echo "</tr></table>";
            ?>
        </main>
        <footer>
            <p>Copyright &copy; 2022 NOTORIEX LEGACY. All Rights Reserved.</p>
        </footer>
</body>
</html>
