<?php require_once 'include/header.php' ?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                <!-- <div class="fs_img">
                        <img src="img/fs_logo.jpeg" class="fs" width="510" height="150">
                        </div> -->
                    <div class="text-center">
                      
                        <h1 class="h4 text-gray-900 mb-4"><br>Create an Account!</h1>
                    </div>
                    <form class="user" method="post" action="sign_up.php">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="text"
                                placeholder="Full Name" name="user_name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="text"
                                placeholder="Email Address" name="email">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    id="text" placeholder="Password" name="password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div>
                        </div>
                        <input id="btn" type="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
                            
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login.php">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php 

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
     $user_id = random_num(10);
     $user_name = $_POST['user_name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $secure_password = password_hash($password, PASSWORD_DEFAULT);
     $user_type="";
     $date=date("Y-m-d h:i:s");

     //$user_type = "";

     $stmt = $connection->prepare("SELECT * FROM Users WHERE User_email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->store_result();
     

     //if(!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name) && !is_numeric($email))
    if($stmt->num_rows == 0) {

    $stmt1 = $connection->prepare("insert into users (User_ID, User_name, User_email, Password, Date_registered) values(?, ?, ?, ?, ?)");
    $stmt1->bind_param('sssss',$user_id, $user_name,$email, $secure_password ,$date);
    $stmt1->execute();
        header("Location: login.php");

    $stmt1->close();
     }else
     {
         //echo "The account already exists.";
         //echo display_message();
     }
     $stmt->free_result();
     $stmt->close();
 }

?>

<?php require_once 'include/footer.php' ?>