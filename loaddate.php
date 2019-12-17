<?php include("db.php");

if(isset($_POST['datethis'])) {


$thisDate = $_POST['date'];

$query = "INSERT INTO date_code (thisdate) SELECT $thisDate";

$result_set = mysqli_query($con, $query);


$queryThree = "SELECT * FROM date_code GROUP BY thisdate ASC LIMIT 1";

$result_setThree = mysqli_query($con, $queryThree);
$rowThree = mysqli_fetch_all($result_setThree);



if(!$result_set || !$result_setThree ) {
    
    die("QUERY FAILED" . mysqli_error($con));

    } 

}

echo json_encode($rowThree);


?>