<?php include 'connectdb.php'; ?>

<?php

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$id = $_POST['num'];
$company = $_POST['company'];

$query0 = "insert into member values (:id, :firstname, :lastname)";
$query = "insert into attendees values (0, :firstname, :lastname, 'Sponsor', :id)";
$query2 = "insert into sponsors values (:firstname, :lastname, :company)";

$stmt0 = $connection->prepare($query0);
$stmt = $connection->prepare($query);
$stmt2 = $connection->prepare($query2);

$stmt0->bindParam(':firstname',$name);
$stmt0->bindParam(':lastname',$lastname);
$stmt0->bindParam(':id',$id);

$stmt->bindParam(':firstname',$name);
$stmt->bindParam(':lastname',$lastname);
$stmt->bindParam(':id',$id);

$stmt2->bindParam(':firstname',$name);
$stmt2->bindParam(':lastname',$lastname);
$stmt2->bindParam(':company',$company);

$stmt0->execute();
$stmt->execute();
$stmt2->execute();

$stmt0 = NULL;
$stmt = NULL;
$stmt2 = NULL;

$connection = NULL;

header('Location: attendees.php?&success=Sponsor+Added+Successfully!');
exit();

        

?>
