<?php  include('template/header.php'); ?>
<?php  include('database.php'); ?>
<?php $orders = pg_query($conn, "SELECT * FROM orderproduct"); ?>
<?php
    
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        try {
            pg_query($conn, "DELETE FROM orderproduct WHERE orderid = $id");
            echo '<script>window.location.href = "order.php";</script>';
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    ?>

<!-- Begin Page Content --> 
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Order Table</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="addorder.php" class="btn btn-success active" role="button" aria-pressed="true">Add Order</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>OderID</th>
                        <th>ProductID</th>
                        <th>BillID</th>
                        <th>Quantity</th>
                        <th>More</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                <?php while ($row = pg_fetch_row($orders)) { ?>
                    <tr>
                        <td><?php echo $row['0']; ?></td>
                        <td><?php echo $row['1']; ?></td>
                        <td><?php echo $row['2']; ?></td>
                        <td><?php echo $row['3']; ?></td>
                        <td>

                            <a href="order.php?del=<?php echo $row['0']; ?>" class="btn btn-danger active">Delete</a>
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