<?php include("db.php"); 
$fname = "";
$fat =  "";
$carbs = "";
$protein = "";
$kcals = "";
$price = "";
$list = "";
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

    $list =  $_POST['radio'];


    // Check if fname already exists
    $query = "SELECT count(*) as allcount FROM food_items WHERE fname='" . $fname . "'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $allcount = $row['allcount'];
    // insert
    if (empty($error_array) && $allcount == 0) {
        $query = mysqli_query($con, "INSERT INTO food_items VALUES ('', '$fname', '$fat', '$carbs', '$protein', '$kcals', '$price', '$list')");
    }
}
?>


<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Diet Tracker</title>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Stylish&display=swap" rel="stylesheet">
    
    
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css">
        <script src="https://kit.fontawesome.com/ad07c4a8ed.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>

<body>

    <nav class="myNavbar">
        <img class="navbarImage" src="diet.png" width=35px height=35px>
        <a class="navbar-brand" href="#">Diet Tracker</a>
       
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
                        100 grams <input type="radio" name="radio" value="grams"><br>
                        piece <input type="radio" name="radio" value="piece">
                    </div>
                    <button class="btn btn-secondary" onClick="cancel()">Cancel</button>
                    <button type="submit" name="create_button" value="Create" class="btn btn-secondary">Create</button>
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
                <div id="foodForm">
                    <div class="form-group">
                        <table style="width:100%">
                            <tr>
                                <td>name</td>
                                <td><input id="editFname" name="reg_edit_fname" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>fat</td>
                                <td><input id="editFat" name="reg_edit_fat" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>carbs</td>
                                <td><input id="editCarbs" name="reg_edit_carbs" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>protein</td>
                                <td><input id="editProtein" name="reg_edit_protein" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>kcals</td>
                                <td><input id="editKcals" name="reg_edit_kcals" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>price: €</td>
                                <td><input id="editPrice" name="reg_edit_price" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                        </table>
                        list per:<br>
                        100 grams <input type="radio" name="grams" value="grams"><br>
                        piece <input type="radio" name="piece" value="piece">
                    </div>
                    <button class="btn btn-secondary" onClick="cancel3()">Cancel</button>
                    <button class="btn btn-secondary update-this">Update</button>
</div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="grid-container">
        <div class="grid-item grid-item-left">
            
            <h5 class="headerLeftRight">Food Items</h5>
            <hr>
            <table class="foodlist-table2" style='width:100%'>
            <tr>
    <th id="tableFood" style='width:33%'>Food</th>
    <th id="tableDrinks" style='width:33%'>Drinks</th>
    <th id="tableJunk" style='width:33%'>Junk</th>
  </tr>
</table>   
            
            <div id="test" class="foodList">
            <table class="foodlist-table" style='width:100%'>
                   
                    <?php
                    $sql = "SELECT id, fname from food_items";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='food-list-tr'>";
                            echo "<td width:75%' class='td-left' rel='".$row['id']."'>{$row['fname']}</td> ";
                            echo "<td style='width:10%' class='td-center' data-toggle='tooltip' data-placement='top' title='Delete'><a rel='".$row['id']."' class='delete-this icon-on-hover'  href='javascript:void(0)'><i class='material-icons'>delete_outline</i></a></td>";
                            echo "<td style='width:10%' class='td-center' data-toggle='tooltip' data-placement='top' title='Edit'><a rel='".$row['id']."' class='edit-this icon-on-hover' href='javascript:void(0)'><i class='material-icons'>edit</i></a></td>";
                            echo "<td style='width:5%' class='td-right' data-toggle='tooltip' data-placement='top' title='Add'><a rel='".$row['id']."' class='add-this' icon-on-hover  href='javascript:void(0)'><i class='material-icons'>add_circle_outline</i></a></td>";
                            echo "</tr>";
                            
                        }
                    }
                  
                  
                    ?>
            </table>
          
            </div>
            <button class="btn btn-secondary new-food-item" onClick="createFoodItem()">New Food Item</button>
        </div>
        <div class="grid-item">
        <i class="fa fa-angle-left"></i></i><h5 class="date"><?php echo date('d-m-Y');?></h5><i class="fa fa-angle-right"></i>
            <hr>
            
            <div id="listToday"></div>
            <table id="mainTable" class="mainTable" style="width:100%">
  <tr>
    <th id="tableFoodItem" style='width:34%'>Food Item</th>
    <th id="tableFat" style='width:12%'>Fat</th>
    <th id="tableCarbs" style='width:12%'>Carbs</th>
    <th id="tableProtein" style='width:12%'>Protein</th>
    <th id="tableCosts" style='width:12%'>Costs</th>
    <th id="tableKcals" style='width:12%'>Kcals</th>
  </tr>
  <?php
                    $sql = "SELECT id, fname, fat, carbs, protein, price, kcals, list, quantity from food_items_date";
                    $result = $con->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                          
                        if ($row['list'] == 'grams') {

                            echo "<td style='width:34%'>{$row['fname']}<input id='".$row['id']."' class='inputQuantity' value='{$row['quantity']}' rel='".$row['id']."'>gr</td>";
                          
                            $fatAdjusted = $row['fat'] / 100 * $row['quantity'];
                            $carbsAdjusted = $row['carbs'] / 100 * $row['quantity'];
                            $proteinAdjusted = $row['protein'] / 100 * $row['quantity'];
                            $priceAdjusted = $row['price'] / 100 * $row['quantity'];
                            $kcalsAdjusted = $row['kcals'] / 100 * $row['quantity'];
    
                                echo "<td style='width:12%'>{$fatAdjusted}</td>";
                                echo "<td style='width:12%'>{$carbsAdjusted}</td>";
                                echo "<td style='width:12%'>{$proteinAdjusted}</td>";
                                echo "<td style='width:12%'>{$priceAdjusted}</td>";
                                echo "<td style='width:12%'>{$kcalsAdjusted}</td>";
                                echo "</tr>";   

                        }

                        if ($row['list'] == 'piece') {

                            echo "<td style='width:34%'>{$row['fname']}<input id='".$row['id']."' class='inputQuantity' value='{$row['quantity']}' rel='".$row['id']."'>stuks</td>";
                          
                        

                        $fatAdjusted = $row['fat'] * $row['quantity'];
                        $carbsAdjusted = $row['carbs'] * $row['quantity'];
                        $proteinAdjusted = $row['protein'] * $row['quantity'];
                        $priceAdjusted = $row['price'] * $row['quantity'];
                        $kcalsAdjusted = $row['kcals'] * $row['quantity'];

                            echo "<td style='width:12%'>{$fatAdjusted}</td>";
                            echo "<td style='width:12%'>{$carbsAdjusted}</td>";
                            echo "<td style='width:12%'>{$proteinAdjusted}</td>";
                            echo "<td style='width:12%'>{$priceAdjusted}</td>";
                            echo "<td style='width:12%'>{$kcalsAdjusted}</td>";
                            echo "</tr>";          
                        }
                    }
                    }
                    $con->close();
                  
                    ?>
