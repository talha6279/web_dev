<?php
include 'dataBase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Users Table</h2>
    <a href="edit.php" class="btn btn-success mb-4">Add New User</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>School Name</th>
                <th>Registration No</th>
                <th>Email</th>
                <th>Actions</th> <!-- New column add krien  for actions -->
            </tr>
        </thead>
        <tbody>
            <?php
        
            $sql = "SELECT * FROM `users` WHERE 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';
                    echo '<td>' . $row["school_name"] . '</td>';
                    echo '<td>' . $row["registration_no"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td><a href="update.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm">Update</a></td>'; // Update button link k sath lgana h 
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No results found</td></tr>'; // Updated colspan to match new column 
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
