<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Johnson - Lab 2</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <!-- add code for the table here -->
    <table class="table table-striped table-bordered w-auto">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td>
                    <form action="delete_category.php" method="post">
                        <input type="hidden" name="category_id" value="<?php echo $category['categoryID'];?>">
                        <input type="submit" class="btn btn-secondary" value="Delete"
                        aria-label="Delete <?php echo $category['categoryName']?>">
                    </form>
                </td>
                <td><?php echo $category['categoryName']; ?></td>

            </tr>
        <?php endforeach;?>

    </table>
    <h2>Add Category</h2>
    <form action="add_category.php" method="post">
        <label for="category_name">Name: </label>
        <input type="text" name="category_name" id="category_name" class="form-control-sm" autofocus>
        <input type="submit" class="btn btn-secondary" value="Add Category">
    </form>
    <!-- add code for the form here -->
    
    <br>
    <p><a href="index.php">List Products</a></p>
    </main>
    <footer>
    </footer>
</div>
</body>
</html>