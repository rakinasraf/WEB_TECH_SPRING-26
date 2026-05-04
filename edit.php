<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Department: <input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['department'];

    $sql = "UPDATE students 
            SET name='$name', email='$email', department='$dept' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully!";
        echo "<br><a href='index.php'>View Student List</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

</body>
</html>