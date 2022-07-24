<?php
  // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Import functions
  require_once('validate-review.php');

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
                <label for = "comments">Comment: (recommended, but optional)</label>
                <br>
                <br>
                <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
                <br>
                <br>
                <fieldset>
                    <legend>Rating:</legend>
                    <input type = "radio" id = "1" name = "ratings[]">
                        <label for = "1">1</label>
                    <input type = "radio" id = "2" name = "ratings[]">
                        <label for = "2">2</label>
                    <input type = "radio" id = "3" name = "ratings[]">
                        <label for = "3">3</label>
                    <input type= "radio" id = "4" name = "ratings[]">
                        <label for = "4">4</label>
                    <input type = "radio" id = "5" name = "ratings[]">
                        <label for = "5">5</label>
                    <input type = "radio" id = "6" name = "ratings[]">
                        <label for = "6">6</label>
                    <input type = "radio" id = "7" name "rating[]">
                        <label for = "7">7</label>
                    <input type = "radio" id = "8" name "rating[]">
                        <label for = "8">8</label>
                    <input type = "radio" id = "9" name "rating[]">
                        <label for = "9">9</label>
                    <input type = "radio" id = "10" name "rating[]">
                        <label for = "10">10</label>

                    <!-- DISPLAY MESSAGE -->
                    <?php print_validate_message("ratings") ?>
                </fieldset>
                <br>
                <br>
                <label for = "age">Age: </label>
                <input type = "text" name = "age" id = "age">
                <?php print_validate_message("age") ?>
                <?php printFinal() ?>
                <input type = "submit" value = "Submit">
            </form>
        </main>
        <footer>
            <p>Copyright &copy; 2022 NOTORIEX LEGACY. All Rights Reserved.</p>
        </footer>
</body>
</html>
