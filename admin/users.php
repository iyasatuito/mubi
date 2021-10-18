<?php include 'partials/admin-header.php'; ?>

<?php
 require 'partials/connect.php';

// query users for admin
$getusers = $mysqli->query("SELECT * FROM user");

// $results = $getusers->fetch_object();


// close database connection
mysqli_close($mysqli);
?>

<div id="movies">
    <div class="container">
        <div class="row">
            <div class="col col-sm-4">
                <!-- left menu here -->
            </div>
            <div class="col col-sm-10">
                <!-- content -->
                <table class="table-overall">
                    <thead>
                        <!--Headers !-->
                        <tr class="table-head">
                            <th style="width:25%">Name</th>
                            <th style="width:25%">Email</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = $getusers->fetch_object()) {
                        ?>
                            <tr>
                                <td >
                                    <div class="browse-book-cover-bg-img"></div>
                                    <p><?php echo $result->userFirst." ".$result->userLast; ?></p>
                                </td>
                                <td >
                                    <p><?php echo $result->userEmail; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $result->userRole; ?></p>
                                </td>
                                <td>
                                    <a href='edit-admin-account.php?userID=<?php echo $result->userID ?>'><img class="edit-book-space" src="assets/user/edit.png" width="26" height="24"></a>
                                    <a href='edit-admin-account.php?userID=<?php echo $result->userID ?>'><img class="edit-book-space" src="assets/user/delete.png" width="24" height="24"></a>
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