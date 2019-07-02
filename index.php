<?php include("db.php");

$fname = "";
$fat =  "";
$carbs = "";
$protein = "";
$kcals = "";
$price = "";
$error_array = "";

if (isset($_POST['create_button'])) {

    $fname = strip_tags($_POST['reg_fname']);
    $_SESSION['reg_fname'] = $fname;
    $fat = strip_tags($_POST['reg_fat']);
    $_SESSION['reg_fat'] = $fat;
    $carbs = strip_tags($_POST['reg_carbs']);
    $_SESSION['reg_carbs'] = $carbs;
    $protein = strip_tags($_POST['reg_protein']);
    $_SESSION['reg_protein'] = $protein;
    $kcals = strip_tags($_POST['reg_kcals']);
    $_SESSION['reg_kcals'] = $kcals;
    $price = strip_tags($_POST['reg_price']);
    $_SESSION['reg_price'] = $price;

    // Check if fname already exists

    $query = "SELECT count(*) as allcount FROM food_items WHERE fname='" . $fname . "'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $allcount = $row['allcount'];

    // insert

    if (empty($error_array) && $allcount == 0) {

        $query = mysqli_query($con, "INSERT INTO food_items VALUES ('', '$fname', '$fat', '$carbs', '$protein', '$kcals', '$price')");
    }
}


?>


<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Diet Tracker</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Stylish&display=swap" rel="stylesheet">
    
    
    <script type="text/javascript" src="javascript.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ad07c4a8ed.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body>

    <nav class="myNavbar">
        <img class="navbarImage" src="diet.png" width=35px height=35px>
        <a class="navbar-brand" href="#">Diet Tracker</a>
        <button class="btn btn-success">Login</button>
        </div>
        </div>
    </nav>


 
    <!-- modals -->

    <div id="modalOne" class="_modal hidden">
        <div class="modal_box_one">
        <div id="createFoodItem">
                <form id="foodForm" action="index.php" method="POST">
                    <div class="form-group">

                        <table style="width:100%">
                            <tr>
                                <td>name</td>
                                <td><input id="fname" name="reg_fname" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>fat</td>
                                <td><input id="fat" name="reg_fat" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>carbs</td>
                                <td><input id="carbs" name="reg_carbs" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>protein</td>
                                <td><input id="protein" name="reg_protein" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>kcals</td>
                                <td><input id="kcals" name="reg_kcals" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>price: €</td>
                                <td><input id="price" name="reg_price" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>

                        </table>

                        list per:<br>
                        100 grams <input type="radio" name="grams" value="grams"><br>
                        piece <input type="radio" name="piece" value="piece">
                    </div>
                    <button class="btn btn-secondary" onClick="cancel()">Cancel</button>
                    <button type="submit" name="create_button" value="Create" class="btn btn-secondary" onClick="createItem()">Create</button>
                </form>

            </div>
        </div>
    </div>


    <div id="modalTwo" class="_modal hidden">
        <div class="modal_box_two">
            <p>Are you sure you want to delete this food item?</p>
            <button class="btn btn-secondary" onClick="cancel2()">Cancel</button>
            <button class="btn btn-secondary delete-this2">Delete</button>
</div>
</div>


<div id="modalThree" class="_modal hidden">
        <div class="modal_box_one">
        <div id="createFoodItem">
                <form id="foodForm" action="index.php" method="POST">
                    <div class="form-group">

                        <table style="width:100%">
                            <tr>
                                <td>name</td>
                                <td><input id="fname" name="reg_fname" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>fat</td>
                                <td><input id="fat" name="reg_fat" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>carbs</td>
                                <td><input id="carbs" name="reg_carbs" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>protein</td>
                                <td><input id="protein" name="reg_protein" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>kcals</td>
                                <td><input id="kcals" name="reg_kcals" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>price: €</td>
                                <td><input id="price" name="reg_price" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>

                        </table>

                        list per:<br>
                        100 grams <input type="radio" name="grams" value="grams"><br>
                        piece <input type="radio" name="piece" value="piece">
                    </div>
                    <button class="btn btn-secondary" onClick="cancel()">Cancel</button>
                    <button type="submit" name="update_button" value="Update" class="btn btn-secondary" onClick="updateItem()">Update</button>
                </form>

            </div>
        </div>
    </div>

    <!-- -->



    <div class="grid-container">
        <div class="grid-item grid-item-left">
            
            <h5>Food Items</h5>
            <hr>

            
            <div id="test" class="foodList">

            <table class="foodlist-table" style='width:100%'>
                    
                    <?php
                    $sql = "SELECT id, fname from food_items";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {


                            echo "<tr class='food-list-tr'>";

                            echo "<td width:75%' class='td-left'>{$row['fname']}</td> ";
                            echo "<td style='width:10%' class='td-center' data-toggle='tooltip' data-placement='top' title='Delete'><a rel='".$row['id']."' class='delete-this icon-on-hover'  href='javascript:void(0)'><i class='material-icons'>delete_outline</i></a></td>";
                            echo "<td style='width:10%' class='td-center' data-toggle='tooltip' data-placement='top' title='Edit'><a rel='".$row['id']."' class='edit-this icon-on-hover' href='javascript:void(0)'><i class='material-icons'>edit</i></a></td>";
                            echo "<td style='width:5%' class='td-right' data-toggle='tooltip' data-placement='top' title='Add'><a rel='".$row['id']."' class='add-this'  href='javascript:void(0)'><i class='material-icons'>add_circle_outline</i></a></td>";

                            echo "</tr>";
                            

                            
                        }
                    }
                    $con->close();
                  
                    ?>
            </table>
          
            </div>

            <button class="btn btn-secondary new-food-item" onClick="createFoodItem()">New Food Item</button>

        </div>
        <div class="grid-item">
        <i class="fa fa-angle-left"></i></i><h5 class="date"><?php echo date('d-m-Y');?></h5><i class="fa fa-angle-right"></i>
            <hr>

            

            <div id="listToday"></div>

        </div>
        <div class="grid-item">
            <h5>Totals</h5>
            <hr>

            <div class="totalsContainer">
                <div class="totalsLabels">Kcals:</div>
                <div id="totalKcal" class="totals"></div>
            </div>
            <div class="totalsContainer">
                <div class="totalsLabels">Fat:</div>
                <div id="totalFats" class="totals"></div>
            </div>
            <div class="totalsContainer">
                <div class="totalsLabels">Carbs:</div>
                <div id="totalCarbs" class="totals"></div>
            </div>
            <div class="totalsContainer">
                <div class="totalsLabels">Protein:</div>
                <div id="totalProtein" class="totals"></div>
            </div>
            <div class="totalsContainer">
                <div class="totalsLabels">Costs:</div>
                <div id="totalCosts" class="totals"></div>
            </div>

            <div>
                <canvas id="chart"></canvas>
            </div>

        </div>


    </div>

    </div>

    <script>

$(document).ready(function(){

    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

var id;
var deletethis = 'delete';


$(".delete-this").on('click', function(){

document.getElementById("modalTwo").classList.remove('hidden');
id = $(this).attr('rel');

});

$(".delete-this2").on('click', function(){

    document.getElementById("modalTwo").classList.add('hidden');
    $.post("delete.php", {id: id, deletethis: deletethis}, function(data){
    
});

$("a[rel=" + id + "]").parents('tr').remove();

});  


$(".edit-this").on('click', function(){

    document.getElementById("modalThree").classList.remove('hidden');
    id = $(this).attr('rel');

})

   

});

</script>

    
</body>

</html>