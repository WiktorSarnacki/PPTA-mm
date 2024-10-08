<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "allegro");

$ok = false;

@$email = $_POST['email'];
@$password = $_POST['password'];

$accVerify = $conn->query("SELECT * FROM user WHERE email = $email AND password = $password" );


if ($accVerify->num_rows<=0){
    $_SESSION['loginErr'] = '<span>Nie poprawny email lub hasło</span>';
}elseif($accVerify->num_rows>1){
    $_SESSION['loginErr2'] = '<span>Wystąpił problem podczas logowania</span>';
}else{
    $ok = true;
}


if ($ok){
    $info = $accVerify->fetch_assoc();
    $_SESSION['zalogowany'] = true;
    $_SESSION['userID'] = $info['id'];
    $_SESSION['name'] = $info['name'];
    $accVerify->free_result();
    header("location: index.html");
}



