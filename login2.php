<?php
// session_start();
session_start();
@include 'confi.php';
if (isset($_POST['submit'])) {
   
    $username=$_POST['name'];
    $pass=$_POST['password'];
    $user_type = mysqli_real_escape_string($con, $_POST['format']);

    $find="SELECT * FROM `userdetails` WHERE username = '$username' and  user_type ='$user_type';";
    $query=mysqli_query($con,$find);
    $result=mysqli_num_rows($query);
    // $row=mysqli_fetch_array($query);
    if($result){
        $getdata=mysqli_fetch_assoc($query);
        $password=$getdata['password'];
        $decodepass=password_verify($pass,$password);
        if ($decodepass) {
            // header("location:C:\xampp\htdocs\workergetset\worker\admin_panel (1).php");
            ?>
            <script>
                alert("Successfully login ohh yeah!!!");
                 location.replace("main.html");
            </script>
            <?php
        }
        else{ 
            ?>
            <script>
                alert("kya bhai passowrd wrong dal diya");
            </script>
            <?php
        }
    }
    else { 
        ?>
            <script>
                alert("kya hau dek jara email wrong dala hai ye login type worng dala hai???");
            </script>
            <?php
    }


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<link rel="stylesheet" href="login2.css">

<body>
    <div class="login-box">
        <h2>LOGIN</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="user-box">
                <input type="text" name="name" placeholder="" required>
                <label for="">Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" placeholder="" required>
                <label for="">Password</label>
            </div>
            <div class="user-box">
                <div class="select">
                    <select name="format" id="format" style="height: 25px;
    background: transparent;
    border: 2px solid white;
    color: white;">
                        <option selected disabled>signup type</option>
                        <option value="User" style=" color: black;">USER</option>
                        <option value="Worker" style=" color: black;">WORKER</option>
                        <option value="Admin" style=" color: black;">ADMIN(only for office!!)</option>

                    </select>
                </div>
            </div>
            <a href="#">

                <button type="submit" value="submit" name="submit">Login</button>

            </a>

        </form>
        <p class="para-2">Don't have an account?
            <a href="signup2.php">Sign Up here</a>
        </p>
    </div>
</body>

</html>