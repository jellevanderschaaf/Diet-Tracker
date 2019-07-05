<?php include("db.php");

if (isset($_POST['update_button'])) {

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

}

?>