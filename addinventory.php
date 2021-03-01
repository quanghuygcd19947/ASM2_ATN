<?php  include('template/header.php'); ?>
<?php  include('database.php'); ?>
<?php
    $offfice = "";
	$quantity = "";
	$product = "";

	if (isset($_POST['save'])) {
		$office = $_POST['OfficeID'];
		$quantity = $_POST['Qty'];
        $product = $_POST['ProductID'];
        try {
            $query = "INSERT INTO inventory (OfficeID, Qty, ProductID) VALUES ('$office', '$quantity', '$product')";
            $inventory = mysqli_query($conn, $query);
            if(!$inventory) {
                echo 'Something went wrong, please try again';
            }
            echo '<script>window.location.href = "inventory.php";</script>';
            exit();
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
		
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
                    <form method="post" action="addinventory.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Office</label>
                            <br>
                            <select name='OfficeID'>
                            <option >Select Office</option>
                            <?php
                                $sqlie = "select * from office";
                                $results = mysqli_query($conn,$sqlie);
                                while ($rows = mysqli_fetch_array($results)){
                                    echo "<option value=".$rows['OfficeID']." >".$rows['City']."</option>";
                                }
                            ?>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantity </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter quantity" name="Qty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">ProductID</label>
                            <br>
                            <select name='ProductID'>
                            <option>Select Product</option>
                            <?php
                            $sqli = "select * from product";
                            $result = mysqli_query($conn,$sqli);
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value=".$row['ProductID']." >".$row['Name']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="save">Submit</button>
                    </form>
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php  include('template/footer.php'); ?>           