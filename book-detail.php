<?php
include('./database.php');

$user = isset($_SESSION['User']) ? $_SESSION['User'] : null;



if(isset($_GET['detail'])){

   $book_id = base64_decode($_GET['detail']);

   $query2 = "SELECT * FROM `books` WHERE `id` = '$book_id'";
   $result2 = mysqli_query($connect,$query2);
   
   if(!mysqli_num_rows($result2)){
       echo '<script>alert("Not Accessible!");
       window.location.href="book-blog.php";
       </script>';
    exit();
   }

   $out = '';
   $rows = mysqli_fetch_array($result2);
   $out = $rows;

$query = "SELECT * FROM `books` WHERE id != '$book_id' ORDER BY `id` DESC LIMIT 4";
$result = mysqli_query($connect,$query);
$output = [];
while($rows = mysqli_fetch_assoc($result)){
    $output[] = $rows;
}


if(isset($_POST['submit_qty'])){

    $id = $_SESSION['User']['id'];

    $query = "SELECT * FROM `carts` WHERE `user_id` = '$id' AND `book_id` = '$book_id'";
    $result = mysqli_query($connect,$query);
    $rows = mysqli_num_rows($result);

    $row1 = mysqli_fetch_assoc($result);

    if($rows) {

        $quantity = $_POST['quantity'];
        $user_id = $_SESSION['User']['id'];
   
        $qty = $row1['quantity'];
        $cart_id = $row1['id'];

        $total_qty = $quantity + $qty;

        $query = "UPDATE `carts` SET `quantity` = '$total_qty' WHERE `id` = '$cart_id'";
        $result = mysqli_query($connect,$query);
    
        if($result){
            echo '<script>alert("Your Book Has Been Added In Cart");
            window.location.href="cart.php";
            </script>';
         exit();
        }

    }
    else {

        $quantity = $_POST['quantity'];
        $user_id = $_SESSION['User']['id'];
    
        $query = "INSERT INTO `carts` (`user_id`,`quantity`,`book_id`) VALUES ('$user_id','$quantity','$book_id')"; 
        $result = mysqli_query($connect,$query);
    
        if($result){
            echo '<script>alert("Your Book  Has Been Added In Cart");
            window.location.href="book-blog.php";
            </script>';
         exit();
        }
    }
}
}
else
{
    echo '<script>alert("Not Accessible!");
       window.location.href="book-blog.php";
       </script>';
    exit();

}


?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('layout/head.php'); ?>

<body>

<?php include_once('layout/header.php'); ?>

    <div class="contact-rw1 mb-5">
        <div class="row">
            <!-- <div class="col-md-6">
                <img src="image/banner-side.jpg" alt="">
            </div> -->
            <div class="col-md-12" id="book-detail">
                <h1>Book Detail</h1>
            </div>
        </div>
    </div>
    <section class="blog-detail1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row blog-detail-image">
                        <div class="col-md-4">
                            <img src="../backend/uploads/<?= $out['image'] ?>" alt="blog" title="blog">
                        </div>
                        <div class="col-md-8">
                            <div class="justify-flex">
                                <h3><?= $out['book_name'] ?></h3>
                                <span>Author :  <strong><?= $out['book_author'] ?></strong></span>
                                <h3>£<?= $out['book_price'] ?></h3>
                                <ul class="nav row">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                </ul>
                                <p><?= $out['description'] ?></p>

                                <div class="buy-btn">
                                <form method="post">
                                  <!-- <input type="number" id="myInput" class="qun" min="1" name="quantity"  data-id="<?= $book_id ?>" max="3"  value="1" required> -->
                                    <input type="number" name="quantity" min="1" max="5" value="1" required/>
                                    <?php if(!$user==null){ ?>
                                    <button type="submit" name="submit_qty">Add To Cart</button>
                                    <?php }else{ ?>
                                    <a href="login" title="Please login to add book to cart" >Add To Cart</a>
                                    <?php } ?>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4"></div>
            </div>
        </div>
    </section>
    
    <section class="about-bx book">
        <div class="container">
            <div class="title">
                <h2>Top Book Recommendations</h2>
                <p>Discover our top book recommendations, featuring standout titles that offer captivating stories, thought-provoking themes, and unforgettable reading experiences for all.</p>
            </div>
               <div class="row">
                    <div class="recommend">

                <?php foreach($output as $value){ ?>
                    <div class="col-md-4">
                    <div class="book-box">
                        <a href="book-detail.php?detail=<?= base64_encode($value['id']) ?>" class="book-img">
                            <img src="../backend/uploads/<?= $value['image'] ?>" alt="">
                        </a>
                        <a href="book-detail.php?detail=<?= base64_encode($value['id']) ?>" class="book-details">
                            <span><?= $value['book_name'] ?></span>
                            <h4>£<?= $value['book_price'] ?></h4>
                        </a>
                        <div class="book-cart">
                             <a href="book-detail.php?detail=<?= base64_encode($value['id']) ?>">View Detail's</a>
                        </div>
                        </div>
                    </div>
                <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layout/footer.php'); ?>

  

</body>
</html>