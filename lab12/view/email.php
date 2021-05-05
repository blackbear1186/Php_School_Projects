<?php
include 'utility/secure_connection.php';
include 'header.php';
?>
<h1 class="text-center">Contact Form</h1>
<div class="col-lg-6 mx-auto">
    <form action="." method="post">
        <hr>
        <p>Please enter your name, email address, and message in the form below.</p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control<?php echo (!empty($nameError)) ? ' is-invalid' : '';?>" placeholder="First & Last Name"
            autofocus value="<?php if(!empty($name)) echo $name;?>">
            <?php if (!empty($nameError)) echo $nameError; ?>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" class="form-control<?php echo (!empty($emailError)) ? ' is-invalid' : '';?>" placeholder="example@domain.com"
                   value="<?php if(!empty($email)) echo $email;?>">
            <?php if (!empty($emailError)) echo $emailError; ?>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form-control<?php echo (!empty($phoneError)) ? ' is-invalid' : '';?>" placeholder="999-999-9999"
                   value="<?php if(!empty($phone)) echo $phone;?>">
             <?php if (!empty($phoneError)) echo $phoneError; ?>
        </div>
        <div class="form-group">
            <p>Contact preference</p>
            <div class="form-check form-check-inline">
                <input type="radio" id="text" name="contact" class="form-check-input<?php echo (!empty($contactError)) ? ' is-invalid' : '';?>"
                       value="text" <?php if($contact === 'text') echo ' checked';?>>
                <label for="text" class="form-check-label">Text</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="email" name="contact" class="form-check-input<?php echo (!empty($contactError)) ? ' is-invalid' : '';?>"
                       value="email" <?php if($contact === 'email') echo ' checked';?>>
                <label for="email" class="form-check-label">Email</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="phone" name="contact" class="form-check-input<?php echo (!empty($contactError)) ? ' is-invalid' : '';?>"
                       value="phone" <?php if($contact === 'phone') echo ' checked';?>>
                <label for="phone" class="form-check-label">Phone</label>
            </div>
            <br><?php if(!empty($contactError)) echo $contactError;?>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" rows="4" class="form-control<?php echo (!empty($commentError)) ? ' is-invalid' : '';?>"><?php if(!empty($comment)) echo $comment;?></textarea>
             <?php if (!empty($commentError)) echo $commentError; ?>
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="action" value="send-email">
            <input type="submit" class="btn btn-secondary" value="Send Email">
            <a class="btn btn-secondary" href=".?action=show-email-form">Reset</a>
            <a class="btn btn-secondary" href=".">Cancel</a>

        </div>
    </form>
    <?php if ($result) : ?>
        <img src="style/check.png" alt="Green checkmark" class="float-left">
        <h2 class="pt-1">Email Successfully Sent</h2>
        <p>Thank you, <strong><?php echo $name; ?></strong>, for your email message.</p>
        <table class="table table-striped" aria-label="Email confirmation information">
            <tr>
                <th scope="row">Name:</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th scope="row">Email:</th>
                <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
            </tr>
            <tr>
                <th scope="row">Phone Number:</th>
                <td><?php echo $phone; ?></td>
            </tr>
            <tr>
                <th scope="row">Contact Preference:</th>
                <td><?php echo $contact; ?></td>
            </tr>
            <tr>
                <th scope="row">Comment:</th>
                <td><?php echo nl2br($comment); ?></td>
            </tr>
        </table>
    <a class="btn btn-secondary d-block" href=".">Back to Real Estate List</a>
    <?php endif;?>
</div>
<?php include 'footer.php';?>