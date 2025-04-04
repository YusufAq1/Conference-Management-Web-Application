<?php include 'connectdb.php'; ?>

<?php

    $originaldate = $_POST["originaldate"];

    $date = $_POST["date"];
    $starttime = $_POST["startTime"];
    $endtime = $_POST["endTime"];
    $location = $_POST["location"];
    $name = $_POST["sessionName"];

    $query = "update sessions set day = :date, startTime=:starttime, endTime=:endtime, location=:location
                where sessionName = :name";
    $stmt = $connection->prepare($query);
    $stmt->bindparam(':starttime', $starttime);
    $stmt->bindparam(':endtime', $endtime);
    $stmt->bindparam(':location', $location);
    $stmt->bindparam(':name', $name);
    $stmt->bindparam(':date', $date);

    $stmt->execute();

    $stmt = NULL;
    $connection = NULL;

    header('Location: scheduledata.php?date='.urlencode($originaldate).'&success=Session+Updated+Successfully!');
    exit();
    

?>