</table>
<div class="inputWeight" style='width:100%'>
<div class="inputFields">
Morning weight: <input type="text" class="form-control form-control-sm inputFieldWeight" style='width:50px'> kg
&emsp;&emsp;Evening weight: <input type="text" class="form-control form-control-sm inputFieldWeight" style='width:50px'> kg
                </div>
<button class="btn btn-secondary buttonSubmit">Submit</button> 
                </div>
        </div>
        <div class="grid-item-right">
        <div class="grid-item-right-sub-one">
            <h5 class="headerLeftRight">Totals</h5>
            <hr>
            <table class="totalsTable" style="width:100%">
  <tr>
    <td  style='width:100%'>Kcals:&emsp;2756&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Costs:&emsp;€ 12,20</td>
  </tr>
</table>
                <canvas id="chart"></canvas>
            
           
        </div>
                
                <div class="grid-item-right-sub-two">
                <h5 class="headerStatistics">Statistics<i class="fas fa-expand"></i></h5>
            <hr>
            <table class="foodlist-table2" style='width:100%'>
            <tr>
    <th id="tableKcalsGraph" style='width:33%'>Kcals</th>
    <th id="tableWeightGraph" style='width:33%'>Weight</th>
    <th id="tableCostsGraph" style='width:33%'>Costs</th>
  </tr>
</table>   
<canvas id="chartTwo"></canvas>
<canvas id="chartThree" class="hidden"></canvas>
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
var editthis = 'edit';
var updatethis = 'update';
var addthis = 'add';
var setthisquantity = 'setthisquantity';

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
   
    $.post("edit.php", {id: id, editthis: editthis}, function(data){
        
        var formData = JSON.parse(data);
        
        document.getElementById('editFname').value = formData.fname;
        document.getElementById('editFat').value = formData.fat;
        document.getElementById('editCarbs').value = formData.carbs;
        document.getElementById('editProtein').value = formData.protein;
        document.getElementById('editKcals').value = formData.kcals;
        document.getElementById('editPrice').value = formData.price;
      
});
});
   
$(".update-this").on('click', function(){
    document.getElementById("modalThree").classList.add('hidden');
    
var edit_fname = document.getElementById('editFname').value; 
var edit_fat = document.getElementById('editFat').value;
var edit_carbs = document.getElementById('editCarbs').value;
var edit_protein = document.getElementById('editProtein').value;
var edit_kcals = document.getElementById('editKcals').value;
var edit_price = document.getElementById('editPrice').value;
    $.post("update.php", {id: id, edit_fname: edit_fname, edit_fat: edit_fat, edit_carbs: edit_carbs, edit_protein: edit_protein, edit_kcals: edit_kcals, edit_price: edit_price, updatethis: updatethis}, function(data){
    });
    $(".td-left[rel=" + id + "]").html(edit_fname);
});

$(".add-this").on('click', function(){
    
    id = $(this).attr('rel');
   
    $.post("add.php", {id: id, addthis: addthis}, function(data){
        
        var returnData = JSON.parse(data);
        
        $(".mainTable").append( "<tr><td style='width:34%'>" + returnData.fname + "</td><td style='width:12%'>" + returnData.fat + "</td><td style='width:12%'>" + returnData.carbs + "</td><td style='width:12%'>" + returnData.protein + "</td><td style='width:12%'>" + returnData.price + "</td><td style='width:12%'>" + returnData.kcals + "</td></tr>" );


        for (var i = 1; i < table.rows.length; i++) {
    totalFat = totalFat + parseInt(table.rows[i].cells[1].innerHTML);
    totalCarbs = totalCarbs + parseInt(table.rows[i].cells[2].innerHTML);
    totalProtein = totalProtein + parseInt(table.rows[i].cells[3].innerHTML);
    totalCosts = totalCosts + parseInt(table.rows[i].cells[4].innerHTML);
    totalKcals = totalKcals + parseInt(table.rows[i].cells[5].innerHTML);
}

       
        updateChart();


});

});


$(".inputQuantity").keyup(function(){
  
    id = $(this).attr('rel');    
var edit_quantity = document.getElementById(id).value; 


console.log(edit_quantity);
console.log(id);
console.log('test');

    $.post("setquantity.php", {id: id, edit_quantity: edit_quantity, setthisquantity: setthisquantity}, function(){
    });
    
});





});


</script>

<script type="text/javascript" src="javascript.js"></script>

</body>

</html>