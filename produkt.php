<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "allegro");
if ($_GET["id"]) {
    $result = $conn->query("SELECT*FROM produkty WHERE id='".$_GET['id']."'");
    $row = $result->fetch_assoc();

    $id = $row['id'];
    echo '<div>';
    echo '<img src ='. $row['img'].'>';
    echo '<br>'.$row['produkt'], $rows['cena'];

    echo '<br><form method="post" action="addToCart.php">';
    echo '<input type="submit" value="dodaj do koszyka"></form>';

}
