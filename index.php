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

    if ($list == 'grams') {
        $quantity = 100;
    }

    if ($list == 'piece') {
        $quantity = 1;
    }


    // Check if fname already exists
    $query = "SELECT count(*) as allcount FROM food_items WHERE fname='" . $fname . "'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $allcount = $row['allcount'];
    // insert
    if (empty($error_array) && $allcount == 0) {
        $query = mysqli_query($con, "INSERT INTO food_items VALUES ('', '$fname', '$fat', '$carbs', '$protein', '$kcals', '$price', '$list', '$quantity')");
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
                        100 grams <input type="radio" name="radioEdit" value="grams" class="radioButtonEdit"><br>
                        piece <input type="radio" name="radioEdit" value="piece" class="radioButtonEdit">
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
                </table>
                <table class="mainTable2">
  <?php
                    $sql = "SELECT id, fname, fat, carbs, protein, price, kcals, list, quantity from food_items_date";
                    $result = $con->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='mainTable2-tr'>";
                          
                        if ($row['list'] == 'grams') {

                            echo "<td style='width:34%' class='mainTableFirstColumn'>{$row['fname']}<input id='".$row['id']."' class='inputQuantity' value='{$row['quantity']}' rel='".$row['id']."'>gr</td>";
                          
                            $fatAdjusted = number_format($row['fat'] / 100 * $row['quantity'], 1);
                            $carbsAdjusted = number_format($row['carbs'] / 100 * $row['quantity'], 1);
                            $proteinAdjusted = number_format($row['protein'] / 100 * $row['quantity'], 1);
                            $priceAdjusted = number_format($row['price'] / 100 * $row['quantity'], 2);
                            $kcalsAdjusted = number_format($row['kcals'] / 100 * $row['quantity'], 0);
    
                                echo "<td style='width:12%' class='mainTableColumns'>{$fatAdjusted}</td>";
                                echo "<td style='width:12%' class='mainTableColumns'>{$carbsAdjusted}</td>";
                                echo "<td style='width:12%' class='mainTableColumns'>{$proteinAdjusted}</td>";
                                echo "<td style='width:12%' class='mainTableColumns'>€ {$priceAdjusted}</td>";
                                echo "<td style='width:12%' class='mainTableColumnKcal'>{$kcalsAdjusted}</td>";
                                echo "</tr>";   

                        }

                        if ($row['list'] == 'piece') {

                            echo "<td style='width:34%' class='mainTableFirstColumn'>{$row['fname']}<input id='".$row['id']."' class='inputQuantity' value='{$row['quantity']}' rel='".$row['id']."'>stuks</td>";
                          
                        

                        $fatAdjusted = number_format($row['fat'] * $row['quantity'], 1);
                        $carbsAdjusted = number_format($row['carbs'] * $row['quantity'], 1);
                        $proteinAdjusted = number_format($row['protein'] * $row['quantity'], 1);
                        $priceAdjusted = number_format($row['price'] * $row['quantity'], 2);
                        $kcalsAdjusted = number_format($row['kcals'] * $row['quantity'], 0);

                            echo "<td style='width:12%' class='mainTableColumns'>{$fatAdjusted}</td>";
                            echo "<td style='width:12%' class='mainTableColumns'>{$carbsAdjusted}</td>";
                            echo "<td style='width:12%' class='mainTableColumns'>{$proteinAdjusted}</td>";
                            echo "<td style='width:12%' class='mainTableColumns'>€ {$priceAdjusted}</td>";
                            echo "<td style='width:12%' class='mainTableColumnKcal'>{$kcalsAdjusted}</td>";
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
        

        if (formData.list == 'grams') {
            $('.radioButtonEdit:first').attr('checked', true);
        }

        if (formData.list == 'piece') {
            $('.radioButtonEdit:last').attr('checked', true);
        }
      
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

if  ($('.radioButtonEdit:first').is(":checked")) {
    var edit_list = 'grams';
    var edit_quantity = 100;
}

else  {
    var edit_list = 'piece';
    var edit_quantity = 1;
};



    $.post("update.php", {id: id, edit_fname: edit_fname, edit_fat: edit_fat, edit_carbs: edit_carbs, edit_protein: edit_protein, edit_kcals: edit_kcals, edit_price: edit_price, edit_list: edit_list, edit_quantity: edit_quantity, updatethis: updatethis}, function(data){
    });

    $(".td-left[rel=" + id + "]").html(edit_fname);

});

