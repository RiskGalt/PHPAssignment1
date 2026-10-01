<?php
session_start();
require_once('database.php');

$title = filter_input(INPUT_POST, 'title');
$director = filter_input(INPUT_POST, 'director');
$release_year = filter_input(INPUT_POST, 'release_year', FILTER_VALIDATE_INT);
$genre = filter_input(INPUT_POST, 'genre');
$image = filter_input(INPUT_POST, 'image');

if (empty($title) || empty($director) || $release_year == null || $release_year === false || empty($genre)) {
    $error_message = "All fields are required and Release Year must be a valid number.";
    include('add_error.php');
    exit();
}

if (empty($image)) {
    $image = 'default.jpg';
}

$query = 'INSERT INTO movies (title, director, release_year, genre, image)
          VALUES (:title, :director, :release_year, :genre, :image)';
$statement = $db->prepare($query);
$statement->bindValue(':title', $title);
$statement->bindValue(':director', $director);
$statement->bindValue(':release_year', $release_year);
$statement->bindValue(':genre', $genre);
$statement->bindValue(':image', $image);
$statement->execute();
$statement->closeCursor();

$_SESSION["movieTitle"] = $title;
header("Location: add_movie_confirmation.php");
exit();
?>