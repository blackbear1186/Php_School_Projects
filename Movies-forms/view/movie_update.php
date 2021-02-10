<?php include 'header.php'; ?>
    <h1 class="text-center">Update Movie</h1>

    <form action="." method="post" class="col-lg-6 mx-auto">
        <hr>
        <div class="form-group">
            <label>Movie ID</label>
            <input type="text" class="form-control" name="ID" id="ID" value="<?php echo $movie['ID']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="movie-title">Movie Title</label>
            <input type="text" name="movie-title" id="movie-title" class="form-control" placeholder="Movie Title"
                   value="<?php echo isset($movieTitle) ? $movieTitle : $movie['MovieTitle']; ?>" autofocus>
        </div>
        <div class="form-group">
            <label for="movie-genre">Movie Genre</label>
            <input type="text" name="movie-genre" id="movie-genre" class="form-control" placeholder="Movie Genre"
                   value="<?php echo isset($movieGenre) ? $movieGenre : $movie['MovieGenre']; ?>">
        </div>
        <div class="form-group">
            <label for="release-year">Release Year</label>
            <input type="text" name="release-year" id="release-year" class="form-control" placeholder=
            "Year of Release" value="<?php echo isset($releaseYear) ? $releaseYear : $movie['ReleaseYear']; ?>">
        </div>
        <div class="form-group">
            <label for="movie-rating">Rating</label>
            <select class="custom-select" name="movie-rating" id="movie-rating">
                // if movieRating equals to state value then show selected
                <option value="G"<?php if($movieRating === 'G' || (!isset($movieRating) && $movie['MovieRating'] === 'G')) echo ' selected'; ?>>G</option>
                <option value="PG"<?php if($movieRating === 'PG' || (!isset($movieRating) && $movie['MovieRating'] === 'PG')) echo ' selected'; ?>>PG</option>
                <option value="PG-13"<?php if($movieRating === 'PG-13' || (!isset($movieRating) && $movie['MovieRating'] === 'PG-13')) echo ' selected'; ?>>PG-13</option>
                <option value="R"<?php if($movieRating === 'R' || (!isset($movieRating) && $movie['MovieRating'] === 'R')) echo ' selected'; ?>>R</option>
            </select>
        </div>
        <div class="form-group">
            <label for="imdb-score">IMDB Score</label>
            <input type="text" name="imdb-score" id="imdb-score" class="form-control" placeholder="IMDB Score"
                   value="<?php echo isset($imdbScore) ? $imdbScore : $movie['IMDB_Score']; ?>">
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="ID" value="<?php echo $movie['ID']; ?>">
            <input type="hidden" name="action" value="update-movie">
            <input type="submit" class="btn btn-secondary" value="Update Movie">
            <a href="." class="btn btn-secondary">Cancel</a>
        </div>
    </form>
<?php include 'footer.php';
