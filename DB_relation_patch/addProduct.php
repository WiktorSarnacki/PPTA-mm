<?php
session_start();

if(!(isset($_SESSION['zalogowany']))){
    echo "Aby dodać produkt musisz być zalogowany";
}
$conn = mysqli_connect("localhost", "root", "", "allegro");

$productName = $_POST['prod_name'];
$price = $_POST['price'];
$description = $_POST['description'];
$seller = $_POST['seller'];


$sql = "INSERT INTO produkty (prod_name, price, description, seller_id) VALUES ('$productName', '$price', '$description', '$seller')"; ##zmienione
$conn->query($sql);
if($conn->error){
    echo "Error: ".$conn->error;
    exit;
}

$sql = "SELECT seller_id FROM produkty WHERE prod_name = '$productName' AND price = '$price' AND description = '$description' AND seller_id = '$seller'"; ##zmienione
$conn->query($sql);
if($conn->error){
    echo "Error: ".$conn->error;
    exit;
}

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row['seller_id']; ##zmienione

if(isset($_FILES['prod_thumbnail'])){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["prod_thumbnail"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $new_file_name = $target_dir . $id . "." . $imageFileType;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["prod_thumbnail"]["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($_FILES["prod_thumbnail"]["tmp_name"], $new_file_name)) {
            echo "The file ". htmlspecialchars(basename($_FILES["prod_thumbnail"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "No file was uploaded.";
}

$sql = "UPDATE produkty SET prod_thumbnail = '$new_file_name' WHERE seller_id = '$id'";
$conn->query($sql);
if($conn->error){
    echo "Error: ".$conn->error;
    exit;
}

header("location: index.php");

?>