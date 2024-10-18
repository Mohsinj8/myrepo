<?php
include_once('./database.php');

if(isset($_GET['detail'])){

    $order_id = $_GET['detail'];

    $user_id = $_SESSION['User']['id'];

    $query2 = "SELECT order_details.*,books.book_name , books.book_price ,books.image
    FROM `orders` 
    INNER JOIN `order_details` ON order_details.order_id = orders.id 
    INNER JOIN `books` ON books.id = order_details.book_id 
    WHERE order_details.user_id = '$user_id' AND order_details.order_id = '$order_id'";
    $result2 = mysqli_query($connect,$query2);

        if(!mysqli_num_rows($result2)) {
            echo '<script>alert("Not Accessible!");
            window.location.href="orderlist.php";
            </script>';
        exit();
        }

    $out = [];
    while($rows = mysqli_fetch_array($result2)){
    $out[] = $rows;
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('layout/head.php'); ?>

<body>
    
<?php include_once('layout/header.php'); ?>
<section class=" order-list">
<div class="col-md-12" id="checkout-list-banner">
                <h1>Checkout List</h1>
            </div></section>
<section class="checkout" style="padding-top:280px">
        <div class="container">
            <div class="row">
                <div class="colleft" id="checkout-list">
                <table>
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Book Image</th>
                            <th>BooK Name</th>
                            <th>Unit Price</th>
                            <th>Book Quantity</th>
                            <th>Sub Price</th>
                        </tr>
                    </thead>
                    <tbody>

                       <?php foreach($out as $val){ ?>

                        <tr>
                            <td><?= $val['order_no'] ?></td>
                            <td><img src="../backend/uploads/<?= $val['image'] ?>" alt=""></td>
                            <td><?= $val['book_name'] ?></td>
                            <td>£<?= $val['book_price'] ?></td>
                            <td><?= $val['item_qty'] ?></td>
                            <?php $total = $val['book_price'] * $val['item_qty'];  ?>
                            <td>£<?= $total ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
     
                </table>

                </div>
                
            </div>
        </div>
    </section>

    <?php include_once('layout/footer.php'); ?>
</body>
</html>