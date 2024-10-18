<?php
include('./database.php');

$id = $_SESSION['User']['id'];

$query = "SELECT * FROM `orders` WHERE user_id = '$id'";
$res = mysqli_query($connect,$query);
$orders = [];
while($rows = mysqli_fetch_assoc($res)){
    $orders[] = $rows;
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('layout/head.php'); ?>

<body>

<?php include_once('layout/header.php'); ?>

    <div class="order-list">
        <div class="row">
            <div class="col-md-12" id="order-banner">
                <h1>Order List</h1>
            </div>
        </div>
        <div class="container">
            <div class="book-list" class="colleft" id="checkout-list">
                <table>
                    <thead>
                        <tr>
                            <th>OrderNumber</th>
                            <th>Paid Amount</th>
                            <th>Payment Method</th>
                            <th>Order Status</th>
                            <th>Date-Time</th>
                            <th>View Detail's</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $val) { ?>
                        <tr>
                            <td><?= $val['orderNumber']; ?></td>
                            <td>£<?= $val['paid_amount'] ?></td>
                            <td><?= $val['payment_method'] ?></td>
                            <?php if($val['status'] == 0){ ?>
                            <td><button class="rejected">Rejected</button></td>
                            <?php } ?>
                            <?php if($val['status'] == 2){ ?>
                                <td><button class="confirmed">Complete</button></td>
                            <?php } ?>
                            <?php if($val['status'] == 1){ ?>
                                <td> <button class="pending">Pending</button></td>
                            <?php } ?>
                           
                            <td><?= date('d-M,Y H:i A', strtotime($val['order_at']));  ?></td>
                            <td><a href="order-detail.php?detail=<?= $val['id']; ?>"><i class="fa-solid fa-eye"></i></a></td>
                        </tr>
                       <?php } ?>
                    </tbody>
     
                </table>

            </div>

        </div>
       
        
    </div>
    
    <?php include_once('layout/footer.php'); ?>

</body>
</html>