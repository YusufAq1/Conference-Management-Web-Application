<?php
include 'connectdb.php';
?>

<?php
$result = $connection->query("select subcommittee from organizingcommittee");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>subcommittee</title>
    <link rel="stylesheet" href="conference.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="subcontent">
    <h1 class="subcommitteeTitle">Select a Subcomittee</h1>


<form class="subcommitteeForm" action="subcommitteeData.php" method="post" onsubmit="return validateForm()">

   

    <select class="selectcommittee" name="subcommittee" id="subcommittee">

        <option value="">-- Select --</option>

        <?php
                
            while ($row = $result->fetch()) {
            echo "<option value='" . $row['subcommittee'] . "'>" . $row['subcommittee'] . "</option>";}
        ?>

    </select>

    <br><br>

    <input class='submitbutton' type="submit" value="Get Subcomittee Members">
</form>

</div>

<script>
function validateForm() {
    var subcommittee = document.getElementById("subcommittee").value;
    if (subcommittee === "") {
        alert("Please select a subcommittee.");
        return false; 
    }
    return true;
}
</script>

</body>
</html>

