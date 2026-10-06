<?php

include "db.php";

$id = $_GET['id'];

$result = $conn->query(
    "SELECT * FROM students WHERE id=$id"
);

$row = $result->fetch_assoc();


if(isset($_POST['delete'])) {

    $conn->query(
        "DELETE FROM students WHERE id=$id"
    );

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Delete Student</title>

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

.delete-box {
    max-width: 550px;
    background: white;
    padding: 45px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 3px 15px #0000000d;
}

.icon {
    font-size: 60px;
    margin-bottom: 20px;
}

.delete-box h2 {
    margin-bottom: 15px;
    color: #dc2626;
}

.delete-box p {
    color: #64748b;
    margin-bottom: 25px;
    line-height: 1.6;
}

.buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

button,
.cancel {
    padding: 12px 18px;
    border: none;
    border-radius: 7px;
    color: white;
    text-decoration: none;
    cursor: pointer;
}

button {
    background: #ef4444;
}

.cancel {
    background: #64748b;
}

button:hover {
    background: #dc2626;
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

        <h1>Delete Student</h1>

        <div class="admin">
            👤 Administrator
        </div>

    </div>


    <div class="delete-box">

        <div class="icon">
            ⚠️
        </div>

        <h2>Delete Student?</h2>

        <p>
            Are you sure you want to delete
            <strong>
                <?php echo htmlspecialchars($row['name']); ?>
            </strong>
            from the database?
            <br>
            This action cannot be undone.
        </p>


        <div class="buttons">

            <form method="POST">

                <button type="submit" name="delete">
                    🗑 Yes, Delete
                </button>

            </form>

            <a href="index.php" class="cancel">
                Cancel
            </a>

        </div>

    </div>

</div>

</body>

</html>
