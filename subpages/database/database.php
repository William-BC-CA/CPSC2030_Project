<?php
require 'config.php';

function database_connect(){
    try {
        $toConnect = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";";
        $user = DBUSER;
        $password = DBPASS;
        $pdo = new PDO($toConnect, $user, $password);
        return $pdo;
    }
    
    catch (PDOException $e){
        die($e -> getMessage());
    }
}

function submit_review(){
    global $pdo;

    if ($_SERVER["REQUEST_METHOD"] = "POST"){
        $sql = "INSERT INTO REVIEWS(date, firstName, lastName, email, comments, ratings, age) VALUES (:date, :firstName, :lastName, :email, :comments, :ratings, :age)";

        $statement = $pdo -> prepare($sql);
        $statement -> bindValue(':date', date('Y-m-d'));
        $statement -> bindValue(':firstName', $_POST["firstName"]);
        $statement -> bindValue(':lastName', $_POST["lastName"]);
        $statement -> bindValue(':email', $_POST["email"]);
        $statement -> bindValue(':comments', $_POST["comments"]);
        foreach($_POST["ratings"] as $value){
            $statement -> bindValue(':ratings', $value);
        }
        $statement -> bindValue(':age', $_POST["age"]);
        $statement -> execute();
    }
}

function getReviews(){
    global $pdo;
    global $reviews;

    $sql = "SELECT * FROM REVIEWS ORDER BY ID DESC";
    $result = $pdo -> query($sql);
    while($row = $result -> fetch()){
        $reviews[] = $row;
    }
}