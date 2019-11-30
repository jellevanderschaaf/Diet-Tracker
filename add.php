<?php include("db.php"); 

if(isset($_POST['addthis'])) {

        $id = mysqli_real_escape_string($con, $_POST['id']);
        $id = $_POST['id'];
        $thisDate = $_POST['date'];
    
    $query =  "INSERT INTO food_items_date (fname, fat, carbs, protein, kcals, price, list, quantity, thisdate, totalprice, fatkcals, carbskcals, proteinkcals, totalkcals) SELECT fname, fat, carbs, protein, kcals, price, list, quantity, $thisDate, price, fat * 9, carbs * 4, protein * 4, kcals FROM food_items WHERE id = $id";
    $result_set = mysqli_query($con, $query);

    //$queryThree =  "UPDATE food_items_date SET totalprice = price * quantity";
    //$result_setThree = mysqli_query($con, $queryThree);



    $queryTwo = "SELECT * FROM food_items_date ORDER BY ID DESC LIMIT 1";
    $result_setTwo = mysqli_query($con, $queryTwo);
    $row = mysqli_fetch_array($result_setTwo);

    
        
    if(!$result_set || !$result_setTwo) {
    
    die("QUERY FAILED" . mysqli_error($con));

    } 

}

echo json_encode($row);


?>