<?php include 'connectdb.php'; ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Add Pros</title>
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

<h2>Add a New Professional</h2>
<form action="addprodata.php" method="post" onsubmit="return validateForm()">
    <label for="name">Enter First Name: </label><br><br>
    <input class="name" type="text" name="name" id="name" placeholder="Adam"><br><br>

    <label for="lastname">Enter Last Name: </label><br><br>
    <input class="name" type="text" name="lastname" id="lastname" placeholder="Smith"><br><br>
    
    <label for="lastname">Enter Pro ID: </label><br><br>
    <input class="name" type="number" name="id" id="id" placeholder="21"><br><br>
    

    <button class="add" type="submit">Add New Professional</button>
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
    return true;
}
</script>