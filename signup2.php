<?php
 
include 'confi.php';
if(isset($_POST['submit'])) {
    
    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $contact =  mysqli_real_escape_string($con, $_POST['contact']); 
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpass =mysqli_real_escape_string($con, $_POST['cpass']);
    $user_type = mysqli_real_escape_string($con, $_POST['format']);
    $gender=mysqli_real_escape_string($con, $_POST['gender']);

    $bipass=password_hash($password,PASSWORD_BCRYPT);
    $bicpass=password_hash($cpass,PASSWORD_BCRYPT);
    $emailfind=" select * from userdetails where email='$email'";
    $query=mysqli_query($con,$emailfind);
    $emailcount=mysqli_num_rows($query);
    if($emailcount>0){
                 ?>
                <script>
                    alert("Email already exits !!!");
                </script>
                <?php
    }else{
        if($password==$cpass){
            $select = "INSERT INTO `userdetails`(`Name`, `contact_no`, `email`, `username`, `password`, `cpass`, `user_type`, `gender`)
            VALUES (' $name','$contact','$email','$username','$bipass','$bicpass','$user_type','$gender')";
            $quer=mysqli_query($con,$select);
            if($quer){
                 
                ?>
                <script>
                    alert("succesfully register thanju");
                </script>
                <?php
            }
            else{
                ?>
               <script>
                    alert("something went wrongs");
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("passwor not maching?????");
            </script>
            <?php
        }
    }





    // $select = "INSERT INTO `userdetails`(`Name`, `contact_no`, `email`, `username`, `password`, `comfirmpass`, `user_type`, `gender`)
    //  VALUES ('[ $name]','[$contact]','[$email]','[$username]','[$password]','[$cpass]','[$user_type]','[]')";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>

</head>
<link rel="stylesheet" href="signup2.css">

<body>
    <div class="login-box">
        <h2>Sign Up</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="user-box">
                <input type="text" name="fullname" placeholder="" required>
                <label for="">FullName</label>
            </div>
            <div class="user-box">
                <input type="number" name="contact" placeholder="" required>
                <label for="">Contact no.</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" placeholder="" required>
                <label for="">Email</label>
            </div>
            <div class="user-box">
                <input type="text" name="username" placeholder="" required>
                <label for="">Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" placeholder="" required>
                <label for="">Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="cpass" placeholder="" required>
                <label for="">Confirm Password</label>
            </div>
            <div class="user-box">
                <div class="select">
                    <select name="format" id="format">
                        <option selected disabled>signup type</option>
                        <option value="User">USER</option>
                        <option value="Worker">WORKER</option>
                        <option value="Admin">ADMIN(only for office!!)</option>

                    </select>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1" value="male">
                <input type="radio" name="gender" id="dot-2" value="female">

                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                </div>
            </div>


            <a href="#">

                <button type="submit" value="submit" name="submit">Sign Up</button>

            </a>

        </form>
        <p>By clicking the Submit button, you agree to our <br>
            <a href="#">Terms and Conditions</a> and
            <a href="#"> Privacy Policy</a>
        </p>
        <p class="para-2">Already have an account? <a href="login2.php">Login here

            </a></p>
    </div>
</body>

</html>