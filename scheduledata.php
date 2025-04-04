<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Schedule</title>
    <link rel="stylesheet" href="conference.css">
    <style>
        .scheduledata{
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
    
<?php include 'connectdb.php'; ?>

<div class="scheduledata">

<?php


if (isset($_GET['date'])) {
    $day = $_GET['date'];
} else if (isset($_POST['sessions'])) {
    $day = $_POST['sessions']; }

$query = "SELECT sessions.sessionName, sessions.startTime, sessions.endTime, sessions.location, sessions.day
FROM sessions
WHERE DATE(sessions.day) = '$day'
order by sessions.startTime";

$result = $connection->query($query);

echo "<h2>Schedule for Conference Day: $day </h2>";
?>

<table>
    <th>Session</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Location</th>

    <?php
    while ($row = $result->fetch()) {
        echo "<tr>
            <form action='updatesession.php' method='POST'>
                <td>".$row['sessionName']."</td>
                <td><input type='date' name='date' value='".$row['day']."'></td>
                <td><input type='time' name='startTime' value='".$row['startTime']."'></td>
                <td><input type='time' name='endTime' value='".$row['endTime']."'></td>
                <td><input type='text' name='location' value='".$row['location']."'></td>
                
                <input type='hidden' name='sessionName' value='".$row['sessionName']."'>
                <input type='hidden' name='originaldate' value='".$row['day']."'>
                <td><button class='submitbutton' type='submit'>Update</button></td>
            </form>
        </tr>";
    }

    ?>

</table>

<?php
if (isset($_GET['success'])) {
    echo '<p>' .($_GET['success']) . '</p>';
}
?>

</div>


</body>
</html>
