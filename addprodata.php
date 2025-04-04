<?php include 'connectdb.php'; ?>

<?php

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$id = $_POST['id'];

$query0 = "insert into member values (:id, :firstname, :lastname)";
$query = "insert into attendees values (100, :firstname, :lastname, 'Professional', :id)";

$stmt0 = $connection->prepare($query0);
$stmt = $connection->prepare($query);

$stmt0->bindParam(':firstname',$name);
$stmt0->bindParam(':lastname',$lastname);
$stmt0->bindParam(':id',$id);

$stmt->bindParam(':firstname',$name);
$stmt->bindParam(':lastname',$lastname);
$stmt->bindParam(':id',$id);

$stmt0->execute();
$stmt->execute();

$stmt0 = NULL;
$stmt = NULL;

$connection = NULL;

header('Location: attendees.php?&success=Professional+Added+Successfully!');
exit();

        

?>
