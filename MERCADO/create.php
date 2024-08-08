<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $address = $_POST['Address'];
    $bias = $_POST['Bias'];
    $age = (int)$_POST['Age'];
    $email = $_POST['Email'];

    $sql = "INSERT INTO bloomforms (firstname, lastname, address, bias, age, email) 
            VALUES ('$fname', '$lname', '$address', '$bias', $age, '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit;
}
?>
