<?php
include('./database.php');

if(isset($_SESSION['User'])){

    echo '<script>alert("You Are Alradey Login");
    window.location.href="home.php";
    </script>';
    exit();
 }

if(isset($_POST['submit'])){

  $required_fields = ['email','password'];
  $error = [];
  foreach($required_fields as $key => $value){
      if(isset($_POST[$value]) && empty($_POST[$value])){
        $error[] = $value." is required";
      }
  }
  if(count($error) == 0) {

    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $pass = md5($password);

    $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass'";
    $result = mysqli_query($connect,$query);
    
    if($rows = mysqli_fetch_assoc($result)){
      
      if($rows['status'] == 2){

         echo '<script>alert("YOUR ACCOUNT IS INACTIVE!");
         window.location.href="login.php";
        </script>';
       exit;
       
      }
      $_SESSION['User'] = $rows;
     }
      if(isset($_SESSION['User'])){

          echo '<script>alert("Login SuccessFul");
          window.location.href="home.php";
          </script>';
          exit;
      }
      else
      {
          echo '<script>alert("Your Details Were Wrong!!");
          window.location.href="login.php";
         </script>';
        exit;
      }
    }
    else
    {
        echo '<script>alert("Something Went Wrong");
        window.location.href="login.php";
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

    <div class="login-page">
            <div class="contact-rw1 admission-rw1" >
                <!-- <img src="image/blog1.jpg" alt=""> -->
                <!-- <div class="col-sm-6"> -->
            <div class="login-field">
                <a class="login-logo" href="home.html"><img src="image/head-logo-new.png"></a>
                <div class="admission-rw2">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <form method="post">
                                <div class="col-md-12">
                                    <h2>Login</h2>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group" style="text-align: left;">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Enter Your Register-Email" for="" required="require">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group" style="text-align: left;">
                                        <label>Password:</label>
                                        <input type="password" name="password" placeholder="Enter Your Register-Password" for="" required="require">
                                    </div>
                                </div>
                                <div class="submit-form">
                                    <button type="submit" name="submit" class="btn">Submit</button>
                                </div>
                                <p>If you don't have an account click on <a href="register.php">Register Here</a></p>
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