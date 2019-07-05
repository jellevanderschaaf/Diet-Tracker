<?php include("db.php");

if(isset($_POST['updatethis'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $id = $_POST['id'];

   $fname = mysqli_real_escape_string($con, $_POST['edit_fname']);
   $fname = $_POST['edit_fname'];

    $query = "UPDATE food_items SET fname = '$fname' WHERE id = $id ";

    $result_set = mysqli_query($con, $query);

    if(!$result_set) {

        die("QUERY FAILED" . mysqli_error($con));
        
        } 
}

?>