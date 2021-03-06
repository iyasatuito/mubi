<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

<script>
    function addmovie() {

        var movId = "M" + Math.floor(100 + Math.random() * 900)

        var isFeatureValue = 0;
        if(document.getElementById("isFeature").checked){
            isFeatureValue = 1;
        }

        addHidden(document.getElementById("addMovie"), "movieID", movId);
        addHidden(document.getElementById("addMovie"), "isFeatured", isFeatureValue);

        document.getElementById("addMovie").submit();
    }

    function addHidden(form, key, value) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }
</script>

<div id="edit">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="text-md-left">DASHBOARD</div>
                <div class=""><a href="movies.php">MOVIES</a></div>
                <div class=""><a href="addmovie.php">ADD MOVIE</a></div>
                <div class=""><a href="schedule.php">SCHEDULE</a></div>
                <div class=""><a href="users.php">USERS</a></div>
                <div class=""><a href="movies.php">LOGOUT</a></div>
            </div>
            <div class="col-10">
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
                    <div id="add-movie-group" class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="isFeature" name="isFeature" value="<?php echo $thisUser->userLast; ?>" required />
                        <label class="custom-control-label" for="isFeature">Feature on Homepage</label>
                    </div>
                </form>

                <span><button class="btn btn-mubi" onclick="addmovie()">
                        Submit
                    </button></span>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>