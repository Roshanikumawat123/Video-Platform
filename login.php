<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'db.php';

    $username=$_POST['username'];
    $password=$_POST['password'];

   

   $sql = "SELECT * from `users` where username='$username'";
   $result=mysqli_query($conn,$sql);
   if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
        echo "user already extis";
      
    }else{
        $sql ="insert into `register`(username,password) values('$username','$password')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo 'Login successfully';
         
          header('location:upload.php');
        }else{
            die(mysqli_error($conn));
        }
    }
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Form container */
form {
    max-width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
}

/* Form heading */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Form inputs */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Button */
button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Button hover effect */
button:hover {
    background-color: #45a049;
}

/* Align button */
.btn {
    margin-top: 10px;
}

/* Remove default browser styles */
input:focus, button:focus {
    outline: none;
}

/* Responsive styling for small screens */
@media (max-width: 768px) {
    form {
        width: 90%;
    }
}

        </style>
   <link rel="stylesheet" href="styles.css">
</head>
<body>


    <div class=form>
    <form action="" method="POST">
    
            <h1>Login Here</h1>
            <input type="text" id="name" placeholder="Name" name="username">
            <br>
            <input type="password"  placeholder="Password" name="password">
            <br>
            <button class="btn" type="submit">Login</button>

    </form>
</div>
</body>
</html>