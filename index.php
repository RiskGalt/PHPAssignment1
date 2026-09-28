<?php
require_once('database.php');

$query = 'SELECT * FROM movies ORDER BY movie_id';
$statement = $db->prepare($query);
$statement->execute();
$movies = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List - PHPAssignment1</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Movie Database</h1>
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
</body>
</html>