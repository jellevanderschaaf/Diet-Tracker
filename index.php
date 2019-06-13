<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <title>Diet Tracker</title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>
    <body>
        <div class="section section-header">
            <div class="logo"><img src="diet.png" alt="" />Diet Tracker</div>
            <ul class="navigation">
                <li><a href="/">Calorie counter</a></li>
                <li><a href="/">Elimination diet</a></li>
                <li><a href="/">Statistics</a></li>
            </ul>
            <div class="user">
                <a href="/">Login</a>
            </div>
        </div>
        <div class="section section-body">
            <div class="container">
                <div class="column column-1-4">
                    <h1>Food items</h1>
                    <label for="create">New food item</label>
                    <input type="checkbox" class="hidden" name="create" id="create" />
                    <form action="" method="post">
                        <div class="form">
                            <div class="fields">
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
                            <ul>
                                <li><span>Minced beef</span> <button value="1">+</button></li>
                                <li><span>Egg</span> <button value="2">+</button></li>
                                <li><span>Butter</span> <button value="3">+</button></li>
                                <li><span>Chicken legg</span> <button value="3">+</button></li>
                                <li><span>Mackerel</span> <button value="3">+</button></li>
                                <li><span>Sardines</span> <button value="3">+</button></li>
                                <li><span>Kefir</span> <button value="3">+</button></li>
                                <li><span>Almond cake</span> <button value="3">+</button></li>
                                <li><span>Apple</span> <button value="3">+</button></li>
                                <li><span>Blueberries</span> <button value="3">+</button></li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="column column-1-2">
                    <h1>Date</h1>
                    <form action="" method="post">
                        <div class="form">
                            <div class="item">
                                <div class="name">Lorem</div>
                                <div class="statistics">fat: 72 grams carbs: 1.8 grams protein: 120 grams kcals: 1140 costs: € 6.4</div>
                                <button value="1">x</button>
                            </div>     
                            <div class="item">
                                <div class="name">Ipsum</div>
                                <div class="statistics">fat: 6.7 grams carbs: 0.9 grams protein: 7.7 grams kcals: 95 costs: € 0.164</div>
                                <button value="2">x</button>
                            </div> 
                            <div class="item">
                                <div class="name">Dolor</div>
                                <div class="statistics">fat: 82.5 grams carbs: 0.7 grams protein: 0.7 grams kcals: 748 costs: € 1.196</div>
                                <button value="3">x</button>
                            </div>                                                                                    
                        </div>
                    </form>
                </div>
                <div class="column column-1-4">
                    <h1>Totals</h1>
                    <table class="statistics">
                        <tr>
                            <th>Kcals</th>
                            <td>1983</td>
                        </tr>
                        <tr>
                            <th>Fat</th>
                            <td>161.2</td>
                        </tr>
                        <tr>
                            <th>Carbs</th>
                            <td>3.4</td>
                        </tr>
                        <tr>
                            <th>Protein</th>
                            <td>128.4</td>
                        </tr>
                        <tr>
                            <th>Costs</th>
                            <td>€ 7.76</td>
                        </tr>
                    </table>
                    <table class="graph">
                        <tr>
                            <td><div class="bar pct-57">&nbsp;</div></td>
                            <td><div class="bar pct-0">&nbsp;</div></td>
                            <td><div class="bar pct-43">&nbsp;</div></td>
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
    </body>
</html>