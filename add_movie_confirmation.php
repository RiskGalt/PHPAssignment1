<?php
session_start();
$title = $_SESSION["movieTitle"] ?? 'Movie';
include('header.php');
?>
<main>
    <h2>Movie Added</h2>
    <p><strong><?= htmlspecialchars($title); ?></strong> has been successfully added to the database.</p>
    <p><a href="index.php">Return to Catalog</a></p>
</main>
<?php include('footer.php'); ?>