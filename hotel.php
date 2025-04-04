<?php
include 'connectdb.php';
?>

<?php
$result = $connection->query("select roomID from hotelrooms");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hotel</title>
    <link rel="stylesheet" href="conference.css">
    <style>
        .roomlabel{
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>


    <?php include 'navbar.php'; ?>

    
    <div class="subcontent">
    <h1 class="subcommitteeTitle">Hotel Rooms</h1>

   

<form class="subcommitteeForm" action="hoteldata.php" method="post" onsubmit="return validateForm()">

    <label class="roomlabel" for="hotelroom">Select a Hotel Room: </label>

    <select class="selectcommittee" name="hotelroom" id="hotelroom">

       
        <option value="">-- Select --</option>

        <?php
                
            while ($row = $result->fetch()) {
            echo "<option value='" . $row['roomID'] . "'>" . $row['roomID'] . "</option>";}
        ?>

    </select>

    <br><br>

    <input class='submitbutton' type="submit" value="Display Students">
</form>

</div>



</body>
</html>


<script>
function validateForm() {
    var subcommittee = document.getElementById("hotelroom").value;
    if (subcommittee === "") {
        alert("Please select a room.");
        return false; 
    }
    return true;
}
</script>

