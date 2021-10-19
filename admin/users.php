<?php include 'partials/admin-header.php'; ?>

<script>
    function deleteUser() {
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

// query users for admin
$getusers = $mysqli->query("SELECT * FROM user WHERE user.userRole <> '2'");

mysqli_close($mysqli);
?>

<div class="col col-lg-9 content">
    <div id="movies">
        <!-- content -->
        <table class="table-overall">
            <thead>
                <!--Headers !-->
                <tr class="table-head">
                    <th style="width:25%">Name</th>
                    <th style="width:25%">Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $getusers->fetch_object()) {
                ?>
                    <tr>
                        <td>
                            <div class="browse-book-cover-bg-img"></div>
                            <p><?php echo $result->userFirst . " " . $result->userLast; ?></p>
                        </td>
                        <td>
                            <p><?php echo $result->userEmail; ?></p>
                        </td>
                        <td>
                            <p><?php if ($result->userRole == '0') {
                                    echo ("Customer");
                                } else {
                                    echo ("Admin");
                                } ?></p>
                        </td>
                        <td>
                            <a href='edit-admin-account.php?userID=<?php echo $result->userID ?>'><?php require 'partials/pen.php'; ?></a>
                            <a href='process-delete-user.php?userID=<?php echo $result->userID ?>'><?php require 'partials/trash.php'; ?></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>