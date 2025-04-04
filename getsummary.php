<?php
include 'connectdb.php';
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="conference.css">
    <title>Summary</title>
    <style>
        .summary{
            width: 50%;
            margin: auto;
            background: white;
            padding: 150px;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #3D52A0;
            font-size: 28px;
            margin-bottom: 20px;
        }

        h3 {
            color: #7091E6;
            font-size: 22px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
            padding: 10px;
            background: #EDE8F5;
            border-radius: 5px;
            color: #3D52A0;
        }

        p strong {
            color: #7091E6;
        }

        .summary p:hover {
            background: #ADBBDA;
            transition: background 0.3s ease;
        }
    </style>
</head>


<?php 
$numberofattendees = $connection->query("select count(*) as total from attendees"); 
$numberofstudents = $connection->query("select count(*) as totalstudents from attendees where type='Student'");
$numberofpros = $connection->query("select count(*) as totalpros from attendees where type='Professional'");
 $numberofsponsors = $connection->query("select count(*) as totalsponsors from attendees where type='Sponsor'"); 
 ?>

<body>

<?php
include 'navBar.php';
?>

<div class="summary">

<h2>2025 Conference Summary</h2>
<?php
    $total = $numberofattendees->fetchColumn();
    $totalstudent = $numberofstudents->fetchColumn();
    $totalpros = $numberofpros->fetchColumn();
    $totalsponsors = $numberofsponsors->fetchColumn();
    echo "<h3> Attendee Summary </h3>";
    echo "<p> Total # of Attendees: " .$total. "</p>";
    echo "<p> # of Student Attendees: " .$totalstudent. " </p>";
    echo "<p> # of Professional Attendees: ".$totalpros." </p>";
    echo "<p> # of Sponsored Attendees: ".$totalsponsors."</p>";
?>

<?php
    $countcompanies = $connection->query("select count(*) as totalcompanies from sponsorcompany"); 
    $sponsorships = $connection->query("select sum(case when rank='Platinum' then 10000 when rank='Gold' then 5000 
                            when rank='Silver' then 3000 when rank='Bronze' then 1000 else 0 end) as totalsponsorships from sponsorcompany");
    $totalsponsorships = $sponsorships->fetchColumn();
    $totalcompanies = $countcompanies->fetchColumn();

    echo "<h3> Sponsorship Summary </h3>";
    echo "<p> Total # of Sponsoring Companies: ".$totalcompanies." </p>";
    echo "<p> Total Sponsorship Amount: $".$totalsponsorships."</p>";
?>

</div>


</body>



</html>