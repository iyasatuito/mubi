<!-- include header file -->
<?php
    include 'partials/admin-header.php';
?>

<script>
    function addmovie() {

        var movId = "M" + Math.floor(100 + Math.random() * 900)

        var isFeatureValue = 0;
        if (document.getElementById("isFeature").checked) {
            isFeatureValue = 1;
        }

        var screeningStatus = document.getElementById("isScreening").value;

        addHidden(document.getElementById("addMovie"), "movieID", movId);
        addHidden(document.getElementById("addMovie"), "isFeatured", isFeatureValue);
        addHidden(document.getElementById("addMovie"), "isScreening", screeningStatus);

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

<div class="col col-lg-9 content">
    <div id="edit">
        <?php echo $_SESSION['movieHero']; ?>
        <form id="addMovie" method="post" action="process-add-movie.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="movTitle">Title</label>
                <input type="text" class="form-control" id="movTitle" name="movTitle" required />
            </div>
            <div class="form-group">
                <label for="movDescription">Description</label>
                <input type="text" textarea="text" class="form-control" id="movDescription" name="movDescription" required />
            </div>
            <div class="form-group">
                <label for="movDirector">Director/s</label>
                <input type="text" class="form-control" id="movDirector" name="movDirector" required />
            </div>
            <div class="form-group">
                <label for="movActor">Actor/s</label>
                <input type="text" class="form-control" id="movActor" name="movActor"  required />
            </div>
            <div class="form-group">
                <label for="trailer">Trailer URL</label>
                <input type="text" class="form-control" id="trailer" name="trailer" required />
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="isFeature" name="isFeature" />
                <label class="custom-control-label" for="isFeature">Feature on Homepage</label>
            </div>
            <div class="form-group">
                <label for="isScreening">Screening Status</label>
                <form action="" method="">
                    <select class="form-control" name="isScreening" id="isScreening">
                        <option value="0">Upcoming</option>
                        <option value="1">Now Showing</option>
                        <option value="2">Past Movie</option>
                    </select>
                    <div>
                        <button class="btn btn-mubi" onclick="addmovie()">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </form>        
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>