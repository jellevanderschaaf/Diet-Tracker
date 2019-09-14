<?php include("db.php");

if(isset($_POST['setthisquantity'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $id = $_POST['id'];

    $quantity = mysqli_real_escape_string($con, $_POST['edit_quantity']);
    $quantity = $_POST['edit_quantity'];


    $query = "UPDATE food_items_date SET quantity = '$quantity' WHERE id = $id ";
    $result_set = mysqli_query($con, $query);

    $queryTwo = "SELECT * FROM food_items_date WHERE id = $id";
$result_setTwo = mysqli_query($con, $queryTwo);
$row = mysqli_fetch_array($result_setTwo);

    if(!$result_set || !$result_setTwo ) {

        die("QUERY FAILED" . mysqli_error($con));
        
        } 
}

echo json_encode($row)

?>