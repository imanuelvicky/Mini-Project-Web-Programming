<?php
session_start();
require 'functions.php';

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

if(isset($_POST['register'])){

    if(regis($_POST)>0){
        header("Location:Login_Admin.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Login_Admin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <h1>Admin Registration</h1>
    <div class="box">
        <form action="" method="POST">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" onkeyup="validasiPassword();" required>
                    <span class="info"></span>
                </li>
                <li>
                    <label for="password2">Confirm Password :</label>
                    <input type="password" name="password2" id="password2" required>
                </li>
                <li>
                    <button  class="button" type="submit" name="register" onclick="validasiPassSubmit();" required>Register</button>
                </li>
                <li class="back">
                    <button><a href="crudAdmin.php">Back</a></button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>

<script>
    var inpPassword = document.getElementById('password');
    var inpConfirmPassword = document.getElementById('password2');

    function validasiPassword(){
        let areaPeringatan = document.getElementsByClassName('info')[0]
        let regularExpression = /^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{3,16}$/;
        if (!regularExpression.test(inpPassword.value)){
            areaPeringatan.textContent='Harus ada 1 huruf besar, 1 huruf kecil, 1 angka, 3-16 char';
            areaPeringatan.style.color='red';
        }else{
            areaPeringatan.textContent='Mantep !';
            areaPeringatan.style.color='green';
        }
    }
    function validasiPassSubmit(){
        if(inpPassword.value !== inpConfirmPassword.value){
                window.alert('Password dan Confirm Password tidak sama !')
                event.preventDefault()
        }
    }
</script>