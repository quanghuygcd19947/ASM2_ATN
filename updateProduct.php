<?php  include('template/header.php'); ?>
<?php  include('database.php'); ?>

<?php
    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = pg_query($conn, "SELECT * FROM product WHERE ProductID=$id");

		if ($record) {
			$product = pg_fetch_row($record);
			$name = $product['Name'];
			$quantity = $product['QtyInStock'];
            $price = $product['Price'];
		}
	}
?>

<?php 
    if (isset($_POST['update'])) {
        $updatedName = $_POST['name'];
        $updatedQuantity = $_POST['qtyInStock'];
        $updatedPrice = $_POST['price'];
    
        pg_query($conn, "UPDATE product SET Name='$updatedName', QtyInStock='$updatedQuantity', Price='$updatedPrice' WHERE ProductID=$id");
        // $_SESSION['message'] = "Address updated!"; 
        echo '<script>window.location.href = "product.php";</script>';
        exit();
    }
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Products Table</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Product</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter name" name="name" value="<?php echo $name; ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Quantity in stock</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter quanity" name="qtyInStock" value="<?php echo $quantity; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter price" name="price" value="<?php echo $price; ?>">
                                </div>
                                
                                <button type="submit" class="btn btn-primary" name="update">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php  include('template/footer.php'); ?>           