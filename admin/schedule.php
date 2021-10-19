<?php include 'partials/admin-header.php'; ?>

<?php
require 'partials/connect.php';

$movieResults = $mysqli->query("SELECT movieID, movieTitle FROM movie");

$cinemaResults = $mysqli->query("SELECT cinemaID, cinemaName FROM cinema");

/* close connection */
// mysqli_close($dbc);
?>

<script>
    function addSchedule() {
        //generate a number that is 6 digit in length
        var schedID = "S" + Math.floor(100 + Math.random() * 900)

        var movieTitle = document.getElementById("movieList").value;
        var cinemaName = document.getElementById("cinemaList").value;
        var dateX = document.getElementById("scheduleDate").value;
        // var timeX = document.getElementById("schedTime").value; todo not working

        // Add hidden data:
        addHidden(document.getElementById("addSchedule"), "schedID", schedID);
        addHidden(document.getElementById("addSchedule"), "movieTitle", movieTitle);
        addHidden(document.getElementById("addSchedule"), "cinemaName", cinemaName);
        addHidden(document.getElementById("addSchedule"), "scheduleDate", dateX);
        // addHidden(document.getElementById("addSchedule"), "scheduleTime", timeX);

        // Submit the form:
        document.getElementById("addSchedule").submit();

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
    <div id="schedule">
        <form id="addSchedule" method="post" action="process-schedule.php">
            <div id="add-movie-group" class="form-group">
                <label for="movieList">Select Movie</label>
                <select class="form-control" name="movieList" id="movieList">
                    echo '<option value="" style="color:black;">Select Movie</option>';
                    <?php
                    while ($movie = $movieResults->fetch_object()) {
                        echo '<option value="' . $movie->movieTitle . '">' . $movie->movieTitle . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div id="add-movie-group" class="form-group">
                <label for="cinemaList">Select Cinema</label>
                <select name="cinemaList" id="cinemaList" class="form-control">
                    echo '<option value="" style="color:black;">Select cinema</option>';
                    <?php
                    while ($cinema = $cinemaResults->fetch_object()) {
                        echo '<option value="' . $cinema->cinemaName . '">' . $cinema->cinemaName . '</option>';
                    }
                    ?>
                </select>

            </div>

            <div id="add-movie-group" class="form-group">
                <label for="scheduleDate">Date</label>
                <input type="date" min="2021-10-20" max="2021-12-20" class="form-control" id="scheduleDate" name="scheduleDate" required />
            </div>

            <div id="add-movie-group" class="form-group">
                <label for="schedTime">Time</label>
                <input type="time" id="appt" min="09:00" max="18:00" class="form-control" id="schedTime" name="schedTime" />
            </div>
            <button class="btn btn-mubi" onclick="addSchedule()">
                Submit
            </button>
        </form>

        
        <?php
        if ($_SESSION['feedback'] != "") {
            echo '<div class="feedback">' . $_SESSION['feedback'] . '</div>';
        }
        $_SESSION['feedback'] = "";
        ?>

    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>