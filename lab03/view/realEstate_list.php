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
        <th scope="col">House Size</th>
        <th scope="col">Lot Size</th>
        <th scope="col">Price</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($realEstate as $house) : ?>
    <tr>
        <td><?php echo $house['Title']; ?></td>
        <td><?php echo $house['Address']; ?></td>
        <td><?php echo $house['City']; ?></td>
        <td><?php echo $house['State']; ?></td>
        <td><?php echo $house['Zip']; ?></td>
        <td><?php echo $house['Beds']; ?></td>
        <td><?php echo $house['Baths']; ?></td>
        <td><?php echo $house['HouseSize']; ?></td>
        <td><?php echo $house['LotSize']; ?></td>
        <td><?php echo $house['Price']; ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="update-house">
                <input type="hidden" name="ID" value="<?php echo $house['ID']; ?>">
                <input type="submit" class="btn btn-primary" value="Update" aria-label="Update
                <?php echo $house['Title']; ?>">
            </form>
        </td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete-house">
                <input type="hidden" name="ID" value="<?php echo $house['ID']; ?>">
                <input type="submit" class="btn btn-primary" value="Delete" aria-label="Delete
                <?php echo $house['Title']; ?>">
            </form>
        </td>
    </tr>
  <?php endforeach; ?>
  </tbody>

</table>
<?php include 'footer.php';
