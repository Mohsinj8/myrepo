<?php
include('./database.php');

if(empty($_SESSION['User'])){

    echo '<script>alert("To Proceed, Please Log Into Your Account");
    window.location.href="login.php";
    </script>';
    exit();
} 

$id = $_SESSION['User']['id'];

$query = "SELECT * FROM `users` WHERE `id` = '$id'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($res);

$cart = "SELECT carts.*, books.image , books.book_name, books.book_author ,books.book_price , books.id as bookId
FROM `carts` 
INNER JOIN `books` ON carts.book_id = books.id
WHERE carts.user_id = '$id'";
$result = mysqli_query($connect,$cart);
$cart_detail = [];
while($rows = mysqli_fetch_assoc($result)){
    $cart_detail[] = $rows;
}


if(isset($_POST['submit'])){

    $id = $_SESSION['User']['id'];
    $address = $_POST['address'];

    $query = "UPDATE `users` SET `address` = '$address' WHERE id = '$id'";
    $result = mysqli_query($connect,$query);

    if($result){
        echo '<script>alert("Your Shipping Address Are Updated!");
         window.location.href="checkout.php";
         </script>';
        exit();
    }
}

if(isset($_POST['checkout'])){

    $payment = $_POST['payment'];
    $paid_amount = $_POST['paid_amount'];
    $customerId = $_SESSION['User']['id'];

    $date = date('Ymd');
    $randomNumber = rand(1000, 9999);
    $orderNumber = sprintf("#ORD-%s-%04d", $date, $randomNumber);

    $id = $_SESSION['User']['id'];

    $query = "INSERT INTO `orders` (`orderNumber`,`payment_method`,`user_id`,`paid_amount`) VALUES ('$orderNumber','$payment','$id','$paid_amount')";
    $result = mysqli_query($connect,$query);
    $order_id = mysqli_insert_id($connect);

    foreach($cart_detail as $value){ 
        
    $order_no ='#ORD-' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    $book_id = $value['bookId'];
    $item_qty = $value['quantity'];
    
    $query = "INSERT INTO `order_details` (`order_no`,`book_id`,`user_id`,`item_qty`,`order_id`) VALUES ('$order_no','$book_id','$id','$item_qty','$order_id')";
    $result = mysqli_query($connect,$query);

    }

    $qry_delete = "DELETE FROM `carts` WHERE user_id = '$id'";
    $result1 = mysqli_query($connect,$qry_delete);

    if($result1){
        echo '<script>alert("Your Order Has Been Successfully Placed");
         window.location.href="orderlist.php";
         </script>';
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('layout/head.php'); ?>

<body>
    
<?php include_once('layout/header.php'); ?>
<section class=" order-list">
<div class="col-md-12" id="order-banner">
                <h1>Checkout</h1>
            </div></section>
<section class="checkout" style="padding-top:280px">
        <div class="container">
            <div class="row">
                <div class="colleft">
                    <h3>Billing details</h3>

                    <form method="post" >
                        <div class="input-wrap">
                            <div class="field">
                                <label>Name</label>
                                <input type="text"  placeholder="Name" value="<?= $row['name'] ?>" readyOnly>
                            </div>
                            <div class="field">
                                <label>Phone</label>
                                <input type="text"  placeholder="Phone" value="<?= $row['phone'] ?>" readyOnly>
                            </div>
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input type="email"  placeholder="Email" value="<?= $row['email'] ?>" readyOnly>
                        </div>

                        <div class="field">
                            <label>Street Address</label>
                            <input type="text" name="address" placeholder="Street Address" value="<?= $row['address'] ?>" required>
                        </div>
                     

                        <div class="submit-btn">
                            <button class="btns" type="submit" name="submit">Update</button>
                        </div>
                    </form>
                </div>
                <div class="colright">
                    <div class="cart-total">
                        <h2>Your Order's</h2>
                        <form method="post">
                        <ul>
                        <?php $sub = 0;
                        foreach($cart_detail as $value){ ?>
                            <li>
                                <h3><?= $value['book_name'] ?></h3>
                                <?php  
                                $total = $value['book_price'] * $value['quantity'];

                                $sub += $total;
                                ?>

                                <h4>£<?= $total  ?></h4>
                            </li>
                     
                            <?php } ?>
                            <li>
                                <h3>Sub Total</h3>
                                <h4><strong>£<?= $sub;  ?></strong></h4>
                            </li>
                            <input type="hidden" name="paid_amount" value="<?= $sub ?>" />
                            <li><label><input type="radio" name="payment" value="Direct Bank Transfer" required>Direct Bank Transfer</label> </li>
                            <li><label><input type="radio" name="payment" value="Check Payments" required>Check payments</label> </li>
                            <li><label><input type="radio" name="payment" value="Cash on Delivery" required>Cash on Delivery</label> </li>
                        </ul>
                        <button class="btns" name="checkout" onclick="return confirm('Please confirm your order before proceeding?')">Confirm Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layout/footer.php'); ?>

</body>
</html>