$(".add-this").on('click', function(){
    
    id = $(this).attr('rel');
   
    $.post("add.php", {id: id, addthis: addthis}, function(data){
        
    var returnData = JSON.parse(data);
    
    var fat = parseFloat(returnData.fat).toFixed(1);
    var carbs = parseFloat(returnData.carbs).toFixed(1);
    var protein = parseFloat(returnData.protein).toFixed(1);
    var price = parseFloat(returnData.price).toFixed(2);
    var kcals = parseFloat(returnData.kcals).toFixed(0);
                                          

if (returnData.list == 'grams') {



        $(".mainTable2").append( "<tr><td style='width:34%' class='mainTableFirstColumn'>" + returnData.fname + "<input id='" + returnData.id + "' class='inputQuantity' value='" + returnData.quantity + "' rel='" +  returnData.id + "'>gr</td><td style='width:12%' class='mainTableColumns'>" + fat + "</td><td style='width:12%' class='mainTableColumns'>" + carbs + "</td><td style='width:12%' class='mainTableColumns'>" + protein + "</td><td style='width:12%' class='mainTableColumns'>€ " + price + "</td><td style='width:12%' class='mainTableColumnKcal'>" + kcals + "</td></tr>" );

}

else {

    var fat = returnData.fat

         $(".mainTable2").append( "<tr><td style='width:34%' class='mainTableFirstColumn'>" + returnData.fname + "<input id='" + returnData.id + "' class='inputQuantity' value='" + returnData.quantity + "' rel='" +  returnData.id + "'>stuks</td><td style='width:12%' class='mainTableColumns'>" + fat + "</td><td style='width:12%' class='mainTableColumns'>" + carbs + "</td><td style='width:12%' class='mainTableColumns'>" + protein + "</td><td style='width:12%' class='mainTableColumns'>€ " + price + "</td><td style='width:12%' class='mainTableColumnKcal'>" + kcals + "</td></tr>" );

}
       


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



$("body").on('keyup', '.inputQuantity', function(){
  
    id = $(this).attr('rel');    
    var edit_quantity = document.getElementById(id).value; 

    $.post("setquantity.php", {id: id, edit_quantity: edit_quantity, setthisquantity: setthisquantity}, function(data){

        var returnData = JSON.parse(data);
     
if (returnData.list == 'grams') {

var fat = returnData.fat / 100 * returnData.quantity;
var carbs = returnData.carbs / 100 * returnData.quantity;
var protein = returnData.protein / 100 * returnData.quantity;
var price = returnData.price / 100 * returnData.quantity;
var kcals = returnData.kcals / 100 * returnData.quantity;

    var newTableRow =  "<tr><td style='width:34%' class='mainTableFirstColumn'>" + returnData.fname + "<input id='" + returnData.id + "' class='inputQuantity' value='" + returnData.quantity + "' rel='" +  returnData.id + "'>gr</td><td style='width:12%'  class='mainTableColumns'>" + fat.toFixed(1) + "</td><td style='width:12%'  class='mainTableColumns'>" + carbs.toFixed(1) + "</td><td style='width:12%'  class='mainTableColumns'>" + protein.toFixed(1) + "</td><td style='width:12%'  class='mainTableColumns'>€ " + price.toFixed(2) + "</td><td style='width:12%' class='mainTableColumnKcal'>" + kcals.toFixed(0) + "</td></tr>";
    $('#'+ id).parent().parent().replaceWith(newTableRow);

}

else {

var fat = returnData.fat * returnData.quantity;
var carbs = returnData.carbs * returnData.quantity;
var protein = returnData.protein * returnData.quantity;
var price = returnData.price  * returnData.quantity;
var kcals = returnData.kcals * returnData.quantity;

    var newTableRow =  "<tr><td style='width:34%' class='mainTableFirstColumn'>" + returnData.fname + "<input id='" + returnData.id + "' class='inputQuantity' value='" + returnData.quantity + "' rel='" +  returnData.id + "'>stuks</td><td style='width:12%'  class='mainTableColumns'>" + fat.toFixed(1) + "</td><td style='width:12%'  class='mainTableColumns'>" + carbs.toFixed(1) + "</td><td style='width:12%'  class='mainTableColumns'>" + protein.toFixed(1) + "</td><td style='width:12%'  class='mainTableColumns'>€ " + price.toFixed(2) + "</td><td style='width:12%' class='mainTableColumnKcal'>" + kcals.toFixed(0) + "</td></tr>";
    $('#'+ id).parent().parent().replaceWith(newTableRow);
}

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

});


</script>

<script type="text/javascript" src="javascript.js"></script>

</body>

</html>