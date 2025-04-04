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
            }
        </style>
    </head>

<body>
<?php include 'navbar.php'; ?>

<div class="jobs"> 

<?php

$company = $_POST['companyName'];
$action = $_POST['action'];

if ($action == 'getjobs') {

$query = "select jobTitle, payRate, city, province
            from jobads
            where company='$company'";

$result = $connection->query($query);

echo "<h2>Job Lisitings For: $company </h2>";


echo "<table>";

    echo "<tr><th>Job Title</th><th>Pay Rate</th><th>City</th><th>Province</th></tr>";

        while ($row=$result->fetch())
            {
                echo "<tr><td>".$row['jobTitle']."</td><td>".$row['payRate']."</td><td>".$row['city']."</td><td>".$row['province']."</td></tr>";
            }

    echo "</table>";

        } 
        
        elseif ($action == "delete") {

            $query1 = "delete from attendees 
                        where exists
                        (select * from sponsors where sponsors.firstName = attendees.firstName AND 
                        sponsors.lastName = attendees.lastName AND 
                        sponsoredBy='$company')";

            $query = "delete from sponsorcompany
            where companyName='$company'";

            
            $result = $connection->query($query1);
            $result2 = $connection->query($query);

            header('Location: sponsors.php?&success=Sponsor+Deleted+Successfully!');
            exit();

        }

?>

</div>


</body>
</html>