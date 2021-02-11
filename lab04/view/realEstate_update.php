<?php include 'header.php'; ?>
    <h1 class="text-center">Update Home</h1>

    <form action="." method="post" class="col-lg-6 mx-auto">
        <hr>
        <div class="form-group">
            <label>Home ID</label>
            <input type="text" class="form-control" name="ID" id="ID" value="<?php echo $home['ID']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="house-title">Home Title</label>
            <input type="text" name="home-title" id="home-title" class="form-control" placeholder="Home Title"
                   value="<?php echo isset($homeTitle) ? $homeTitle: $home['Title']; ?>" autofocus>
        </div>
        <div class="form-group">
            <label for="home-address">Home Address</label>
            <input type="text" name="home-address" id="home-address" class="form-control" placeholder="Address"
                   value="<?php echo isset($homeAddress) ? $homeAddress: $home['Address']; ?>">
        </div>
        <div class="form-group">
            <label for="home-city">City</label>
            <input type="text" name="home-city" id="home-city" class="form-control" placeholder="City"
                   value="<?php echo isset($homeCity) ? $homeCity: $home['City']; ?>">
        </div>
        <div class="form-group">
            <label for="home-state">State</label>
            <select class="custom-select" name="home-state" id="home-state">
                <option value="choose">Choose State</option>
                <option value="AL"<?php if($homeState === 'AL' || (!isset($homeState) && $home['State'] === 'AL')) echo ' selected'; ?>>AL</option>
                <option value="AZ"<?php if($homeState === 'AZ' || (!isset($homeState) && $home['State'] === 'AZ')) echo ' selected'; ?>>AZ</option>
                <option value="AR"<?php if($homeState === 'AR' || (!isset($homeState) && $home['State'] === 'AR')) echo ' selected'; ?>>AR</option>
                <option value="CA"<?php if($homeState === 'CA' || (!isset($homeState) && $home['State'] === 'CA')) echo ' selected'; ?>>CA</option>
                <option value="CO"<?php if($homeState === 'CO' || (!isset($homeState) && $home['State'] === 'CO')) echo ' selected'; ?>>CO</option>
                <option value="CT"<?php if($homeState === 'CT' || (!isset($homeState) && $home['State'] === 'CT')) echo ' selected'; ?>>CT</option>
                <option value="DE"<?php if($homeState === 'DE' || (!isset($homeState) && $home['State'] === 'DE')) echo ' selected'; ?>>DE</option>
                <option value="DC"<?php if($homeState === 'DC' || (!isset($homeState) && $home['State'] === 'DC')) echo ' selected'; ?>>DC</option>
                <option value="FL"<?php if($homeState === 'FL' || (!isset($homeState) && $home['State'] === 'FL')) echo ' selected'; ?>>FL</option>
                <option value="GA"<?php if($homeState === 'GA' || (!isset($homeState) && $home['State'] === 'GA')) echo ' selected'; ?>>GA</option>
                <option value="HI"<?php if($homeState === 'HI' || (!isset($homeState) && $home['State'] === 'HI')) echo ' selected'; ?>>HI</option>
                <option value="ID"<?php if($homeState === 'ID' || (!isset($homeState) && $home['State'] === 'ID')) echo ' selected'; ?>>ID</option>
                <option value="IL"<?php if($homeState === 'IL' || (!isset($homeState) && $home['State'] === 'IL')) echo ' selected'; ?>>IL</option>
                <option value="IN"<?php if($homeState === 'IN' || (!isset($homeState) && $home['State'] === 'IN')) echo ' selected'; ?>>IN</option>
                <option value="IA"<?php if($homeState === 'IA' || (!isset($homeState) && $home['State'] === 'IA')) echo ' selected'; ?>>IA</option>
                <option value="KS"<?php if($homeState === 'KS' || (!isset($homeState) && $home['State'] === 'KS')) echo ' selected'; ?>>KS</option>
                <option value="KY"<?php if($homeState === 'KY' || (!isset($homeState) && $home['State'] === 'KY')) echo ' selected'; ?>>KY</option>
                <option value="LA"<?php if($homeState === 'LA' || (!isset($homeState) && $home['State'] === 'LA')) echo ' selected'; ?>>LA</option>
                <option value="ME"<?php if($homeState === 'ME' || (!isset($homeState) && $home['State'] === 'ME')) echo ' selected'; ?>>ME</option>
                <option value="MD"<?php if($homeState === 'MD' || (!isset($homeState) && $home['State'] === 'MD')) echo ' selected'; ?>>MD</option>
                <option value="MA"<?php if($homeState === 'MA' || (!isset($homeState) && $home['State'] === 'MA')) echo ' selected'; ?>>MA</option>
                <option value="MI"<?php if($homeState === 'MI' || (!isset($homeState) && $home['State'] === 'MI')) echo ' selected'; ?>>MI</option>
                <option value="MN"<?php if($homeState === 'MA' || (!isset($homeState) && $home['State'] === 'MA')) echo ' selected'; ?>>MA</option>
                <option value="MS"<?php if($homeState === 'MS' || (!isset($homeState) && $home['State'] === 'MS')) echo ' selected'; ?>>MS</option>
                <option value="MO"<?php if($homeState === 'MO' || (!isset($homeState) && $home['State'] === 'MO')) echo ' selected'; ?>>MO</option>
                <option value="MT"<?php if($homeState === 'MT' || (!isset($homeState) && $home['State'] === 'MT')) echo ' selected'; ?>>MT</option>
                <option value="NE"<?php if($homeState === 'NE' || (!isset($homeState) && $home['State'] === 'NE')) echo ' selected'; ?>>AZ</option>
                <option value="NV"<?php if($homeState === 'NV' || (!isset($homeState) && $home['State'] === 'NV')) echo ' selected'; ?>>NV</option>
                <option value="NH"<?php if($homeState === 'NH' || (!isset($homeState) && $home['State'] === 'NH')) echo ' selected'; ?>>NH</option>
                <option value="NJ"<?php if($homeState === 'NJ' || (!isset($homeState) && $home['State'] === 'NJ')) echo ' selected'; ?>>NJ</option>
                <option value="NM"<?php if($homeState === 'NM' || (!isset($homeState) && $home['State'] === 'NM')) echo ' selected'; ?>>NM</option>
                <option value="NY"<?php if($homeState === 'NY' || (!isset($homeState) && $home['State'] === 'NY')) echo ' selected'; ?>>NY</option>
                <option value="NM"<?php if($homeState === 'NM' || (!isset($homeState) && $home['State'] === 'NM')) echo ' selected'; ?>>NM</option>
                <option value="NC"<?php if($homeState === 'NC' || (!isset($homeState) && $home['State'] === 'NC')) echo ' selected'; ?>>NC</option>
                <option value="ND"<?php if($homeState === 'ND' || (!isset($homeState) && $home['State'] === 'ND')) echo ' selected'; ?>>ND</option>
                <option value="OH"<?php if($homeState === 'OH' || (!isset($homeState) && $home['State'] === 'OH')) echo ' selected'; ?>>OH</option>
                <option value="OK"<?php if($homeState === 'OK' || (!isset($homeState) && $home['State'] === 'OK')) echo ' selected'; ?>>OK</option>
                <option value="OR"<?php if($homeState === 'OR' || (!isset($homeState) && $home['State'] === 'OR')) echo ' selected'; ?>>OR</option>
                <option value="PA"<?php if($homeState === 'PA' || (!isset($homeState) && $home['State'] === 'PA')) echo ' selected'; ?>>PA</option>
                <option value="RI"<?php if($homeState === 'RI' || (!isset($homeState) && $home['State'] === 'RI')) echo ' selected'; ?>>RI</option>
                <option value="SC"<?php if($homeState === 'SC' || (!isset($homeState) && $home['State'] === 'SC')) echo ' selected'; ?>>SC</option>
                <option value="SD"<?php if($homeState === 'SD' || (!isset($homeState) && $home['State'] === 'SD')) echo ' selected'; ?>>SD</option>
                <option value="TN"<?php if($homeState === 'TN' || (!isset($homeState) && $home['State'] === 'TN')) echo ' selected'; ?>>TN</option>
                <option value="TX"<?php if($homeState === 'TX' || (!isset($homeState) && $home['State'] === 'TX')) echo ' selected'; ?>>TX</option>
                <option value="UT"<?php if($homeState === 'UT' || (!isset($homeState) && $home['State'] === 'UT')) echo ' selected'; ?>>UT</option>
                <option value="VT"<?php if($homeState === 'VT' || (!isset($homeState) && $home['State'] === 'VT')) echo ' selected'; ?>>VT</option>
                <option value="VA"<?php if($homeState === 'VA' || (!isset($homeState) && $home['State'] === 'VA')) echo ' selected'; ?>>VA</option>
                <option value="WA"<?php if($homeState === 'WA' || (!isset($homeState) && $home['State'] === 'WA')) echo ' selected'; ?>>WA</option>
                <option value="WV"<?php if($homeState === 'WV' || (!isset($homeState) && $home['State'] === 'WV')) echo ' selected'; ?>>WV</option>
                <option value="WI"<?php if($homeState === 'WI' || (!isset($homeState) && $home['State'] === 'WI')) echo ' selected'; ?>>WI</option>
                <option value="WY"<?php if($homeState === 'WY' || (!isset($homeState) && $home['State'] === 'WY')) echo ' selected'; ?>>WY</option>

            </select>
        </div>
        <div class="form-group">
            <label for="zip-code">Zip Code</label>
            <input type="text" name="zip-code" id="zip-code" class="form-control" placeholder="Zip Code"
                   value="<?php echo isset($zipCode) ? $zipCode: $home['Zip']; ?>">
        </div>
        <div class="form-group">
            <label for="home-beds">Beds</label>
            <select class="custom-select" name="home-beds" id="home-beds">
                <option value="choose">Choose Beds</option>
                <option value="1"<?php if($homeBeds === 1 || (!isset($homeBeds) && $home['Beds'] === 1)) echo ' selected';?>>1</option>
                <option value="2"<?php if($homeBeds === 2 || (!isset($homeBeds) && $home['Beds'] === 2)) echo ' selected';?>>2</option>
                <option value="3"<?php if($homeBeds === 3 || (!isset($homeBeds) && $home['Beds'] === 3)) echo ' selected';?>>3</option>
                <option value="4"<?php if($homeBeds === 4 || (!isset($homeBeds) && $home['Beds'] === 4)) echo ' selected';?>>4</option>
                <option value="5"<?php if($homeBeds === 5 || (!isset($homeBeds) && $home['Beds'] === 5)) echo ' selected';?>>5</option>
                <option value="6"<?php if($homeBeds === 6 || (!isset($homeBeds) && $home['Beds'] === 6)) echo ' selected';?>>6</option>
                <option value="7"<?php if($homeBeds === 7 || (!isset($homeBeds) && $home['Beds'] === 7)) echo ' selected';?>>7</option>
                <option value="8"<?php if($homeBeds === 8 || (!isset($homeBeds) && $home['Beds'] === 8)) echo ' selected';?>>8</option>

            </select>
        </div>
        <div class="form-group">
            <label for="home-baths">Baths</label>
            <select class="custom-select" name="home-baths" id="home-baths">
                <option value="choose">Choose Baths</option>
                <option value="1"<?php if($homeBaths === 1 || (!isset($homeBaths) && $home['Baths'] === 1)) echo ' selected'; ?>>1</option>
                <option value="2"<?php if($homeBaths === 2 || (!isset($homeBaths) && $home['Baths'] === 2)) echo ' selected'; ?>>2</option>
                <option value="3"<?php if($homeBaths === 3 || (!isset($homeBaths) && $home['Baths'] === 3)) echo ' selected'; ?>>3</option>
                <option value="4"<?php if($homeBaths === 4 || (!isset($homeBaths) && $home['Baths'] === 4)) echo ' selected'; ?>>4</option>
                <option value="5"<?php if($homeBaths === 5 || (!isset($homeBaths) && $home['Baths'] === 5)) echo ' selected'; ?>>5</option>
                <option value="6"<?php if($homeBaths === 6 || (!isset($homeBaths) && $home['Baths'] === 6)) echo ' selected'; ?>>6</option>
                <option value="7"<?php if($homeBaths === 7 || (!isset($homeBaths) && $home['Baths'] === 7)) echo ' selected'; ?>>7</option>
                <option value="8"<?php if($homeBaths === 8 || (!isset($homeBaths) && $home['Baths'] === 8)) echo ' selected'; ?>>8</option>

            </select>
        </div>
        <div class="form-group">
            <label for="home-size">Home Size</label>
            <input type="text" name="home-size" id="home-size" class="form-control" placeholder="Home Size"
                   value="<?php echo isset($homeSize) ? $homeSize: $home['HouseSize']; ?>">
        </div>
        <div class="form-group">
            <label for="lot-size">Lot Size</label>
            <input type="text" name="lot-size" id="lot-size" class="form-control" placeholder="Lot Size"
                   value="<?php echo isset($lotSize) ? $lotSize: $home['LotSize']; ?>">
        </div>
        <div class="form-group">
            <label for="home-price">Home Price</label>
            <input type="text" name="home-price" id="home-price" class="form-control" placeholder="Home Price"
                   value="<?php echo isset($homePrice) ? $homePrice: $home['Price']; ?>">
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="ID" value="<?php echo $home['ID']; ?>">
            <input type="hidden" name="action" value="update-home">
            <input type="submit" class="btn btn-primary" value="Update Home">
            <a href="." class="btn btn-primary">Cancel</a>
        </div>
    </form>
<?php include 'footer.php';
