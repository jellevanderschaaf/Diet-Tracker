<?php include("db.php");

if(isset($_POST['editthis'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);

    $id = $_POST['id'];

$query = "SELECT * FROM food_items WHERE id = $id";

$result_set = mysqli_query($con, $query);
$row = mysqli_fetch_array($result_set);
    
if(!$result_set) {

die("QUERY FAILED" . mysqli_error($con));

} 

}
?>

<script>
var script_id = <?php echo $row['id']; ?>;
var script_fname = <?php echo $row['fname']; ?>;
var script_fat = <?php echo $row['fat']; ?>;
var script_carbs = <?php echo $row['carbs']; ?>;
var script_protein = <?php echo $row['protein']; ?>; 
var script_kcals = <?php echo $row['kcals']; ?>;
var script_price = <?php echo $row['price']; ?>;

console.log(test);
    </script>