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

<div id="account">
    <div class="container">
        <h1>Edit Account</h1>

        <div class="msg"></div>

        <form id="editAccount" action="process.php" method="POST">
            <div id="name-group" class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $thisUser->userFirst; ?>" required />
            </div>

            <div id="name-group" class="form-group">
                <label for="lname">Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $thisUser->userLast; ?>" required />
            </div>

            <div id="email-group" class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $thisUser->userEmail; ?>" required />
            </div>

            <div id="password-group" class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $thisUser->userPassword; ?>" required />
            </div>

            <div id="cpassword-group" class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?php echo $thisUser->userPassword; ?>" required />
            </div>

            <button type="submit" id="editAccountSubmit" class="btn btn-mubi">
                Submit
            </button>
        </form>
    </div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>