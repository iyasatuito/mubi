<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

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
                <ul>
                    <li>DASHBOARD</li>
                    <li>MOVIES</li>
                    <li>ADD MOVIE</li>
                    <li>SCHEDULE</li>
                    <li>USERS</li>
                    <li>LOGOUT</li>
                </ul>
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
                                <a href='edit-admin-account.php?userID=<?php echo $result->movieTitle ?>'><img class="edit-book-space" src="assets/user/delete.png" width="24" height="24"></a>
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