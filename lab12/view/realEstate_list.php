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
        <?php if (isset($_SESSION['username'])) : ?>
            <th scope="col">Update</th>
        <th scope="col">Delete</th>
        <?php endif; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($realEstate as $home) : ?>
    <tr>
        <td><?php echo $home->getHomeTitle(); ?></td>
        <td><?php echo $home->getHomeAddress(); ?></td>
        <td><?php echo $home->getHomeCity(); ?></td>
        <td><?php echo $home->getHomeState(); ?></td>
        <td><?php echo $home->getZipCode(); ?></td>
        <td><?php echo $home->getHomeBeds(); ?></td>
        <td><?php echo $home->getHomeBaths(); ?></td>
        <td><?php echo $home->getHomeSize(); ?></td>
        <td><?php echo $home->getLotSize(); ?></td>
        <td><?php echo $home->getHomePrice(); ?></td>
        <?php if(isset($_SESSION['username'])) : ?>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="show-update-home">
                <input type="hidden" name="ID" value="<?php echo $home->getId(); ?>">
                <input type="submit" class="btn btn-secondary" value="Update" aria-label="Update
                <?php echo $home->getHomeTitle(); ?>">
            </form>
        </td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="show-delete-home">
                <input type="hidden" name="ID" value="<?php echo $home->getId(); ?>">
                <input type="submit" class="btn btn-secondary" value="Delete" aria-label="Delete
                <?php echo $home->getHomeTitle; ?>">
            </form>
        </td>
        <?php endif; ?>
    </tr>
  <?php endforeach; ?>
  </tbody>

</table>
    <div class="form-group text-center">
        <form action="." method="post" class="btn-group">
            <input type="hidden" name="action" value="show-add-home">
            <input type="submit" class="btn btn-secondary" value="Add Home">
        </form>
        <form action="." method="post" class="btn-group">
            <input type="hidden" name="action" value="clear-message">
            <input type="submit" class="btn btn-secondary" value="Clear Message">
        </form>
    </div>
<?php include 'footer.php';
