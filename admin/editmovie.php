<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

<script>
    function editMovie() {

        var isFeatureValue = 0;
        if (document.getElementById("isFeature").checked) {
            isFeatureValue = 1;
        }

        var screeningStatus = document.getElementById("isScreening").value;

        addHidden(document.getElementById("editMovie"), "isFeatured", isFeatureValue);
        addHidden(document.getElementById("editMovie"), "isScreening", screeningStatus);

        document.getElementById("editMovie").submit();
    }

    function addHidden(form, key, value) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }
</script>

<?php

require 'partials/connect.php';

$movieTitle = $_GET['movieTitle'];
$getMovie = $mysqli->query("SELECT * FROM movie WHERE movie.movieTitle = '$movieTitle'");
$result = $getMovie->fetch_object();

?>

<div class="col col-lg-9 content">
    <div id="edit">
        <div class="container">
            <div class="row">
                <form id="editMovie" method="post" action="process-edit-movie.php">
                    <div id="edit-movie-group" class="form-group">
                        <input type="hidden" class="form-control" id="movieID" name="movieID" value="<?php echo $result->movieID; ?>" required />
                    </div>
                    <div id="edit-movie-group" class="form-group">
                        <label for="movTitle">Title</label>
                        <input type="text" class="form-control" id="movTitle" name="movTitle" value="<?php echo $result->movieTitle; ?>" required />
                    </div>

                    <div id="edit-movie-group" class="form-group">
                        <label for="movDescription">Description</label>
                        <input type="text" textarea="text" class="form-control" id="movDescription" name="movDescription" value="<?php echo $result->movieDescription; ?>" required />
                    </div>

                    <div id="edit-movie-group" class="form-group">
                        <label for="movDirector">Director/s</label>
                        <input type="text" class="form-control" id="movDirector" name="movDirector" value="<?php echo $result->movieDirector; ?>" required />
                    </div>

                    <div id="edit-movie-group" class="form-group">
                        <label for="movActor">Actor/s</label>
                        <input type="text" class="form-control" id="movActor" name="movActor" value="<?php echo $result->movieActor; ?>" required />
                    </div>

                    <div id="edit-movie-group" class="form-group">
                        <label for="movDuration">Duration</label>
                        <input type="text" class="form-control" id="movDuration" name="movDuration" value="<?php echo $result->movieDuration; ?>" required />
                    </div>
                    <div id="edit-movie-group" class="form-group">
                        <span><button class="btn btn-mubi">
                                File Upload
                            </button></span> </div>
                    <div id="edit-movie-group" class="form-group">
                        <span><button class="btn btn-mubi">
                                File Upload
                            </button></span> </div>
                    <div id="edit-movie-group" class="form-group">
                        <label for="trailer">Trailer URL</label>
                        <input type="text" class="form-control" id="trailer" name="trailer" value="<?php echo $result->movieTrailer; ?>" required />
                    </div>
                    <div id="edit-movie-group" class="form-group">
                        <input type="checkbox" id="isFeature" name="isFeature" value="<?php echo $result->isFeature; ?>" />
                        <label class="custom-control-label" for="isFeature">Feature on Homepage</label>
                    </div>
                    <!-- <div id="edit-movie-group" class="form-group">
                        <input type="checkbox" id="isScreening" name="isScreening" value="<?php //echo $result->isScreening; 
                                                                                            ?>" />
                        <label class="custom-control-label" for="isScreening">Now Showing</label>
                    </div> -->
                    <div id="edit-movie-group" class="form-group">
                        <label for="isScreening">Change Role</label>
                        <form action="" method="">
                            <select class="form-control" name="isScreening" id="isScreening">
                                <option value="0" <?php if ($result->isScreening == '0') {
                                                        echo ("selected");
                                                    } ?>>Upcoming</option>
                                <option value="1" <?php if ($result->isScreening == '1') {
                                                        echo ("selected");
                                                    } ?>>Now Showing</option>
                                <option value="2" <?php if ($result->isScreening == '2') {
                                                        echo ("selected");
                                                    } ?>>Past Movie</option>
                            </select>
                        </form>
                    </div>
                </form>

                <span><button class="btn btn-mubi" onclick="editMovie()">
                        Submit
                    </button></span>
                <br>
            </div>
            <?php
            if ($_SESSION['feedback'] != "") {
                echo '<div class="feedback">' . $_SESSION['feedback'] . '</div>';
            }
            $_SESSION['feedback'] = "";
            ?>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>