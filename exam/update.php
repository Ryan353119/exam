<?php

include "db.php";

$id = $_GET['id'];

$result = $conn->query(
    "SELECT * FROM students WHERE id=$id"
);

$row = $result->fetch_assoc();


if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $age = $_POST['age'];

    $sql = "UPDATE students SET
            name='$name',
            email='$email',
            course='$course',
            age='$age'
            WHERE id=$id";

    if($conn->query($sql)) {
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Update Student</title>

<style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial;
}

body {
    background: #f1f5f9;
}

.sidebar {
    position: fixed;
    width: 240px;
    height: 100vh;
    background: #0f172a;
    padding: 25px 15px;
    color: white;
}

.logo {
    text-align: center;
    font-size: 21px;
    font-weight: bold;
    margin-bottom: 40px;
}

.sidebar a {
    display: block;
    padding: 14px;
    margin: 8px 0;
    color: #cbd5e1;
    text-decoration: none;
    border-radius: 8px;
}

.sidebar a:hover,
.sidebar .active {
    background: #2563eb;
    color: white;
}

.main {
    margin-left: 240px;
    padding: 30px;
}

.header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.admin {
    background: white;
    padding: 10px 18px;
    border-radius: 8px;
}

.form-box {
    background: white;
    max-width: 650px;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 3px 15px #0000000d;
}

.form-box h2 {
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 13px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 15px;
}

input:focus {
    outline: none;
    border-color: #2563eb;
}

.buttons {
    margin-top: 25px;
    display: flex;
    gap: 10px;
}

button,
.cancel {
    border: none;
    padding: 12px 18px;
    border-radius: 7px;
    color: white;
    text-decoration: none;
    cursor: pointer;
}

button {
    background: #2563eb;
}

.cancel {
    background: #64748b;
}

</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">
        🎓 Student System
    </div>

    <a href="index.php">
        📊 Dashboard
    </a>

    <a href="index.php" class="active">
        👨‍🎓 Students
    </a>

    <a href="create.php">
        ➕ Add Student
    </a>

</div>


<div class="main">

    <div class="header">

        <h1>Update Student</h1>

        <div class="admin">
            👤 Administrator
        </div>

    </div>


    <div class="form-box">

        <h2>Edit Student Information</h2>

        <form method="POST">

            <div class="form-group">

                <label>Full Name</label>

                <input
                    type="text"
                    name="name"
                    value="<?php echo htmlspecialchars($row['name']); ?>"
                    required>

            </div>


            <div class="form-group">

                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo htmlspecialchars($row['email']); ?>"
                    required>

            </div>


            <div class="form-group">

                <label>Course</label>

                <input
                    type="text"
                    name="course"
                    value="<?php echo htmlspecialchars($row['course']); ?>"
                    required>

            </div>


            <div class="form-group">

                <label>Age</label>

                <input
                    type="number"
                    name="age"
                    value="<?php echo $row['age']; ?>"
                    required>

            </div>


            <div class="buttons">

                <button type="submit" name="update">
                    💾 Update Student
                </button>

                <a href="index.php" class="cancel">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>
