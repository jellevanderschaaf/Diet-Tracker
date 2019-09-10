<?php include("db.php"); 

if(isset($_POST['addthis'])) {

        $id = mysqli_real_escape_string($con, $_POST['id']);
        $id = $_POST['id'];
    
    $query =  "INSERT INTO food_items_date (fname, fat, carbs, protein, price, kcals) SELECT fname, fat, carbs, protein, kcals, price FROM food_items WHERE id = $id";
    $result_set = mysqli_query($con, $query);
    
        
    if(!$result_set) {
    
    die("QUERY FAILED" . mysqli_error($con));
    
    

    } 

}


?>