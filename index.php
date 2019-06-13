<?php

include('application.php');

?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <title>Diet Tracker</title>
        <link rel="icon" type="image/png" href="diet.png">
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>
    <body>
        <div class="section section-header">
            <div class="logo"><img src="diet.png" alt="" /><h1>Diet Tracker</h1></div>
            <ul class="navigation">
                <li><a href="/">Calorie counter</a></li>
                <li><a href="/">Elimination diet</a></li>
                <li><a href="/">Statistics</a></li>
            </ul>
            <div class="user">
                <form action="" method="post">
                    <input type="hidden" name="action" value="clear" />
                    <input type="submit" class="submit" value="Clear session" />
                </form>
            </div>
        </div>
        <div class="section section-body">
            <div class="container">
            <div class="flex">
                <div class="column column-1-4">
                    <h1>Food items</h1>
                    <label for="create" class="control">New food item</label>
                    <input type="checkbox" class="hidden" name="create" id="create" />
                    <form action="" method="post" class="create-form">
                        <div class="form">
                            <div class="fields">
                                <input type="hidden" name="action" value="create" />
                                <input type="text" class="text" name="name" value="" placeholder="Name" />
                                <input type="text" class="text" name="fat" value="" placeholder="Fat" />
                                <input type="text" class="text" name="carbs" value="" placeholder="Carbs" />
                                <input type="text" class="text" name="protein" value="" placeholder="Protein" />
                                <input type="text" class="text" name="kcals" value="" placeholder="Kcals" />
                                <input type="text" class="text" name="price" value="" placeholder="Price" />
                            </div>
                            <div class="controls">
                                <a href="/">Cancel</a>
                                <input type="submit" class="submit" value="Create" />
                            </div>                                                                                              
                        </div>
                    </form>
                    <form action="" method="post">
                        <div class="form">
                            <input type="hidden" name="action" value="select" />
                            <ul class="selection-list">
                                <?php foreach($data['items'] as $index => $item):?>
                                <li><span><?=$item[0];?></span> <button name="item" value="<?=$index;?>">+</button></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="column column-1-2">
                    <h1>Date</h1>
                    <form action="" method="post">
                        <div class="form form-selection">
                            <input type="hidden" name="action" value="remove" />
                            <?php foreach($data['selection'] as $item => $count):?>
                            <div class="item">
                                <div class="name"><?=$data['items'][$item][0];?></div>
                                <div class="statistics">
                                fat: <?=$data['items'][$item][1];?> grams 
                                carbs: <?=$data['items'][$item][2];?> grams 
                                protein: <?=$data['items'][$item][3];?> grams 
                                kcals: <?=$data['items'][$item][4];?>  
                                costs: € <?=$data['items'][$item][5];?>
                                </div>
                                <?php for($i=0;$i<$count;$i++):?>
                                    <button name="item" value="<?=$item;?>">x</button>
                                <?php endfor;?>
                            </div>     
                            <?php endforeach;?>                                                                                
                        </div>
                    </form>
                </div>
                <div class="column column-1-4">
                    <h1>Totals</h1>
                    <table class="statistics">
                        <tr>
                            <th>Kcals</th>
                            <td><?=($x = $totals['kcals']) ? $x : '';?></td>
                        </tr>
                        <tr>
                            <th>Fat</th>
                            <td><?=($x = $totals['fat']) ? $x : '';?></td>
                        </tr>
                        <tr>
                            <th>Carbs</th>
                            <td><?=($x = $totals['carbs']) ? $x : '';?></td>
                        </tr>
                        <tr>
                            <th>Protein</th>
                            <td><?=($x = $totals['protein']) ? $x : '';?></td>
                        </tr>
                        <tr>
                            <th>Costs</th>
                            <td><?=($x = $totals['costs']) ? '€ '.$x : '';?></td>
                        </tr>
                    </table>
                    <table class="graph">
                        <tr>
                            <td><div class="bar bar-a" style="height: <?=$graph['fat'];?>px;">&nbsp;</div></td>
                            <td><div class="bar bar-b" style="height: <?=$graph['carbs'];?>px;">&nbsp;</div></td>
                            <td><div class="bar bar-c" style="height: <?=$graph['protein'];?>px;">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <th>Fat</th>
                            <th>Carbs</th>
                            <th>Protein</th>
                        </tr>
                    </table>
                </div>                                    
            </div>
            </div>
        </div>
        <div class="section section-footer container">
            &copy; 2019
        </div>
    </body>
</html>