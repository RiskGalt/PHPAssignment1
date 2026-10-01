<?php
session_start();
require_once('database.php');

$movie_id = filter_input(INPUT_POST, 'movie_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title');
$director = filter_input(INPUT_POST, 'director');
$release_year = filter_input(INPUT_POST, 'release_year', FILTER_VALIDATE_INT);
$genre = filter_input(INPUT_POST, 'genre');
$image = filter_input(INPUT_POST, 'image');

if ($movie_id == null || $movie_id === false || empty($title) || empty($director) || 
    $release_year == null || $release_year === false || empty($genre)) {
    $error_message = "Invalid movie data. Please check all fields.";
    include('update_error.php');
    exit();
}

if (empty($image)) {
    $image = 'default.jpg';
}

$query = 'UPDATE movies 
          SET title = :title, 
              director = :director, 
              release_year = :release_year, 
              genre = :genre, 
              image = :image 
          WHERE movie_id = :movie_id';

$statement = $db->prepare($query);
$statement->bindValue(':movie_id', $movie_id);
$statement->bindValue(':title', $title);
$statement->bindValue(':director', $director);
$statement->bindValue(':release_year', $release_year);
$statement->bindValue(':genre', $genre);
$statement->bindValue(':image', $image);
$statement->execute();
$statement->closeCursor();

$_SESSION["movieTitle"] = $title;
header("Location: update_movie_confirmation.php");
exit();
?>