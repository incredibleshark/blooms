<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="info.css">
    <title>BLOOM TEAM MEMBERS' INFORMATION</title>
</head>
<body>
<h1>BLOOM TEAM FORMS</h1>
    <div class="container">
        <div id="createModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeCreate">&times;</span>
                <form id="createForm" method="POST" action="create.php">
                    <label for="create_fname">First Name:</label>
                    <input type="text" id="create_fname" name="FName"> <br>

                    <label for="create_fname">Last Name:</label>
                    <input type="text" id="create_lname" name="LName"> <br>

                    <label for="create_address">Address:</label>
                    <input type="text" id="create_address" name="Address"> <br>

                    <label for="create_bias">Bias:</label>
                    <input type="text" id="create_bias" name="Bias"> <br>

                    <label for="create_age">Age:</label>
                    <input type="text" id="create_age" name="Age"> <br>

                    <label for="create_email">Email:</label>
                    <input type="text" id="create_email" name="Email"> <br>

                    <input type="submit" value="Create">
                </form>
            </div>
        </div>

        <div id="updateModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeUpdate">&times;</span>
                <form id="updateForm" method="POST" action="update.php">
                <input type="hidden" id="update_profile_id" name="profileId"> <!-- Hidden input for profileId -->
                <label for="update_fname">First Name:</label>
                <input type="text" id="update_fname" name="FName"> <br>

                <label for="update_lname">Last Name:</label>
                <input type="text" id="update_lname" name="LName"> <br>

                <label for="update_address">Address:</label>
                <input type="text" id="update_address" name="Address"> <br>

                <label for="update_bias">Bias:</label>
                <input type="text" id="update_bias" name="Bias"> <br>

                <label for="update_age">Age:</label>
                <input type="text" id="update_age" name="Age"> <br>

                <label for="update_email">Email:</label>
                <input type="text" id="update_email" name="Email"> <br>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>

        <button class="createButton" id="openCreateModal">Add New Member</button>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Bias</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';

                $sql = "SELECT profile_id, firstname, lastname, address, bias, age, email FROM bloomforms";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row["profile_id"]."</td>
                            <td>".$row["firstname"]."</td>
                            <td>".$row["lastname"]."</td>
                            <td>".$row["address"]."</td>
                            <td>".$row["bias"]."</td>
                            <td>".$row["age"]."</td>
                            <td>".$row["email"]."</td>
                            <td>
                                <button class='updateButton' data-id='".$row["profile_id"]."' data-name='".$row["firstname"]."' 
                                data-lname='".$row["lastname"]."' data-address='".$row["address"]."' 
                                data-bias='".$row["bias"]."' data-age='".$row["age"]."' data-email='".$row["email"]."'>Update</button>
                                <form method='POST' action='delete.php' style='display:inline;'>
                                    <input type='hidden' name='profileId' value='".$row["profile_id"]."'>
                                    <input type='submit' class='deletebutton' value='Delete'>
                                </form>
                            </td>
                        </tr>";
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <script>
var createModal = document.getElementById("createModal");
var updateModal = document.getElementById("updateModal");

var openCreateModal = document.getElementById("openCreateModal");
var closeCreate = document.getElementById("closeCreate");
var closeUpdate = document.getElementById("closeUpdate");

openCreateModal.onclick = function() {
    createModal.style.display = "block";
}

closeCreate.onclick = function() {
    createModal.style.display = "none";
}

document.querySelectorAll(".updateButton").forEach(button => {
    button.onclick = function() {
        var profileId = this.getAttribute("data-id");
        var fname = this.getAttribute("data-name"); 
        var lname = this.getAttribute("data-lname");
        var address = this.getAttribute("data-address");
        var bias = this.getAttribute("data-bias");
        var age = this.getAttribute("data-age");
        var email = this.getAttribute("data-email");

        document.getElementById("update_profile_id").value = profileId;
        document.getElementById("update_fname").value = fname;
        document.getElementById("update_lname").value = lname;
        document.getElementById("update_address").value = address;
        document.getElementById("update_bias").value = bias;
        document.getElementById("update_age").value = age;
        document.getElementById("update_email").value = email;

        updateModal.style.display = "block";
    }
});

closeUpdate.onclick = function() {
    updateModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == createModal) {
        createModal.style.display = "none";
    } else if (event.target == updateModal) {
        updateModal.style.display = "none";
    }
}

        </script>
    </div>
</body>
</html>
