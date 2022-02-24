<?php

$name = '';
$age = '';
$phone = '';
$location = '';
$update = false;

$conn = new mysqli('localhost', 'root', '939413', 'php-crud') or die(mysqli_error($conn));

// echo "Connected to database";

// Create
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $conn->query("INSERT INTO crud ( name, age, phone, location ) VALUES ('$name', '$age', '$phone', '$location')")
    or die($conn->error);

    // Redirect
    header("Location: index.php");
}

// Edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // for btn
    $update = true;

    // echo $id;
    $data = $conn->query("SELECT * FROM crud WHERE id = $id") or die(mysqli_error($conn));

    if ($data) {
        // echo 'edit';
        $result = mysqli_fetch_assoc($data);
        
        $name = $result['name'];
        $age = $result['age'];
        $phone = $result['phone'];
        $location = $result['location'];
    }
}

// Update
if (isset($_POST['update'])) {
    // echo 'update';
    $id = $_POST['id'];
    // echo $id;
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $conn->query("UPDATE crud set name = '$name', age = '$age', phone = '$phone', location = '$location' WHERE id = $id")
            or die(mysqli_error($conn));

    header("Location: index.php");
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // echo $id;
    $conn->query("DELETE FROM crud WHERE id = $id") or die($conn->error);

    // Redirect
    header("Location: index.php");
}