<!-- include header file -->
<?php include 'partials/header.php'; ?>
<script>
    function editAdminAccount() {

        var userRole = document.getElementById("userRoleList").value;
        addHidden(document.getElementById("editAdminAccount"), "userRole", userRole);

        document.getElementById("editAdminAccount").submit();
    }

    function addHidden(form, key, value) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }
</script>

<div id="edit">
    <div class="container">
        <div class="row">
            <form id="editAdminAccount" method="post" action="process-edit-admin-account.php">
                <div id="edit-admin-group" class="form-group">
                    <input type="hidden" class="form-control" id="userID" name="userID" value="<?php echo $_GET['userID']; ?>" required />
                </div>
                <div id="edit-admin-group" class="form-group">
                    <label for="fName">First Name</label>
                    <input type="text" class="form-control" id="fName" name="fName" value="<?php echo $thisUser->userFirst; ?>" required />
                </div>

                <div id="edit-admin-group" class="form-group">
                    <label for="lName">Last Name</label>
                    <input type="text" class="form-control" id="lName" name="lName" value="<?php echo $thisUser->userLast; ?>" required />
                </div>

                <div id="edit-admin-group" class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $thisUser->userLast; ?>" required />
                </div>

                <div id="edit-admin-group" class="form-group">
                    <label for="password">Change Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $thisUser->userLast; ?>" required />
                </div>

                <div id="edit-admin-group" class="form-group">
                    <form class="userRole" action="" method="">
                        <select name="userRoleList" id="userRoleList">
                            <option value="0">Customer</option>
                            <option value="1">Admin</option>
                        </select>
                    </form>
                </div>
            </form>

            <span><button class="btn btn-mubi" onclick="editAdminAccount()">
                    Update
                </button></span>
            <br>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>