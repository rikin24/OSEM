<?php
include "./emp-UI.php";
?>

<body>
<h2 class="text-dark text-center p-3">Change Password</h2>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 20vh">
    <form class="p-4 rounded-3 bg-white align-items-center"
          style="width: 50%;"
          action="php/emp-c-pass.php"
          method="post">
        <?php if (isset($_GET['error'])) { ?>
            <!--Fetch appropriate error-->
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } else if (isset($_GET['success'])) { ?>
            <!--Fetch success message-->
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <div class="form-group">
            <div class="mb-3">
                <label>Current Password</label>
                <input class="form-control"
                       type="password"
                       id="currentPass"
                       name="currentPass">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-3">
                <label>New Password</label>
                <input class="form-control"
                       type="password"
                       id="newPass"
                       name="newPass">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-3">
                <label>Confirm New Password</label>
                <input class="form-control"
                       type="password"
                       id="confirmNewPass"
                       name="confirmNewPass">
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <input type="text"
                       name="id"
                       value="<?=$currentID?>"
                       hidden>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="change">Change</button>
        </div>
    </form>
</body>
