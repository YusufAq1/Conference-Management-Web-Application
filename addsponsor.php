<?php include 'connectdb.php'; ?>
<?php $result = $connection->query("select companyName from sponsorcompany"); ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Add Sponsor</title>
        <link rel="stylesheet" href="conference.css">
        <style>
            .addcompany{
                width: 50%;
                margin: auto;
                background: white;
                padding: 150px;
                border-radius: 10px;
            }
            h2{
                padding-bottom: 20px;
            }
            .name{
                border: 2px solid var(--medium-blue);
                border-radius: 4px;
                font-size: 16px;
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
            }
            .add:hover{
                background-color: var(--dark-blue);
                font-weight: bold;
            }
        </style>
    </head>


<body>
<?php include 'navbar.php'; ?>

<div class="addcompany">

<h2>Add a New Sponsor Attendee</h2>
<form action="addsponsordata.php" method="post" onsubmit="return validateForm()">
    <label for="name">Enter First Name: </label><br><br>
    <input class="name" type="text" name="name" id="name" placeholder="Adam"><br><br>

    <label for="lastname">Enter Last Name: </label><br><br>
    <input class="name" type="text" name="lastname" id="lastname" placeholder="Smith"><br><br>
    
    <label for="num">Enter Sponsor ID: </label><br><br>
    <input class="name" type="number" name="num" id="num" placeholder="25"><br><br>
    
    <label for="company">Choose Sponsor Company: </label><br><br>
    <select class="selectroom" name="company" id="company">
        <option value="">-- Company --</option>
        <?php
                
            while ($row = $result->fetch()) {
            echo "<option value='" . $row['companyName'] . "'>" . $row['companyName'] . "</option>";}
        ?>

    </select>

    <br><br>
    <button class="add" type="submit">Add New Sponsor</button>
</form>


</div>

</body>
</html>


<script>
function validateForm() {
    var subcommittee = document.getElementById("name").value;
    if (subcommittee === "") {
        alert("Please Enter First Name.");
        return false; 
    }
    var subcommittee = document.getElementById("lastname").value;
    if (subcommittee === "") {
        alert("Please Enter Last Name");
        return false; 
    }
    var subcommittee = document.getElementById("num").value;
    if (subcommittee === "") {
        alert("Please Enter Student ID.");
        return false; 
    }
    var subcommittee = document.getElementById("company").value;
    if (subcommittee === "") {
        alert("Please Select A Company.");
        return false; 
    }
    return true;
}
</script>