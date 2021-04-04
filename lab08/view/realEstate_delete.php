<?php include 'header.php'; ?>
<!DOCTYPE html>
    <h1 class="text-center">Delete Home Confirmation</h1>
    <h4 class="text-secondary text-center">Are you sure you want to delete the <?php echo $home->getHomeTitle();?>?</h4>

    <form action="." method="post" class="col-lg-6 mx-auto">
        <hr>
        <dl class="text-left">
            <dt>Home ID:</dt>
            <dd><?php echo $home->getId(); ?></dd>

            <dt>Home Title:</dt>
            <dd><?php echo $home->getHomeTitle(); ?></dd>

            <dt>Home Address:</dt>
            <dd><?php echo $home->getHomeAddress(); ?></dd>

            <dt>Home City:</dt>
            <dd><?php echo $home->getHomeCity(); ?></dd>

            <dt>Home State:</dt>
            <dd><?php echo $home->getHomeState(); ?></dd>

            <dt>Zip Code:</dt>
            <dd><?php echo $home->getZipCode(); ?></dd>

            <dt>Home Beds:</dt>
            <dd><?php echo $home->getHomeBeds(); ?></dd>

            <dt>Home Baths:</dt>
            <dd><?php echo $home->getHomeBaths(); ?></dd>

            <dt>Home Size:</dt>
            <dd><?php echo $home->getHomeSize(); ?></dd>

            <dt>Lot Size:</dt>
            <dd><?php echo $home->getLotSize(); ?></dd>

            <dt>Home Price:</dt>
            <dd><?php echo $home->getHomePrice(); ?></dd>
        </dl>
<!--        <div class="form-group">-->
<!--            <h4>Home ID:</h4>-->
<!--            <p>--><?php //echo $home->getId(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Home Title:</h4>-->
<!--            <p>--><?php //echo $home->getHomeTitle(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Home Address:</h4>-->
<!--            <p>--><?php //echo $home->getHomeAddress(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>City:</h4>-->
<!--            <p>--><?php //echo $home->getHomeCity(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>State:</h4>-->
<!--            <p>--><?php //echo $home->getHomeState(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Zip Code</h4>-->
<!--            <p>--><?php //echo $home->getZipCode(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Beds:</h4>-->
<!--            <p>--><?php //echo $home->getHomeBeds(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Baths:</h4>-->
<!--            <p>--><?php //echo $home->getHomeBaths(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Home Size:</h4>-->
<!--            <p>--><?php //echo $home->getHomeSize(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Lot Size:</h4>-->
<!--            <p>--><?php //echo $home->getLotSize(); ?><!--</p>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <h4>Home Price:</h4>-->
<!--            <p>--><?php //echo $home->getHomePrice(); ?><!--</p>-->
<!--        </div>-->
        <div class="form-group text-center">
            <input type="hidden" name="ID" value="<?php echo $home->getId(); ?>">
            <input type="hidden" name="action" value="delete-home">
            <input type="submit" class="btn btn-secondary" value="Yes, Delete Home">
            <a href="." class="btn btn-secondary">No, Do Not Delete Home</a>
        </div>
    </form>
<?php include 'footer.php';
