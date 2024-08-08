<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profileId = intval($_POST['profileId']);
    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $address = $_POST['Address'];
    $bias = $_POST['Bias'];
    $age = (int)$_POST['Age'];
    $email = $_POST['Email'];

    $sql = "UPDATE bloomforms 
            SET firstname = '$fname', lastname = '$lname', address = '$address', bias = '$bias', age = $age, email = '$email'
            WHERE profile_id = $profileId";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit;
}
?>
