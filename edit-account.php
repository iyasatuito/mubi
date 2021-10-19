<!-- include header file -->
<?php include 'partials/header.php'; ?>

<!-- query user details -->
<?php
    // connect to database
    require 'partials/connect.php';

    // userID
    $userID = $_SESSION['userID'];

    // query selected user
    $getUser = $mysqli->query("SELECT * FROM user WHERE userID = '$userID'");
    $thisUser = $getUser->fetch_object();

    // close database connection
    mysqli_close($mysqli);
?>

<script>
    function editAccount() {
        document.getElementById("editAccount").submit();
    }
</script>

<div id="edit">
    <div class="container">
        <div class="row">            
            <form id="editAccount" method="post" action="process-edit-account.php">
                <?php
                    if($_SESSION['feedback']!=""){
                        echo '<div class="feedback">'.$_SESSION['feedback'].'</div>';
                    }

                    $_SESSION['feedback']="";
                ?>
                <div id="register-group" class="form-group">
                    <label for="fName">First Name</label>
                    <input type="text" class="form-control" id="fName" name="fName" value="<?php echo $thisUser->userFirst; ?>" required />
                </div>
                <div id="register-group" class="form-group">
                    <label for="lName">Last Name</label>
                    <input type="text" class="form-control" id="lName" name="lName" value="<?php echo $thisUser->userLast; ?>" required />
                </div>
                <div id="register-group" class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $thisUser->userLast; ?>" required />
                </div>
                <div id="register-group" class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $thisUser->userLast; ?>" required />
                </div>
                <div id="register-group" class="form-group">
                    <label for="confPassword">Confirm Password</label>
                    <input type="text" class="form-control" id="confPassword" name="confPassword" value="<?php echo $thisUser->userLast; ?>" required />
                </div>
                <br>
                <button class="btn btn-mubi" onclick="editAccount()">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>