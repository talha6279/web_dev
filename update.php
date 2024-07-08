<?php
include 'dataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $school_name = $_POST['school_name'];
    $registration_no = $_POST['registration_no'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET school_name='$school_name', registration_no='$registration_no', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    header("Location: read.php");
    exit();
} else {
    if (!isset($_GET['id'])) {
        echo "No ID parameter provided";
        exit();
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $school_name = $row['school_name'];
        $registration_no = $row['registration_no'];
        $email = $row['email'];
    } else {
        echo "No record found";
        $conn->close();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Update User</h2>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="school_name">School Name:</label>
            <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $school_name; ?>" required>
        </div>
        <div class="form-group">
            <label for="registration_no">Registration No:</label>
            <input type="text" class="form-control" id="registration_no" name="registration_no" value="<?php echo $registration_no; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="read.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
