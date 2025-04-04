<?php
include 'connectdb.php';
?>

<?php
$result = $connection->query("select distinct day from sessions order by day");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sessions</title>
    <link rel="stylesheet" href="conference.css">
    <style>
        .sessionlabel{
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>


    <?php include 'navbar.php'; ?>

    
    <div class="subcontent">
    <h1 class="subcommitteeTitle">Conference Sessions</h1>


<form class="subcommitteeForm" action="scheduledata.php" method="post" onsubmit="return validateForm()">

   <label class="sessionlabel" for="sessions">Select a Conference Day: </label>

    <select class="selectcommittee" name="sessions" id="sessions">

        <label class="sessLabel">Select a Conference Day</label>
        <option value="">-- Select --</option>

        <?php
                
            while ($row = $result->fetch()) {
            echo "<option value='" . $row['day'] . "'>" . $row['day'] . "</option>";}
        ?>

    </select>

    <br><br>

    <input class='submitbutton' type="submit" value="Display Schedule">
</form>

</div>



</body>
</html>


<script>
function validateForm() {
    var subcommittee = document.getElementById("sessions").value;
    if (subcommittee === "") {
        alert("Please select a day.");
        return false; 
    }
    return true;
}
</script>

