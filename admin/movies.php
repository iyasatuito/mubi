<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

<script>

    function deleteMovie(){
        if (confirm('Are you sure you want to delete this user?')) {
             console.log('User deleted');
             httpGet()
        } else {
             // Do nothing!
            console.log('User not');
        }
    }

    function httpGet() {
        let xmlHttpReq = new XMLHttpRequest();
        xmlHttpReq.open("GET", "process-delete-movie.php?movieTitle=<?php echo $result->movieTitle ?>", true); 
        xmlHttpReq.send(null);
        return xmlHttpReq.responseText;
    }
 

</script>


<?php
 require 'partials/connect.php';


$getmovies = $mysqli->query("SELECT DISTINCT movieTitle, movieDirector, movieActor, isScreening FROM movie");

    // close database connection
mysqli_close($mysqli);
?>

<div id="movies">
    <div class="container">
        <div class="row">
            <div class="col-4">
                    <div class="text-md-left"><a href="home.php">DASHBOARD</a></div>
                    <div class=""><a href="movies.php">MOVIES</a></div>
                    <div class=""><a href="addmovie.php">ADD MOVIE</a></div>
                    <div class=""><a href="schedule.php">SCHEDULE</a></div>
                    <div class=""><a href="users.php">USERS</a></div>
                    <div class=""><a href="process-logout.php">LOGOUT</a></div>
            </div>
            <div class="col-8">
                <!-- content -->
                <table class="table-overall">
                    <thead>
                        <!--Headers !-->
                        <tr class="table-head">
                            <th>Movie</th>
                            <th>Director</th>
                            <th>Actor</th>
                            <th>Status</th>
                            <th>Ticket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = $getmovies->fetch_object()) {
                            $status = "";
                            if($result->isScreening == '1'){
                                $status = "Now Showing";
                            } elseif($result->isScreening == '0') {
                                $status = "Upcoming";
                            } else {
                                $status = "Past Movie";
                            }
                        ?>
                            <tr>
                                <td >
                                    <div class="browse-book-cover-bg-img"></div>
                                    <p><?php echo $result->movieTitle; ?></p>
                                </td>
                                <td >
                                    <p><?php echo $result->movieDirector; ?></p>
                                </td>
                                <td >
                                    <p><?php echo $result->movieActor; ?></p>
                                </td>
                                <td >
                                    <p><?php echo $status; ?></p>
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