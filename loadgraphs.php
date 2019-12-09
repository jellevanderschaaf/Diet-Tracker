<?php include("db.php");

if(isset($_POST['graphthis'])) {




$query = "SELECT thisdate, SUM(totalprice), SUM(totalfatkcals), SUM(totalcarbskcals), SUM(totalproteinkcals) FROM food_items_date GROUP BY thisdate";


$result_set = mysqli_query($con, $query);
$row = mysqli_fetch_all($result_set);




// get date code


$thisDate = $_POST['date'];

$queryTwo = "INSERT INTO date_code (thisdate) SELECT $thisDate";

$result_setTwo = mysqli_query($con, $queryTwo);


//$queryThree = "SELECT * FROM date_code DESC LIMIT 1";

//$result_setThree = mysqli_query($con, $queryThree);
//$rowThree = mysqli_fetch_array($result_setThree);



if(!$result_set || !$result_setTwo) {
    
    die("QUERY FAILED" . mysqli_error($con));

    } 

}

echo json_encode($row);


?>
