<?php
include('./database.php');

if(empty($_SESSION['User'])){

   echo '<script>alert("To Proceed, Please Log Into Your Account");
   window.location.href="login.php";
   </script>';
   exit();
}


if(isset($_GET['book'])){

   $id = $_GET['book'];
   $edit = base64_decode($id);

   $query2 = "SELECT * FROM `books` WHERE `id` = '$edit'";
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

   $query = "SELECT * FROM `books` WHERE id != '$edit' ORDER BY `id` DESC LIMIT 4";
   $result = mysqli_query($connect,$query);
   $output = [];
    while($rows = mysqli_fetch_assoc($result)){
        $output[] = $rows;
    }

}


if(isset($_POST['number'])){
    
    $book_id = $_POST['book_id'];
    $total=0;
    $query2 = "SELECT * FROM `books` WHERE `id` = '$book_id'";
    $result2 = mysqli_query($connect,$query2);
    $out1 = '';
    $rows = mysqli_fetch_array($result2);
    $out1 = $rows;

    $i = $_POST['number'];
    $total = $out1['book_price'] * $i;


    if(isset($_POST['submit'])){




    }
}


?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('layout/head.php'); ?>

<body>

<?php include_once('layout/header.php'); ?>

    <div class="order-list">
        <div class="row">
            <div class="col-md-12">
                <h1>Buyer Detail</h1>
            </div>
        </div>
        <div class="container">
            <div class="buyer-info">
                <div class="col-md-4">
                    <div class="book-img">
                        <img src="../backend/uploads/<?= $out['image'] ?>" alt="book">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="book-form">
                        <form method="post">
                            <label for="">Book Name:</label>
                            <input type="text" value="<?= $out['book_name'] ?>" readOnly>
                            <label for="">Author Name:</label>
                            <input type="text" name="" id="" value="<?= $out['book_author'] ?>" readOnly>
                            <label for="">Manage Book Quantity:</label>
                            <input type="number" id="myInput" class="qun" min="1" name="quantity"  data-id="<?= $edit ?>" max="3"  value="1" required>
                            <label for="">Unit Price</label>
                            <input type="number" value="<?= $out['book_price'] ?>" readOnly>

                            <button type="submit" id="book-now" name="submit">Book Now</button>
                        </form>

                    </div>
                </div>
                
            </div>

        </div>
       
        
    </div>

    <?php include_once('layout/footer.php'); ?>
    <script>
    $(document).ready(function() {
        $('.qun').on('click', function() {
            
            var numberValue = $('.qun').val();
            var dataId = $(this).data('id');

            $.ajax({
                    url: 'book-buy.php',
                    type: 'POST',
                    data: { number: numberValue , book_id:dataId },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        // $total=json_decode(response);
                        // $('#total-amount').val($total);
                        $('#result').text('Response from PHP: ' + response);
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors
                        // console.error('AJAX Error: ' + status + ' ' + error);
                    }
                });
            });
    });

</script>
</body>
</html>