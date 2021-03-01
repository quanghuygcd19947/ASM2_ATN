<?php  include('template/header.php'); ?>
<?php  include('database.php'); ?>

<?php
    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($conn, "SELECT * FROM inventory WHERE Inventory=$id");

		if ($record) {
			$inventory = mysqli_fetch_array($record);
			$office = $product['OfficeID'];
			$quantity = $product['Qty'];
            $product = $product['ProductID'];
		}
	}
?>
<?php 
    if (isset($_POST['update'])) {
        $updatedOffice = $_POST['OfficeID'];
        $updatedQuantity2 = $_POST['qty'];
        $updatedProduct = $_POST['productID'];
    
        mysqli_query($conn, "UPDATE inventory SET OfficeID='$updatedOffice', Qty='$updatedQuantity2', ProductID='$updatedProduct = $_POST['productID'];
        ' WHERE InventoryID=$id");
        // $_SESSION['message'] = "Address updated!"; 
        echo '<script>window.location.href = "inventory.php";</script>';
        exit();
    }
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Inventory Table</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Office ID</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter name" name="name" value="<?php echo $name; ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Quantity</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter quanity" name="qtyInStock" value="<?php echo $quantity; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">P</label>
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