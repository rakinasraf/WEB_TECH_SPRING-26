<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h2>Add Student</h2>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Reg No: <input type="text" name="registration_no" required><br><br>
    Department: <input type="text" name="department" required><br><br>
    
    <button type="submit" name="submit">Add Student</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $reg = $_POST['registration_no'];
    $dept = $_POST['department'];

    $sql = "INSERT INTO students (name, email, registration_no, department)
            VALUES ('$name', '$email', '$reg', '$dept')";

    if (mysqli_query($conn, $sql)) {
        echo "Student added successfully!";
        echo "<br><a href='index.php'>View Student List</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

</body>
</html>