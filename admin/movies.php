<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

<script>

    function deleteMovie(){
        if (confirm('Are you sure you want to delete this user?')) {
             console.log('User deleted');

        } else {
             // Do nothing!
            console.log('User not');
        }
    }
 

</script>


<?php
 require 'partials/connect.php';

// query movies for admin
$getmovies = $mysqli->query("SELECT movieTitle, scheduleDate FROM schedule LEFT JOIN movie ON schedule.movieID = movie.movieID");

// $results = $getmovies->fetch_object();
// echo $results;


    // close database connection
mysqli_close($mysqli);
?>

<div id="movies">
    <div class="container">
        <div class="row">
            <div class="col-4">
                    <div class="text-md-left">DASHBOARD</div>
                    <div class=""><a href="movies.php">MOVIES</a></div>
                    <div class=""><a href="addmovie.php">ADD MOVIE</a></div>
                    <div class=""><a href="schedule.php">SCHEDULE</a></div>
                    <div class=""><a href="users.php">USERS</a></div>
                    <div class=""><a href="movies.php">LOGOUT</a></div>
            </div>
            <div class="col-8">
                <!-- content -->
                <table class="table-overall">
                    <thead>
                        <!--Headers !-->
                        <tr class="table-head">
                            <th style="width:25%">Movie</th>
                            <th style="width:25%">Start</th>
                            <th>End</th>
                            <th>Ticket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = $getmovies->fetch_object()) {
                        ?>
                            <tr>
                                <td >
                                    <div class="browse-book-cover-bg-img"></div>
                                    <p><?php echo $result->movieTitle; ?></p>
                                </td>
                                <td >
                                    <p><?php echo $result->scheduleDate; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $result->scheduleDate; ?></p>
                                </td>
                                <td> <!-- edit movie -->
                                <a href='editmovie.php?movieTitle=<?php echo $result->movieTitle ?>'><img class="edit-book-space" src="assets/user/edit.png" width="26" height="24"></a>
                                <a href='process-delete-movie.php?movieTitle=<?php echo $result->movieTitle ?>'><img class="edit-book-space" src="assets/user/delete.png" width="24" height="24"></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>