<?php include("db.php"); 

if(isset($_POST['weightthis'])) {

        $thisDate = $_POST['date'];
        $morningWeight = $_POST['morningWeight'];
        $eveningWeight = $_POST['eveningWeight'];
    
    $query =  "INSERT INTO weight (morningweight, eveningweight, thisdate) SELECT $morningWeight, $eveningWeight, $thisDate ON DUPLICATE KEY UPDATE morningweight=$morningWeight, eveningweight=$eveningWeight";
    $result_set = mysqli_query($con, $query);

     
    if(!$result_set) {
    
    die("QUERY FAILED" . mysqli_error($con));

    } 

}

?>