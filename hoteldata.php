<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hotel</title>
    <link rel="stylesheet" href="conference.css">
    <style>
        .memberdata{
            width: 50%;
            margin: auto;
            background: white;
            padding: 150px;
            border-radius: 10px;
        }
        h2{
            padding-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

<?php include 'navbar.php'; ?>
    
<?php include 'connectdb.php'; ?>

<div class="memberdata">
<?php


$hotel = $_POST["hotelroom"];

$query = "SELECT students.firstName, students.lastName
FROM students
JOIN hotelrooms ON students.roomID = hotelrooms.roomID
WHERE hotelrooms.roomID = '$hotel'";

$result = $connection->query($query);

echo "<h2>Students in Hotel Room: $hotel </h2>";
echo "<table>";

echo "<tr><th>First Name</th><th>Last Name</th></tr>";

while ($row = $result->fetch()) {
echo "<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td></tr>";
}


echo "</table>";

$connection = NULL;



?>
</div>

</body>
</html>