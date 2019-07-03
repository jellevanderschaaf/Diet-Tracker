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
var test = <?php echo $row['fname'] ; ?>;

console.log(test);
    </script>