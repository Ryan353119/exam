<?php
include "db.php";

$result = $conn->query("SELECT * FROM students");
$total_students = $result->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
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

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000d;
        }

        .card h3 {
            color: #64748b;
            font-size: 14px;
        }

        .card h2 {
            color: #2563eb;
            margin-top: 10px;
        }

        .table-box {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000d;
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .add {
            background: #2563eb;
            color: white;
            padding: 11px 16px;
            text-decoration: none;
            border-radius: 7px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            background: #f1f5f9;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        .edit {
            background: #f59e0b;
            color: white;
            padding: 7px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .delete {
            background: #ef4444;
            color: white;
            padding: 7px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        @media(max-width: 800px) {
            .sidebar {
                width: 70px;
            }

            .logo {
                font-size: 0;
            }

            .logo::after {
                content: "🎓";
                font-size: 25px;
            }

            .sidebar a {
                font-size: 0;
                text-align: center;
            }

            .sidebar a::first-letter {
                font-size: 20px;
            }

            .main {
                margin-left: 70px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">

    <div class="logo">
        🎓 Student System
    </div>

    <a href="index.php" class="active">
        📊 Dashboard
    </a>

    <a href="index.php">
        👨‍🎓 Students
    </a>

    <a href="create.php">
        ➕ Add Student
    </a>

</div>

<div class="main">

    <div class="header">
        <h1>Dashboard</h1>

        <div class="admin">
            👤 Administrator
        </div>
    </div>

    <div class="cards">

        <div class="card">
            <h3>TOTAL STUDENTS</h3>
            <h2><?php echo $total_students; ?></h2>
        </div>

        <div class="card">
            <h3>DATABASE</h3>
            <h2>Online</h2>
        </div>

        <div class="card">
            <h3>SYSTEM STATUS</h3>
            <h2>Active</h2>
        </div>

    </div>

    <div class="table-box">

        <div class="table-header">
            <h2>Student Records</h2>

            <a href="create.php" class="add">
                + Add Student
            </a>
        </div>

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Age</th>
                <th>Action</th>
            </tr>

            <?php while($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row['id']; ?></td>

                <td>
                    <?php echo htmlspecialchars($row['name']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['email']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['course']); ?>
                </td>

                <td><?php echo $row['age']; ?></td>

                <td>

                    <a class="edit"
                       href="edit.php?id=<?php echo $row['id']; ?>">
                        ✏ Edit
                    </a>

                    <a class="delete"
                       href="delete.php?id=<?php echo $row['id']; ?>">
                        🗑 Delete
                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>
