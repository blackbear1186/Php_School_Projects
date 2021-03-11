<?php include 'header.php'; ?>
    <h1 class="text-center">Delete Home Confirmation</h1>
    <h4 class="text-secondary text-center">Are you sure you want to delete the <?php echo $home['Title'];?> ?</h4>

    <form action="." method="post" class="col-lg-6 mx-auto">
        <hr>
        <div class="form-group">
            <label class="font-weight-bold">Home ID:</label>
            <p><?php echo $home['ID']; ?></p>
        </div>
        <div class="form-group">
            <label for="house-title" class="font-weight-bold">Home Title:</label>
            <p><?php echo $home['Title']; ?></p>
        </div>
        <div class="form-group">
            <label for="home-address" class="font-weight-bold">Home Address:</label>
            <p><?php echo $home['Address']; ?></p>
        </div>
        <div class="form-group">
            <label for="home-city" class="font-weight-bold">City:</label>
            <p><?php echo $home['City']; ?></p>
        </div>
        <div class="form-group">
            <label for="home-state" class="font-weight-bold">State:</label>
            <p><?php echo $home['State']; ?></p>
        </div>
        <div class="form-group">
            <label for="zip-code"  class="font-weight-bold">Zip Code</label>
            <p><?php echo $home['Zip']; ?></p>
        </div>
        <div class="form-group">
            <label for="home-beds" class="font-weight-bold">Beds:</label>
            <p><?php echo $home['Beds']; ?></p>
        </div>
        <div class="form-group">
            <label for="home-baths" class="font-weight-bold">Baths:</label>
            <p><?php echo $home['Baths']; ?></p>
        </div>
        <div class="form-group">
            <label for="home-size" class="font-weight-bold">Home Size:</label>
            <p><?php echo $home['HouseSize']; ?></p>
        </div>
        <div class="form-group">
            <label for="lot-size" class="font-weight-bold">Lot Size:</label>
            <p><?php echo $home['LotSize']; ?></p>
        </div>
        <div class="form-group">
            <label for="home-price" class="font-weight-bold">Home Price:</label>
            <p><?php echo $home['Price']; ?></p>
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="ID" value="<?php echo $home['ID']; ?>">
            <input type="hidden" name="action" value="delete-home">
            <input type="submit" class="btn btn-secondary" value="Yes, Delete Home">
            <a href="." class="btn btn-secondary">No, Do Not Delete Home</a>
        </div>
    </form>
<?php include 'footer.php';
