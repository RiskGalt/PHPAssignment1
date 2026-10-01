<?php
session_start();
$title = $_SESSION["movieTitle"] ?? 'Movie';
include('header.php');
?>
<main>
    <h2>Update Successful</h2>
    <p><strong><?= htmlspecialchars($title); ?></strong> was updated successfully.</p>
    <p><a href="index.php">Return to Catalog</a></p>
</main>
<?php include('footer.php'); ?>