<?php include("db.php");

if(isset($_POST['graphthis'])) {




$query = "SELECT sum(price) FROM food_items_date GROUP BY thisdate";


$result_set = mysqli_query($con, $query);
$row = mysqli_fetch_array($result_set);
    
if(!$result_set) {

die("QUERY FAILED" . mysqli_error($con));

} 

}

echo json_encode($row)

?>
