<?php include("db.php");

if(isset($_POST['updatethis'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $id = $_POST['id'];

    $edit_fname = strip_tags($_POST['reg_edit_fname']);
    $_SESSION['reg_edit_fname'] = $fname;
    $edit_fat = strip_tags($_POST['reg_edit_fat']);
    $_SESSION['reg_edit_fat'] = $fat;
    $edit_carbs = strip_tags($_POST['reg_edit_carbs']);
    $_SESSION['reg_edit_carbs'] = $carbs;
    $edit_protein = strip_tags($_POST['reg_edit_protein']);
    $_SESSION['reg_edit_protein'] = $protein;
    $edit_kcals = strip_tags($_POST['reg_edit_kcals']);
    $_SESSION['reg_edit_kcals'] = $kcals;
    $edit_price = strip_tags($_POST['reg_edit_price']);
    $_SESSION['reg_edit_price'] = $price;

    $query = "UPDATE food_items SET fname = '$edit_fname' WHERE id = $id ";

    $result_set = mysqli_query($con, $query);

    if(!$result_set) {

        die("QUERY FAILED" . mysqli_error($con));
        
        } 
}

?>