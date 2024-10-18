<?php
include('./database.php');

if(isset($_POST['submit'])){

$required_fields = ['name','email','phone','subject','message'];
$error = [];
foreach($required_fields as $key => $value){
    if(isset($_POST[$value]) && empty($_POST[$value])){
      $error[] = $value." is required";
    }
}
if(count($error) == 0){

    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);
    
 $query = "INSERT INTO `contacts` (`name`,`email`,`phone`,`subject`,`message`) VALUES ('$name','$email','$phone','$subject','$message')";
 $result = mysqli_query($connect, $query);
 
 if($result){
      echo '<script>alert("Contact submitted successfully!");
          window.location.href="contact.php";
      </script>';
      exit;
}
else {
  echo '<script>alert("Something Went Wrong");
      window.location.href="contact.php";
  </script>';
  exit;
}
}
else{
    echo '<script>alert("Please Complete All Fields");
    window.location.href="contact.php";
   </script>';
  exit;
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
                <div class="contact-bg">

                </div>
                <!-- <img src="image/banner-side.jpg" alt=""> -->
        </div>
    </div>
    <div class="contact-rw2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-rw2_1">
                        <div class="col-md-12">
                            <div class="contact-rw2-bx">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h3>Address</h3>
                                <p> 456 High Road,
                                    London,
                                    SW1A 2AA,
                                    United Kingdom </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-rw2-bx">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h3>Phone</h3>
                                <p> +44 20 7946 0958</p>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-rw2-bx">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h3> Email </h3>
                                <p>contact@sampleuk.co.uk</p>
                            </div>
                       </div>
                    </div> 
                </div>
                <div class="col-md-6 contact-rw3">
                        <div class="row">
                        <h2>Leave A Message</h2>
                            <form method="post">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Name" for="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" for="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" name="phone" placeholder="Phone" for="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" placeholder="Subject" for="subject" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="submit-form">
                                        <button type="submit" name="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('layout/footer.php'); ?>
</body>
</html>