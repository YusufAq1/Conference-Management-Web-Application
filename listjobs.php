<?php include 'connectdb.php'; ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Jobs</title>
        <link rel="stylesheet" href="conference.css">
        <style>
            .jobs{
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

<div class="jobs"> 

<?php


$query = "select jobTitle, payRate, city, province, company
            from jobads";

$result = $connection->query($query);

echo "<h2>All Available Job Lisitings</h2>";


echo "<table>";

    echo "<tr><th>Company</th><th>Job Title</th><th>Pay Rate</th><th>City</th><th>Province</th></tr>";

        while ($row=$result->fetch())
            {
                echo "<tr><td>".$row['company']."</td><td>".$row['jobTitle']."</td><td>".$row['payRate']."</td><td>".$row['city']."</td><td>".$row['province']."</td></tr>";
            }

    echo "</table>";


?>

</div>


</body>
</html>