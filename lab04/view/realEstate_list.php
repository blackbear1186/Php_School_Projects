<?php include 'header.php'; ?>

<table class="table table-hover">
  <caption><h1>Real Estate List</h1></caption>
  <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Zip</th>
        <th scope="col">Beds</th>
        <th scope="col">Baths</th>
        <th scope="col">Home Size</th>
        <th scope="col">Lot Size</th>
        <th scope="col">Price</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($realEstate as $home) : ?>
    <tr>
        <td><?php echo $home['Title']; ?></td>
        <td><?php echo $home['Address']; ?></td>
        <td><?php echo $home['City']; ?></td>
        <td><?php echo $home['State']; ?></td>
        <td><?php echo $home['Zip']; ?></td>
        <td><?php echo $home['Beds']; ?></td>
        <td><?php echo $home['Baths']; ?></td>
        <td><?php echo $home['HouseSize']; ?></td>
        <td><?php echo $home['LotSize']; ?></td>
        <td><?php echo $home['Price']; ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="show-update-home">
                <input type="hidden" name="ID" value="<?php echo $home['ID']; ?>">
                <input type="submit" class="btn btn-primary" value="Update" aria-label="Update
                <?php echo $home['Title']; ?>">
            </form>
        </td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete-home">
                <input type="hidden" name="ID" value="<?php echo $home['ID']; ?>">
                <input type="submit" class="btn btn-primary" value="Delete" aria-label="Delete
                <?php echo $home['Title']; ?>">
            </form>
        </td>
    </tr>
  <?php endforeach; ?>
  </tbody>

</table>
<div class="form-group text-center">
    <form action="." method="post">
        <input type="hidden" name="action" value="show-add-home">
        <input type="submit" class="btn btn-primary" value="Add Home">
    </form>
</div>
<?php include 'footer.php';
