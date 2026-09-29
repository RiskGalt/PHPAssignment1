<?php include('header.php'); ?>
<main>
    <h2>Database Error</h2>
    <p>There was an error connecting to the database.</p>
    <p>Error message: <?= htmlspecialchars($error_message); ?></p>
</main>
<?php include('footer.php'); ?>