<?php include("db.php");


if(isset($_POST['deletethis'])) {


    $id = mysqli_real_escape_string($con, $_POST['id']);

    $id = $_POST['id'];

    $query = "DELETE FROM food_items WHERE id = $id";

    $result_set = mysqli_query($con, $query);
    
    if(!$result_set) {

die("QUERY FAILED" . mysqli_error($con));


    }



}





?>




