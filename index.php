<?php
require_once('database.php');

$query = 'SELECT * FROM movies ORDER BY movie_id';
$statement = $db->prepare($query);
$statement->execute();
$movies = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

include('header.php');
?>
<main>
    <h2>Movie Catalog</h2>
    <p><a href="add_movie_form.php" class="btn">Add New Movie</a></p>
    <table>
        <thead>
            <tr>
                <th>Poster</th>
                <th>Title</th>
                <th>Director</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td>
                        <img src="images/<?= htmlspecialchars($movie['image']); ?>" 
                             alt="<?= htmlspecialchars($movie['title']); ?>" 
                             style="width: 50px; height: auto; border-radius: 4px;">
                    </td>
                    <td><?= htmlspecialchars($movie['title']); ?></td>
                    <td><?= htmlspecialchars($movie['director']); ?></td>
                    <td><?= htmlspecialchars($movie['release_year']); ?></td>
                    <td><?= htmlspecialchars($movie['genre']); ?></td>
                    <td>
                        <form action="update_movie_form.php" method="get">
                            <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['movie_id']); ?>">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                    <td>
                        <form action="delete_movie.php" method="post">
                            <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['movie_id']); ?>">
                            <input type="submit" value="Delete" onclick="return confirm('Delete this record?');">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include('footer.php'); ?>