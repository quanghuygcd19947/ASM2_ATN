<?php  include('template/header.php'); ?>
<?php  include('database.php'); ?>
<?php $inventorys = pg_query($conn, "SELECT * FROM inventory"); ?>
<?php
    
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        try {
            pg_query($conn, "DELETE FROM inventory WHERE InventoryID = $id");
            echo '<script>window.location.href = "Inventory.php";</script>';
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
                            <a href="addinventory.php" class="btn btn-success active" role="button" aria-pressed="true">Add Inventory</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>OfficeID</th>
                                            <th>Quantity</th>
                                            <th>ProductID</th>
                                            <th>More</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php while ($row = pg_fetch_row($inventorys)) { ?>
                                        <tr>
                                            <td><?php echo $row['0']; ?></td>
                                            <td><?php echo $row['1']; ?></td>
                                            <td><?php echo $row['2']; ?></td>
                                            <td><?php echo $row['3']; ?></td>
                                            <td>
                                                <a href="editInventory.php?edit=<?php echo $row['InventoryID']; ?>" class="btn btn-primary active" >update</a>
                                                <a href="Inventory.php?del=<?php echo $row['InventoryID']; ?>" class="btn btn-danger active">Delete</a>
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