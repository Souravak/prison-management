<?php


include('../db_connect.php');

//write query for all login
$sql = 'SELECT * FROM login_db';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$logins = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result form memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

// print_r($logins);

$errors = array('adminname'=>'','password'=>'');
$adminname = $password = '';
if(isset($_POST['submit'])){
    
    
    

    // check name and password
    if(empty($_POST['adminname'])){
        $errors['adminname'] = 'adminname is required <br/>';
    }
    else{
        $adminname = $_POST['adminname'];
        echo $adminname;
    }
    if(empty($_POST['password'])){
        $errors['password'] = 'Password is required <br/>';
    }
    else{
        $password = $_POST['password'];
        echo $password;
    }
    // if valid credetials are entered, then login and redirect
    // if(!array_filter($errors)){
    //     // echo 'form is valid';
    //     header('Location:index.php');
    // }
    if($adminname == "admin" && $password == 123 && !array_filter($errors) ){
        // echo 'form is valid';
        header('Location:indexadmin.php');
    }
    else{
        $errors['adminname'] = 'Wrong admin';
        $errors['password'] = 'Wrong password';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    
    <section class="section">
        <div class="container">
            <h1 class="title" style="color:black">ADMIN</h1>
            <form action="" method="POST" class="form">

                <!-- <label class="adminname" >Admin Name</label> -->
                <div class="sub-container">
                    <input type="text" name="adminname" placeholder="adminname" value="<?php echo $adminname ?>">
                    <div class="errors"><?php echo $errors['adminname']; ?></div>
                </div>

                <!-- <label class="password">Password</label> -->
                <div class="sub-container">
                    <input type="password" name="password" placeholder="Password">
                    <div class="errors" ><?php echo $errors['password']; ?></div> 
                </div>

                <div class="submit">
                    <!-- <input type="submit" > -->
                    <button name="submit" class="submit">Login</button>
                </div>
            </form>
            <div>
                <button value="User Login" name="submit" class="submit" onClick="location.href='../login/login.php'">User</button>
            </div>
        </div>
    </section>
</body>
</html>