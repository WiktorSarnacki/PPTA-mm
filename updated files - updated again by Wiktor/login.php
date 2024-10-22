<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "projektallegro");

$ok = false;

@$email = $_POST['email'];
@$password = $_POST['password'];

$accVerify = $conn->query("SELECT * FROM userdata WHERE email = '$email' AND upassword = '$password'" );


if($accVerify->num_rows<=0){
    echo '<div style="text-align: center;font-size: 30px">Nie poprawny email lub hasło';
    echo "<br><a href='index.html'>Powrót na stronę</a></div>";
}else if($accVerify->num_rows>1){
    echo '<div style="text-align: center;font-size: 30px">Wystąpił problem podczas logowania</div>';
    echo "<br><a href='index.html'>Powrót na stronę</a></div>";
}else{
    $ok = true;
}


if ($ok){
    $info = $accVerify->fetch_assoc();
    $_SESSION['zalogowany'] = true;
    $_SESSION['userID'] = $info['id'];
    $_SESSION['name'] = $info['name'];
    $accVerify->free_result();
    echo "<div style='text-align: center;font-size: 30px;'>Pomyślnie zalogowano";
    echo "<br><a href='afterlogin.html'>Powrót na stronę</a></div>";
}
