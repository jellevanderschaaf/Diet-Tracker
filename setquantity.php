<?php include("db.php");

if(isset($_POST['setthisquantity'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $id = $_POST['id'];

    $quantity = mysqli_real_escape_string($con, $_POST['edit_quantity']);
    $quantity = $_POST['edit_quantity'];


    $query = "UPDATE food_items_date SET quantity = '$quantity' WHERE id = $id ";
    $result_set = mysqli_query($con, $query);

    $queryThree = "UPDATE food_items_date SET totalprice = price * quantity WHERE list = 'piece'";
    $result_setThree = mysqli_query($con, $queryThree);

    $queryFour = "UPDATE food_items_date SET totalprice = price / 100 * quantity WHERE list = 'grams'";
    $result_setFour = mysqli_query($con, $queryFour);

    $queryTwo = "SELECT * FROM food_items_date WHERE id = $id";
    $result_setTwo = mysqli_query($con, $queryTwo);
    $row = mysqli_fetch_array($result_setTwo);

    if(!$result_set || !$result_setTwo || !$result_setThree || !$result_setFour) {

        die("QUERY FAILED" . mysqli_error($con));
        
        } 
}

echo json_encode($row)

?>