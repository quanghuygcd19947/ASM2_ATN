<?php  include('template/header.php'); ?>
<?php  include('database.php'); ?>
<?php $products = pg_connect($conn, "SELECT * FROM product"); ?>
<?php
    
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        try {
            pg_connect($conn, "DELETE FROM product WHERE ProductID = $id");
            echo '<script>window.location.href = "product.php";</script>';
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Products Table</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="createProduct.php" class="btn btn-success active" role="button" aria-pressed="true">Create Product</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Quantity in Stock</th>
                                            <th>Price</th>
                                            <th>More</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php while ($row = pg_fetch_row($products)) { ?>
                                        <tr>
                                            <td><?php echo $row['ProductID']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['QtyInStock']; ?></td>
                                            <td><?php echo $row['Price']; ?></td>
                                            <td>
                                                <a href="updateProduct.php?edit=<?php echo $row['ProductID']; ?>" class="btn btn-primary active" >Update</a>
                                                <a href="product.php?del=<?php echo $row['ProductID']; ?>" class="btn btn-danger active">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php  include('template/footer.php'); ?>           