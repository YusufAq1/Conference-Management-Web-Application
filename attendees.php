<?php include("connectdb.php"); ?>

<?php 

$student = $connection->query("select firstName, lastName, attendeID from attendees where type='Student'"); 
$pro = $connection->query("select firstName, lastName, attendeID from attendees where type='Professional'"); 
$sponsor = $connection->query("select firstName, lastName, attendeID from attendees where type='Sponsor'"); 
?>

<!DOCTYPE html>
<>
    <head>
        <meta charset="UTF-8">
        <title>Attendees</title>
        <link rel="stylesheet" href="conference.css">
        <style>
            .attend{
                width: 50%;
                margin: auto;
                background: white;
                padding-top: 100px;
                padding-left: 150px;
                padding-right: 150px;
                padding-bottom: 50px;
                border-radius: 10px;
                
            }
            h3{
                text-align: center;
                margin: 0; 
            }
            h2{
                text-align: center;
                padding-bottom: 20px;
            }
            p{
                text-align: center;
            }
            form{
                display: flex;
                justify-content: center;
                padding-bottom: 20px;
                
            }
            button{
                background: var(--medium-blue);
                color: white;
                font-size: 16px;
                padding: 8px 12px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 10px;
                display: inline-block;
            }
            button:hover{
                background-color: var(--dark-blue);
                font-weight: bold;
            }
            td{
                text-align: center;
            }
            
        </style>
    </head>

    
<body>
<?php include 'navbar.php'; ?>
<div class="attend">

<?php
if (isset($_GET['success'])) {
    echo '<p>' .($_GET['success']) . '</p>';
}
?>

<h2>Conference Attendees</h2>


<h3>Students</h3>

<form action="addstudent.php" method="post">
        <button type="submit" name="submit">Add New Student</button>
</form>


<table>
    <tr><th>First Name</th><th>Last Name</th><th>ID</th></tr>
    <?php
        while( $row = $student->fetch()){
            echo "<tr><td>".$row['firstName']."</td><td>".$row['lastName']."
            </td><td>".$row['attendeID']."</td></tr>";
        }
    ?>

</table>

<br><br>



<h3>Professionals</h3>

<form action="addpros.php" method="post">
        <button type="submit" name="submit">Add New Professional</button>
    </form>

<table>
    <tr><th>First Name</th><th>Last Name</th><th>ID</th></tr>
    <?php
        while( $row = $pro->fetch()){
            echo "<tr><td>".$row['firstName']."</td><td>".$row['lastName']."
            </td><td>".$row['attendeID']."</td></tr>";
        }
    ?>

</table>

<br><br>


<h3>Sponsors</h3>

<form action="addsponsor.php" method="post">
        <button type="submit" name="submit">Add New Sponsor</button>
</form>


<table>
    <tr><th>First Name</th><th>Last Name</th><th>ID</th></tr>
    <?php
        while( $row = $sponsor->fetch()){
            echo "<tr><td>".$row['firstName']."</td><td>".$row['lastName']."
            </td><td>".$row['attendeID']."</td></tr>";
        }
    ?>

</table>


</div>

</body>

</html>