<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

<script>
    function addmovie() {
        document.getElementById("addMovie").submit();
    }
</script>

<div id="edit">
    <div class="container">
        <div class="row">
            <form id="addMovie" method="post" action="process-add-movie.php">
                <div id="add-movie-group" class="form-group">
                    <label for="movTitle">Title</label>
                    <input type="text" class="form-control" id="movTitle" name="movTitle" value="<?php echo $thisUser->userFirst; ?>" required />
                </div>

                <div id="add-movie-group" class="form-group">
                    <label for="movDescription">Description</label>
                    <input type="text" textarea="text" class="form-control" id="movDescription" name="movDescription" value="<?php echo $thisUser->userLast; ?>" required />
                </div>

                <div id="add-movie-group" class="form-group">
                    <label for="movDirector">Director/s</label>
                    <input type="text" class="form-control" id="movDirector" name="movDirector" value="<?php echo $thisUser->userLast; ?>" required />
                </div>

                <div id="add-movie-group" class="form-group">
                    <label for="movActor">Actor/s</label>
                    <input type="text" class="form-control" id="movActor" name="movActor" value="<?php echo $thisUser->userLast; ?>" required />
                </div>

                <div id="add-movie-group" class="form-group">
                    <label for="movDuration">Duration</label>
                    <input type="text" class="form-control" id="movDuration" name="movDuration" value="<?php echo $thisUser->userLast; ?>" required />
                </div>
                <div id="add-movie-group" class="form-group">
                    <span><button class="btn btn-mubi">
                            File Upload
                        </button></span> </div>
                <div id="add-movie-group" class="form-group">
                    <span><button class="btn btn-mubi">
                            File Upload
                        </button></span> </div>
                <div id="add-movie-group" class="form-group">
                    <label for="trailer">Trailer URL</label>
                    <input type="text" class="form-control" id="trailer" name="trailer" value="<?php echo $thisUser->userLast; ?>" required />
                </div>
                <span id="add-movie-group" class="form-group">
                    <input type="checkbox" id="isFeature" name="isFeature" value="<?php echo $thisUser->userLast; ?>" required />
                    <label for="isFeature">Feature on Homepage</label>
                </span>
            </form>

            <span><button class="btn btn-mubi" onclick="addmovie()">
                    Submit
                </button></span>
            <br>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>