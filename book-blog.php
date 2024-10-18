<?php
include_once('./database.php');

$query = "SELECT * FROM `books` ORDER BY `id` DESC LIMIT 6";
$result = mysqli_query($connect,$query);
$output = [];
while($rows = mysqli_fetch_assoc($result)){
    $output[] = $rows;
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
                <h1>Book Blog</h1>
            </div>
        </div>
    </div>
    <section class="about-bx book">
        <div class="container">
            <div class="title">
                <h2>Top Picks for Readers</h2>
                <p>Explore our top picks, featuring must-read books that captivate readers with their compelling stories and timeless appeal.</p>
            </div>
               <div class="row">
                
               

             <?php foreach($output as $value){?>

            <div class="col-md-3">
            <div class="book-box">
                <a href="book-detail.php?detail=<?= base64_encode($value['id']) ?>" class="book-img">
                    <img src="../backend/uploads/<?= $value['image'] ?>" alt="">
                </a>
                <a href="book-detail.php?detail=<?= base64_encode($value['id']) ?>" class="book-details">
                    <span style="text-align:center;"><?= $value['book_name'] ?></span>
                  
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
    </section>
  
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-widget">
                    <img src="image/head-logo-new.png" alt="" title=""><br>
                    <p>" Explore our vast array of titles and find your next great read today."</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="footer-widget">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                    <p>Copyright &copy; Books 2024</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>