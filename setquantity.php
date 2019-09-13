<?php include("db.php");

if(isset($_POST['setthisquantity'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $id = $_POST['id'];

    $quantity = mysqli_real_escape_string($con, $_POST['edit_quantity']);
    $quantity = $_POST['edit_quantity'];


    $query = "UPDATE food_items_date SET quantity = '$quantity' WHERE id = $id ";

    $result_set = mysqli_query($con, $query);

    if(!$result_set) {

        die("QUERY FAILED" . mysqli_error($con));
        
        } 
}

?>