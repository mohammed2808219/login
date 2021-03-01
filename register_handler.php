<?php 
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordhashed = password_hash($password,PASSWORD_DEFAULT);
$age = $_POST["age"];
$mobile = $_POST["mobile"];

include "config.php";

$insertUser = "INSERT INTO users (firstName,lastName,email,password,age,mobile) 
VALUES (?,?,?,?,?,?)";

$stmt = mysqli_prepare($con,$insertUser);

mysqli_stmt_bind_param($stmt,"ssssss",$firstName,$lastName,$email,$passwordhashed,$age,$mobile);


$result = mysqli_stmt_execute($stmt);
if($result){
    echo "<h1>User created successfully</h1>";
    echo "<a href='login.php'> Click here to Login</a>";
}
else{
	
    echo "Erorr is ". mysqli_stmt_error($stmt);
}
?>