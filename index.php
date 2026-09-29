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
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Director</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?= htmlspecialchars($movie['movie_id']); ?></td>
                    <td><?= htmlspecialchars($movie['title']); ?></td>
                    <td><?= htmlspecialchars($movie['director']); ?></td>
                    <td><?= htmlspecialchars($movie['release_year']); ?></td>
                    <td><?= htmlspecialchars($movie['genre']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include('footer.php'); ?>