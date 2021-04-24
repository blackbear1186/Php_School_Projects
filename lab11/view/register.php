<?php
include 'utility/secure_connection.php';
include 'header.php';
?>
    <h1 class="text-center">Log In</h1>
    <form action="." method="post" class="col-lg-6 mx-auto">
        <hr>
        <p>Please complete the form below to register an account.</p>
        <div class="form-group">
            <label for="username">Username:<sup>*</sup></label>
            <input type="text" id="username" name="username" class="form-control<?php echo (!empty($errorUsername)) ? ' is-invalid' : '' ;?>"
                   value="<?php if (!empty($username)) echo $username ;?>" autofocus>
            <?php if (!empty($errorUsername)) echo "<span class='invalid-feedback font-weight-bold'>$errorUsername</span>\n" ;?>
        </div>
        <div class="form-group">
            <label for="password">Password:<sup>*</sup></label>
            <input type="password" id="password" name="password" class="form-control<?php echo (!empty($errorPassword)) ? ' is-invalid' : '' ;?>"
                   value="<?php if (!empty($password)) echo $password ;?>">
            <?php if (!empty($errorPassword)) echo "<span class='invalid-feedback font-weight-bold'>$errorPassword</span>\n" ;?>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password:<sup>*</sup></label>
            <input type="password" id="confirm-password" name="confirm-password" class="form-control<?php echo (!empty($errorConfirmPassword)) ? ' is-invalid' : '' ;?>"
                   value="<?php if (!empty($confirmPassword)) echo $confirmPassword ;?>">
            <?php if (!empty($errorConfirmPassword)) echo "<span class='invalid-feedback font-weight-bold'>$errorConfirmPassword</span>\n" ;?>
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="action" value="register">
            <input type="submit" class="btn btn-success" value="Register">
            <a class="btn btn-danger" href=".">Cancel</a>
        </div>
        <div class="text-center">
            <p>Already have an account? <a href=".?action=show-login-form">Log in here.</a> </p>
            <p><sup>*</sup> Indicates a required field.</p>
        </div>
    </form>
<?php include 'footer.php';?>