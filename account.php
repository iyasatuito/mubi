<!-- include header file -->
<?php include 'partials/header.php'; ?>

<div id="account">
    <div class="container">
        <h1>Edit Account</h1>

        <div class="msg"></div>

        <form id="editAccount" action="" method="">
            <div id="name-group" class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name" />
            </div>

            <div id="name-group" class="form-group">
                <label for="lname">Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name" />
            </div>

            <div id="email-group" class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" />
            </div>

            <div id="password-group" class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" />
            </div>

            <div id="cpassword-group" class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="text" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password" />
            </div>

            <button type="submit" id="editAccountSubmit" class="btn btn-mubi">
                Submit
            </button>
        </form>
    </div>

</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>