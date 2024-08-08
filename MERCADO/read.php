<?php
include 'connection.php';

$sql = "SELECT profile_id, firstname, lastname, address, bias, age, email FROM bloomforms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
    <tr><th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Bias</th>
    <th>Age</th>
    <th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["profile_id"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["address"]."</td><td>"
        .$row["bias"]."</td><td>".$row["age"]."</td><td>".$row["email"]."</td><td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
    header("Location: index.php");
        exit;
$conn->close();
?>
