<?php
require_once('database.php');

$movie_id = filter_input(INPUT_GET, 'movie_id', FILTER_VALIDATE_INT);

if ($movie_id == null || $movie_id === false) {
    $error_message = "Invalid or missing movie ID.";
    include('database_error.php');
    exit();
}

$query = 'SELECT * FROM movies WHERE movie_id = :movie_id';
$statement = $db->prepare($query);
$statement->bindValue(':movie_id', $movie_id);
$statement->execute();
$movie = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

if (!$movie) {
    $error_message = "Movie record not found.";
    include('database_error.php');
    exit();
}

include('header.php');
?>
<main>
    <h2>Update Movie</h2>
    <form action="update_movie.php" method="post">
        <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['movie_id']); ?>">

        <label>Title:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($movie['title']); ?>"><br><br>

        <label>Director:</label><br>
        <input type="text" name="director" value="<?= htmlspecialchars($movie['director']); ?>"><br><br>

        <label>Release Year:</label><br>
        <input type="number" name="release_year" value="<?= htmlspecialchars($movie['release_year']); ?>"><br><br>

        <label>Genre:</label><br>
        <input type="text" name="genre" value="<?= htmlspecialchars($movie['genre']); ?>"><br><br>

        <label>Image Filename:</label><br>
        <input type="text" name="image" value="<?= htmlspecialchars($movie['image']); ?>"><br><br>

        <input type="submit" value="Save Changes">
    </form>
    <p><a href="index.php">Cancel</a></p>
</main>
<?php include('footer.php'); ?>