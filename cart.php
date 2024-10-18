<?php
include('./database.php');

if(empty($_SESSION['User'])){

    echo '<script>alert("To Proceed, Please Log Into Your Account");
    window.location.href="login.php";
    </script>';
    exit();
} 

$id = $_SESSION['User']['id'];

$cart = "SELECT carts.*, books.image , books.book_name, books.book_author ,books.book_price
FROM `carts` 
INNER JOIN `books` ON carts.book_id = books.id
WHERE carts.user_id = '$id'";
$result = mysqli_query($connect,$cart);
$cart_detail = [];
while($rows = mysqli_fetch_assoc($result)){
    $cart_detail[] = $rows;
}

if(empty($cart_detail)) {
    echo '<script>alert("Your Cart Is Empty!");
    window.location.href="book-blog.php";
    </script>';
    exit();
}

if(isset($_GET['delete'])){

    $id = base64_decode($_GET['delete']);

    $qry_delete = "DELETE FROM `carts` WHERE id = '$id'";
    $result = mysqli_query($connect,$qry_delete);

    if($result){

        echo '<script>alert("Item Is Remove!");
        window.location.href="book-blog.php";
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

<div class="contact-rw1 mb-5">
        <div class="row">
            <div class="col-md-12" id="book-blog">
                <h1>Cart</h1>
            </div>
        </div>
    </div>
<section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="cart-left">
                    <table>
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Book image</th>
                            <th>BooK Name</th>
                            <th>BooK Author</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Remove</th>

                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $count=0; 
                    foreach($cart_detail as $value){ ?>
                        <tr>
                            <td><?= ++$count; ?>.</td>
                            <td><img src="../backend/uploads/<?= $value['image'] ?>" alt=""></td>
                            <td><?= $value['book_name'] ?></td>
                            <td><?= $value['book_author'] ?></td>
                            <td><?= $value['quantity'] ?></td>
                            <td>£<?= $value['book_price'] ?></td>
                            <td><a href="cart.php?delete=<?= base64_encode($value['id']) ?>" onclick="return confirm('Are You Sure You Want To Delete This Item?');"><i class="fa-solid fa-xmark"></i></a></td>
                        </tr>
                      <?php } ?>
                    </tbody>
     
                </table>
                    </div>
                </div>
                <div class="col-md-4">
   
                    <div class="cart-total">
                        <h2>Total Order Payment's</h2>
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
                        </ul>
                        <a class="btn" href="checkout.php">Checkout</a>
                    </div>
                </div>
            </div>
    </div></section>
    <?php include_once('layout/footer.php'); ?>
</body>
</html>