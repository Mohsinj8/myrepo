<?php
include_once('./database.php');

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('layout/head.php'); ?>

<body>

<?php include_once('layout/header.php'); ?>


    <div class="contact-rw1 mb-5"  >
        <div class="row" >
            <div class="col-md-12" id="about-us">
                <h1>About us</h1>
            </div>
        </div>
    </div>
    <section id="whyus">
        <div class="container">
            <h2>Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="tabbable tabs-left" id="tabs-left">
                        <ul class="nav nav-tabs">
                            <li > <a href="#a" data-toggle="tab"><strong>Extensive Collection:</strong> We offer a vast range of books, from classic literature to contemporary works, ensuring there's something for every reader. Our diverse selection caters to all ages and interests, providing endless opportunities for learning and entertainment.</a></li>
                            <li><a href="#b" data-toggle="tab"><strong>Curated Selection:</strong>Our books are carefully chosen to meet high standards of quality and relevance. Whether you're looking for timeless novels or specialized reference material, each title in our collection has been handpicked for its impact and value.</a></li>
                            <li><a href="#c" data-toggle="tab"> <strong>Up-to-Date Content:</strong> Stay ahead with the latest releases and new editions. Our collection is frequently updated to include the most current publications, ensuring our readers have access to the freshest perspectives and information across various genres.</a></li>
                            <li><a href="#d" data-toggle="tab"><strong>User-Friendly Search:</strong> Find the perfect book with ease using our intuitive search and filtering options. Whether you're exploring new genres or seeking specific titles, our system makes discovering your next great read simple and efficient.</a></li>
                            <li>
                                <a href="#e" data-toggle="tab"><strong>Affordable Pricing:</strong> We offer competitive pricing on all our books, making reading more accessible. With regular discounts and promotions, our collection provides both quality and affordability, ensuring you can build your personal library without breaking the bank.</a>
                            </li>
                            <li><a href="#d" data-toggle="tab"><strong>Personalized Recommendations:</strong> Receive personalized book suggestions based on your reading habits and preferences. Our tailored recommendations ensure you discover books that match your interests, helping you continuously explore new genres and authors.</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="tab-content">
                        <div class="tab-pane active" id="a">
                            <img src="image/books.jpg" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="hw-apply">
        <div class="container">
            <h2>Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="image/image-right.jpg" class="img-responsive">
                        <div class="card-body">
                            <h3>Accessibility Features</h3>
                            <p>We prioritize accessibility and inclusivity by incorporating features like adjustable font sizes, dyslexia-friendly formatting, and audio narration options, making reading accessible to individuals with diverse needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="image/c-2.jpg" class="img-responsive">
                        <div class="card-body">
                            <h3>Curated Collections</h3>
                            <p>BookWise Library curates special collections and thematic displays, featuring curated lists of books on specific topics, genres, or seasonal themes, providing inspiration and discovery opportunities for readers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="image/c-3.jpg" class="img-responsive">
                        <div class="card-body">
                            <h3>Continuous Expansion</h3>
                            <p>We are committed to continuously expanding our collection, adding new titles and responding to user requests and feedback to ensure a dynamic and up-to-date library experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layout/footer.php'); ?>
    
</body>
</html>