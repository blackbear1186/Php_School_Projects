<?php include 'header.php'; ?>
<h1 class="text-center">Add Movie</h1>

<form action="." method="post" class="col-lg-6 mx-auto">
    <hr>
    <div class="form-group">
        <label for="movie-title">Movie Title</label>
        <input type="text" name="movie-title" id="movie-title" class="form-control" placeholder="Movie Title"
        value="<?php if (!is_null($movieTitle)) echo $movieTitle; ?>" autofocus>
    </div>
    <div class="form-group">
        <label for="movie-genre">Movie Genre</label>
        <input type="text" name="movie-genre" id="movie-genre" class="form-control" placeholder="Movie Genre"
               value="<?php if (!is_null($movieGenre)) echo $movieGenre; ?>">
    </div>
    <div class="form-group">
        <label for="release-year">Release Year</label>
        <input type="text" name="release-year" id="release-year" class="form-control" placeholder=
        "Year of Release" value="<?php if (!is_null($releaseYear)) echo $releaseYear; ?>">
    </div>
    <div class="form-group">
        <label for="movie-rating">Rating</label>
        <select class="custom-select" name="movie-rating" id="movie-rating">
            // if movieRating equals to state value then show selected
            <option value="choose">Specify Rating</option>
            <option value="G"<?php if($movieRating === 'G') echo ' selected'; ?>>G</option>
            <option value="PG"<?php if($movieRating === 'PG') echo ' selected'; ?>>PG</option>
            <option value="PG-13"<?php if($movieRating === 'PG-13') echo ' selected'; ?>>PG-13</option>
            <option value="R"<?php if($movieRating === 'R') echo ' selected'; ?>>R</option>
        </select>
    </div>
    <div class="form-group">
        <label for="imdb-score">IMDB Score</label>
        <input type="text" name="imdb-score" id="imdb-score" class="form-control" placeholder="IMDB Score"
               value="<?php if (!is_null($imdbScore)) echo $imdbScore; ?>">
    </div>
    <div class="form-group text-center">
        <input type="hidden" name="action" value="add-movie">
        <input type="submit" class="btn btn-secondary" value="Add Movie">
        <a href="." class="btn btn-secondary">Cancel</a>
    </div>
</form>
<?php include 'footer.php';