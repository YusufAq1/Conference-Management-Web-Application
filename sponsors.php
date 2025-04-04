<?php
include 'connectdb.php';
?>

<?php $result = $connection->query("select companyName, rank from sponsorcompany"); ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sponsors</title>
        <link rel="stylesheet" href="conference.css">
            <style>
            .sponsorcompany{
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
            table{
                margin-left: auto;
                margin-right: auto;
            }
            td{
                text-align: center;
                vertical-align: middle;
                padding: 10px; 
            }
            p{
                text-align: center;
            }
            .listjobs{
                background: var(--medium-blue);
                color: white;
                font-size: 16px;
                padding: 8px 12px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 10px;
                
            }
            .listjobs:hover{
                background: var(--dark-blue);
                font-weight: bold;
            }
            .buttoncontainer{
                padding-top: 20px;
                display: flex;
               justify-content: center;
            }
            .add{
                background: var(--medium-blue);
                color: white;
                font-size: 16px;
                padding: 8px 12px; 
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 10px;
                margin-left: 10px;
            }
            .add:hover{
                background: var(--dark-blue);
                font-weight: bold;
            }
        </style>
    </head>

<body>
<?php include 'navbar.php'; ?>
<div class="sponsorcompany">

<h2>Sponsoring Companies</h2>

<table>
    <tr><th>Company</th><th>Rank</th><th>Jobs</th><th>Remove Sponsor</th></tr>
    <?php
        while( $row = $result->fetch()){
            echo "<tr>
            <form action='getjobs.php' method='POST'><td>".$row['companyName']."</td><td>".$row['rank']."</td>
            <input type='hidden' name='companyName' value='".$row['companyName']."'>
            <td><button class='submitbutton' type='submit' name='action' value='getjobs'>Get Jobs</button></td>
            <td><button class='submitbutton' type='submit' name='action' value='delete'>Delete</button></td>
            </form>
            </tr>";
        }
    ?>
</table>

<div class="buttoncontainer">
<form action="listjobs.php" method="POST">
    <button class="listjobs" type="submit">Get All Job Listings</button>
</form>

<form action="addcompany.php" method="POST">
    <button class="add" type="submit">Add New Sponsor Company</button>
</form>
</div>

<?php
if (isset($_GET['success'])) {
    echo '<p>' .($_GET['success']) . '</p>';
}
?>

</div>

</body>
</html>