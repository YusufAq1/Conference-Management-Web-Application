<?php include 'connectdb.php'; ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Add Company</title>
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
            .selectrank{
                font-size: 14px;
                padding: 8px;
                border: 2px solid var(--medium-blue);
                border-radius: 5px;
                outline: none;
                cursor: pointer;
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

<h2>Add a New Sponsoring Company</h2>
<form action="addcompanydata.php" method="post" onsubmit="return validateForm()">
    <label for="companyname">Enter Company Name: </label><br><br>
    <input class="name" type="text" name="companyname" id="companyname" placeholder="Apple"><br><br>
    <label for="rank">Select Rank:</label><br><br>
    <select class="selectrank" name="rank" id="rank">
        <option value="">-- Rank --</option>
        <option value="Bronze">Bronze</option>
        <option value="Silver">Silver</option>
        <option value="Gold">Gold</option>
        <option value="Platinum">Platinum</option>
    </select>
    <br><br>
    <button class="add" type="submit">Add New Company</button>
</form>


</div>

</body>
</html>


<script>
function validateForm() {
    var subcommittee = document.getElementById("companyname").value;
    if (subcommittee === "") {
        alert("Please Enter a Name.");
        return false; 
    }
    var subcommittee = document.getElementById("rank").value;
    if (subcommittee === "") {
        alert("Please Select a Rank.");
        return false; 
    }
    return true;
}
</script>