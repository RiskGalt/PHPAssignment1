<?php include('header.php'); ?>
<main>
    <h2>Add New Movie</h2>
    <form action="add_movie.php" method="post">
        <label>Title:</label><br>
        <input type="text" name="title"><br><br>

        <label>Director:</label><br>
        <input type="text" name="director"><br><br>

        <label>Release Year:</label><br>
        <input type="number" name="release_year"><br><br>

        <label>Genre:</label><br>
        <input type="text" name="genre"><br><br>

        <label>Image Filename (e.g., default.jpg):</label><br>
        <input type="text" name="image" value="default.jpg"><br><br>

        <input type="submit" value="Add Movie">
    </form>
    <p><a href="index.php">Cancel</a></p>
</main>
<?php include('footer.php'); ?>