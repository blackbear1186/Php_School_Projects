<?php include 'header.php'; ?>

<h1 class="text-center">Add Home</h1>

<form action="." method="post" class="col-lg-6 mx-auto">
    <hr>
    <div class="form-group">
        <label for="home-title">Home Title</label>
        <input type="text" name="home-title" id="home-title" class="form-control<?php echo (!empty($homeTitleError)) ? ' is-invalid' : ''; ?>" placeholder="Home Title"
               value="<?php echo $homeTitle; ?>" autofocus>
        <?php if (!empty($homeTitleError)) echo $homeTitleError; ?>
    </div>
    <div class="form-group">
        <label for="home-address">Home Address</label>
        <input type="text" name='home-address' id="home-address" class="form-control<?php echo (!empty($homeAddressError)) ? ' is-invalid' : ''; ?>"
               placeholder="820 N Richmond bl"
               value="<?php echo $homeAddress; ?>">
        <?php if (!empty($homeAddressError)) echo $homeAddressError; ?>
    </div>
    <div class="form-group">
        <label for="home-city">City</label>
        <input type="text" name="home-city" id="home-city" class="form-control<?php echo (!empty($homeCityError)) ? ' is-invalid' : ''; ?>"
               placeholder="City"
               value="<?php echo $homeCity;?>">
        <?php if (!empty($homeCityError)) echo $homeCityError; ?>
    </div>
    <div class="form-group">
        <label for="home-state">State</label>
        <select class="custom-select<?php echo (!empty($homeStateError)) ? ' is-invalid' : ''; ?>" name="home-state" id="home-state">
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
            <option value="HI"<?php if($homeState === 'HI') echo ' selected'; ?>>HI</option>
            <option value="ID"<?php if($homeState === 'ID') echo ' selected'; ?>>ID</option>
            <option value="IL"<?php if($homeState === 'IL') echo ' selected'; ?>>IL</option>
            <option value="IN"<?php if($homeState === 'IN') echo ' selected'; ?>>IN</option>
            <option value="IA"<?php if($homeState === 'IA') echo ' selected'; ?>>IA</option>
            <option value="KS"<?php if($homeState === 'KS') echo ' selected'; ?>>KS</option>
            <option value="KY"<?php if($homeState === 'KY') echo ' selected'; ?>>KY</option>
            <option value="LA"<?php if($homeState === 'LA') echo ' selected'; ?>>LA</option>
            <option value="ME"<?php if($homeState === 'ME') echo ' selected'; ?>>ME</option>
            <option value="MD"<?php if($homeState === 'MD') echo ' selected'; ?>>MD</option>
            <option value="MA"<?php if($homeState === 'MA') echo ' selected'; ?>>MA</option>
            <option value="MI"<?php if($homeState === 'MI') echo ' selected'; ?>>MI</option>
            <option value="MN"<?php if($homeState === 'MA') echo ' selected'; ?>>MA</option>
            <option value="MS"<?php if($homeState === 'MS') echo ' selected'; ?>>MS</option>
            <option value="MO"<?php if($homeState === 'MO') echo ' selected'; ?>>MO</option>
            <option value="MT"<?php if($homeState === 'MT') echo ' selected'; ?>>MT</option>
            <option value="NE"<?php if($homeState === 'NE') echo ' selected'; ?>>AZ</option>
            <option value="NV"<?php if($homeState === 'NV') echo ' selected'; ?>>NV</option>
            <option value="NH"<?php if($homeState === 'NH') echo ' selected'; ?>>NH</option>
            <option value="NJ"<?php if($homeState === 'NJ') echo ' selected'; ?>>NJ</option>
            <option value="NM"<?php if($homeState === 'NM') echo ' selected'; ?>>NM</option>
            <option value="NY"<?php if($homeState === 'NY') echo ' selected'; ?>>NY</option>
            <option value="NM"<?php if($homeState === 'NM') echo ' selected'; ?>>NM</option>
            <option value="NC"<?php if($homeState === 'NC') echo ' selected'; ?>>NC</option>
            <option value="ND"<?php if($homeState === 'ND') echo ' selected'; ?>>ND</option>
            <option value="OH"<?php if($homeState === 'OH') echo ' selected'; ?>>OH</option>
            <option value="OK"<?php if($homeState === 'OK') echo ' selected'; ?>>OK</option>
            <option value="OR"<?php if($homeState === 'OR') echo ' selected'; ?>>OR</option>
            <option value="PA"<?php if($homeState === 'PA') echo ' selected'; ?>>PA</option>
            <option value="RI"<?php if($homeState === 'RI') echo ' selected'; ?>>RI</option>
            <option value="SC"<?php if($homeState === 'SC') echo ' selected'; ?>>SC</option>
            <option value="SD"<?php if($homeState === 'SD') echo ' selected'; ?>>SD</option>
            <option value="TN"<?php if($homeState === 'TN') echo ' selected'; ?>>TN</option>
            <option value="TX"<?php if($homeState === 'TX') echo ' selected'; ?>>TX</option>
            <option value="UT"<?php if($homeState === 'UT') echo ' selected'; ?>>UT</option>
            <option value="VT"<?php if($homeState === 'VT') echo ' selected'; ?>>VT</option>
            <option value="VA"<?php if($homeState === 'VA') echo ' selected'; ?>>VA</option>
            <option value="WA"<?php if($homeState === 'WA') echo ' selected'; ?>>WA</option>
            <option value="WV"<?php if($homeState === 'WV') echo ' selected'; ?>>WV</option>
            <option value="WI"<?php if($homeState === 'WI') echo ' selected'; ?>>WI</option>
            <option value="WY"<?php if($homeState === 'WY') echo ' selected'; ?>>WY</option>

        </select>
        <?php if(!empty($homeStateError)) echo $homeStateError; ?>

    </div>
    <div class="form-group">
        <label for="zip-code">Zip Code</label>
        <input type="text" name="zip-code" id="zip-code" class="form-control<?php echo (!empty($zipCodeError)) ? ' is-invalid' :
            ''; ?>" placeholder="Zip Code"
               value="<?php echo $zipCode;?>">
        <?php if(!empty($zipCodeError)) echo $zipCodeError; ?>

    </div>
    <div class="form-group">
        <label for="home-beds">Beds</label>
        <select class="custom-select<?php echo (!empty($homeBedError)) ? ' is-invalid' : ''; ?>" name="home-beds" id="home-beds">
            <option value="choose">Choose Beds</option>
            <option value="1"<?php if($homeBeds === '1') echo ' selected';?>>1</option>
            <option value="2"<?php if($homeBeds === '2') echo ' selected';?>>2</option>
            <option value="3"<?php if($homeBeds === '3') echo ' selected';?>>3</option>
            <option value="4"<?php if($homeBeds === '4') echo ' selected';?>>4</option>
            <option value="5"<?php if($homeBeds === '5') echo ' selected';?>>5</option>
            <option value="6"<?php if($homeBeds === '6') echo ' selected';?>>6</option>
            <option value="7"<?php if($homeBeds === '7') echo ' selected';?>>7</option>
            <option value="8"<?php if($homeBeds === '8') echo ' selected';?>>8</option>

        </select>
        <?php if(!empty($homeBedError)) echo $homeBedError; ?>
    </div>
    <div class="form-group">
        <label for="home-baths">Baths</label>
        <select class="custom-select<?php echo (!empty($homeBathError)) ? ' is-invalid' : ''; ?>" name="home-baths" id="home-baths">
            <option value="choose">Choose Baths</option>
            <option value="1"<?php if($homeBaths === '1') echo ' selected'; ?>>1</option>
            <option value="2"<?php if($homeBaths === '2') echo ' selected'; ?>>2</option>
            <option value="3"<?php if($homeBaths === '3') echo ' selected'; ?>>3</option>
            <option value="4"<?php if($homeBaths === '4') echo ' selected'; ?>>4</option>
            <option value="5"<?php if($homeBaths === '5') echo ' selected'; ?>>5</option>
            <option value="6"<?php if($homeBaths === '6') echo ' selected'; ?>>6</option>
            <option value="7"<?php if($homeBaths === '7') echo ' selected'; ?>>7</option>
            <option value="8"<?php if($homeBaths === '8') echo ' selected'; ?>>8</option>
        </select>
        <?php if(!empty($homeBathError)) echo $homeBathError; ?>
    </div>
    <div class="form-group">
        <label for="home-size">Home Size</label>
        <input type="text" name="home-size" id="home-size" class="form-control<?php echo (!empty($homeSizeError)) ? ' is-invalid' :
            ''; ?>" placeholder="Home Size"
               value="<?php echo $homeSize;?>">
        <?php if(!empty($homeSizeError)) echo $homeSizeError; ?>

    </div>
    <div class="form-group">
        <label for="lot-size">Lot Size</label>
        <input type="text" name="lot-size" id="lot-size" class="form-control<?php echo (!empty($lotSizeError)) ? ' is-invalid' :
            ''; ?>" placeholder="Lot Size"
               value="<?php echo $lotSize;?>">
        <?php if(!empty($lotSizeError)) echo $lotSizeError; ?>

    </div>
    <div class="form-group">
        <label for="home-price">Home Price</label>
        <input type="text" name="home-price" id="home-price" class="form-control<?php echo (!empty($homePriceError)) ? ' is-invalid' :
            ''; ?>" placeholder="Home Price"
               value="<?php echo $homePrice;?>">
        <?php if(!empty($homePriceError)) echo $homePriceError; ?>

    </div>
    <div class="form-group text-center">
        <input type="hidden" name="action" value="add-home">
        <input type="submit" class="btn btn-secondary" value="Add Home">
        <a href="." class="btn btn-secondary">Cancel</a>
    </div>
</form>
<?php include 'footer.php';
