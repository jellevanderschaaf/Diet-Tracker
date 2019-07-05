<?php include("db.php");

if(isset($_POST['updatethis'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $id = $_POST['id'];

   $fname = mysqli_real_escape_string($con, $_POST['edit_fname']);
   $fname = $_POST['edit_fname'];

   $fat = mysqli_real_escape_string($con, $_POST['edit_fat']);
   $fat = $_POST['edit_fat'];

   $carbs = mysqli_real_escape_string($con, $_POST['edit_carbs']);
   $carbs = $_POST['edit_carbs'];

   $protein = mysqli_real_escape_string($con, $_POST['edit_protein']);
   $protein = $_POST['edit_protein'];

   $kcals = mysqli_real_escape_string($con, $_POST['edit_kcals']);
   $kcals = $_POST['edit_kcals'];

   $price = mysqli_real_escape_string($con, $_POST['edit_price']);
   $price = $_POST['edit_price'];

    $query = "UPDATE food_items SET fname = '$fname', fat = '$fat', carbs = '$carbs', protein = '$protein', kcals = '$kcals', price = '$price' WHERE id = $id ";

    $result_set = mysqli_query($con, $query);

    if(!$result_set) {

        die("QUERY FAILED" . mysqli_error($con));
        
        } 
}

?>