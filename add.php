<?php include("db.php"); 

if(isset($_POST['addthis'])) {

        $id = mysqli_real_escape_string($con, $_POST['id']);
        $id = $_POST['id'];
    
    $query =  "INSERT INTO food_items_date (fname, fat, carbs, protein, price, kcals) SELECT fname, fat, carbs, protein, kcals, price FROM food_items WHERE id = $id";
    $result_set = mysqli_query($con, $query);
    $queryTwo = "SELECT id FROM food_items_date ORDER BY ID DESC LIMIT 1";
    $result_setTwo = mysqli_query($con, $queryTwo);
    $returnId = mysqli_fetch_array($result_setTwo);
        
    if(!$result_set || !$result_setTwo) {
    
    die("QUERY FAILED" . mysqli_error($con));

    } 

}

echo json_encode($returnId)

?>