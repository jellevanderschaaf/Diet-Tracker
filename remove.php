<?php include("db.php");

if(isset($_POST['removethis'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $id = $_POST['id'];

    $query = "DELETE FROM food_items_date WHERE id = $id";
    $result_set = mysqli_query($con, $query);
    
    if(!$result_set) {

die("QUERY FAILED" . mysqli_error($con));

    }
}

?>