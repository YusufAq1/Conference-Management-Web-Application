<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>subcommittee</title>
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


$subcommittee = $_POST["subcommittee"];

$query = "SELECT member.memberID, member.fname, member.lname
FROM member
JOIN memberofcommittee ON member.memberID = memberofcommittee.memberID
WHERE memberofcommittee.subcommittee = '$subcommittee'";

$result = $connection->query($query);

echo "<h2>Members of $subcommittee Committee</h2>";
echo "<table><tr><th>First Name</th><th>Last Name</th></tr>";

while ($row = $result->fetch()) {
echo "<tr><td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td></tr>";
}

echo "</table>";

$connection = NULL;



?>
</div>

</body>
</html>