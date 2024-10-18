
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
                <div class="colleft" id="checkout-list" >
                <table>
                    <thead>
                        <tr>
                            <th>Book Image</th>
                            <th>BooK Name</th>
                            <th>Order No</th>
                            <th>Book Quantity</th>
                            <th>Order Date</th>
                            <th>Unit Price</th>
                            <th>Sub Price</th>
                            <th>Order At</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="image/cloud-street.jpeg" alt=""></td>
                            <td>Cloud Street</td>
                            <td>#FT0102024</td>
                            <td>10</td>
                            <td>27/09/2024</td>
                            <td>$100.00</td>
                            <td>$10000.00</td>
                            <td>Flipkart</td>
                            <td>
                                <button class="pending">Pending</button>
                            </td>

                        </tr>
                        <tr>
                            <td><img src="image/clever_lands.jpg" alt=""></td>
                            <td>Clever Lands</td>
                            <td>#PB0002024</td>
                            <td>12</td>
                            <td>19/09/2024</td>
                            <td>$100.00</td>
                            <td>$12000.00</td>
                            <td>Amazon</td>
                            <td>
                                <button class="rejected">Rejected</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="image/clever_lands.jpg" alt=""></td>
                            <td>Clever Lands</td>
                            <td>#PB0002024</td>
                            <td>12</td>
                            <td>19/09/2024</td>
                            <td>$100.00</td>
                            <td>$12000.00</td>
                            <td>Amazon</td>
                            <td>
                                <button class="confirmed">Confirmed</button>
                            </td>
                        </tr>
                    </tbody>
     
                </table>

                </div>
                
            </div>
        </div>
    </section>

    <?php include_once('layout/footer.php'); ?>
</body>
</html>