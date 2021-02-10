<?php include 'header.php'; ?>
<h1 class="text-center">Add Home</h1>

<form action="." method="post" class="col-lg-6 mx-auto">
    <hr>
    <div class="form-group">
        <label for="house-title">Home Title</label>
        <input type="text" name="home-title" id="home-title" class="form-control" placeholder="Home Title"
               value="<?php if (!is_null($homeTitle)) echo $homeTitle; ?>" autofocus>
    </div>
    <div class="form-group">
        <label for="home-address">Home Address</label>
        <input type="text" name="home-address" id="home-address" class="form-control" placeholder="Address"
               value="<?php if (is_null($homeAddress)) echo $homeAddress;?>">
    </div>
    <div class="form-group">
        <label for="home-city">City</label>
        <input type="text" name="home-city" id="home-city" class="form-control" placeholder="City"
               value="<?php if (is_null($homeCity)) echo $homeCity;?>">
    </div>
    <div class="form-group">
        <label for="home-state">State</label>
        <select class="custom-select" name="home-state" id="home-state">
            <option value="choose">Choose State</option>
            <option value="AL"<?php if($homeState === 'AL') echo ' selected'; ?>>AL</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AR"<?php if($homeState === 'AR') echo ' selected'; ?>>AR</option>
            <option value="CA"<?php if($homeState === 'CA') echo ' selected'; ?>>CA</option>
            <option value="CO"<?php if($homeState === 'CO') echo ' selected'; ?>>CO</option>
            <option value="CT"<?php if($homeState === 'CT') echo ' selected'; ?>>CT</option>
            <option value="DE"<?php if($homeState === 'DE') echo ' selected'; ?>>DE</option>
            <option value="DC"<?php if($homeState === 'DC') echo ' selected'; ?>>DC</option>
            <option value="FL"<?php if($homeState === 'FL') echo ' selected'; ?>>FL</option>
            <option value="GA"<?php if($homeState === 'GA') echo ' selected'; ?>>GA</option>
            <option value="ID"<?php if($homeState === 'ID') echo ' selected'; ?>>ID</option>
            <option value="IL"<?php if($homeState === 'IL') echo ' selected'; ?>>IL</option>
            <option value="IN"<?php if($homeState === 'IN') echo ' selected'; ?>>IN</option>
            <option value="IA"<?php if($homeState === 'IA') echo ' selected'; ?>>IA</option>
            <option value="KS"<?php if($homeState === 'KS') echo ' selected'; ?>>KS</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>
            <option value="AZ"<?php if($homeState === 'AZ') echo ' selected'; ?>>AZ</option>

        </select>
    </div>
    <div class="form-group">
        <label for="zip-code">Zip Code</label>
        <input type="text" name="zip-code" id="zip-code" class="form-control" placeholder="Zip Code"
               value="<?php if (is_null($zipCode)) echo $zipCode;?>">
    </div>
    <div class="form-group">
        <label for="home-beds">Beds</label>
        <select class="custom-select" name="home-beds" id="home-beds">
            <option value="choose">Choose Beds</option>
            <option value="1"<?php if($homeBeds === 1) echo ' selected';?>>1</option>
            <option value="2"<?php if($homeBeds === 2) echo ' selected';?>>2</option>
            <option value="3"<?php if($homeBeds === 3) echo ' selected';?>>3</option>
            <option value="4"<?php if($homeBeds === 4) echo ' selected';?>>4</option>
            <option value="5"<?php if($homeBeds === 5) echo ' selected';?>>5</option>
            <option value="6"<?php if($homeBeds === 6) echo ' selected';?>>6</option>
            <option value="7"<?php if($homeBeds === 7) echo ' selected';?>>7</option>
            <option value="8"<?php if($homeBeds === 8) echo ' selected';?>>8</option>

        </select>
    </div>
    <div class="form-group">
        <label for="home-baths">Baths</label>
        <select class="custom-select" name="home-baths" id="home-baths">
            <option value="choose">Choose Baths</option>
            <option value="1"<?php if($homeBaths === 1) echo ' selected'; ?>>1</option>
            <option value="2"<?php if($homeBaths === 2) echo ' selected'; ?>>2</option>
            <option value="3"<?php if($homeBaths === 3) echo ' selected'; ?>>3</option>
            <option value="4"<?php if($homeBaths === 4) echo ' selected'; ?>>4</option>
            <option value="5"<?php if($homeBaths === 5) echo ' selected'; ?>>5</option>
            <option value="6"<?php if($homeBaths === 6) echo ' selected'; ?>>6</option>
            <option value="7"<?php if($homeBaths === 7) echo ' selected'; ?>>7</option>
            <option value="8"<?php if($homeBaths === 8) echo ' selected'; ?>>8</option>

        </select>
    </div>
    <div class="form-group">
        <label for="home-size">Home Size</label>
        <input type="text" name="home-size" id="home-size" class="form-control" placeholder="Home Size"
               value="<?php if(is_null($homeSize)) echo $homeSize;?>">
    </div>
    <div class="form-group">
        <label for="lot-size">Lot Size</label>
        <input type="text" name="lot-size" id="lot-size" class="form-control" placeholder="Lot Size"
               value="<?php if(is_null($lotSize)) echo $lotSize;?>">
    </div>
    <div class="form-group">
        <label for="home-price">Home Price</label>
        <input type="text" name="home-price" id="home-price" class="form-control" placeholder="Home Price"
               value="<?php if(is_null($homePrice)) echo $homePrice;?>">
    </div>
    <div class="form-group text-center">
        <input type="hidden" name="action" value="add-home">
        <input type="submit" class="btn btn-primary" value="Add Home">
        <a href="." class="btn btn-primary">Cancel</a>
    </div>
</form>
<?php include 'footer.php';
