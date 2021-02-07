<?php include 'header.php'; ?>
<table class="table table-hover">
  <caption><h1>Movie List</h1></caption>
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Genre</th>
      <th scope="col">Release Year</th>
      <th scope="col">Rating</th>
      <th scope="col">IMDB Score</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($movies as $movie) : ?>
      <tr>
        <td><?php echo $movie['MovieTitle']; ?></td>
        <td><?php echo $movie['MovieGenre']; ?></td>
        <td><?php echo $movie['ReleaseYear']; ?></td>
        <td><?php echo $movie['MovieRating']; ?></td>
        <td><?php echo $movie['IMDB_Score']; ?></td>
        <td>
          <form action="." method="post">
            <input type="hidden" name="action" value="show-update-movie">
            <input type="hidden" name="ID" value="<?php echo $movie['ID']; ?>">
            <input type="submit" class="btn btn-secondary" value="Update" aria-label="Update
            <?php echo $movie['MovieTitle']; ?>">

          </form>
        </td>
      <td>
        <form action="." method="post">
          <input type="hidden" name="action" value="delete-movie">
          <input type="hidden" name="ID" value="<?php echo $movie['ID']; ?>">
          <input type="submit" class="btn btn-secondary" value="Delete" aria-label="Delete
          <?php echo $movie['MovieTitle']; ?>">

        </form>
      </td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php include 'footer.php'; ?>
