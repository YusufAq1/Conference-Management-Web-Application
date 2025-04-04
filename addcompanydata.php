<?php include 'connectdb.php'; ?>

<?php

$company = $_POST['companyname'];
$rank = $_POST['rank'];

$query = "insert into sponsorcompany 
            values ('$company', '$rank', 
            CASE when 'Silver' then 3
                when 'Gold' then 4
                when 'Platinum' then 5
            else 0 end, 
            0)";

$result = $connection->query($query);

$stmt = NULL;
$connection = NULL;

header('Location: sponsors.php?&success=Sponsor+Added+Successfully!');
exit();

        

?>
