<?php include("db.php");

if(isset($_POST['loadweightthis'])) {


$query = "SELECT * FROM weight GROUP BY thisdate";


$result_set = mysqli_query($con, $query);
$row = mysqli_fetch_all($result_set);


if(!$result_set) {
    
    die("QUERY FAILED" . mysqli_error($con));

    } 

}

echo json_encode($row);


?>
