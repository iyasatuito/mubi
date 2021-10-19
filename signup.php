<!-- include header file -->
<?php include 'partials/header.php'; ?>
<script>
    function signup() {

        var userId = "U" + Math.floor(100 + Math.random() * 900)
        addHidden(document.getElementById("registrationForm"), "userID", userId);
        document.getElementById("registrationForm").submit();
    }

    function addHidden(form, key, value) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }
</script>

<div id="signup">
    <div class="login-container">
        <form id="registrationForm" method="post" action="process-signup.php">
            <div id="register-group" class="form-group">
                <label for="fName">First Name</label>
                <input type="text" class="form-control" id="fName" name="fName" required />
            </div>

            <div id="register-group" class="form-group">
                <label for="lName">Last Name</label>
                <input type="text" class="form-control" id="lName" name="lName" required />
            </div>

            <div id="register-group" class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" required />
            </div>

            <div id="register-group" class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>

            <div id="register-group" class="form-group">
                <label for="confPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confPassword" name="confPassword" required />
            </div>
        </form>

        <button class="btn btn-mubi" onclick="signup()">
            Register
        </button>
        <?php
        if ($_SESSION["passwordError"] == "true") {
            $_SESSION["passwordError"] == "";
        ?>
            <div id="movieList">
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Error!</strong> Passwords do not match!
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        if ($_SESSION["signUpSuccess"] == "false") {
            $_SESSION["signUpSuccess"] == "";
        ?>
            <div id="movieList">
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Error!</strong> Failed to sign up!
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>