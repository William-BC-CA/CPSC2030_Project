<?php
  // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Import functions
  require_once('modpost.php');
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
                        <a href = "reviews.html"><li>Reviews</li></a>
                        <a href = "tools.html"><li>Tools</li></a>
                    </ul>
                </li>
            </ul>
        </nav>
        <main>
            <form action="submitmod.php" method = "post">
                <p>Feeling free to submit your own created mod into our site! Upload it here!</p>
                <input type="file" id="myFile" name="filename"><br>
                <?php receive_message(); ?><br>
                <input type="submit">
            </form>
        </main>
        <footer>
            <p>Copyright &copy; 2022 NOTORIEX LEGACY. All Rights Reserved.</p>
        </footer>
</body>
</html>