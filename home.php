<?php
include_once('./database.php');

$query = "SELECT * FROM `books` ORDER BY `id` DESC LIMIT 6";
$result = mysqli_query($connect,$query);
$output = [];
while($rows = mysqli_fetch_assoc($result)){
    $output[] = $rows;
}
$query = "SELECT * FROM `books`";
$result = mysqli_query($connect,$query);
$out = [];
while($rows = mysqli_fetch_assoc($result)){
    $out[] = $rows;
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('layout/head.php'); ?>

<body>

<?php include_once('layout/header.php'); ?>

    <section class="home-bx1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Books That Inspire and Delight </h1>
                    <p>Discover a curated selection of books that ignite your imagination and captivate your heart. From timeless classics to modern gems, our collection offers something for every reader. Let each page inspire, uplift, and transport you to new worlds filled with adventure, wisdom, and wonder.</p>
                </div>
                <div class="col-md-6">
                    <div class="reading">
                        <img src="image/banner-half.jpg" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-bx">
        <div class="container">
            <div class="title">
                <h2>
                    Curated Selection</h2>
                <p>Explore a handpicked assortment of books tailored to ignite your curiosity and passion for reading. Whether you're seeking profound insights or thrilling adventures, our carefully chosen collection offers a diverse range of genres and stories, designed to inspire and delight every reader.</p>
            </div>
               <div class="row">
                  <?php foreach($output as $value){ ?>
                    <div class="col-md-3">
                        <div class="book-box" id="hero-books">
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
    </section>
    <section class="why-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="right-img">
                        <img src="image/image-right.jpg">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="content">
                        <h2>Explore More  <br>Grow Smarter</h2>
                        <p>Dive deeper into a world of knowledge and unlock endless possibilities with each new book you read. Whether you're seeking personal growth, professional development, or pure enjoyment, expanding your reading horizons fuels creativity and critical thinking. Let every book be a stepping stone to wisdom and success, guiding you toward a brighter, more informed future.</p>
                        <ul>
                            <li>Expand knowledge</li>
                            <li>Foster creativity</li>
                            <li>Boost critical thinking</li>
                            <li>Encourage personal growth</li>
                            <li>Professional development</li>
                            <li>Fuel curiosity</li>
                            <li>Discover new perspectives</li>
                            <li>Enrich life experiences</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-bx home-bx2">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>THIS WEEKS FEATURED BOOKS</h2>
                    <p>Experience our cutting-edge and challenging Academic programs, designed to prepare students for success in the 21st century.</p>
                </div>
                <div class="why-bx1">
                    <div class="row">

                    <?php foreach($out as $value){ ?>

                        <div class="col-md-3">
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
                        
                <?php }?>
                       

                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="row">
            <div class="title">
                <h2>Our Client Reviews</h2>
                <p>
                    Stay informed with the latest school updates, from key events and academic milestones to exciting community projects and initiatives. Keep connected with important news that shapes our vibrant school community.</p>
            </div>
            <div class="blog-list">
                <div class="col-md-4 col-sm-4">
                    <div class="blog-list-bx">
                        <span class="breckets">"</span>
                        <div class="box-blog">
                            <p> "We are extremely pleased with our decision to adopt the new system. The analytics and reporting features have provided us with deep insights into user preferences and borrowing trends, allowing us to make informed decisions. This has helped us improve our collection and elevate the overall experience for our community members."</p>
                            <div class="row">
                                <img src="image/user.png">
                                <span>Samantha Lewis,<br/> Library Director</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="blog-list-bx">
                        <span class="breckets">"</span>
                        <div class="box-blog">
                            <p>Since adopting the new system, our library has seen a notable boost in user engagement. The online access feature has broadened our reach to remote users, while the notifications and reminders have enhanced communication with our patrons. This intuitive system has truly elevated the quality of our library services, making our operations. </p>
                            <div class="row">
                                <img src="image/user1.png">
                                <span>Mark Ramirez,<br/> School Librarian</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="blog-list-bx">
                        <span class="breckets">"</span>
                        <div class="box-blog">
                            <p>"Our new system has transformed the management of our library collections. Automated cataloging and resource reservation features have significantly reduced manual tasks, enabling us to dedicate more time to enhancing services for our patrons. It’s an effective tool that has greatly improved efficiency and organization in our library."</p>
                            <div class="row">
                                <img src="image/user2.png">
                                <span>Emily Collins,<br/> Public Librarian</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <?php include_once('layout/footer.php'); ?>

</body>
</html>