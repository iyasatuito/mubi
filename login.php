<!-- include header file -->
<?php include 'partials/header-login.php'; ?>

<script>
    function login() {
        document.getElementById("loginAccount").submit();
    }
</script>

<div id="login">
    <div class="login-container">
        <form id="loginAccount" method="post" action="process-login.php">
            <div id="login-group" class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $thisUser->userFirst; ?>" required />
            </div>

            <div id="login-group" class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $thisUser->userLast; ?>" required />
            </div>
        </form>

        <button class="btn btn-mubi" onclick="login()">
            Login
        </button>
    </div>    
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>