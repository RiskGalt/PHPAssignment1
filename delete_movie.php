<?php
require_once('database.php');

$movie_id = filter_input(INPUT_POST, 'movie_id', FILTER_VALIDATE_INT);

if ($movie_id == null || $movie_id === false) {
    $error_message = "Invalid movie ID.";
    include('database_error.php');
    exit();
}

$query = 'DELETE FROM movies WHERE movie_id = :movie_id';
$statement = $db->prepare($query);
$statement->bindValue(':movie_id', $movie_id);
$statement->execute();
$statement->closeCursor();

header("Location: index.php");
exit();
?>