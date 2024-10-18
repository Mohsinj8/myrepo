<?php
include('./database.php');

if(isset($_SESSION['User'])){

   echo '<script>alert("You Are Alradey Login");
   window.location.href="home.php";
   </script>';
   exit();
}

if(isset($_POST['submit'])){

  $required_fields = ['name','email','password','phone','address'];
  $error = [];
  foreach($required_fields as $key => $value){
      if(isset($_POST[$value]) && empty($_POST[$value])){
        $error[] = $value." is required";
      }
  }
  if(count($error) == 0){

      $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
      $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
      $password = trim($_POST['password']);
      $pass = md5($password);
      $phone = trim($_POST['phone']);
      $address = trim($_POST["address"]);
  
      $qry = "SELECT * FROM `users` WHERE `email` = '$email'";
      $res = mysqli_query($connect,$qry);
      $number = mysqli_num_rows($res);
  
      if($number == 1) {     
  
          echo '<script>alert("Email Only Aggest!");
            window.location.href="register.php";
           </script>';
          exit;
      }
  
   $query = "INSERT INTO `users` (`name`,`email`,`password`,`phone`,`role`) VALUES ('$name','$email','$pass','$phone','2')";
   $result = mysqli_query($connect,$query);
   
   if($result){
        echo '<script>alert("Form submitted successfully!");
            window.location.href="login.php";
        </script>';
        exit;
  }
  else {
    echo '<script>alert("Something Went Wrong");
        window.location.href="register.php";
    </script>';
    exit;
  }
  }
  else{
      echo '<script>alert("Please Complete All Fields");
      window.location.href="register.php";
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

    <div class="register-page">
            <div class="user-register" >
                <!-- <img src="image/blog1.jpg" alt=""> -->
                <!-- <div class="col-sm-6"> -->
                    <div class="login-field">
                        <a class="login-logo" href="home.html"><img src="image/head-logo-new.png"></a>
                        <div class="admission-rw2">
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <form class="register-form" method="post">
                                        <div class="col-md-12">
                                            <h2>Register Here</h2>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" placeholder="Enter Name" for="" required="require">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Enter Email" for="" required="require">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="Password" name="" placeholder="Gernate Password" for="" required="require">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" name="phone" placeholder="Enter Phone" for="" required="require">
                                            </div>
                                        </div>
                                        
                                        <div class="submit-form">
                                            <button type="submit" name="submit" class="btn">Submit</button>
                                        </div>
                                        <p>Already have an account click on <a href="login.php">Login Here</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
    <?php include_once('layout/footer.php'); ?>
</body>
</html>





