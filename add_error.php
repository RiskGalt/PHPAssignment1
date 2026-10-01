<?php include('header.php'); ?>
<main>
    <h2>Add Error</h2>
    <p style="color: red;"><?= htmlspecialchars($error_message); ?></p>
    <p><a href="add_movie_form.php">Try Again</a></p>
    <p><a href="index.php">Return to Catalog</a></p>
</main>
<?php include('footer.php'); ?>